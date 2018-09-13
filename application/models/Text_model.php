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
                                'pg1'=>$this->input->post('pg1'),
                                't2'=>$this->input->post('t2'),
                                'pg2'=>$this->input->post('pg2'),                               
                                't3'=>$this->input->post('t3'),
                                'pg3'=>$this->input->post('pg3'),
                                't4'=>$this->input->post('t4'),
                                'pg4'=>$this->input->post('pg4'),
                                't5'=>$this->input->post('t5'),
                                'pg5'=>$this->input->post('pg5'),
                                't6'=>$this->input->post('t6'),
                                'pg6'=>$this->input->post('pg6'),
                                't7'=>$this->input->post('t7'),
                                'pg7'=>$this->input->post('pg7'),
                                't8'=>$this->input->post('t8'),
                                'pg8'=>$this->input->post('pg8'),
                                't9'=>$this->input->post('t9'),
                                'pg9'=>$this->input->post('pg9'),
                                't10'=>$this->input->post('t10'),
                                'pg10'=>$this->input->post('pg10'),      
                                );
                                       
                $this->db->insert('text',$données);

        }

        public function update($id_pages){               
                 $text = Text_model::get_text($id_pages);

                 for($a = 1; $a <= 10; $a ++){
                        $text[0]['t'.$a] = $this->input->post('t'.$a);
                        $text[0]['pg'.$a] = $this->input->post('pg'.$a);   
                 }

                               /* $text[0]['t1'] = $this->input->post('t1');
                                $text[0]['pg1'] = $this->input->post('pg1');
                                $text[0]['t2'] = $this->input->post('t2');
                                $text[0]['pg2'] = $this->input->post('pg2');
                                $text[0]['t3'] = $this->input->post('t3');
                                $text[0]['pg3'] = $this->input->post('pg3'),
                                $text[0]['t4'] = $this->input->post('t4'),
                                $text[0]['pg4'] = $this->input->post('pg4'),
                                $text[0]['t5'] = $this->input->post('t5'),
                                $text[0]['pg5'] = $this->input->post('pg5'),
                                $text[0]['t6'] = $this->input->post('t6'),
                                $text[0]['pg6'] = $this->input->post('pg6'),
                                $text[0]['t7'] = $this->input->post('t7'),
                                $text[0]['pg7'] =$this->input->post('pg7'),
                                $text[0]['t8'] = $this->input->post('t8'),
                                $text[0]['pg8'] =$this->input->post('pg8'),
                                $text[0]['t9'] = $this->input->post('t9'),
                                $text[0]['pg9'] = $this->input->post('pg9'),
                                $text[0]['t10'] = $this->input->post('t10'),
                                $text[0]['pg10'] = $this->input->post('pg10'),      
                                );*/
                                       
                $this->db->replace('text',$text[0]);

        }

}