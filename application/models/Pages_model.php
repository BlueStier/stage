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
        if ($id === FALSE)
        {
                //récupération des éléments                 
                $query = $this->db->get('pages');                
                return $query->result_array();
        }
        return $this->db->get_where('pages', array('nom' => $id))->row_array();
}

        public function get_idpage($id = FALSE)
{
        $result = $this->db->get_where('pages', array('nom' => $id))->result_array();
        return $result[0]['id_pages'];
}
        

        public function get_type(){

        $this->db->select('type');
        $this->db->distinct();
        return $this->db->get('pages')->result_array();
}

        public function validatePage($nomphoto, $type){
                /*enregistre la page (nom, background,type...) dans la table page pour tous type*/
                
                $nom = $this->input->post('nomPage');
                $nom1 = str_replace(array(' ','/','\\'),'',$nom);
                $titre = $this->input->post('titrePage');
                $soustitre = $this->input->post('soustitrePage');
                $this->db->insert('pages', array('nom' => $nom1 , 'titre' => $titre, 'soustitre' => $soustitre,'background' => $nomphoto, 'type' => $type));

               
        }
}