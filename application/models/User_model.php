<?php
class User_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
                $this->load->library('encryption');
                $this->load->library('session');
                
        }

        public function get_user($user_id = FALSE){
            if ($user_id === FALSE)
        {
                //récupération des éléments                 
                $query = $this->db->get('user');                
                return $query->result_array();
        }
            return $this->db->get_where('user', array('id_user' => $user_id))->row_array();
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
             //récupère et copie la photo choisie, définie les caractéristique de celle-ci et le chemin d'upload
             $config['upload_path']= "./assets/cms/user/";
             $config['allowed_types'] = 'gif|jpg|png';
             $config ['max_size'] = 10000000 ;
             $config ['max_width'] = 10000 ;
             $config ['max_height'] = 10000 ;
             $config ['overwrite'] = true;                        

             //upload la photo vers le serveur
             $this->load->library('upload', $config);
             if(! $this->upload->do_upload('photoUser'))
             {
                 //si upload hs retour vers la page de création de page avec info sur l'echec du transfert
                     $data['error'] = array('error'=> $this->upload->display_errors());
                     $data['nb'] = 7;                                                      
                     $this->load->view('cms/header');
                     $this->load->view('cms/left_menu',$data);
                     $this->load->view('cms/user',$data);
                     $this->load->view('cms/footer'); 
             }
             else
             {   
                     $data = array('upload_data'=>$this->upload->data());
                     $photo = 'assets/cms/user/'.$data['upload_data']['orig_name'];                                        
                     
             }
     
            $type = $this->input->post('selectUser'); 
            $hash = $this->encryption->encrypt($mdp);
            $array = ['nom' => $nom, 'prenom' => $prenom, 'password' => $hash,'photo'=> $photo,'type' => $type];
            $this->db->set('date_enregistrement','NOW()',false);
            $this->db->insert('user',$array);
            
        }

        public function delete($id){
            $this->db->delete('user',array('id_user' => $id));

        }

        public function verify($nom,$prenom,$mdp,$bool){
            $result = $this->db->get_where('user',array('nom'=> $nom,'prenom'=> $prenom))->row_array();
            $verif = empty($result);
            if($verif){
                return false;
            }else{
                $hash = $result['password'];//$this->encryption->decrypt($result['password']);
                if($hash == $mdp){
                    if($bool){
                        $this->session->set_userdata('__ci_last_regenerate',time());
                        $this->session->set_userdata('logged_in',TRUE);
                    }else{
                    $dataUser = ['username'=> $prenom.' '.$nom, 'logged_in' => TRUE, 'id' => $result['id_user'],'photo'=>$result['photo'], 'type' => $result['type']];
                    $this->session->set_userdata($dataUser);
                    }
                    return true;
                }else{
                    return false;
                }            
            }
        }
}