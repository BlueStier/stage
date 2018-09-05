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
        //construit la page demandée 
        public function view($page){       
        //récupère les infos pour le header (menu, sousmenu...)
        $data['header_item'] = $this->Header_model->get_menu();
        $data['sub_item'] = $this->Header_model->get_sousmenu();
        $data['third_item'] = $this->Header_model->get_thirdmenu();
        $data['rapide_item'] = $this->Rapide_model->get_rapide();
        $pagestab = $this->Pages_model->get_page($page);
        $data['background']= base_url().$pagestab['background'];
        $data['title'] = $pagestab['titre'];
        $data['subtitle'] = $pagestab['soustitre'];

        //récupère les infos du type de page
        if($pagestab['type'] == 'bulle'){
                $this->load->model('Bulles_model');
                $data['bulle_item'] = $this->Bulles_model->get_bulle($pagestab['id_pages']);
                $page = 'bulle';  
        }
        if($pagestab['type'] == 'text'){
                $this->load->model('Text_model');
                $data['text_item'] = $this->Text_model->get_text($pagestab['id_pages']);
                $page = 'text';  
        }
        if($pagestab['type'] == 'sans'){
                $this->load->model('Sans_model');
                $data['text_item'] = $this->Sans_model->get_Sans($pagestab['id_pages']);
                $page = 'text';  
        }
        if($pagestab['type'] == 'carroussel'){
                /*$this->load->model('Sans_model');
                $data['text_item'] = $this->Sans_model->get_Sans($pagestab['id_pages']);*/
                $page = 'carroussel';  
        }
        
        if($page == 'arretes_municipaux'){
                $this->load->model('ArretesMunicipaux_model');
                $data['arretes'] = $this->ArretesMunicipaux_model->get_arretes();  
        }
        if($page == 'deliberations'){
                $this->load->model('Deliberations_model');
                $data['deliberations'] = $this->Deliberations_model->get_deliberations();
        }
       
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                //oops y'a pas ce fichier !!!
                show_404();
        }

        $this->load->view('header/index',$data);
        $this->load->view('pages/'.$page,$data);
        $this->load->view('templates/footer');
        
}
}