<?php
class Pages extends CI_Controller {

        //construit la page home 
        public function view($page = 'home'){
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        
        $this->load->view('templates/header');
        $this->load->view('pages/'.$page);
        $this->load->view('templates/footer');
}
}