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
        }                
}

}