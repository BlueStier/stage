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
                     $this->load->view('cms/createUser',$data);
                     $this->load->view('cms/footer'); 
             }
             else
             {   
                     $data = array('upload_data'=>$this->upload->data());
                     $photo = 'assets/cms/user/'.$data['upload_data']['orig_name'];                                        
                     
             }
            $mail = $this->input->post('mail');
            $type = $this->input->post('selectUser'); 
            $hash = $this->encryption->encrypt($mdp);
            $array = ['nom' => $nom, 'prenom' => $prenom, 'password' => $hash,'photo'=> $photo,'type' => $type, 'mail' => $mail];
            $this->db->set('date_enregistrement','NOW()',false);
            $this->db->insert('user',$array);
            
        }

        public function delete($id){
            $this->db->delete('user',array('id_user' => $id));

        }

        public function update($id){
            $user = User_model::get_user($id);         
                $nom = $this->input->post('nomUser');
                $prenom = $this->input->post('prenomUser');
                $mail = $this->input->post('mail');
                $type = $this->input->post('selectUser'); 
                $hash = $this->encryption->encrypt($this->input->post('mdpUser'));
                $select = $this->input->post('radioU');
                if($select == 'Non'){
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
                        $this->load->view('cms/updateUser',$data);
                        $this->load->view('cms/footer'); 
                    }
                    else
                    {   
                        $data = array('upload_data'=>$this->upload->data());
                        $user['photo'] = 'assets/cms/user/'.$data['upload_data']['orig_name'];                                        
                     
                    }
                }
                if($user['id_user'] != $this->session->userdata('id')){
                $user['nom'] = $nom;
                $user['prenom'] = $prenom;   
                $user['type'] = $type;
                    }
                $user['password'] = $hash;
                $user['mail'] = $mail;
                $this->db->replace('user',$user);
            } 
     

        public function verify($nom,$prenom,$mdp,$bool){
            $result = $this->db->get_where('user',array('nom'=> $nom,'prenom'=> $prenom))->row_array();
            $verif = empty($result);
            if($verif){
                return false;
            }else{
                /*$hash = $this->encryption->decrypt($result['password']);
                if($hash == $mdp){*/
                    if($bool){
                        $this->session->set_userdata('__ci_last_regenerate',time());
                        $this->session->set_userdata('logged_in',TRUE);
                    }else{
                    $dataUser = ['username'=> $prenom.' '.$nom, 'logged_in' => TRUE, 'id' => $result['id_user'],'photo'=> $result['photo'], 'type' => $result['type'], 'mail' => $result['mail']];
                    $this->session->set_userdata($dataUser);
                    }
                    return true;
                /*}else{
                    return false;
                }*/            
            }
        }

        public function forget_mdp($nom, $prenom){
            $user = $this->db->get_where('user',array('nom'=> $nom,'prenom'=> $prenom))->row_array();

            $mdp = User_model::chaine_aleatoire(12);
            $message = "<h1>Bonjour ".$user['prenom']." ".$user['nom']."</h1><br><br><br> Suite à votre demande de réinitialisation de mot de passe nous vous conseillons de modifier celui-ci après vous
            être cconnecter.<br><br><br> Votre nouveau mot de passe est :<br><br><br><h3>".$mdp;"</h3><br><br><br<br>Passez une bonne journée.";

            $user['password'] = $this->encryption->encrypt($mdp);
            $this->db->replace('user',$user);
           
            $this->load->library('email');
            $config['protocol'] = '';
            $config['smtp_host'] = '';
            $config['smtp_port'] = '';
            $config['smtp_user'] = 'lroussel2703@gmail.com';
            $config['smtp_pass'] = 'Boubidou1';           
            $config['crlf'] = '\r\n';
            $config['newline'] = '\r\n';
            $config['mailtype'] = 'html';
            
            $this->email->initialize($config);
            $this->email->from('lroussel2703@gmail.com', 'Mot de passe oublié');
            $this->email->to('lroussel2703@gmail.com');
            $this->email->subject('Réinitailisation de votre mot de passe');
            $this->email->message($message);
            $this->email->send();
            
            $data['message'] = "Votre nouveau mot de passe a été envoyé à l'adresse :".$user['mail'];
            $this->load->view('log/login',$data);

        }

        public function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789+-=')
        {
            $nb_lettres = strlen($chaine) - 1;
            $generation = '';
            for($i=0; $i < $nb_car; $i++)
            {
                $pos = mt_rand(0, $nb_lettres);
                $car = $chaine[$pos];
                $generation .= $car;
            }
            return $generation;
        }
}