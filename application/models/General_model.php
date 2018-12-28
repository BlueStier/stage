<?php
class General_model extends CI_Model
{

    //constructeur charge la classe permettant l'interrogation de la base de données
    public function __construct()
    {
        $this->load->database();
    }

    public function get(){
        return $this->db->get_where('general', array('id' => '1'))->row_array();
    }

    public function update($array){
        $this->db->replace('general', $array);
    }
}