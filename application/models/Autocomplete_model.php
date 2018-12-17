<?php
class Autocomplete_model extends CI_Model
{

    //constructeur charge la classe permettant l'interrogation de la base de données
    public function __construct()
    {
        $this->load->database();
        $this->load->model('Pages_model');
        $this->load->model('Articles_model');
    }

    public function get()
    {
        $array = [];
        $page = $this->Pages_model->get_page();
        $articles = $this->Articles_model->get_article(false, false);
        foreach($page as $p){
            $array[] = str_replace('-',' ',$p['nom']);
        }
        foreach($articles as $a){
            $array[] = str_replace('-',' ',$a['titre']);
        }
       return json_encode($array); // il n'y a plus qu'à convertir en JSON;
    }
}