<?php
class Histoire extends CI_Controller
{

    //constructeur charge la classe Elus_model et le helper de gestion des url
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Histoire_model');
        $this->load->helper('url_helper');
    }

    //construit la page des elus
    public function index()
    {
        $data['histoire'] = $this->Histoire_model->get_histoire();
        $data['background']= "http://localhost/stage/assets/site/img/background/Histoire-locale.jpg";
        $data['title']= "L'histoire locale";
        
        $this->load->view('templates/header');
        $this->load->view('histoire/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id = null)
    {
        $data['histoire_item'] = $this->Histoire_model->get_histoire($id);
        if (empty($data['histoire_item']))
        {
                show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('histoire/view', $data);
        $this->load->view('templates/footer');
    }
}
