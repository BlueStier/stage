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

    //construit le centre de la page en fonction de l'item sélectionné
    public function view($id)
    {
        if($id = 1){            
            $data['header_item'] = $this->Header_model->get_menu();
            $data['sub_item'] = $this->Header_model->get_sousmenu();
            $data['third_item'] = $this->Header_model->get_thirdmenu();
            $this->load->view('cms/header');
            $this->load->view('cms/left_menu');
            $this->load->view('cms/menu',$data);
            $this->load->view('cms/footer');
            
        }
    }

    //appel la fonction du model de suppression 
    public function delete($i)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('idmenu', 'Nom du menu', 'required');
        $this->Header_model->delete_menu($i);      
        header('Location:'.base_url().'index.php/cms/1');       
    }
    
    //appel la fonction du model gerant l'ordre
    public function ordre($sens, $id)
    {        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('idmenu', 'Nom du menu', 'required');
        $this->Header_model->upOrDown($sens, $id);      
        header('Location:'.base_url().'index.php/cms/1');       
    }

    //appel la fonction du model gerant la visibilité
    public function visibleOrNot($type)
    {        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('idmenu', 'Nom du menu', 'required');
        $this->Header_model->visibleOrNot($type);      
        header('Location:'.base_url().'index.php/cms/1');       
    }

    //appel la fonction du model gerant le drag'n'drop
    public function dragNdrop(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('menu', 'menu', 'required');
        if($this->form_validation->run()){
            $this->Header_model->dragNdrop();
            if($this->input->is_ajax_request()){                             
                echo json_encode(true);
            }
        }
    }

    //création de la pge d'enregistrement d'un menu/sousmenu...
    public function createMenu($type){
        if($type == 1){
            $data['case'] = 1;           
            $data['type'] = "Menu";           
            $this->load->view('cms/header');
            $this->load->view('cms/left_menu');
            $this->load->view('cms/createMenu',$data);
            $this->load->view('cms/footer');            
        }
        if($type == 2){
            $data['case'] = 2;           
            $data['type'] = "Sousmenu";           
            $this->load->view('cms/header');
            $this->load->view('cms/left_menu');
            $this->load->view('cms/createMenu',$data);
            $this->load->view('cms/footer');            
        }
    }

    //permet la validation d'enregistrement d'un menu/sousmenu...
    public function validateMenu($type){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nom', 'nom', 'required');
        $this->form_validation->set_rules('couleur', 'couleur', 'required');
        $this->Header_model->validateMenu($type);      
        header('Location:'.base_url().'index.php/cms/1'); 
    }
}