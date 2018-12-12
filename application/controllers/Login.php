<?php
class Login extends CI_Controller
{

    //constructeur charge la classe Acceuil_model et le helper de gestion des url
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation', 'session');

    }

    //construit la page de log
    public function index()
    {
        $data['user'] = $this->session->userdata('username');
        $data['photouser'] = $this->session->userdata('photo');
        $data['typeuser'] = $this->session->userdata('type');
        $this->load->view('log/login', $data);

    }

    public function connect()
    {
        //si une session est en cour
        if ($this->session->userdata('username') !== null) {
            //on définie les critères obligatoires
            $this->form_validation->set_rules('pwd', 'Mot de passe', 'required');

            if ($this->form_validation->run() == false) {
                $data['user'] = $this->session->userdata('username');
                $data['photouser'] = $this->session->userdata('photo');
                $data['typeuser'] = $this->session->userdata('type');
                $this->load->view('log/login', $data);

            } else {
                $user_id = $this->session->userdata('id');
                $this->load->model('User_model');
                $user = $this->User_model->get_user($user_id);
                $mdp = $this->input->post('pwd');
                $verify = $this->User_model->verify($user['nom'], $user['prenom'], $mdp, true);
                if ($verify) {
                    header('Location:' . base_url() . 'cms/1');
                } else {
                    $data['user'] = $this->session->userdata('username');
                    $data['photouser'] = $this->session->userdata('photo');
                    $data['typeuser'] = $this->session->userdata('type');
                    $data['error'] = ['error' => 'Mot de passe incorrect'];
                    $this->load->view('log/login', $data);
                }
            }
        } else {
            //on définie les critères obligatoires
            $this->form_validation->set_rules('nom', 'Nom ', 'required');
            $this->form_validation->set_rules('prenom', 'Prénom ', 'required');
            $this->form_validation->set_rules('pwd', 'Mot de passe', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('log/login');

            } else {
                $nom = $this->input->post('nom');
                $prenom = $this->input->post('prenom');
                $mdp = $this->input->post('pwd');

                $this->load->model('User_model');
                $verify = $this->User_model->verify($nom, $prenom, $mdp, false);
                if ($verify) {
                    header('Location:' . base_url() . 'cms');
                } else {
                    $data['error'] = ['error' => 'Nom, prénom ou mot de passe incorrect'];
                    $this->load->view('log/login', $data);
                }
            }
        }
    }

    public function mdp()
    {
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $this->load->model('User_model');
        $user = $this->User_model->forget_mdp($nom, $prenom);

    }
}
