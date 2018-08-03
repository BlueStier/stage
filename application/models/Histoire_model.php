<?php
class Histoire_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
        }

        //méthode qui extrait les données de la table histoire
        public function get_histoire($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('histoire');
                return $query->result_array();
        }

        $query = $this->db->get_where('histoire', array('id_histoire' => $id));
        return $query->row_array();
}
        
}