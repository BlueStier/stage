<?php
class Header_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
        }

        //méthode qui extrait les données de la table menu
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
         //méthode qui extrait les données de la table sousmenu
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
         //méthode qui extrait les données de la table third_level
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
        //suppression d'un menu, sous-menu ou 3eme niveau
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

//fonction permettant de changer l'ordre des menus, sousmenus et 3eme niveau
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
        //fonction de déplacement de sousmenu vers un autre menu
        public function dragNdrop(){
                //récupère l'id du sous menu à modif et le nouveau menu concerné
                $idAModif1 = $this->input->post('id');
                $menu = $this->input->post('menu');

                //si l'element déplacé est un sous menu
                if(stristr($idAModif1, 'sousmenu') == TRUE) {
                        $idAModif = stristr($idAModif1, 'sousmenu',true);
                        $idAModif = intval($idAModif);                       
                //extraction de la base de donnée du sousmenu concerné
                $result = $this->db->get_where('sousmenu', array('id_sousmenu' => $idAModif))->result_array();

                //met l'ordre et le menu enlevé en attente
                $ordre = $result[0]['ordre'];
                $menu_depart = $result[0]['menu'];
                //extraction du dernier ordre de la base concernant ce menu
                $this->db->select('count(*) as lastOrdre');
                $result1 = $this->db->get_where('sousmenu', array('menu' => $menu))->result_array();
                //change le menu concerné et remplace dans la bdd               
                $result[0]['menu'] = $menu;
                $result[0]['ordre'] = $result1[0]['lastOrdre']+1;
                $this->db->replace('sousmenu',$result[0]);

                //comble le trou dans les ordre du menu de départ
                $where = ['menu' => $menu_depart, 'ordre >' => $ordre];
                $this->db->where($where);
                $result2 = $this->db->get('sousmenu')->result_array();
                $size = sizeof($result2);
                if($size > 0){
                        for($i = 0; $i < $size ; $i++){
                                $result2[$i]['ordre'] = $result2[$i]['ordre']-1;
                                $this->db->replace('sousmenu',$result2[$i]);    
                        }
                //in ne reste plus qu'a déplacer les 3eme niveau affiliés au sous menu pour qu'ils suivent
                $result3 = $this->db->get_where('third_level', array('sousmenu' => $result[0]['nom']))->result_array();               
                $size2 = sizeof($result3);
                
                if($size2 > 0){
                        for($i = 0; $i < $size2 ; $i++){                                
                                $result3[$i]['menu'] = $menu;
                                $this->db->replace('third_level',$result3[$i]);    
                        }
                  }
                }
                //sinon l'élément déplacé est un 3eme niveau
                }else{
                //récupère l'id du 3eme niveau à modif
                $idAModif1 = intval($idAModif1);
                $sousmenu = $this->input->post('sousmenu');
                //le menu se présentant sous cette forme :"<small>...nom du menu...nom du sousmenu...</small>" on enlève ce qui ne nous interesse pas
                //et on récupère le nom du menu
                $sousmenu = substr(stristr($sousmenu, '; '),2);
                $sousmenu = stristr($sousmenu,' :',true);
                //extraction de la base de donnée du 3eme niveau concerné
                $result = $this->db->get_where('third_level', array('id_third' => $idAModif1))->result_array();
                
                 //met l'ordre et le sousmenu enlevé en attente
                 $ordre = $result[0]['ordre'];
                 $Smenu_depart = $result[0]['sousmenu'];
                 //extraction du dernier ordre de la base concernant ce sousmenu
                 $this->db->select('count(*) as lastOrdre');
                 $result1 = $this->db->get_where('third_level', array('sousmenu' => $menu))->result_array();
                 //change le menu et sousmenu concerné et remplace dans la bdd
                 $result[0]['menu'] = $sousmenu;             
                 $result[0]['sousmenu'] = $menu;
                 $result[0]['ordre'] = $result1[0]['lastOrdre']+1;
                 $this->db->replace('third_level',$result[0]);

                 //comble le trou dans les ordre du sousmenu de départ
                 $where = ['sousmenu' => $Smenu_depart, 'ordre >' => $ordre];
                 $this->db->where($where);
                 $result2 = $this->db->get('third_level')->result_array();
                 $size = sizeof($result2);
                 if($size > 0){
                        for($i = 0; $i < $size ; $i++){
                                $result2[$i]['ordre'] = $result2[$i]['ordre']-1;
                                $this->db->replace('third_level',$result2[$i]);    
                        }
                }
        }
    }
}