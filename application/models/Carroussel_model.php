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
            $pathname = './assets/site/img/carroussel/'.$nom;            
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
            $fil = array();
            $nb = sizeof($uploaded_files['name']);
            foreach ($uploaded_files as $k=>$file):
                for($a = 0; $a<$nb; $a++){
                $fil['file'.$a][$k] = $file[$a];}                  
            endforeach;
 
        // Charge la lib upload avec notre config        
        $config['upload_path'] = $pathname;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config ['max_size'] = 1000000000 ;
        $config ['max_width'] = 10000 ;
        $config ['max_height'] = 8000 ;
        $config ['overwrite'] = true;
        $this->load->library('upload', $config);
 
        // boucle pour upload tous les fichiers
        $taille = sizeof($fil);
        var_dump($fil);
        foreach($fil as $f):
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

}