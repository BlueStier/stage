<?php
class Acceuil extends CI_Controller
{

    //constructeur charge la classe Acceuil_model et le helper de gestion des url
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Acceuil_model');
        $this->load->helper('url_helper');
    }

    //construit la page d'Acceuil
    public function index()
    {
        $data['background']= "http://localhost/stage/assets/site/img/background/mairie.jpg";
        $data['title']="L'Acceuil";
        $data['acceuil'] = $this->Acceuil_model->get_acceuil();        

        $this->load->view('templates/header', $data);
        $this->load->view('acceuil/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id = null)
    {
        $data['acceuil_item'] = $this->Acceuil_model->get_acceuil($id);
        if (empty($data['acceuil_item']))
        {
                show_404();
        }      

        $this->load->view('templates/header', $data);
        $this->load->view('acceuil/view', $data);
        $this->load->view('templates/footer');
    }
}