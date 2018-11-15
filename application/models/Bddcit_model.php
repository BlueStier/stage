<?php
class Bddcit_model extends CI_Model {
        private $bdd;
        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                
                $this->load->library('encryption');
                $this->bdd = $this->load->database('bddcit',TRUE);
        }

        public function get_cit($array = FALSE, $id = FALSE){
            /*si il n'y a pas 'array en paramètres ou d'id on retourne la totalité
            de la table*/ 
            if($array === FALSE && $id === FALSE){                
                $array = $this->bdd->get('citoyen')->result_array();
                $taille_de_array = sizeof($array);
                for($h = 0; $h < $taille_de_array; $h++){
                    $array[$h]['nom'] = $this->encryption->decrypt($array[$h]['nom']);
                    $array[$h]['prenom'] = $this->encryption->decrypt($array[$h]['prenom']);
                    $array[$h]['adresse'] = $this->encryption->decrypt($array[$h]['adresse']);
                    $array[$h]['email'] = $this->encryption->decrypt($array[$h]['email']);
                }
                return $array;
            }
            /*si un tableau est en paramètre on recherche en fonction du tableau*/
            if($array != FALSE && !empty($array)){
                $str ='SELECT * from citoyen where ';
                if(isset($array['nom'])&& !empty($array['nom'])){
                    $str.= "nom='"./*$this->encryption->encrypt(*/$array['nom']."'";
                }
                if(isset($array['prenom'])&& !empty($array['prenom'])){
                    $str.= " prenom='"./*$this->encryption->encrypt(*/$array['prenom']."'";
                }
                
                return $this->bdd->query($str)->row_array();
            }
            if($id != FALSE){
                return $this->bdd->get_where('citoyen', array('id_citoyen' => $id))->row_array();
            }

        }
        public function create($array){
            //récupération des données et cryptage
            $cit = [
                'nom' => $this->encryption->encrypt($array['nom']),
                'prenom' => $this->encryption->encrypt($array['prenom']),
                'date' => $array['date'],
                'adresse' => $this->encryption->encrypt($array['adresse']),
                'email' => $this->encryption->encrypt($array['mail_cit']),
            ];

            $message = [
                'message' => $this->encryption->encrypt($array['message']),
                'mail_dest' => $this->encryption->encrypt($array['mail_dest']),
                'service' => $this->encryption->encrypt($array['liste']),
                'file' => $this->encryption->encrypt($array['file']),
                
            ];
            $this->bdd->insert('citoyen',$cit);
            $this->bdd->set('envoi','NOW()',FALSE);
            $this->bdd->insert('message',$message);
            
        }
}