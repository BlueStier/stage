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
}