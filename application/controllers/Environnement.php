<?php
class Environnement extends CI_Controller
{

    //constructeur charge la classe Environnement_model et le helper de gestion des url
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Environnement_model');
        $this->load->helper('url_helper');
    }

    //construit la page des elus
    public function index()
    {
        $data['background']= "http://localhost/stage/assets/site/img/background/Environnement.jpg";
        $data['title']= "Environnement";
        $data['environnement'] = $this->Environnement_model->get_environnement();
        
        $this->load->view('templates/header');
        $this->load->view('environnement/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id = null)
    {
        $data['environnement_item'] = $this->Environnement_model->get_environnement($id);
        if (empty($data['environnement_item']))
        {
                show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('environnement/view', $data);
        $this->load->view('templates/footer');
    }
}
