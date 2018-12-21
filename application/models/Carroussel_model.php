<?php
class Carroussel_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
        }

        //méthode qui extrait les données de la table acceuil
        public function get_car($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('carroussel');
                return $query->result_array();
        }

        $query = $this->db->get_where('carroussel', array('id_pages' => $id));
        return $query->result_array();
}

        public function create($id_pages,$nom_page){
            //creation du répertoire de destination des photos               
            $nom = utf8_decode($nom_page);
            $pathname = 'assets/site/img/carroussel/'.$nom;            
            mkdir($pathname,0700,TRUE);

            //upload les photos
            Carroussel_model::upload_all_files($pathname,1);
            
            //injection des données en bdd
            $données = ['id_pages'=> $id_pages,
                        'text' => $this->input->post('textcar'),
                        'path' =>  $pathname,
                        'text2' => $this->input->post('textsupfac'), 
            ];
                $this->db->insert('carroussel',$données);

        }

        //fonction d'upload de plusieurs fichiers 
        public function upload_all_files($pathname,$i){
            /* 
           Tout d'abord, nous créons un tableau structuré pour les fichiers à télécharger
            nous nettoyons le tableau $ _FILES car nous en avons besoin plus tard
            la bibliothèque de téléchargement l'utilise 	
            */         
                        
            $uploaded_files = $_FILES['car'.$i];            
            $_FILES = array();
            $nb = sizeof($uploaded_files['name']);
            foreach ($uploaded_files as $k=>$file):
                for($a = 0; $a<$nb; $a++){
                $_FILES['file'.$a][$k] = $file[$a];}                  
            endforeach;
 
        // on défini le chemin du dossier où mettre les photos
        $this->upload->set_upload_path($pathname);        
                
        foreach($_FILES as $f=>$value):
            if ( ! $this->upload->do_upload($f)){
    	        //Si erreur on l'ajoute dans l'array error
                $error[$f] = array('error' => $this->upload->display_errors());
            } else {                                                
    	        // sauve le resultat de l'upload dans upload_data array
                $upload_data[$f] = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['y_axis'] = 1728;
                $config['source_image'] = $upload_data[$f]['full_path'];
                 //on charge la librairie de redimmensionnement de photo
                $this->load->library('image_lib',$config);
                               
                $this->image_lib->crop();

            }
        endforeach;        
        //le téléchargement finit on redimensionne toutes les photos
        //Carroussel_model::resize_folder($pathname);

        }

        public function resize_folder($path){
                $pathname = './'.$path;
                //on récupère la liste de tous les fichiers du répertoire
                $liste = Carroussel_model::read_all_files($pathname);
                //pour toutes les photos du dossier on redimensionne                
                foreach($liste as $l):
                        $source = $path.'/'.$l;
                        Carroussel_model::resize($source);
                endforeach;

        }

        //permet de redimensionner une photo dont le chemin est passer en paramètre
        public function resize($source){
                 //on définit les critères de redimensionnement
                 $config['image_library'] = 'GD';
                 /*$config['maintain_ratio'] = FALSE;
                 $config['width'] = 5184;
                 $config['height'] = 3456;*/
                 $config['y_axis'] = 1728;
                 $config['source_image'] = $source;
                 //on charge la librairie de redimmensionnement de photo
                 $this->load->library('image_lib',$config);
                               
                $this->image_lib->crop();

        }
        
        function delete_dir($path){
                $pathname = './'.$path;
                //on récupère la liste de tous les fichiers du répertoire
                $liste = Carroussel_model::read_all_files($pathname);
                //on supprime tous les fichiers
                foreach($liste as $l):
                        $sup = $pathname.'/'.$l;
                        unlink($sup);
                endforeach;
                //on finit en supprimant le dossier
                rmdir($pathname);         
        }
        
        //retourne le nom de toutes les photos présente deans le dossier spécifier par la variable $pathname
        function read_all_files($pathname){
                $tab = [];
                if($dossier = opendir($pathname)){
                        while(false !== ($fichier = readdir($dossier))){
                                if($fichier != '.' && $fichier != '..' && $fichier != 'index.php'){
                                        $tab[] = $fichier;
                                }     
                        }
                             
                }
                return $tab;
        }

        //supprime la photo du dossier $pathname dont le nom est $n
        function supPhoto($pathname,$n){
                $verif = Carroussel_model::read_all_files($pathname);
                foreach($verif as $v):
                        if($v == $n){
                                $sup = $pathname.'/'.$v;
                                unlink($sup);
                        }
                
                endforeach;        

        }

        //fonction pour update les photos d'une page carroussel
        public function update($id,$nom_page){
                //on récupère le nouveau nom de la page pour changer le nom du dossier
                $nom = utf8_decode($nom_page);
                $pathname = 'assets/site/img/carroussel/'.$nom;

                //on récupère les infos pour faire le changement dans la table carroussel
                $car = Carroussel_model::get_car($id);
                $car[0]['path'] = $pathname;
                $car[0]['text'] = $this->input->post('textcar');
                $car[0]['text2'] = $this->input->post('textsupfac');
                $this->db->replace('carroussel',$car[0]);

                $pathname2 = './'.$pathname;
                $oldpath = './'.$this->input->post('oldPath');
                //on change le nom du dossier                
                rename($oldpath,$pathname2);

                //on vérifie si on doit upload d'autres photos
                $sel = $this->input->post("radioC");
                $select = strcmp($sel,"Oui");

                if($select == 0){
                        Carroussel_model::upload_all_files($pathname,2);    
                }

        }

        public function search($recherche){
                $this->db->like('text',$recherche,'both');
                $this->db->or_like('text2',$recherche,'both');
                return $this->db->get('carroussel')->result_array();
        }
}