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
        foreach ($page as $p) {
            $array[] = str_replace('-', ' ', $p['nom']);
        }
        foreach ($articles as $a) {
            $array[] = str_replace('-', ' ', $a['titre']);
        }
        $words = $words = $this->db->get_where('autocomplete', array('nom' => 'words'))->row_array();
        $size_of_words = sizeof($words) - 2;
        for ($a = 0; $a < $size_of_words; $a++) {
            $array[] = $words['mot' . $a];
        }
        return json_encode($array); // il n'y a plus qu'à convertir en JSON;
    }

    public function black_list()
    {
        return $this->db->get_where('autocomplete', array('nom' => 'black_list'))->row_array();
    }

    public function white_list()
    {
        return $this->db->get_where('autocomplete', array('nom' => 'words'))->row_array();
    }

    public function nombre_de_mot()
    {
        //la table autocomplete contient combien de colonne pour enregistrer les mots?
        $query = $this->db->query("SELECT COUNT(*) AS 'nb_mot' FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'autocomplete' and COLUMN_NAME like 'mot%'")->row_array();

        return $query['nb_mot'];
    }

    public function create_black_liste($mot)
    {
        $words = Autocomplete_model::black_list();
        if (!in_array($mot, $words)) {
            $nb_mot = Autocomplete_model::nombre_de_mot();
            for ($i = 0; $i < $nb_mot; $i++) {
                if ($words['mot' . $i] == null) {
                    $words['mot' . $i] = $mot;
                    $i = $nb_mot;
                } else if ($i == ($nb_mot - 1)) {
                    $this->db->query("ALTER TABLE autocomplete ADD mot" . $nb_mot . " TEXT");
                    $words['mot' . $nb_mot] = $mot;
                }
            }
            $this->db->replace('autocomplete', $words);
        }
    }

    public function create_word($recherche)
    {
        $black_list = Autocomplete_model::black_list();
        if (!in_array($recherche, $black_list)) {
            $words = $this->db->get_where('autocomplete', array('nom' => 'words'))->row_array();
            if (!in_array($recherche, $words)) {
                //la table autocomplete contient combien de colonne pour enregistrer les mots?
                $query = $this->db->query("SELECT COUNT(*) AS 'nb_mot' FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'autocomplete' and COLUMN_NAME like 'mot%'")->row_array();

                $nb_mot = $query['nb_mot'];

                for ($i = 0; $i < $nb_mot; $i++) {
                    if ($words['mot' . $i] == null) {
                        $words['mot' . $i] = $recherche;
                        $i = $nb_mot;
                    } else if ($i == ($nb_mot - 1)) {
                        $this->db->query("ALTER TABLE autocomplete ADD mot" . $nb_mot . " TEXT");
                        $words['mot' . $nb_mot] = $recherche;
                    }
                }
                $this->db->replace('autocomplete', $words);
            }
        }
    }

    public function barre_de_recherche($white_list, $supprimer, $nombre){       
        $black = Autocomplete_model::black_list();
        $white = Autocomplete_model::white_list();
        if($white_list == 'true' ){           
            //le mot est dans la liste blanche
            if($supprimer == 'true'){                
                //on doit le supprimer
                $white['mot'.$nombre] = null;
            }else{                
                //on doit le mettre dans la black liste
                Autocomplete_model::create_black_liste($white['mot'.$nombre]);               
                $white['mot'.$nombre] = null;
            }
            $this->db->replace('autocomplete', $white);
        }else{
            //le mot est dans la black liste 
            if($supprimer == 'true'){
                //on doit le supprimer
                $black['mot'.$nombre] = null;
                $this->db->replace('autocomplete', $black);
            }else{
            //on doit le mettre dans la liste blanche
            $mot_a_mettre_dans_la_liste_blanche = $black['mot'.$nombre];
            $black['mot'.$nombre] = null;
            $this->db->replace('autocomplete', $black);            
            Autocomplete_model::create_word($mot_a_mettre_dans_la_liste_blanche);
            }            
        }
    }
}
