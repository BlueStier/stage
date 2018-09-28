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
                $choice = $this->input->post('type'.$nb);
        switch($choice){
                case 1:
                $id_pages = $this->input->post('pageselected'.$nb);
                $this->load->model('Pages_model');
                $resultat = $this->Pages_model->get_page_by_id($id_pages);
                $page = $resultat[0];
                $path = 'pages/'.$page['nom'].'/';                
                $photo = $page['background'];
                $boolean = TRUE;
                $assos_id = $id_pages;                              
                break;
                case 2:
                $id_article = $this->input->post('pageselected'.$nb);
                $this->load->model('Articles_model');
                $rese = $this->Articles_model->get_article_by_id($id_article);
                $article = $rese[0];
                $this->load->model('Pages_model');
                $resultat = $this->Pages_model->get_page_by_id($article['id_articlespage']);
                $nomArticle = str_replace(' ','-',$article['titre']);                
                $path = 'pages/'.$resultat[0]['nom'].'/#'.$nomArticle;
                $photo = $article['photo'];
                $boolean = FALSE;
                $assos_id =  $id_article; 
                break;
                default:
                header('Location:'.base_url().'cms/3');
                break;
                }
                $res = Home_model::get_home(1);
                $home = $res[0]; 
                $home['title'.$nb] = $title;
                $home['p'.$nb] = $p;
                $home['path'.$nb] = $path;
                $home['photo'.$nb] = $photo;
                $home['type'.$nb] = $boolean;
                $home['assos_id'.$nb] = $assos_id;
                $this->db->replace('home',$home);
        }

        public function get_articleOrPage($type,$id){

        }

        public function ifupdateArticleOrPage($type,$id){
                if($type){
                        $res = Home_model::get_home(1);
                        $home = $res[0];
                        $nb = 0 ;
                        for($s = 1; $s < 5; $s++){
                                if($home['assos_id'.$s] == $id && $home['type'.$s] == TRUE){
                                        $nb = $s;
                                }
                        }
                        if($nb > 0){
                        $this->load->model('Pages_model');
                        $result = $this->Pages_model->get_page_by_id($id);
                        $path = 'pages/'.$result[0]['nom'].'/';
                        $home['photo'.$nb] = $result[0]['background'];
                        $home['path'.$nb] = $path;
                        $this->db->replace('home',$home);
                        }
                }else{
                        $res = Home_model::get_home(1);
                        $home = $res[0];
                        $nb = 0 ;
                        for($s = 1; $s < 5; $s++){
                                if($home['assos_id'.$s] == $id && $home['type'.$s] == False){
                                        $nb = $s;
                                }
                        }

                        if($nb > 0){                        
                        $this->load->model('Pages_model');
                        $this->load->model('Articles_model');
                        $resultat = $this->Articles_model->get_article_by_id($id);                       
                        $article = $resultat[0];
                        $result = $this->Pages_model->get_page_by_id($article['id_articlespage']);
                        $nomArticle = str_replace(' ','-',$article['titre']);                
                        $path = 'pages/'.$result[0]['nom'].'/#'.$nomArticle;
                        $home['path'.$nb] = $path;
                        $home['photo'.$nb] = $article['photo'];
                        $this->db->replace('home',$home);
                        }      
                }
        }

         //fonction permettant de vider un lien
        public function deleteLien($n){
        $res = Home_model::get_home(1);
        $home = $res[0];

        for($o = $n; $o < 5; $o++){
                $home['photo'.$o] = $home['photo'.($o+1)];
                $home['path'.$o] = $home['path'.($o+1)];
                $home['p'.$o] = $home['p'.($o+1)];
                $home['title'.$o] = $home['title'.($o+1)];
                $home['type'.$o] = $home['type'.($o+1)];
                $home['assos_id'.$o] = $home['assos_id'.($o+1)];
        }
        $this->db->replace('home',$home);
    }
}