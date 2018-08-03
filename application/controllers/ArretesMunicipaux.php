<?php
class ArretesMunicipaux extends CI_Controller
{

    //constructeur charge la classe ArretesMunicipaux_model et le helper de gestion des url
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ArretesMunicipaux_model');
        $this->load->helper('url_helper');
    }

    //construit la page concernant les arretes municipaux
    public function index()
    {
        $data['arretes'] = $this->ArretesMunicipaux_model->get_arretes();        

        $this->load->view('templates/header', $data);
        $this->load->view('arretes_municipaux/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id = null)
    {
        $data['arretes_item'] = $this->ArretesMunicipaux_model->get_arretes($id);
        if (empty($data['arretes_item']))
        {
                show_404();
        }      

        $this->load->view('templates/header', $data);
        $this->load->view('arretes_municipaux/view', $data);
        $this->load->view('templates/footer');
    }
}