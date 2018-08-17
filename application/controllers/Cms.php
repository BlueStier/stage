<?php
class Cms extends CI_Controller
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
           
        $this->load->view('cms/header');
        $this->load->view('cms/left_menu');
        $this->load->view('cms/index');
        
    }

    public function view($id)
    {
        if($id == 1){            
            $data['header_item'] = $this->Header_model->get_menu();
            $data['sub_item'] = $this->Header_model->get_sousmenu();
            $data['third_item'] = $this->Header_model->get_thirdmenu();
            $this->load->view('cms/header');
            $this->load->view('cms/left_menu');
            $this->load->view('cms/menu',$data);
            $this->load->view('cms/footer');
            
        }
    }

    public function delete($i)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('idmenu', 'Nom du menu', 'required');
        $this->Header_model->delete_menu($i);      
        Cms::view(1);       
    }
}