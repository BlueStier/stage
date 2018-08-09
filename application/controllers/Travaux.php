<?php
class Travaux extends CI_Controller
{

    //constructeur charge la classe Acceuil_model et le helper de gestion des url
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Travaux_model');
        $this->load->helper('url_helper');
    }

    //construit la page d'Acceuil
    public function index()
    {
        $data['travaux'] = $this->Travaux_model->get_travaux();        

        $this->load->view('templates/header', $data);
        $this->load->view('travaux/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id = null)
    {
        $data['travaux_item'] = $this->Travaux_model->get_travaux($id);
        if (empty($data['travaux_item']))
        {
                show_404();
        }      

        $this->load->view('templates/header', $data);
        $this->load->view('travaux/view', $data);
        $this->load->view('templates/footer');
    }
}