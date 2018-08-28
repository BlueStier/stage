<?php
class Bulles_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
        }

        //méthode qui extrait les données de la table acceuil
        public function get_bulle($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('bulle');
                return $query->result_array();
        }

        $query = $this->db->get_where('bulle', array('id_pages' => $id));
        return $query->result_array();
}

}