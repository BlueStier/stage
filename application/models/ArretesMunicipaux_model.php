<?php
class ArretesMunicipaux_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
        }

        //méthode qui extrait les données de la table elus
        public function get_arretes($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('arretes_municipaux');
                return $query->result_array();
        }

        $query = $this->db->get_where('arretes_municipaux', array('id_muni' => $id));
        return $query->row_array();
}

}