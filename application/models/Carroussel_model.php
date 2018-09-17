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
            Carroussel_model::upload_all_files($pathname);
            
            //injection des données en bdd
            $données = ['id_pages'=> $id_pages,
                        'text' => $this->input->post('textcar'),
                        'path' =>  $pathname 
            ];
                $this->db->insert('carroussel',$données);

        }

        //fonction d'upload de plusieurs fichiers 
        public function upload_all_files($pathname){
            /* 
           Tout d'abord, nous créons un tableau structuré pour les fichiers à télécharger
            nous nettoyons le tableau $ _FILES car nous en avons besoin plus tard
            la bibliothèque de téléchargement l'utilise 	
            */         
                        
            $uploaded_files = $_FILES['car'];            
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
            }
        endforeach;

        }
        /*public function update($id_pages){               
                $sans = Sans_model::get_sans($id_pages);
                $sans[0]['pg1'] = $this->input->post('sans');                       
                $this->db->replace('sans',$sans[0]);

        }*/

        function delete_dir($path){
                $pathname = './'.$path;
                //on récupère la liste de tous les fichiers du répertoire
                $liste = Carroussel_model::read_all_files($pathname);
                foreach($liste as $l):
                        $sup = $pathname.'/'.$l;
                        unlink($sup);
                endforeach;
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
}