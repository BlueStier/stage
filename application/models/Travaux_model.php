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

        public function set_travaux()
        {     
        
                $data = array(
                'adresse' => "'".$this->input->post('adresse')."'",
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'date_enregistrement' => 'NOW()',
                'date_debut' => "'".$this->input->post('date_debut')."'",
                'date_fin'=> "'".$this->input->post('date_fin')."'",
                'société'=> "'".$this->input->post('societe')."'",
                'commenditaires'=> "'".$this->input->post('commenditaire')."'",                
                'contact'=>"'".$this->input->post('contact')."'",
                'commentaires'=> "'".$this->input->post('commentaires')."'"
                 );
                

        return $this->db->insert('travaux', $data);
        }

}