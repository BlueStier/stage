<?php
class Environnement_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
        }

        //méthode qui extrait les données de la table environnement
        public function get_environnement($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('environnement');
                return $query->result_array();
        }

        $query = $this->db->get_where('environnement', array('id_environnement' => $id));
        return $query->row_array();
}
        
}