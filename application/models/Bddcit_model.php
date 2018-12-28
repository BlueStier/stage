<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Bddcit_model extends CI_Model {
        private $bdd;
        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                
                $this->load->library('encryption');
                $this->load->database();
                $this->bdd = $this->db;
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
                    $array[$h]['tel'] = $this->encryption->decrypt($array[$h]['tel']);
                    $array[$h]['type_contact'] = $array[$h]['type_contact'];
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
                $return = [];
                $result = $this->bdd->get_where('citoyen', array('id_citoyen' => $id))->row_array();
                $return['id_citoyen'] = $result['id_citoyen'];
                $return['nom'] = $this->encryption->decrypt($result['nom']);
                $return['prenom'] = $this->encryption->decrypt($result['prenom']);
                $return['adresse'] = $this->encryption->decrypt($result['adresse']);
                $return['email'] = $this->encryption->decrypt($result['email']);
                $return['tel'] = $this->encryption->decrypt($result['tel']);
                $return['type_contact'] = $result['type_contact'];
                $return['date'] = $result['date']; 
                return $return;
            }

        }

        public function get_message($id = FALSE){
            if( $id === FALSE){
                return $this->bdd->get('message')->result_array();
            }else{
                return $this->bdd->get_where('message', array('id_citoyen' => $id))->row_array();
            }
        }

        public function get_cit_avec_messages($id = false){
            if( $id === FALSE){
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
                        'type_contact'=>$citoyen['type_contact'],
                    ];
                    $array_de_sortie[] = $array_complete;
                }
            endforeach; 
            
            return $array_de_sortie;
        }else{
            $array_de_sortie = [];
            $citoyen = Bddcit_model::get_cit(false,$id);
            $array_message = Bddcit_model::get_message($id);
            $array_de_sortie = [
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
                'type_contact'=>$citoyen['type_contact'],
            ];
            return $array_de_sortie;
        }   
        }

        public function get_type_contact(){
            $this->bdd->select('type_contact');
            $this->bdd->distinct();
            return $this->bdd->get('citoyen')->result_array();
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
                'tel'=> $this->encryption->encrypt($array['tel']),
                'type_contact'=>$array['type_contact'],
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

        public function excel($array,$id_table){          
            $type_contact = Bddcit_model::get_type_contact();
            $nom_du_fichier = $type_contact[$id_table]['type_contact']."-".date("m-d-y");
            $excel_a_creer = [];
            $excel_a_creer[] = ['ID','Nom','Prénom','Adresse','Téléphone','Email','Date de naissance','Message','Mail destinataire'
            ,'service','fichier',"Date d'envoi",'page de contact'];            
            foreach($array as $a):                
                $recup = Bddcit_model::get_cit_avec_messages($a);
                $excel_a_creer[] = [
                    $recup['id_citoyen'],
                    $recup['nom'],
                    $recup['prenom'],
                    $recup['adresse'],
                    $recup['tel'],
                    $recup['email'],
                    $recup['date'],
                    $recup['message'],
                    $recup['mail_dest'],
                    $recup['service'],
                    $recup['file'],
                    $recup['envoi'],
                    $recup['type_contact'],
                ];
            endforeach;          
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->fromArray($excel_a_creer);
            $writer = new Xlsx($spreadsheet);   
            
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $nom_du_fichier .'.xlsx"'); 
            header('Cache-Control: max-age=0');
            
            $writer->save('php://output'); // download file 
       
        }

        public function excel_total(){
            $nom_du_fichier = 'informations_globales'."-".date("m-d-y");
            $donnees = Bddcit_model::get_cit_avec_messages();
            $excel_a_creer = [];
            $excel_a_creer[] = ['ID','Nom','Prénom','Adresse','Téléphone','Email','Date de naissance','Message','Mail destinataire'
            ,'service','fichier',"Date d'envoi",'page de contact'];
            foreach($donnees as $recup):
                $excel_a_creer[] = [
                    $recup['id_citoyen'],
                    $recup['nom'],
                    $recup['prenom'],
                    $recup['adresse'],
                    $recup['tel'],
                    $recup['email'],
                    $recup['date'],
                    $recup['message'],
                    $recup['mail_dest'],
                    $recup['service'],
                    $recup['file'],
                    $recup['envoi'],
                    $recup['type_contact'],
                ];
            endforeach;
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->fromArray($excel_a_creer);
            $writer = new Xlsx($spreadsheet);   
            
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $nom_du_fichier .'.xlsx"'); 
            header('Cache-Control: max-age=0');
            
            $writer->save('php://output'); // download file 
        }
}