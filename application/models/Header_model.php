<?php
class Header_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
        }

        //méthode qui extrait les données de la table acceuil
        public function get_menu($id = FALSE)
{
        if ($id === FALSE)
        {
                //récupération des éléments classé par la colonne ordre
                $this->db->order_by('ordre');
                $query = $this->db->get('menu');                
                return $query->result_array();
        }

        $query = $this->db->get_where('menu', array('id_menu' => $id));
        return $query->row_array();
}
        public function get_sousmenu($id = FALSE)
{
        if ($id === FALSE)
        {
                //récupération des éléments classé par la colonne menu et ensuite par la colonne ordre
                $this->db->order_by('menu, ordre');
                $query = $this->db->get('sousmenu');
                return $query->result_array();
        }

        $query = $this->db->get_where('sousmenu', array('id_sousmenu' => $id));
        return $query->row_array();
}
        public function get_thirdmenu($id = FALSE)
{
        if ($id === FALSE)
        {
                //récupération des éléments classé par la colonne sousmenu et ensuite par la colonne ordre
                $this->db->order_by('sousmenu, ordre');
                $query = $this->db->get('third_level');
                return $query->result_array();
        }

        $query = $this->db->get_where('third_level', array('id_third' => $id));
        return $query->row_array();
}
        //suppression d'un menu
        public function delete_menu($i)
{       
        switch ($i){
                case 1 :
                        //récupère l'id du menu à sup 
                        $data = array('id_menu' => $this->input->post('idmenu'));
                        return $this->db->delete('menu', $data);
                        break;
                case 2 :
                        //récupère l'id du sous-menu à sup 
                        $data = array('id_sousmenu' => $this->input->post('idmenu'));
                        return $this->db->delete('sousmenu', $data);
                        break;
                case 3 :
                        //récupère l'id du 3eme niveau à sup 
                        $data = array('id_third' => $this->input->post('idmenu'));
                        return $this->db->delete('third_level', $data);
                        break;
                default:
                        show_404();
                        break;
        }                
}
        public function upOrDown($sens, $id)
{
        switch ($id){
                case 1 ://pour modif l'ordre d'un menu
                        //passe l'id en paramètre et récupère les infos de la bdd 
                        $idAModif = $this->input->post('idmenu');
                        $query = $this->db->get_where('menu', array('id_menu' => $idAModif));
                        $result = $query->result_array();                                                 
                        
                        //passe l'ordre récupéré en paramètre
                        $ordreActuel = $result[0]['ordre'];
                        $ordreResult = 0;
                        //si sens est à vrai on descend l'ordre
                        if($sens == 1){
                        $ordreResult = $ordreActuel - 1;
                  
                        }else/*sinon on monte l'ordre*/{
                        $ordreResult = $ordreActuel + 1;
                        }
                        //on passe l'ordre à 0
                        $result[0]['ordre'] = 0;
                        $this->db->replace('menu',$result[0]);

                        //on récupère l'ordre de destination
                        $result1 = $this->db->get_where('menu', array('ordre' => $ordreResult))->result_array();
                        $result1[0]['ordre'] = $ordreActuel;
                        $this->db->replace('menu',$result1[0]);
                        
                        //on remet l'ordre de destination
                        $result[0]['ordre'] = $ordreResult;
                        $this->db->replace('menu',$result[0]);
                        break;

                case 2 ://pour modif l'ordre d'un sousmenu
                        //passe l'id en paramètre et récupère les infos de la bdd 
                        $idAModif = $this->input->post('idmenu');
                        $query = $this->db->get_where('sousmenu', array('id_sousmenu' => $idAModif));
                        $result = $query->result_array();                                                
                        
                        //passe l'ordre récupéré en paramètre
                        $ordreActuel = $result[0]['ordre'];
                        $ordreResult = 0;
                        //si sens est à vrai on descend l'ordre
                        if($sens == 1){
                        $ordreResult = $ordreActuel - 1;
                  
                        }else/*sinon on monte l'ordre*/{
                        $ordreResult = $ordreActuel + 1;
                        }
                        //on passe l'ordre à 0
                        $result[0]['ordre'] = 0;
                        $this->db->replace('sousmenu',$result[0]);

                        //on récupère l'ordre de destination
                        $result1 = $this->db->get_where('sousmenu', array('menu' =>  $result[0]['menu'],'ordre' => $ordreResult))->result_array();
                        $result1[0]['ordre'] = $ordreActuel;
                        $this->db->replace('sousmenu',$result1[0]);
                        
                        //on remet l'ordre de destination
                        $result[0]['ordre'] = $ordreResult;
                        $this->db->replace('sousmenu',$result[0]);
                        break;

                case 3 ://pour modif l'ordre du 3eme niveau
                        //passe l'id en paramètre et récupère les infos de la bdd 
                        $idAModif = $this->input->post('idmenu');
                        $query = $this->db->get_where('third_level', array('id_third' => $idAModif));
                        $result = $query->result_array();                                                
                        
                        //passe l'ordre récupéré en paramètre
                        $ordreActuel = $result[0]['ordre'];
                        $ordreResult = 0;
                        //si sens est à vrai on descend l'ordre
                        if($sens == 1){
                        $ordreResult = $ordreActuel - 1;
                  
                        }else/*sinon on monte l'ordre*/{
                        $ordreResult = $ordreActuel + 1;
                        }
                        //on passe l'ordre à 0
                        $result[0]['ordre'] = 0;
                        $this->db->replace('third_level',$result[0]);

                        //on récupère l'ordre de destination
                        $result1 = $this->db->get_where('third_level', array('sousmenu' =>  $result[0]['sousmenu'],'ordre' => $ordreResult))->result_array();
                        $result1[0]['ordre'] = $ordreActuel;
                        $this->db->replace('third_level',$result1[0]);
                        
                        //on remet l'ordre de destination
                        $result[0]['ordre'] = $ordreResult;
                        $this->db->replace('third_level',$result[0]);
                        break;
                default:
                        show_404();
                        break;
                }

}

}