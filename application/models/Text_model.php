<?php
class Text_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
        }

        //méthode qui extrait les données de la table acceuil
        public function get_text($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('text');
                return $query->result_array();
        }

        $query = $this->db->get_where('text', array('id_pages' => $id));
        return $query->result_array();
}

        public function create($id_pages){               
                $données =array('id_pages'=>$id_pages, 
                                't1'=>$this->input->post('t1'),
                                'pg1'=>str_replace('<ul>','<ul class="list">',$this->input->post('pg1')),
                                't2'=>$this->input->post('t2'),
                                'pg2'=>str_replace('<ul>','<ul class="list">',$this->input->post('pg2')),                               
                                't3'=>$this->input->post('t3'),
                                'pg3'=>str_replace('<ul> ','<ul class="list">',$this->input->post('pg3')),
                                't4'=>$this->input->post('t4'),
                                'pg4'=>str_replace('<ul>','<ul class="list">',$this->input->post('pg4')),
                                't5'=>$this->input->post('t5'),
                                'pg5'=>str_replace('<ul>','<ul class="list">',$this->input->post('pg5')),
                                't6'=>$this->input->post('t6'),
                                'pg6'=>str_replace('<ul>','<ul class="list">',$this->input->post('pg6')),
                                't7'=>$this->input->post('t7'),
                                'pg7'=>str_replace('<ul>','<ul class="list">',$this->input->post('pg7')),
                                't8'=>$this->input->post('t8'),
                                'pg8'=>str_replace('<ul>','<ul class="list">',$this->input->post('pg8')),
                                't9'=>$this->input->post('t9'),
                                'pg9'=>str_replace('<ul> ','<ul class="list">',$this->input->post('pg9')),
                                't10'=>$this->input->post('t10'),
                                'pg10'=>str_replace('<ul>','<ul class="list">',$this->input->post('pg10')),     
                                );
                                      
                $this->db->insert('text',$données);

        }

        public function update($id_pages){               
                 $text = Text_model::get_text($id_pages);

                 for($a = 1; $a <= 10; $a ++){
                        $text[0]['t'.$a] = $this->input->post('t'.$a);
                        $text[0]['pg'.$a] = str_replace('<ul>','<ul class="list">',$this->input->post('pg'.$a));   
                 }

                $this->db->replace('text',$text[0]);

        }

        public function search($recherche){
                $this->db->like('t1',$recherche,'both');
                $this->db->or_like('pg1',$recherche,'both');
                $this->db->or_like('t2',$recherche,'both');
                $this->db->or_like('pg2',$recherche,'both');
                $this->db->or_like('t3',$recherche,'both');
                $this->db->or_like('pg3',$recherche,'both');
                $this->db->or_like('t4',$recherche,'both');
                $this->db->or_like('pg4',$recherche,'both');
                $this->db->or_like('t5',$recherche,'both');
                $this->db->or_like('pg5',$recherche,'both');
                $this->db->or_like('t6',$recherche,'both');
                $this->db->or_like('pg6',$recherche,'both');
                $this->db->or_like('t7',$recherche,'both');
                $this->db->or_like('pg7',$recherche,'both');
                $this->db->or_like('t8',$recherche,'both');
                $this->db->or_like('pg8',$recherche,'both');
                $this->db->or_like('t9',$recherche,'both');
                $this->db->or_like('pg9',$recherche,'both');
                $this->db->or_like('t10',$recherche,'both');
                $this->db->or_like('pg10',$recherche,'both');                
                $query = $this->db->get('text');
                return $query->result_array(); 
            }

}