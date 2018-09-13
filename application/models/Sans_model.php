<?php
class Sans_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
        }

        //méthode qui extrait les données de la table acceuil
        public function get_sans($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('sans');
                return $query->result_array();
        }

        $query = $this->db->get_where('sans', array('id_pages' => $id));
        return $query->result_array();
}

        public function create($id_pages){               
                $données =array('id_pages'=>$id_pages, 
                                'pg1'=>$this->input->post('sans'));
                                       
                $this->db->insert('sans',$données);

        }

        public function update($id_pages){               
                $sans = Sans_model::get_sans($id_pages);
                $sans[0]['pg1'] = $this->input->post('sans');                       
                $this->db->replace('sans',$sans[0]);

        }

}