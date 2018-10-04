<?php
class Login extends CI_Controller
{

    //constructeur charge la classe Acceuil_model et le helper de gestion des url
    public function __construct()
    {
        parent::__construct();   
        $this->load->helper('form');
        $this->load->library('form_validation','session');
        
    }

    //construit la page d'Acceuil
    public function index()
    {   
        $data['user'] = $this->session->userdata('username');
        $data['photouser'] = $this->session->userdata('photo');
        $data['typeuser'] = $this->session->userdata('type');     
        $this->load->view('log/login',$data);
       
    }

    public function connect(){
         //on définie les critères obligatoires       
         $this->form_validation->set_rules('nom', 'Nom ', 'required');
         $this->form_validation->set_rules('prenom', 'Prénom ', 'required');
         $this->form_validation->set_rules('pwd', 'Mot de passe', 'required');                
 
         if($this->form_validation->run()==FALSE)
         {
            $this->load->view('log/login');
             
         } else {
         $nom = $this->input->post('nom'); 
         $prenom = $this->input->post('prenom');         
         $mdp = $this->input->post('pwd');

         $this->load->model('User_model');
         $verify = $this->User_model->verify($nom,$prenom,$mdp);         
         if($verify){           
            header('Location:'.base_url().'cms/1');
         } else {            
         $data['error'] = ['error' => 'Nom, prénom ou mot de passe incorrect'];         
         $this->load->view('log/login',$data);
         }
        }
    }
}