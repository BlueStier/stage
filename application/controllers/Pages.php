<?php
class Pages extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Header_model');
            $this->load->model('Rapide_model');
            $this->load->helper('url_helper');
        }

        //construit la page home 
        public function view($page = 'home'){
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
        $data['header_item'] = $this->Header_model->get_menu();
        $data['sub_item'] = $this->Header_model->get_sousmenu();
        $data['third_item'] = $this->Header_model->get_thirdmenu();
        $data['rapide_item'] = $this->Rapide_model->get_rapide();
        $data['background']= "http://localhost/stage/assets/site/img/background/chevaler.jpg";
        $data['title']= "Bienvenue sur le nouveau site de la ville de Oignies !";
        $data['subtitle']="Oignies : Dynamique avec vous";
        $this->load->view('header/index',$data);
        $this->load->view('pages/'.$page,$data);
        $this->load->view('templates/footer');
        
}
}