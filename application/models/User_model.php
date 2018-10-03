<?php
class User_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
                $this->load->library('encryption');
                
        }

        public function verify_user($nom,$prenom){
            $query = $this->db->get_where('user', array('nom' => $nom))->result_array();
            $size = sizeof($query);

            if($size == 0){
                return false;
            } else {  
                $answer = false;              
                foreach ($query as $q):
                    if($q['prenom'] == $prenom){
                        $answer = true;                        
                    }
                endforeach;
                return $answer;    
            }
            
        }

        public function create_user($nom,$prenom,$mdp){
            $hash = $this->encryption->encrypt($mdp);
            $array = ['nom' => $nom, 'prenom' => $prenom, 'password' => $hash];
            $this->db->insert('user',$array);
        }
}