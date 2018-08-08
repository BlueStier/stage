<?php
class Seniors extends CI_Controller
{

    //constructeur charge la classe Acceuil_model et le helper de gestion des url
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    //construit la page d'Acceuil
    public function index()
    {           
        $this->load->view('templates/header');
        $this->load->view('seniors/index');
        $this->load->view('templates/footer');
        
    }

    public function view($id = null)
    {
        $this->load->view('seniors/index');
    }
}