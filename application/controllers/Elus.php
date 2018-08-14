<?php
class Elus extends CI_Controller
{

    //constructeur charge la classe Elus_model et le helper de gestion des url
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Elus_model');
        $this->load->helper('url_helper');
    }

    //construit la page des elus
    public function index()
    {
        $data['elus'] = $this->Elus_model->get_elus();
        $data['title'] = 'Vos Elus';
        $data['background']= "http://localhost/stage/assets/site/img/background/elus.jpg";

        $this->load->view('templates/header');
        $this->load->view('elus/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id = null)
    {
        $data['elus_item'] = $this->Elus_model->get_elus($id);
        if (empty($data['elus_item']))
        {
                show_404();
        }

        
        $this->load->view('templates/header');
        $this->load->view('elus/view', $data);
        $this->load->view('templates/footer');
    }
}
