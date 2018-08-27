<?php
class Pages extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Header_model');
            $this->load->model('Rapide_model');
            $this->load->model('Pages_model');
            $this->load->helper('url_helper');
        }

        public function index(){
                Pages::view('home');
        }
        //construit la page home 
        public function view($page){
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
        $data['header_item'] = $this->Header_model->get_menu();
        $data['sub_item'] = $this->Header_model->get_sousmenu();
        $data['third_item'] = $this->Header_model->get_thirdmenu();
        $data['rapide_item'] = $this->Rapide_model->get_rapide();
        $pagestab = $this->Pages_model->get_page($page);
        $data['background']= base_url().$pagestab['background'];
        $data['title'] = $pagestab['titre'];
        $data['subtitle'] = $pagestab['soustitre'];

        if($page == 'acceuil'){
                $this->load->model('Acceuil_model');
                $data['acceuil'] = $this->Acceuil_model->get_acceuil();  
        }
        if($page == 'elus'){
                $this->load->model('Elus_model');
                $data['elus'] = $this->Elus_model->get_elus();  
        }
        if($page == 'arretes_municipaux'){
                $this->load->model('ArretesMunicipaux_model');
                $data['arretes'] = $this->ArretesMunicipaux_model->get_arretes();  
        }
        if($page == 'deliberations'){
                $this->load->model('Deliberations_model');
                $data['deliberations'] = $this->Deliberations_model->get_deliberations();
        }
        if($page == 'environnement'){
                $this->load->model('Environnement_model');
                $data['environnement'] = $this->Environnement_model->get_environnement();
        }
        if($page == 'histoire'){
                $this->load->model('Histoire_model');
                $data['histoire'] = $this->Histoire_model->get_histoire();
        }
        $this->load->view('header/index',$data);
        $this->load->view('pages/'.$page,$data);
        $this->load->view('templates/footer');
        
}
}