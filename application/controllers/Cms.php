<?php
class Cms extends CI_Controller
{

    //constructeur charge la classe Acceuil_model et le helper de gestion des url
    public function __construct()
    {
        parent::__construct();   
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
        if($id == 1){ 
            $this->load->model('Header_model');           
            $data['header_item'] = $this->Header_model->get_menu();
            $data['sub_item'] = $this->Header_model->get_sousmenu();
            $data['third_item'] = $this->Header_model->get_thirdmenu();
            $this->load->view('cms/header');
            $this->load->view('cms/left_menu');
            $this->load->view('cms/menu',$data);
            $this->load->view('cms/footer');
            
        } if($id == 2){
            $this->load->model('Rapide_model');            
            $data['rapide_item'] = $this->Rapide_model->get_rapide();
            $this->load->view('cms/header');
            $this->load->view('cms/left_menu');
            $this->load->view('cms/menuRapide',$data);
            $this->load->view('cms/footer');
            
        }
        if($id == 3){            
            $this->load->view('cms/header');
            $this->load->view('cms/left_menu');
            $this->load->view('cms/pages');
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
            $data['header_item'] = $this->Header_model->get_menu();           
            $this->load->view('cms/header');
            $this->load->view('cms/left_menu');
            $this->load->view('cms/createMenu',$data);
            $this->load->view('cms/footer');            
        }
        if($type == 3){
            $data['case'] = 3;           
            $data['type'] = "3ème nivau";
            $data['sub_item'] = $this->Header_model->get_sousmenu();           
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
        if($type == 1){
            $this->form_validation->set_rules('couleur', 'couleur', 'required');
        }
        if($type == 2){
            $this->form_validation->set_rules('select', 'le Menu', 'required');    
        }
        if($type == 3)
        {
            $this->form_validation->set_rules('select1', 'le Sousmenu', 'required');    
        }
        $this->Header_model->validateMenu($type);      
        header('Location:'.base_url().'index.php/cms/1'); 
    }

    public function createPages(){
        $this->load->model('Pages_model');
        $this->load->model('Header_model');        
        $data['header_item'] = $this->Header_model->get_menu();
        $data['sub_item'] = $this->Header_model->get_sousmenu();
        $data['third_item'] = $this->Header_model->get_thirdmenu();            
        $data['type_item'] = $this->Pages_model->get_type();
        $this->load->view('cms/header');
        $this->load->view('cms/left_menu');
        $this->load->view('cms/createPages', $data);
        $this->load->view('cms/footer');
    }

    public function validatePage(){
        //récupère et copie la photo choisie
        $config['upload_path']= "./assets/site/img/background/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config ['max_size'] = 100000 ;
        $config ['max_width'] = 1024 ;
        $config ['max_height'] = 768 ;
        
        $this->load->library('upload', $config);
        if(! $this->upload->do_upload('backgroundImg'))
        {
                $error = array('error'=> $this->upload->display_errors());

                $this->load->view ( 'cms/createPages',$error);
        }
        else
        {    
            $this->load->model('Pages_model');        
            $data = array('upload_data'=>$this->upload->data());
            $nom = 'asset/site/img/background/'.$data['upload_data']['orig_name'];
            $this->Pages_model->validatePage($nom);
            
    }      
       
    }
}