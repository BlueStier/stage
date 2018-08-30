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
        

        public function get_type(){

        $this->db->select('type');
        $this->db->distinct();
        return $this->db->get('pages')->result_array();
}

        public function validatePage($nomphoto){
                $type = $this->input->post('selectType');
                $nom = $this->input->post('nomPage');
                $titre = $this->input->post('titrePage');
                $soustitre = $this->input->post('soustitrePage');
                $this->db->insert('pages', array('nom' => $nom , 'titre' => $titre, 'soustitre' => $soustitre,'background' => $nomphoto, 'type' => $type));
        }
}