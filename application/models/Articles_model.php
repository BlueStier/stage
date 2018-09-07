<?php
class Articles_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
        }

        //méthode qui extrait les données de la table acceuil
        public function get_article($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('articlespage');
                return $query->result_array();
        }

        $query = $this->db->get_where('articlespage', array('id_articlespage' => $id));
        return $query->result_array();
}

        public function create($id_pages){               
                $données =array('id_articlespage'=>$id_pages, 
                                'text'=>$this->input->post('article'));
                                       
                $this->db->insert('articlespage',$données);

        }

        public function createArticle(){
            //récupère et copie la photo choisie, définie les caractéristique de celle-ci et le chemin d'upload
            $config['upload_path']= "./assets/site/img/articles/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config ['max_size'] = 100000 ;
            $config ['max_width'] = 1024 ;
            $config ['max_height'] = 768 ;

            //upload la photo vers le serveur
            $this->load->library('upload', $config);
            //définition des paramètres de config pour la récupèration des photos
            //$this->upload->set_upload_path("./assets/site/img/about/");
            
            //upload la photo 
            if(! $this->upload->do_upload('article'))
                        {
                                //si upload hs retour vers la page de création de page avec info sur l'echec du transfert
                                $error = array('error'=> $this->upload->display_errors());
                                $this->load->view('cms/header');
                                $this->load->view('cms/left_menu');
                                $this->load->view('cms/createArticle', $error);
                                $this->load->view('cms/footer');
                        }else{
                                //si upload ok, on récupère le nom de la photo et on met le chemin dans l'array                                     
                                $array = $this->upload->data();
                                $photo = 'assets/site/img/articles/'.$array['orig_name'];
                                
                        }
                        $this->db->set('jour','NOW()',false);
                        $données = [ 'id_articlespage'=>54,
                                     'photo'=> $photo,
                                     'text' => $this->input->post('text'),
                                    ]; 
                                    
                        $this->db->insert('articles',$données);

 
        }

        public function get_article_by_page($id = FALSE)
        {
                if ($id === FALSE)
                {
                        $query = $this->db->get('articles');
                        return $query->result_array();
                }
        
                $query = $this->db->get_where('articles', array('id_articlespage' => $id));
                return $query->result_array();
        }

}