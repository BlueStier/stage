<?php
class Test extends CI_Controller
{

    //constructeur charge la classe Acceuil_model et le helper de gestion des url
    public function __construct()
    {
        parent::__construct();
        $this->load->model('travaux_model');
    }

    //construit la page d'Acceuil
    public function index()
    {           
       
        $this->load->view('test/index');
        
        
    }

    public function view($id = null)
    {
        $this->load->view('travaux/index');
    }

    public function create()
{
    $this->load->helper('form');
    $this->load->library('form_validation');
    

    $this->form_validation->set_rules('adresse', 'Adresse', 'required');
    $this->form_validation->set_rules('latitude', 'latitude', 'required');
    $this->form_validation->set_rules('longitude', 'longitude', 'required');
    $this->form_validation->set_rules('date_debut', 'date de debut', 'required');
    $this->form_validation->set_rules('date_fin', 'date de fin', 'required');
    $this->form_validation->set_rules('societe', 'société', 'required');
    $this->form_validation->set_rules('commenditaire', 'commenditaire', 'required');

    if ($this->form_validation->run() === FALSE)
    {
       
        $this->load->view('test/create');        

    }
    else
    {       
        $this->travaux_model->set_travaux();
        $this->load->view('travaux/index');
    }
}
}