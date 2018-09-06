<?php
class Cms extends CI_Controller
{

    //constructeur charge la classe Acceuil_model et le helper de gestion des url
    public function __construct()
    {
        parent::__construct();   
        $this->load->helper('form','url_helper');
        $this->load->model('Header_model');
        $this->load->library('form_validation','session');
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
            
        }if($id == 3){
            $this->load->model('Home_model');            
            $data['home_item'] = $this->Home_model->get_home(1);
            $this->load->view('cms/header');
            $this->load->view('cms/left_menu');
            $this->load->view('cms/homePage',$data);
            $this->load->view('cms/footer');
            
        }
        if($id == 4){
            $this->load->model('Pages_model');                      
            $data['header_item'] = $this->Header_model->get_menu();
            $data['sub_item'] = $this->Header_model->get_sousmenu();
            $data['third_item'] = $this->Header_model->get_thirdmenu();            
            $data['page_item'] = $this->Pages_model->get_page();            
            $this->load->view('cms/header');
            $this->load->view('cms/left_menu');
            $this->load->view('cms/pages',$data);
            $this->load->view('cms/footer');
            
        }
    }

    //appel la fonction du model de suppression 
    public function delete($i)
    {
        $this->form_validation->set_rules('idmenu', 'Nom du menu', 'required');
        $this->Header_model->delete_menu($i);      
        header('Location:'.base_url().'index.php/cms/1');       
    }
    
    //appel la fonction du model gerant l'ordre
    public function ordre($sens, $id)
    {        
        $this->form_validation->set_rules('idmenu', 'Nom du menu', 'required');
        $this->Header_model->upOrDown($sens, $id);      
        header('Location:'.base_url().'index.php/cms/1');       
    }

    //appel la fonction du model gerant la visibilité
    public function visibleOrNot($type)
    {      
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
            $data['type'] = "3ème niveau";
            $data['sub_item'] = $this->Header_model->get_sousmenu();           
            $this->load->view('cms/header');
            $this->load->view('cms/left_menu');
            $this->load->view('cms/createMenu',$data);
            $this->load->view('cms/footer');            
        }
    }

    //permet la validation d'enregistrement d'un menu/sousmenu...
    public function validateMenu($type){       
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
        header('Location:'.base_url().'/cms/1'); 
    }

    public function updateMenu($type){
        $amodif = $this->input->post('menuUpdate'); 
        if($type == 1){
            $data['header_item'] = $this->Header_model->get_menu($amodif); 
            $data['case'] = 1;           
            $data['type'] = "Menu";           
            $this->load->view('cms/header');
            $this->load->view('cms/left_menu');
            $this->load->view('cms/updateMenu',$data);
            $this->load->view('cms/footer');            
        }
        if($type == 2){
            $data['case'] = 2;           
            $data['type'] = "Sousmenu";
            $data['header_item'] = $this->Header_model->get_menu();
            $data['sub_item'] = $this->Header_model->get_sousmenu($amodif);           
            $this->load->view('cms/header');
            $this->load->view('cms/left_menu');
            $this->load->view('cms/updateMenu',$data);
            $this->load->view('cms/footer');            
        }
        if($type == 3){
            $data['case'] = 3;           
            $data['type'] = "3ème niveau";
            $data['sub_item'] = $this->Header_model->get_sousmenu();
            $data['third_item'] = $this->Header_model->get_thirdmenu($amodif);           
            $this->load->view('cms/header');
            $this->load->view('cms/left_menu');
            $this->load->view('cms/updateMenu',$data);
            $this->load->view('cms/footer');            
        }
    }

    public function createPages(){
        $this->load->model('Pages_model');                
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
        //on définie les critères obligatoires       
        $this->form_validation->set_rules('nomPage', '"Nom de la page"', 'required');
        $this->form_validation->set_rules('titrePage', '"Titre"', 'required');        

        if($this->form_validation->run()==FALSE)
        {
            $this->load->model('Pages_model');                    
            $data['header_item'] = $this->Header_model->get_menu();
            $data['sub_item'] = $this->Header_model->get_sousmenu();
            $data['third_item'] = $this->Header_model->get_thirdmenu();            
            $data['type_item'] = $this->Pages_model->get_type();
            $this->load->view('cms/header');
            $this->load->view('cms/left_menu');
            $this->load->view('cms/createPages', $data);
            $this->load->view('cms/footer');
        }else{

        //récupère et copie la photo choisie, définie les caractéristique de celle-ci et le chemin d'upload
        $config['upload_path']= "./assets/site/img/background/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config ['max_size'] = 100000 ;
        $config ['max_width'] = 1024 ;
        $config ['max_height'] = 768 ;

        //upload la photo vers le serveur
        $this->load->library('upload', $config);
        if(! $this->upload->do_upload('backgroundImg'))
        {
            //si upload hs retour vers la page de création de page avec info sur l'echec du transfert
                $data['error'] = array('error'=> $this->upload->display_errors());
                $this->load->model('Pages_model');                      
                $data['header_item'] = $this->Header_model->get_menu();
                $data['sub_item'] = $this->Header_model->get_sousmenu();
                $data['third_item'] = $this->Header_model->get_thirdmenu();            
                $data['type_item'] = $this->Pages_model->get_type();
                $this->load->view('cms/header');
                $this->load->view('cms/left_menu');
                $this->load->view('cms/createPages', $data);
                $this->load->view('cms/footer');
        }
        else
        {   //on charge les models nécessaires                    
            $this->load->model('Pages_model');
            //on envoie les info vers Pages_model pour création dans la table de la bdd        
            $data = array('upload_data'=>$this->upload->data());
            $nom = 'assets/site/img/background/'.$data['upload_data']['orig_name'];
            $type = $this->input->post('selectType');
            $this->Pages_model->validatePage($nom,$type);

            //on vérifie le type de page à enregistrer
            switch($type){
                case "text":
                    $this->load->model('Text_model');
                    $nomPage = str_replace(array(' ','/','\\'),'',$this->input->post('nomPage'));                
                    $id_pages = $this->Pages_model->get_idpage($nomPage);
                    $this->Text_model->create($id_pages);
                break;
                case "sans":
                    $this->load->model('Sans_model');
                    $nomPage = str_replace(array(' ','/','\\'),'',$this->input->post('nomPage'));                
                    $id_pages = $this->Pages_model->get_idpage($nomPage);
                    $this->Sans_model->create($id_pages);
                break;
                case "bulle":
                    $this->load->model('Bulles_model');
                    $nomPage = str_replace(array(' ','/','\\'),'',$this->input->post('nomPage'));                
                    $id_pages = $this->Pages_model->get_idpage($nomPage);
                    $this->Bulles_model->create($id_pages);
                break;
            }

            //on récupère les menus,sousmenu... sélectionné pour faire la mise à jour du chemin d'accès           
            $arrayMenu = $this->input->post('menu[]');             
            $sizeofmenu = sizeof($arrayMenu);
            $arraySMenu = $this->input->post('sousmenu[]');             
            $sizeofSmenu = sizeof($arraySMenu);
            $array3Menu = $this->input->post('third[]');             
            $sizeof3menu = sizeof($array3Menu);
            
            //selon le cas on appel le header_model pour faire le update
            if($sizeofmenu > 0){
                $this->Header_model->updateMenuByPage($arrayMenu,1); 
            }
            if($sizeofSmenu > 0){
                $this->Header_model->updateMenuByPage($arraySMenu,2); 
            }
            if($sizeof3menu > 0){
                $this->Header_model->updateMenuByPage($array3Menu,3); 
            }            
                        
            header('Location:'.base_url().'cms/3');
    }      
       
    }
}
    //fonction de suppression de pages
    public function deletePage()
{       
        $this->form_validation->set_rules('id_pages', 'Nom du menu', 'required');
        $this->Pages_model->delete();      
        header('Location:'.base_url().'cms/3');       
}

    public function cutLink($type)
{
        $this->load->model('Pages_model');       
        $this->form_validation->set_rules('cut', 'Lien à couper', 'required');
        $this->Header_model->cutLink($type);      
        header('Location:'.base_url().'cms/3');       
}

    public function updateLink(){       
        //on récupère les menus,sousmenu... sélectionné pour faire la mise à jour du chemin d'accès           
        $arrayMenu = $this->input->post('menu1[]');             
        $sizeofmenu = sizeof($arrayMenu);
        $arraySMenu = $this->input->post('sousmenu1[]');             
        $sizeofSmenu = sizeof($arraySMenu);
        $array3Menu = $this->input->post('third1[]');             
        $sizeof3menu = sizeof($array3Menu);
        
        //selon le cas on appel le header_model pour faire le update
        if($sizeofmenu > 0){
            $this->Header_model->updateMenuByPage($arrayMenu,1); 
        }
        if($sizeofSmenu > 0){
            $this->Header_model->updateMenuByPage($arraySMenu,2); 
        }
        if($sizeof3menu > 0){
            $this->Header_model->updateMenuByPage($array3Menu,3); 
        }            
                    
        header('Location:'.base_url().'cms/3');
    }
}