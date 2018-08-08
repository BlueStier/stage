<?php
class Test extends CI_Controller
{

    //constructeur charge la classe Acceuil_model et le helper de gestion des url
    public function __construct()
    {
        parent::__construct();
        
    }

    //construit la page d'Acceuil
    public function index()
    {           
       
        $this->load->view('test/index');
        
        
    }

    public function view($id = null)
    {
        $this->load->view('seniors/index');
    }

    
}