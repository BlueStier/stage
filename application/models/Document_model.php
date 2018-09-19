<?php
class Document_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
        }

        //méthode qui extrait les données de la table acceuil
        public function get_document($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('document');
                return $query->result_array();
        }

        $query = $this->db->get_where('document', array('id_pages' => $id));
        return $query->result_array();
}

        public function create($id_pages,$nom_page){
            //creation du répertoire de destination des dossiers                
            $nom = utf8_decode($nom_page);
            $pathname = 'assets/uploads/'.$nom;            
            mkdir($pathname,0700,TRUE);

            //récupère le nombre de dossiers à créer
            $nbY = $this->input->post('nbY');

            //boucle de 1 au nombre de dossier à creer 
            for($z = 1; $z <= $nbY; $z++){
                //récupère l'année pour faire le nom du dossier
                $an = $this->input->post('selectyear'.$z);
                //création du chemin ou créer le dossier
                $name = $pathname.'/'.$an;

                //si le dossier n'existe pas on le créé
                if(!file_exists($name)) {
                    mkdir($name,0700,TRUE);
                }

                //on upload tous les fichiers choisi dans le dossier ainsi créer
                Document_model::upload_all_files($name,$z); 
            }

            //injection des données en bdd
            $données = ['id_pages'=> $id_pages,
                        'text' => $this->input->post('textdoc'),
                        'path' =>  $pathname 
            ];
                $this->db->insert('document',$données);
        }

          //fonction d'upload de plusieurs fichiers 
          public function upload_all_files($pathname,$i){
            /* 
           Tout d'abord, nous créons un tableau structuré pour les fichiers à télécharger
           nous mettons les infos du tableau $_FILES dans une variable temporaire
            nous nettoyons le tableau $ _FILES car nous en avons besoin plus tard
            la bibliothèque de téléchargement l'utilise 	
            */

            $temp = $_FILES;            
            $uploaded_files = $_FILES['doc'.$i];            
            $_FILES = array(); 
            $nb = sizeof($uploaded_files['name']);          
            foreach ($uploaded_files as $k=>$file):
                for($a = 0; $a<$nb; $a++){
                    if($k == 'name'){
                        $_FILES['file'.$a][$k] = utf8_decode($file[$a]);
                    }else{
                        $_FILES['file'.$a][$k] = $file[$a];
                    }
                }                  
            endforeach;
 
        // on défini le chemin du dossier où mettre les photos
        $this->upload->set_upload_path($pathname);
        $this->upload->set_allowed_types('gif|jpg|png|jpeg|pdf|doc|docx');        
                
        foreach($_FILES as $f=>$value):
            if ( ! $this->upload->do_upload($f)){
    	        //Si erreur on l'ajoute dans l'array error
                $error[$f] = array('error' => $this->upload->display_errors());
            } else {                                                
    	        // sauve le resultat de l'upload dans upload_data array
                $upload_data[$f] = $this->upload->data();             

            }
        endforeach;        
        //le téléchargement finit on réinitialise $_FILES avec les valeurs initiales
        $_FILES = $temp;

        }

        /*liste tous les dossier présent dans le dossier spécifier par $path
         et pour chaqu'un d'eux appel la fonction delete_dir*/
        function delete_alldir($path){
            $pathname = './'.$path;
            //on récupère la liste de tous les fichiers du répertoire
            $liste_dir = Document_model::read_all_files($pathname);
            foreach($liste_dir as $ld):
                $sup_dir = $pathname.'/'.$ld;
                Document_model::delete_dir($sup_dir);
            endforeach;
            //on fini par supprimer le dossier parent            
            Document_model::delete_dir($pathname);

        }

        //fonction de suppression d'un répertoire
        function delete_dir($path){           
            //on récupère la liste de tous les fichiers du répertoire
            $liste = Document_model::read_all_files($path);
            $size = sizeof($liste);

            //si le répertoire n'est pas vide
            if($size > 0){
                //on supprime tous les fichiers
                    foreach($liste as $l):
                        $sup = $path.'/'.$l;
                        unlink($sup);
                    endforeach;
        }
            //on finit en supprimant le répertoire
            rmdir($path);         
    }
    
    //retourne le nom de tous les fichiers présents dans le dossier spécifier par la variable $pathname
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
}