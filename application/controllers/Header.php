<?php
class Header extends CI_Controller
{

    //constructeur charge la classe Acceuil_model et le helper de gestion des url
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Header_model');
        $this->load->helper('url_helper');
    }

    //construit la page d'Acceuil
    public function index()
    {              
        $data['header_item'] = $this->Header_model->get_menu($id);
        $this->load->view('header/index', $data);
        
    }

    public function view($id = null)
    {
        $data['header_item'] = $this->Header_model->get_menu($id);
        if (empty($data['header_item']))
        {
                show_404();
        }      

        $this->load->view('templates/header', $data);
        
    }
}