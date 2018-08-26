<?php
class Rapide_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
        }

        public function get_rapide($id = FALSE)
        {
                if ($id === FALSE)
                {
                        //récupération des éléments classé par la colonne ordre
                        $this->db->order_by('ordre');                                        
                        return $this->db->get('rapide')->result_array();
                }        
                return $this->db->get_where('rapide', array('id_rapide' => $id))->row_array();
        }
    }
