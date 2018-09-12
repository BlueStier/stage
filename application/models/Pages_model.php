<?php
class Pages_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
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

        public function validatePage($nomphoto, $type){
                /*enregistre la page (nom, background,type...) dans la table page pour tous type*/
                
                $nom = $this->input->post('nomPage');
                $nom1 = str_replace(array(' ','/','\\'),'',$nom);
                $titre = $this->input->post('titrePage');
                $soustitre = $this->input->post('soustitrePage');
                $this->db->insert('pages', array('nom' => $nom1 , 'titre' => $titre, 'soustitre' => $soustitre,'background' => $nomphoto, 'type' => $type));

               
        }

        public function delete(){
                //récupère l'id de la page à sup
                $id_page = $this->input->post('id_pages');
                //on extrait les info de la bdd pour cette page
                $array = $this->db->get_where('pages', array('id_pages' => $id_page))->result_array();
                //on supprime dans la table bulle,text ou autre la ligne correspondante
                $this->db->delete($array[0]['type'],array('id_pages' => $id_page));
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
                
        }

        public function updatePage($id){
                //extraction des données de la bdd
                $page = Pages_model::get_page_by_id($id);

                $nom = $this->input->post('nomPage');
                $titre = $this->input->post('titrePage');
                $soustitre = $this->input->post('soustitrePage');
                $sel = $this->input->post("radioP");
                $select = strcmp($sel,"Non");

                //on vérifie qu'il y a un changement sur ces 3 items et on modifie
                if(!empty($nom)){
                        $page[0]['nom'] = $nom;
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
                        $config ['max_size'] = 100000 ;
                        $config ['max_width'] = 1024 ;
                        $config ['max_height'] = 768 ;
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

                $this->db->replace('pages',$page[0]);
        }
}