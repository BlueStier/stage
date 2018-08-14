<?php
class Deliberations extends CI_Controller
{

    //constructeur charge la classe Deliberations_model et le helper de gestion des url
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Deliberations_model');
        $this->load->helper('url_helper');
    }

    //construit la page des délibérations
    public function index()
        {  
        $data['background']= "http://localhost/stage/assets/site/img/background/Délibérations-du-conseil-municipal.jpg";
        $data['title']="Comptes-rendus du conseil municipal";      
        $data['deliberations'] = $this->Deliberations_model->get_deliberations();        
        
        $this->load->view('templates/header', $data);
        $this->load->view('deliberations/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id = null)
    {
        $data['deliberations_item']= $this->Deliberations_model->get_deliberations($id) ;
        if (empty($data['deliberations_item'])||empty($data['annee_deliberations_item']))
        {
                show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('deliberations/view', $data);
        $this->load->view('templates/footer');
    }
}