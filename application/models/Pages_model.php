<?php
class Pages_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
                $this->load->model('Personnaes_model');
        }

        //méthode qui extrait les données de la table menu
        public function get_page($id = FALSE)
{
        if ($id === FALSE)
        {
                //récupération des éléments                 
                $query = $this->db->get('pages');                
                return $query->result_array();
        }
        return $this->db->get_where('pages', array('nom' => $id))->row_array();
}

        public function get_idpage($id = FALSE)
{
        $result = $this->db->get_where('pages', array('nom' => $id))->result_array();
        return $result[0]['id_pages'];
}

        public function get_page_by_type($id)
{
        $result = $this->db->get_where('pages', array('type' => $id))->result_array();
        return $result;
}
        public function get_page_by_id($id)
{
        $result = $this->db->get_where('pages', array('id_pages' => $id))->result_array();
        return $result;
}
        

        public function get_type(){

        $this->db->select('type');
        $this->db->distinct();
        return $this->db->get('pages')->result_array();
}

        public function validatePage($nomphoto, $type, $path_doc,$intro_doc){
                /*enregistre la page (nom, background,type...) dans la table page pour tous type*/
                
                $nom = $this->input->post('nomPage');
                $nom1 = str_replace(' ','-',$nom);
                $titre = $this->input->post('titrePage');
                $soustitre = $this->input->post('soustitrePage');
                $this->db->insert('pages', array('nom' => $nom1 , 'titre' => $titre, 'soustitre' => $soustitre,'background' => $nomphoto, 'type' => $type, 'intro_doc' => $intro_doc,'path_doc'=> $path_doc));

               
        }

        public function delete(){
                //récupère l'id de la page à sup
                $id_page = $this->input->post('id_pages');
                //on extrait les info de la bdd pour cette page
                $array = $this->db->get_where('pages', array('id_pages' => $id_page))->result_array();
                //on supprime dans la table bulle,text ou autre la ligne correspondante
                $this->db->delete($array[0]['type'],array('id_pages' => $id_page));
                //on vérifie si la page contient un document téléchargeable et si oui on le supprime
                if($array[0]['path_doc'] != ''){
                        unlink($array[0]['path_doc']);
                }
                //on finit par supprimer la page dans la table pages
                $this->db->delete('pages',array('id_pages' => $id_page));

                //suppression des liens avec cette page
                $path = 'pages/'.$array[0]['nom'].'/';
                /*pour les menus :
                */                
                $this->db->like('path',$path);
                $menu = $this->db->get('menu')->result_array();
                
                $size_menu = sizeof($menu);
                if($size_menu > 0){
                        foreach($menu as $item):
                                //on vide le chemin 
                                $item['path'] = '';
                                //on vérifie si le menu à des sousmenus
                                $verifsmenu = sizeof($this->db->get_where('sousmenu',array("menu"=>$item['nom']))->result_array());
                                //si le menus n'a pas de sousmenu on le rend invisible pour éviter d'avoir un lien qui ne fonctionne pas
                                if($verifsmenu == 0){
                                        $item['visible'] = false;
                                }
                                $this->db->replace('menu',$item);
                        endforeach;        
                }

                 /*pour les sousmenus :
                */                
                $this->db->like('path',$path);
                $Smenu = $this->db->get('sousmenu')->result_array();
                
                $size_menu = sizeof($Smenu);
                if($size_menu > 0){
                        foreach($Smenu as $Sitem):
                                //on vide le chemin 
                                $Sitem['path'] = '';
                                //on vérifie si le sousmenu à des 3ème niveau                                
                                //si ce n'est pas le cas on le rend invisible pour éviter d'avoir un lien qui ne fonctionne pas
                                if($Sitem['no3level']){
                                        $Sitem['visible'] = false;
                                }
                                $this->db->replace('sousmenu',$Sitem);
                        endforeach;        
                }
                 /*pour les 3ème niveau :
                */                
                $this->db->like('path',$path);
                $S3menu = $this->db->get('third_level')->result_array();
                
                $size_menu = sizeof($S3menu);
                if($size_menu > 0){
                        foreach($S3menu as $S3item):
                                //on vide le chemin et on rend invisible pour éviter d'avoir un lien qui ne fonctionne pas
                                $S3item['path'] = '';
                                $S3item['visible'] = false;
                                $this->db->replace('third_level',$S3item);
                        endforeach;        
                }
                /*si la page est lier aux personnaes*/
                $tab_des_personnaes = $this->Personnaes_model->get_personnaes();
                $nb_id_des_pages = $this->Personnaes_model->nbId();
                foreach($tab_des_personnaes as $pers){
                        for ($a = 0; $a < $nb_id_des_pages; $a++) {
                                if($pers['id_page' .$a] == $id_page){
                                        $pers['id_page' .$a] = NULL;   
                                }
                        }
                        $this->db->replace('personnaes',$pers);
                }                
                //si la page est du type carroussel on supprime le dossier contenant les photos
                if($array[0]['type'] == "carroussel"){
                        $nom = utf8_decode($array[0]['nom']);
                        $pathname = 'assets/site/img/carroussel/'.$nom;
                        $this->load->model('Carroussel_model');           
                        $this->Carroussel_model->delete_dir($pathname);
                }
                //si la page est du type document on supprime le dossier contenant les fichiers
                if($array[0]['type'] == "document"){
                        $nom = utf8_decode($array[0]['nom']);
                        $pathname = 'assets/uploads/'.$nom;
                        $this->load->model('Document_model');           
                        $this->Document_model->delete_alldir($pathname);
                }
                
        }

        public function updatePage($id){
                //extraction des données de la bdd
                $page = Pages_model::get_page_by_id($id);

                if($page[0]['path_doc']==''){
                        $this->load->library('upload');                               
                        $this->upload->set_upload_path("./assets/site/ressources/");
                        $this->upload->set_allowed_types('gif|jpg|png|jpeg|pdf|docx');
                        if (!$this->upload->do_upload('doc_a_telecharger')) {
                            $path_doc = '';
                            $intro_doc ='';
                        } else {
                            $data = array('upload_data' => $this->upload->data());
                            $path_doc = 'assets/site/ressources/' . $data['upload_data']['orig_name'];
                            $intro_doc = $this->input->post('intro_doc');
                        }       
                        if(empty($path_doc)){
                                $page[0]['path_doc'] = '';
                        }else{
                        $page[0]['path_doc'] = $path_doc;
                        }
                        $page[0]['intro_doc'] = $intro_doc;                   
                } 

                $nom = $this->input->post('nomPage1');
                $nom1 = str_replace(' ','-',$nom);
                $titre = $this->input->post('titrePage');
                $soustitre = $this->input->post('soustitrePage');
                $sel = $this->input->post("radioP");
                $select = strcmp($sel,"Non");
                $sel2 = $this->input->post("radio_doc");               
                $select2 = strcmp($sel2,"Non");

                //on vérifie qu'il y a un changement sur ces 3 items et on modifie
                if(!empty($nom)){
                        $page[0]['nom'] = $nom1;
                }
                if(!empty($titre)){
                        $page[0]['titre'] = $titre;
                }
                if(!empty($soustitre)){
                        $page[0]['soustitre'] = $soustitre;
                }
                if($select == 0){
                        //récupère et copie la photo choisie, définie les caractéristique de celle-ci et le chemin d'upload
                        $config['upload_path']= "./assets/site/img/background/";
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config ['max_size'] = 10000000 ;
                        $config ['max_width'] = 10000 ;
                        $config ['max_height'] = 10000 ;
                        $config ['overwrite'] = true;                        

                        //upload la photo vers le serveur
                        $this->load->library('upload', $config);
        if(! $this->upload->do_upload('back2'))
        {
            //si upload hs retour vers la page de création de page avec info sur l'echec du transfert
                $data['error'] = array('error'=> $this->upload->display_errors());
                $this->load->model('Pages_model');                      
                $data['header_item'] = $this->Header_model->get_menu();
                $data['sub_item'] = $this->Header_model->get_sousmenu();
                $data['third_item'] = $this->Header_model->get_thirdmenu();            
                $data['type_item'] = $this->Pages_model->get_type();
                $this->load->view('cms/header');
                $this->load->view('cms/left_menu');
                $this->load->view('cms/updatePage'.$id, $data);
                $this->load->view('cms/footer');
        }
        else
        {   
                $data = array('upload_data'=>$this->upload->data());
                $nom = 'assets/site/img/background/'.$data['upload_data']['orig_name'];
                $page[0]['background'] = $nom;                    
                }
        }
        if($select2 == 0){ 
                $this->load->library('upload');                               
                $this->upload->set_upload_path("./assets/site/ressources/");
                $this->upload->set_allowed_types('gif|jpg|png|jpeg|pdf|docx');
                if (!$this->upload->do_upload('doc_a_telecharger')) {
                    $path_doc = '';
                    $intro_doc ='';
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $path_doc = 'assets/site/ressources/' . $data['upload_data']['orig_name'];
                    $intro_doc = $this->input->post('intro_doc');
                }

                unlink($page[0]['path_doc']);
                $page[0]['path_doc'] = $path_doc;
                $page[0]['intro_doc'] = $intro_doc;
        }

                $this->db->replace('pages',$page[0]);
                //si il y a eu changement de titre et que la page est dans le carroussel on fait le changement         
                $this->load->model('Home_model');
                $this->Home_model->ifupdateArticleOrPage(TRUE,$page[0]['id_pages']);
        }

        public function update_consultvox($page){
                foreach($page as $p){
                        $page_to_change = Pages_model::get_page($p);
                        $page_to_change['consultvox'] = true;
                        $this->db->replace('pages',$page_to_change);
                }
        }

        public function consultvox_off(){
                $page = Pages_model::get_page();
                foreach($page as $p){                        
                        $p['consultvox'] = false;
                        $this->db->replace('pages',$p);
                }
        }

        public function search($recherche){
                $this->db->like('titre',$recherche,'both');
                $this->db->or_like('soustitre',$recherche,'both');
                $query = $this->db->get('pages');
                return $query->result_array(); 
        }
}