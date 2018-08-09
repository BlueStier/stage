<?php
class Travaux_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
        }

        //méthode qui extrait les données de la table travaux
        public function get_travaux($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('travaux');
                return $query->result_array();
        }

        $query = $this->db->get_where('travaux', array('id_travaux' => $id));
        return $query->row_array();
}

}