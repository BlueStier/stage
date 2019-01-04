<?php
class Consultvox_model extends CI_Model
{

    //constructeur charge la classe permettant l'interrogation de la base de données
    public function __construct()
    {
        $this->load->database();       
    }

    public function get(){
        return $this->db->get_where('consultvox', array('id' => '1'))->row_array();
    }

    public function update($texte_intro, $balise){
        $consult = Consultvox_model::get();
        $consult['intro'] = $texte_intro;
        $consult['balise'] = $balise;
        $this->db->replace('consultvox', $consult);
    }
}