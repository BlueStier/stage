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
                    $str.= "nom='".$array['nom']."'";
                }
                if(isset($array['prenom'])&& !empty($array['prenom'])){
                    $str.= " or prenom='".$array['prenom']."'";
                }
                
                return $this->bdd->query($str)->row_array();
            }
            if($id != FALSE){
                return $this->bdd->get_where('citoyen', array('id_citoyen' => $id))->row_array();
            }

        }

        public function get_message($id = FALSE){
            if( $id === FALSE){
                return $this->bdd->get('message')->result_array();
            }else{
                return $this->bdd->get_where('message', array('id_citoyen' => $id))->row_array();
            }
        }

        public function get_cit_avec_messages(){
            $array_des_citoyens = Bddcit_model::get_cit();           
            $array_de_sortie = [];
            foreach($array_des_citoyens as $citoyen):
                $array_message = Bddcit_model::get_message($citoyen['id_citoyen']);
                $size_of_message = sizeof($array_message);
                if($size_of_message > 0){
                    $array_complete = [
                        'id_citoyen'=> $citoyen['id_citoyen'],
                        'nom'=> $citoyen['nom'],
                        'prenom' => $citoyen['prenom'],
                        'adresse' => $citoyen['adresse'],
                        'tel' => $citoyen['tel'],
                        'email' => $citoyen['email'],
                        'date' => $citoyen['date'],
                        'message' => $this->encryption->decrypt($array_message['message']),
                        'mail_dest' => $this->encryption->decrypt($array_message['mail_dest']),
                        'service' => $this->encryption->decrypt($array_message['service']),
                        'file' => $this->encryption->decrypt($array_message['file']),
                        'envoi' => $array_message['envoi'],
                    ];
                    $array_de_sortie[] = $array_complete;
                }
            endforeach; 
            
            return $array_de_sortie;   
        }

        public function create($array){
            //récupération des données et cryptage
            $nom = $this->encryption->encrypt($array['nom']);
            $prenom = $this->encryption->encrypt($array['prenom']);
            $cit = [
                'nom' => $nom,
                'prenom' => $prenom,
                'date' => $array['date'],
                'adresse' => $this->encryption->encrypt($array['adresse']),
                'email' => $this->encryption->encrypt($array['mail_cit']),
            ];
            $this->bdd->insert('citoyen',$cit);
            $citoyen_id_a_recup = Bddcit_model::get_cit($cit);            
            $message = [
                'id_citoyen' => $citoyen_id_a_recup['id_citoyen'],
                'message' => $this->encryption->encrypt($array['message']),
                'mail_dest' => $this->encryption->encrypt($array['mail_dest']),
                'service' => $this->encryption->encrypt($array['liste']),
                'file' => $this->encryption->encrypt($array['file']),
                
            ];
            
            
            $this->bdd->set('envoi','NOW()',FALSE);
            $this->bdd->insert('message',$message);
            
        }

        public function delete($id){
            $this->bdd->delete('message',array('id_citoyen' => $id));
            $this->bdd->delete('citoyen',array('id_citoyen' => $id));
        }
}