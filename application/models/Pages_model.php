<?php
class Pages_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
        }

        //méthode qui extrait les données de la table menu
        public function get_page($id = FALSE)
{
        return $this->db->get_where('pages', array('nom' => $id))->row_array();
}
        

        public function get_elus($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('elus');
                return $query->result_array();
        }

        $query = $this->db->get_where('elus', array('id_elus' => $id));
        return $query->row_array();
}
}