<?php
class Deliberations_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
        }

        //méthode qui extrait les données de la table deliberations
        public function get_deliberations($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('deliberations');
                return $query->result_array();
        }

        $query = $this->db->get_where('deliberations', array('id_delib' => $id));
        return $query->row_array();
}
       
}