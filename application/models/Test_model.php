<?php
class Test_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
        }

        //méthode qui extrait les données de la table acceuil
        public function get_acceuil($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('acceuil');
                return $query->result_array();
        }

        $query = $this->db->get_where('acceuil', array('id_acceuil' => $id));
        return $query->row_array();
}

}