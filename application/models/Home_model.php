<?php
class Home_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
        }

        //méthode qui extrait les données de la table acceuil
        public function get_home($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('home');
                return $query->result_array();
        }

        $query = $this->db->get_where('home', array('id_pages' => $id));
        return $query->result_array();
}

        //méthode permettant d'enregistrer le changement du texte d'intro de la homme page en bdd
        public function updateIntroHome($intro){
                $res = Home_model::get_home(1);
                $home = $res[0];
                $home['intro'] = $intro;
                $this->db->replace('home',$home);
        }

        //fonction de mise à jour du texte de la photo du carroussel
        public function updateTitleAndPByLien($nb,$title,$p){
                $id_pages = $this->input->post('pageselected'.$nb);
                $this->load->model('Pages_model');
                $resultat = $this->Pages_model->get_page_by_id($id_pages);
                $page = $resultat[0];
                $path = 'pages/'.$page['nom'].'/';
                $res = Home_model::get_home(1);
                $home = $res[0];
                $home['title'.$nb] = $title;
                $home['p'.$nb] = $p;
                $home['path'.$nb] = $path;
                $home['photo'.$nb] = $page['background'];
                $this->db->replace('home',$home);    
        }
}