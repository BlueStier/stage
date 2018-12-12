<?php
class Cms extends CI_Controller
{

    //constructeur charge la classe Acceuil_model et le helper de gestion des url
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form', 'url_helper');
        $this->load->model('Header_model');

        $this->load->library('form_validation', 'session');

    }

    //construit la page d'Acceuil
    public function index()
    {
        $time = $this->session->userdata('__ci_last_regenerate') + 900;
        $délai = false;
        if ($time < time()) {
            $this->session->set_userdata('logged_in', false);
        }
        if ($this->session->userdata('username') == '' || $this->session->userdata('logged_in') == false) {
            $this->session->set_userdata('logged_in', false);
            header('Location:' . base_url() . 'login');
        } else {
            $this->session->set_userdata('__ci_last_regenerate', time());
            $data['user'] = $this->session->userdata('username');
            $data['id_user'] = $this->session->userdata('id');
            $data['mail'] = $this->session->userdata('mail');
            $data['photouser'] = $this->session->userdata('photo');
            $data['typeuser'] = $this->session->userdata('type');
            $this->load->model('Articles_model');
            $data['alerte'] = $this->Articles_model->findAlert();
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/index', $data);
            $this->load->view('cms/footer');}
        /*if(!isset($_SESSION)||empty($_SESSION)){
    header('Location:'.base_url().'login');
    }*/

    }

    //construit le centre de la page en fonction de l'item sélectionné
    public function view($id)
    {
        $time = $this->session->userdata('__ci_last_regenerate') + 900;
        $délai = false;
        if ($time < time()) {
            $this->session->set_userdata('logged_in', false);
        }
        if ($this->session->userdata('username') == '' || $this->session->userdata('logged_in') == false) {
            $this->session->set_userdata('logged_in', false);
            header('Location:' . base_url() . 'login');
        } else {
            $this->session->set_userdata('__ci_last_regenerate', time());
            $data['user'] = $this->session->userdata('username');
            $data['id_user'] = $this->session->userdata('id');
            $data['mail'] = $this->session->userdata('mail');
            $data['photouser'] = $this->session->userdata('photo');
            $data['typeuser'] = $this->session->userdata('type');
            $this->load->model('Articles_model');
            $data['alerte'] = $this->Articles_model->findAlert();
        }
        if ($id == 1) {
            $data['nb'] = 1;
            $data['header_item'] = $this->Header_model->get_menu();
            $data['sub_item'] = $this->Header_model->get_sousmenu();
            $data['third_item'] = $this->Header_model->get_thirdmenu();
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/menu', $data);
            $this->load->view('cms/footer');

        }if ($id == 2) {
            $data['nb'] = 2;
            $this->load->model('Personnaes_model');
            $data['personnaes_item'] = $this->Personnaes_model->get_personnaes();
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/personnaes', $data);
            $this->load->view('cms/footer');

        }if ($id == 3) {
            $data['nb'] = 3;
            $this->load->model('Home_model');
            $this->load->model('Pages_model');
            $this->load->model('Articles_model');
            $data['Articles_item'] = $this->Articles_model->get_article(false, false);
            $data['pages_item'] = $this->Pages_model->get_page();
            $data['homepage'] = $this->Pages_model->get_page('home');
            $data['home_item'] = $this->Home_model->get_home(1);
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/homePage', $data);
            $this->load->view('cms/footer');

        }
        if ($id == 4) {
            $data['nb'] = 4;
            $this->load->model('Pages_model');
            $data['header_item'] = $this->Header_model->get_menu();
            $data['sub_item'] = $this->Header_model->get_sousmenu();
            $data['third_item'] = $this->Header_model->get_thirdmenu();
            $data['page_item'] = $this->Pages_model->get_page();
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/pages', $data);
            $this->load->view('cms/footer');

        }
        if ($id == 5) {
            $data['nb'] = 5;
            $this->load->model('Pages_model');
            $data['header_item'] = $this->Header_model->get_menu();
            $data['sub_item'] = $this->Header_model->get_sousmenu();
            $data['third_item'] = $this->Header_model->get_thirdmenu();
            $data['page_item'] = $this->Pages_model->get_page();
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/createArticle', $data);
            $this->load->view('cms/footer');

        }
        if ($id == 6) {
            $data['nb'] = 6;
            $this->load->model('Pages_model');
            $this->load->model('Articles_model');
            $data['header_item'] = $this->Header_model->get_menu();
            $data['sub_item'] = $this->Header_model->get_sousmenu();
            $data['third_item'] = $this->Header_model->get_thirdmenu();
            $data['page_item'] = $this->Pages_model->get_page_by_type('article');
            $data['past_item'] = $this->Articles_model->get_article_by_page(false, true);
            $data['current_item'] = $this->Articles_model->get_article_by_page(false, false);
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/articles', $data);
            $this->load->view('cms/footer');

        }

        if ($id == 7) {
            $data['nb'] = 7;
            $this->load->model('Pages_model');
            $data['header_item'] = $this->Header_model->get_menu();
            $data['sub_item'] = $this->Header_model->get_sousmenu();
            $data['third_item'] = $this->Header_model->get_thirdmenu();
            $data['type_item'] = $this->Pages_model->get_type();
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/createPages', $data);
            $this->load->view('cms/footer');

        }
        if ($id == 8) {
            $data['nb'] = 8;
            $this->load->model('Pages_model');
            $data['header_item'] = $this->Header_model->get_menu();
            $data['sub_item'] = $this->Header_model->get_sousmenu();
            $data['third_item'] = $this->Header_model->get_thirdmenu();
            $data['page_item'] = $this->Pages_model->get_page();
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/pages', $data);
            $this->load->view('cms/footer');

        }

        if ($id == 11) {
            $data['nb'] = 11;
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/createUser', $data);
            $this->load->view('cms/footer');

        }
        if ($id == 12) {
            $this->load->model('User_model');
            $data['nb'] = 12;
            $data['users'] = $this->User_model->get_user();
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/user', $data);
            $this->load->view('cms/footer');

        }
        if ($id == 13) {
            $this->load->model('Bddcit_model');
            $data['nb'] = 13;
            //extraction de la base de données des citoyens avec mise en corélation des messages
            $data['citoyen'] = $this->Bddcit_model->get_cit_avec_messages();
            $data['type_contact'] = $this->Bddcit_model->get_type_contact();
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/citoyen', $data);
            $this->load->view('cms/footer');

        }
    }

    //appel la fonction du model de suppression
    public function delete($i)
    {
        $this->Header_model->delete_menu($i);
        header('Location:' . base_url() . 'cms/1');
    }

    //appel la fonction du model gerant l'ordre
    public function ordre($sens, $id)
    {
        $this->Header_model->upOrDown($sens, $id);
        header('Location:' . base_url() . 'cms/1');
    }

    //appel la fonction du model gerant la visibilité
    public function visibleOrNot($type)
    {
        if ($type < 4) {
            $this->Header_model->visibleOrNot($type);
            header('Location:' . base_url() . 'cms/1');
        }
        if ($type == 4) {
            $this->load->model('Articles_model');
            $id = $this->input->post('id_articles');
            $this->Articles_model->visibleOrNot($id);
            header('Location:' . base_url() . 'cms/6');
        }
        if($type == 5){
            $this->load->model('Personnaes_model');
            $id = $this->input->post('id');
            $this->Personnaes_model->visibleOrNot($id);
            header('Location:' . base_url() . 'cms/2');
        }
    }

    //appel la fonction du model gerant le drag'n'drop
    public function dragNdrop()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('menu', 'menu', 'required');
        if ($this->form_validation->run()) {
            $this->Header_model->dragNdrop();
            if ($this->input->is_ajax_request()) {
                echo json_encode(true);
            }
        }
    }

    //création de la pge d'enregistrement d'un menu/sousmenu...
    public function createMenu($type)
    {
        $this->session->set_userdata('__ci_last_regenerate', time());
        $data['user'] = $this->session->userdata('username');
        $data['id_user'] = $this->session->userdata('id');
        $data['mail'] = $this->session->userdata('mail');
        $data['photouser'] = $this->session->userdata('photo');
        $data['typeuser'] = $this->session->userdata('type');
        $this->load->model('Articles_model');
        $data['alerte'] = $this->Articles_model->findAlert();

        if ($type == 1) {
            $data['case'] = 1;
            $data['type'] = "Menu";
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/createMenu', $data);
            $this->load->view('cms/footer');
        }
        if ($type == 2) {
            $data['case'] = 2;
            $data['type'] = "Sousmenu";
            $data['header_item'] = $this->Header_model->get_menu();
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/createMenu', $data);
            $this->load->view('cms/footer');
        }
        if ($type == 3) {
            $data['case'] = 3;
            $data['type'] = "3ème niveau";
            $data['sub_item'] = $this->Header_model->get_sousmenu();
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/createMenu', $data);
            $this->load->view('cms/footer');
        }
    }

    //permet la validation d'enregistrement d'un menu/sousmenu...
    public function validateMenu($type)
    {
        $this->form_validation->set_rules('nom', 'nom', 'required');
        if ($type == 1) {
            $this->form_validation->set_rules('couleur', 'couleur', 'required');
        }
        if ($type == 2) {
            $this->form_validation->set_rules('select', 'le Menu', 'required');
        }
        if ($type == 3) {
            $this->form_validation->set_rules('select1', 'le Sousmenu', 'required');
        }
        $this->Header_model->validateMenu($type);
        header('Location:' . base_url() . '/cms/1');
    }

    //creer la page updateMenu en fonction du menu,sousmenu... choisi
    public function updateMenu($type)
    {
        $this->session->set_userdata('__ci_last_regenerate', time());
        $data['user'] = $this->session->userdata('username');
        $data['id_user'] = $this->session->userdata('id');
        $data['mail'] = $this->session->userdata('mail');
        $data['photouser'] = $this->session->userdata('photo');
        $data['typeuser'] = $this->session->userdata('type');
        $this->load->model('Articles_model');
        $data['alerte'] = $this->Articles_model->findAlert();

        $amodif = $this->input->post('menuUpdate');
        if ($type == 1) {
            $data['header_item'] = $this->Header_model->get_menu($amodif);
            $data['case'] = 1;
            $data['type'] = "Menu";
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/updateMenu', $data);
            $this->load->view('cms/footer');
        }
        if ($type == 2) {
            $data['case'] = 2;
            $data['type'] = "Sousmenu";
            $data['header_item'] = $this->Header_model->get_menu();
            $data['sub_item'] = $this->Header_model->get_sousmenu($amodif);
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/updateMenu', $data);
            $this->load->view('cms/footer');
        }
        if ($type == 3) {
            $data['case'] = 3;
            $data['type'] = "3ème niveau";
            $data['sub_item'] = $this->Header_model->get_sousmenu();
            $data['third_item'] = $this->Header_model->get_thirdmenu($amodif);
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/updateMenu', $data);
            $this->load->view('cms/footer');
        }
    }

    //appel la page createPage
    public function createPages()
    {
        $this->session->set_userdata('__ci_last_regenerate', time());
        $data['user'] = $this->session->userdata('username');
        $data['id_user'] = $this->session->userdata('id');
        $data['mail'] = $this->session->userdata('mail');
        $data['photouser'] = $this->session->userdata('photo');
        $data['typeuser'] = $this->session->userdata('type');
        $this->load->model('Articles_model');
        $data['alerte'] = $this->Articles_model->findAlert();
        $this->load->model('Pages_model');
        $data['nb'] = 4;
        $data['header_item'] = $this->Header_model->get_menu();
        $data['sub_item'] = $this->Header_model->get_sousmenu();
        $data['third_item'] = $this->Header_model->get_thirdmenu();
        $data['type_item'] = $this->Pages_model->get_type();
        $this->load->view('cms/header', $data);
        $this->load->view('cms/left_menu', $data);
        $this->load->view('cms/createPages', $data);
        $this->load->view('cms/footer');
    }

    //fonction permettant d'enregistrer un page
    public function validatePage()
    {
        //on définie les critères obligatoires
        $this->form_validation->set_rules('nomPage', '"Nom de la page"', 'required');
        $this->form_validation->set_rules('titrePage', '"Titre"', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_userdata('__ci_last_regenerate', time());
            $data['user'] = $this->session->userdata('username');
            $data['id_user'] = $this->session->userdata('id');
            $data['mail'] = $this->session->userdata('mail');
            $data['photouser'] = $this->session->userdata('photo');
            $data['typeuser'] = $this->session->userdata('type');
            $this->load->model('Articles_model');
            $data['alerte'] = $this->Articles_model->findAlert();
            $this->load->model('Pages_model');
            $data['header_item'] = $this->Header_model->get_menu();
            $data['sub_item'] = $this->Header_model->get_sousmenu();
            $data['third_item'] = $this->Header_model->get_thirdmenu();
            $data['type_item'] = $this->Pages_model->get_type();
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/createPages', $data);
            $this->load->view('cms/footer');
        } else {

            //récupère et copie la photo choisie, définie les caractéristique de celle-ci et le chemin d'upload
            $config['upload_path'] = "./assets/site/img/background/";
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 10000000;
            $config['max_width'] = 10000;
            $config['max_height'] = 10000;
            $config['overwrite'] = true;

            //upload la photo vers le serveur
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('backgroundImg')) {
                //si upload hs retour vers la page de création de page avec info sur l'echec du transfert
                $data['error'] = array('error' => $this->upload->display_errors());
                $this->load->model('Pages_model');
                $data['header_item'] = $this->Header_model->get_menu();
                $data['sub_item'] = $this->Header_model->get_sousmenu();
                $data['third_item'] = $this->Header_model->get_thirdmenu();
                $data['type_item'] = $this->Pages_model->get_type();
                $this->load->view('cms/header', $data);
                $this->load->view('cms/left_menu', $data);
                $this->load->view('cms/createPages', $data);
                $this->load->view('cms/footer');
            } else { //on charge les models nécessaires
                $this->load->model('Pages_model');
                //on envoie les info vers Pages_model pour création dans la table de la bdd
                $data = array('upload_data' => $this->upload->data());
                $nom = 'assets/site/img/background/' . $data['upload_data']['orig_name'];
                $type = $this->input->post('selectType');
                $this->Pages_model->validatePage($nom, $type);

                //on vérifie le type de page à enregistrer
                switch ($type) {
                    case "text":
                        $this->load->model('Text_model');
                        $nomPage = str_replace(array(' ', '/', '\\'), '', $this->input->post('nomPage'));
                        $id_pages = $this->Pages_model->get_idpage($nomPage);
                        $this->Text_model->create($id_pages);
                        break;
                    case "sans":
                        $this->load->model('Sans_model');
                        $nomPage = str_replace(' ', '-', $this->input->post('nomPage'));
                        $id_pages = $this->Pages_model->get_idpage($nomPage);
                        $this->Sans_model->create($id_pages);
                        break;
                    case "carroussel":
                        $this->load->model('Carroussel_model');
                        $nomPage = str_replace(' ', '-', $this->input->post('nomPage'));
                        $id_pages = $this->Pages_model->get_idpage($nomPage);
                        $this->Carroussel_model->create($id_pages, $nomPage);
                        break;
                    case "bulle":
                        $this->load->model('Bulles_model');
                        $nomPage = str_replace(' ', '-', $this->input->post('nomPage'));
                        $id_pages = $this->Pages_model->get_idpage($nomPage);
                        $this->Bulles_model->create($id_pages);
                    case "article":
                        $this->load->model('Articles_model');
                        $nomPage = str_replace(' ', '-', $this->input->post('nomPage'));
                        $id_pages = $this->Pages_model->get_idpage($nomPage);
                        $this->Articles_model->create($id_pages);
                        break;
                    case "document":
                        $this->load->model('Document_model');
                        $nomPage = str_replace(' ', '-', $this->input->post('nomPage'));
                        $id_pages = $this->Pages_model->get_idpage($nomPage);
                        $this->Document_model->create($id_pages, $nomPage);
                        break;
                    case "formulaire":
                        $this->load->model('Form_model');
                        $nomPage = str_replace(' ', '-', $this->input->post('nomPage'));
                        $id_pages = $this->Pages_model->get_idpage($nomPage);
                        $this->Form_model->create($id_pages);
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
                if ($sizeofmenu > 0) {
                    $this->Header_model->updateMenuByPage($arrayMenu, 1);
                }
                if ($sizeofSmenu > 0) {
                    $this->Header_model->updateMenuByPage($arraySMenu, 2);
                }
                if ($sizeof3menu > 0) {
                    $this->Header_model->updateMenuByPage($array3Menu, 3);
                }

                header('Location:' . base_url() . 'cms/4');
            }

        }
    }
    //fonction de suppression de pages
    public function deletePage()
    {
        $this->load->model('Pages_model');
        $this->form_validation->set_rules('id_pages', 'id de la page', 'required');
        $this->Pages_model->delete();
        header('Location:' . base_url() . 'cms/4');
    }

    //ouvre la page de mise à jour d'une page
    public function updatePage($id)
    {
        $this->session->set_userdata('__ci_last_regenerate', time());
        $data['user'] = $this->session->userdata('username');
        $data['id_user'] = $this->session->userdata('id');
        $data['mail'] = $this->session->userdata('mail');
        $data['photouser'] = $this->session->userdata('photo');
        $data['typeuser'] = $this->session->userdata('type');
        $this->load->model('Articles_model');
        $data['alerte'] = $this->Articles_model->findAlert();
        $this->load->model('Pages_model');
        $data['nb'] = 4;
        $data['page_item'] = $this->Pages_model->get_page_by_id($id);
        $data['header_item'] = $this->Header_model->get_menu();
        $data['sub_item'] = $this->Header_model->get_sousmenu();
        $data['third_item'] = $this->Header_model->get_thirdmenu();
        $typePage = $data['page_item'][0]['type'];

        //selon le type de la page à update
        if ($typePage == 'text') {
            $this->load->model('Text_model');
            $data['text_item'] = $this->Text_model->get_text($id);
        }
        if ($typePage == 'bulle') {
            $this->load->model('Bulles_model');
            $data['bulle_item'] = $this->Bulles_model->get_bulle($id);
        }
        if ($typePage == 'sans') {
            $this->load->model('Sans_model');
            $data['sans_item'] = $this->Sans_model->get_Sans($id);
        }
        if ($typePage == 'article') {
            $this->load->model('Articles_model');
            $data['art_item'] = $this->Articles_model->get_article($id, true);
        }
        if ($typePage == "carroussel") {
            $this->load->model('Carroussel_model');
            $data['car_item'] = $this->Carroussel_model->get_car($id);
            $pathname = './' . $data['car_item'][0]['path'];
            $data['photo'] = $this->Carroussel_model->read_all_files($pathname);
        }
        if ($typePage == "document") {
            $this->load->model('Document_model');
            $data['doc_item'] = $this->Document_model->get_document($id);
            $pathname = './' . $data['doc_item'][0]['path'];
            $data['folder'] = $this->Document_model->read_all_files($pathname);
            $data['file'] = [];
            foreach ($data['folder'] as $f):
                $data['file'][$f] = $this->Document_model->read_all_files($pathname . '/' . $f);
            endforeach;
        }
        if ($typePage == 'formulaire') {
            $this->load->model('Form_model');
            $this->load->model('Liste_model');
            $recup = $this->Form_model->get_form($id);
            $data['intro'] = $recup['intro'];
            $data['form'] = $recup;
            $data['nb_champ'] = $this->Form_model->nb_champ($id);
            $data['nb_mail'] = $this->Form_model->mail_dest($id);
            for ($i = 1; $i <= $data['nb_champ']; $i++) {
                //on vérifie si on à une liste dans les champs
                if ($recup['type' . $i] == 'liste') {
                    $data['liste'] = $this->Liste_model->get_liste($recup['champ' . $i]);
                    $data['nb_item'] = $this->Liste_model->nb_item($recup['champ' . $i]);
                }
            }}

        $this->load->view('cms/header', $data);
        $this->load->view('cms/left_menu', $data);
        $this->load->view('cms/updatePage', $data);
        $this->load->view('cms/footer');
    }

    //fonction permettant d'enregistrer un page
    public function validUpPage($id)
    {
        $this->load->model('Pages_model');
        $this->Pages_model->updatePage($id);
        $nom_page = $this->Pages_model->get_page_by_id($id);

        //on enregistre les changements en fonction du type de page
        if ($nom_page[0]['type'] == 'text') {
            $this->load->model('Text_model');
            $this->Text_model->update($id);
        }
        if ($nom_page[0]['type'] == 'bulle') {
            $this->load->model('Bulles_model');
            $this->Bulles_model->update($id);
        }
        if ($nom_page[0]['type'] == 'sans') {
            $this->load->model('Sans_model');
            $this->Sans_model->update($id);
        }
        if ($nom_page[0]['type'] == 'article') {
            $this->load->model('Articles_model');
            $this->Articles_model->update($id);
        }
        if ($nom_page[0]['type'] == 'carroussel') {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 10000000;
            $config['max_width'] = 10000;
            $config['max_height'] = 10000;
            $config['overwrite'] = true;
            $this->load->library('upload', $config);
            $this->load->model('Carroussel_model');
            $this->Carroussel_model->update($id, $nom_page[0]['nom']);
        }
        if ($nom_page[0]['type'] == 'document') {
            $config['max_size'] = 10000000;
            $config['max_width'] = 10000;
            $config['max_height'] = 10000;
            $config['overwrite'] = true;
            $this->load->library('upload', $config);
            $this->load->model('Document_model');
            $this->Document_model->update($id, $nom_page[0]['nom']);
        }
        if ($nom_page[0]['type'] == 'formulaire') {
            $this->load->model('Form_model');
            $this->Form_model->update($id);
        }

        //on extrait tous les chemins dans les menus et sous menus...et remise à vide

        $path = 'pages/' . $nom_page[0]['nom'] . '/';
        $menu = $this->Header_model->get_menu();
        foreach ($menu as $m):
            $compM = strcmp($m['path'], $path);
            if ($compM == 0) {
                $this->Header_model->cutLink(1, $m['id_menu']);
            }
        endforeach;
        $Smenu = $this->Header_model->get_sousmenu();
        foreach ($Smenu as $s):
            $compS = strcmp($s['path'], $path);
            if ($compS == 0) {
                $this->Header_model->cutLink(2, $s['id_sousmenu']);
            }
        endforeach;
        $S3menu = $this->Header_model->get_thirdmenu();
        foreach ($S3menu as $s3):
            $compS3 = strcmp($s3['path'], $path);
            if ($compS3 == 0) {
                $this->Header_model->cutLink(3, $s3['id_third']);
            }
        endforeach;

        //on remet les chemins dans les menus sélectionnés
        Cms::updateLink(2);
    }


    //appel la page createPersonnae
    public function createPersonnae()
    {
        $this->session->set_userdata('__ci_last_regenerate', time());
        $data['user'] = $this->session->userdata('username');
        $data['id_user'] = $this->session->userdata('id');
        $data['mail'] = $this->session->userdata('mail');
        $data['photouser'] = $this->session->userdata('photo');
        $data['typeuser'] = $this->session->userdata('type');
        $this->load->model('Articles_model');
        $data['alerte'] = $this->Articles_model->findAlert();
        $this->load->model('Pages_model');
        $data['page_item'] = $this->Pages_model->get_page();
        $data['nb'] = 2;      
        $this->load->view('cms/header', $data);
        $this->load->view('cms/left_menu', $data);
        $this->load->view('cms/createPersonnae', $data);
        $this->load->view('cms/footer');
    }

        //fonction permettant d'enregistrer une personnae
        public function validatePersonnae()
        {
            //on définie les critères obligatoires
            $this->form_validation->set_rules("nomPersonnae", '"Nom de la personnae"', 'required');
    
            if ($this->form_validation->run() == false) {
                $this->session->set_userdata('__ci_last_regenerate', time());
        $data['user'] = $this->session->userdata('username');
        $data['id_user'] = $this->session->userdata('id');
        $data['mail'] = $this->session->userdata('mail');
        $data['photouser'] = $this->session->userdata('photo');
        $data['typeuser'] = $this->session->userdata('type');
        $this->load->model('Articles_model');
        $data['alerte'] = $this->Articles_model->findAlert();
        $this->load->model('Pages_model');
        $data['page_item'] = $this->Pages_model->get_page();
        $data['nb'] = 2;      
        $this->load->view('cms/header', $data);
        $this->load->view('cms/left_menu', $data);
        $this->load->view('cms/createPersonnae', $data);
        $this->load->view('cms/footer');

            } else {
                $nom = $this->input->post("nomPersonnae");
                $tab_des_pages =  $this->input->post("Personnae_check[]");
                $this->load->model('Personnaes_model');
                $this->Personnaes_model->create($nom, $tab_des_pages);
                header('Location:' . base_url() . 'cms/2');
            }
        }

           //appel la fonction du model de suppression
    public function deletePersonnae($i)
    {
        $this->load->model('Personnaes_model');
        $this->Personnaes_model->delete($i);
        header('Location:' . base_url() . 'cms/2');
    }

    public function updatePersonnae($id){
        $this->session->set_userdata('__ci_last_regenerate', time());
        $data['user'] = $this->session->userdata('username');
        $data['id_user'] = $this->session->userdata('id');
        $data['mail'] = $this->session->userdata('mail');
        $data['photouser'] = $this->session->userdata('photo');
        $data['typeuser'] = $this->session->userdata('type');
        $this->load->model('Articles_model');
        $data['alerte'] = $this->Articles_model->findAlert();
        $this->load->model('Pages_model');
        $data['page_item'] = $this->Pages_model->get_page();
        $data['nb'] = 2;
        $this->load->model('Personnaes_model');
        $data['personnae'] = $this->Personnaes_model->get_personnaes($id);
        $data['nbId'] = $this->Personnaes_model->nbId();
        $this->load->view('cms/header', $data);
        $this->load->view('cms/left_menu', $data);
        $this->load->view('cms/updatePersonnaes', $data);
        $this->load->view('cms/footer');
    }

    public function validUpPersonnae($id){
     //on définie les critères obligatoires
     $this->form_validation->set_rules("nomPersonnae", '"Nom de la personnae"', 'required');
    
     if ($this->form_validation->run() == false) {
         $this->session->set_userdata('__ci_last_regenerate', time());
 $data['user'] = $this->session->userdata('username');
 $data['id_user'] = $this->session->userdata('id');
 $data['mail'] = $this->session->userdata('mail');
 $data['photouser'] = $this->session->userdata('photo');
 $data['typeuser'] = $this->session->userdata('type');
 $this->load->model('Articles_model');
 $data['alerte'] = $this->Articles_model->findAlert();
 $this->load->model('Pages_model');
 $data['page_item'] = $this->Pages_model->get_page();
 $data['nb'] = 2;      
 $this->load->view('cms/header', $data);
 $this->load->view('cms/left_menu', $data);
 $this->load->view('cms/createPersonnae', $data);
 $this->load->view('cms/footer');

     } else {
         $nom = $this->input->post("nomPersonnae");
         $tab_des_pages =  $this->input->post("Personnae_check[]");
         $this->load->model('Personnaes_model');
         $this->Personnaes_model->update($id, $nom, $tab_des_pages);
         header('Location:' . base_url() . 'cms/2');
     }
 }

    public function supBulle($n, $id_a_modif)
    {
        $this->load->model('Bulles_model');
        $this->Bulles_model->supBulle($id_a_modif, $n);
        Cms::updatePage($id_a_modif);
    }

    public function supPhoto($id, $n)
    {
        $this->load->model('Carroussel_model');
        $array = $this->Carroussel_model->get_car($id);
        $pathname = './' . $array[0]['path'];
        $this->Carroussel_model->supPhoto($pathname, $n);
        Cms::updatePage($id);
    }

    public function supDoc($id_a_modif, $an, $doc = false)
    {
        $this->load->model('Document_model');
        $array = $this->Document_model->get_document($id_a_modif);
        if ($doc === false) {
            $pathname = './' . $array[0]['path'] . '/' . $an;
            $this->Document_model->delete_dir($pathname);
        } else {
            $pathname = './' . $array[0]['path'] . '/' . $an . '/' . $doc;
            $this->Document_model->supDoc($pathname);
        }
        Cms::updatePage($id_a_modif);
    }

    public function supChamp($n, $id_a_modif)
    {
        $this->load->model('Form_model');
        $form = $this->Form_model->get_form($id_a_modif);
        if ($form["type" . $n] == 'liste') {
            $this->load->model('Liste_model');
            $this->Liste_model->delete($form["champ" . $n]);
        }
        $this->Form_model->supChamp($id_a_modif, $n);
        Cms::updatePage($id_a_modif);
    }

    public function supItem($n, $id_a_modif, $id_page)
    {
        $this->load->model('Liste_model');
        $this->Liste_model->supItem($id_a_modif, $n);
        Cms::updatePage($id_page);
    }

    public function supMail($n, $id_a_modif)
    {
        $this->load->model('Form_model');
        $this->Form_model->supMail($id_a_modif, $n);
        Cms::updatePage($id_a_modif);
    }

    public function cutLink($type, $nb = false)
    {
        $this->load->model('Pages_model');
        $this->form_validation->set_rules('cut', 'Lien à couper', 'required');
        $this->Header_model->cutLink($type);
        if($nb == 8){
            header('Location:' . base_url() . 'cms/8');   
        }else{
        header('Location:' . base_url() . 'cms/4');
        }
    }

    public function updateLink($nb, $redirect = false)
    {
        //on récupère les menus,sousmenu... sélectionné pour faire la mise à jour du chemin d'accès
        $arrayMenu = $this->input->post('menu' . $nb . '[]');
        $sizeofmenu = sizeof($arrayMenu);
        $arraySMenu = $this->input->post('sousmenu' . $nb . '[]');
        $sizeofSmenu = sizeof($arraySMenu);
        $array3Menu = $this->input->post('third' . $nb . '[]');
        $sizeof3menu = sizeof($array3Menu);

        //selon le cas on appel le header_model pour faire le update
        if ($sizeofmenu > 0) {
            $this->Header_model->updateMenuByPage($arrayMenu, 1);
        }
        if ($sizeofSmenu > 0) {
            $this->Header_model->updateMenuByPage($arraySMenu, 2);
        }
        if ($sizeof3menu > 0) {
            $this->Header_model->updateMenuByPage($array3Menu, 3);
        }
        if($redirect == 8){
            header('Location:' . base_url() . 'cms/8');   
        }else{
        header('Location:' . base_url() . 'cms/4');
        }
    }

    public function validateArticle()
    {
        //on définie les critères obligatoires
        $this->form_validation->set_rules('titreArticle', "'Titre de l'article'", 'required');

        if ($this->form_validation->run() == false) {
            Cms::view(5);
        } else {

            $this->load->model('Pages_model');
            $this->load->model('Articles_model');
            $nom = $this->input->post('selectArt');
            $id = $this->Pages_model->get_idpage($nom);
            $this->Articles_model->createArticle($id);
            header('Location:' . base_url() . 'cms/6');
        }
    }

    public function deleteArticle()
    {
        $this->load->model('Articles_model');
        $this->form_validation->set_rules('id_pages', 'id de l article', 'required');
        $this->Articles_model->delete();
        header('Location:' . base_url() . 'cms/6');
    }

    //fonction pour creer une alerte sur un article déjà exisant
    public function configAlert($id)
    {
        $this->load->model('Articles_model');
        $this->Articles_model->configAlert($id);
        header('Location:' . base_url() . 'cms/6');

    }

    //fonction de suppression d'alerte
    public function supAlert($id)
    {

        $this->load->model('Articles_model');
        $this->Articles_model->supAlert($id);
        header('Location:' . base_url() . 'cms/6');
    }

    //appel la page de mise à jour d'un article
    public function updateArticle($id)
    {
        $this->session->set_userdata('__ci_last_regenerate', time());
        $data['user'] = $this->session->userdata('username');
        $data['id_user'] = $this->session->userdata('id');
        $data['mail'] = $this->session->userdata('mail');
        $data['photouser'] = $this->session->userdata('photo');
        $data['typeuser'] = $this->session->userdata('type');
        $this->load->model('Articles_model');
        $data['alerte'] = $this->Articles_model->findAlert();

        $this->load->model('Pages_model');
        $data['nb'] = 6;
        $data['page_item'] = $this->Pages_model->get_page();
        $data['Article_item'] = $this->Articles_model->get_article($id, false);
        $this->load->view('cms/header', $data);
        $this->load->view('cms/left_menu', $data);
        $this->load->view('cms/updateArticle', $data);
        $this->load->view('cms/footer');
    }

    //valide la maj d'un article
    public function validUpArticle()
    {

        $this->load->model('Pages_model');
        $this->load->model('Articles_model');
        $nom = $this->input->post('selectArt2');
        $id = $this->Pages_model->get_idpage($nom);
        $this->Articles_model->updateArticle($id);
        header('Location:' . base_url() . 'cms/6');
    }

    //fonction de update du texte d'intro de la home page
    public function updateIntroHome()
    {
        $this->load->model('Home_model');
        $intro = $this->input->post('textintro');
        $this->Home_model->updateIntroHome($intro);
        header('Location:' . base_url() . 'cms/3');
    }

    //fonction de update du lien pour les photo du carroussel
    public function updateLienHome($nb)
    {
        $title = $this->input->post('title' . $nb);
        $p = $this->input->post('p' . $nb);
        $this->load->model('Home_model');
        $this->Home_model->updateTitleAndPByLien($nb, $title, $p);
        header('Location:' . base_url() . 'cms/3');
    }

    //fonction permettant la mise à jour des paramètres généraux de la homePage
    public function updateGenHome()
    {
        $this->load->model('Pages_model');
        $this->Pages_model->updatePage(1);
        header('Location:' . base_url() . 'cms/3');
    }

    //fonction permettant de vider un lien
    public function deleteLien($n)
    {
        $this->load->model('Home_model');
        $this->Home_model->deleteLien($n);
        header('Location:' . base_url() . 'cms/3');
    }

    //fonction de creation d'utilisateur
    public function createUser()
    {
        $this->session->set_userdata('__ci_last_regenerate', time());
        $data['user'] = $this->session->userdata('username');
        $data['id_user'] = $this->session->userdata('id');
        $data['mail'] = $this->session->userdata('mail');
        $data['photouser'] = $this->session->userdata('photo');
        $data['typeuser'] = $this->session->userdata('type');
        $this->load->model('Articles_model');
        $data['alerte'] = $this->Articles_model->findAlert();
        //on définie les critères obligatoires
        $this->form_validation->set_rules('nomUser', 'Nom ', 'required');
        $this->form_validation->set_rules('prenomUser', 'Prenom', 'required');
        $this->form_validation->set_rules('mdpUser', 'Mot de passe', 'required');
        $this->form_validation->set_rules('mdp2User', 'Confirmation du mot de passe', 'required');

        if ($this->form_validation->run() == false) {

            $data['nb'] = 7;
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/createUser', $data);
            $this->load->view('cms/footer');

        } else {
            $nom = $this->input->post('nomUser');
            $prenom = $this->input->post('prenomUser');
            $mdp = $this->input->post('mdpUser');
            $Confmdp = $this->input->post('mdp2User');

            //on vérifie si cet user est déjà en bdd
            $this->load->model('User_model');
            $exist = $this->User_model->verify_user($nom, $prenom);

            //Si oui redirection vers la page de créatio et info déjà existant
            if ($exist) {
                $data['error'] = array('error' => 'Cet utilisateur existe déjà');
                $data['nb'] = 7;
                $this->load->view('cms/header', $data);
                $this->load->view('cms/left_menu', $data);
                $this->load->view('cms/createUser', $data);
                $this->load->view('cms/footer');
            }

            //l'utilisateur n'est pas en bdd
            else {

                    //on vérifie que le mot de passe et sa confirmation sont identique
                    //si ce n'est pas le cas redirection
                    if ($mdp != $Confmdp) {
                        $data['error'] = array('error' => 'Le mot de passe et sa confirmation sont diffférents');
                        $data['nb'] = 7;
                        $this->load->view('cms/header', $data);
                        $this->load->view('cms/left_menu', $data);
                        $this->load->view('cms/createUser', $data);
                        $this->load->view('cms/footer');
                    }

                    //mot de passe et conf ok
                else {
                        $this->User_model->create_user($nom, $prenom, $mdp);
                        cms::view(8);
                    }
                }
            }
        }

        //fonction de mise à jour d'un utilisateur
        public function updateUser($id)
    {
            $this->load->model('User_model');
            $this->session->set_userdata('__ci_last_regenerate', time());
            $data['user'] = $this->session->userdata('username');
            $data['photouser'] = $this->session->userdata('photo');
            $data['typeuser'] = $this->session->userdata('type');
            $data['id_user'] = $this->session->userdata('id');
            $data['mail'] = $this->session->userdata('mail');
            $data['user_by_id'] = $this->User_model->get_user($id);
            $this->load->model('Articles_model');
            $data['alerte'] = $this->Articles_model->findAlert();
            $this->load->view('cms/header', $data);
            $this->load->view('cms/left_menu', $data);
            $this->load->view('cms/updateUser', $data);
            $this->load->view('cms/footer');

        }

        //fonction de validation de la mise à jour d'un user
        public function validupUser($id)
    {
            $mdp = $this->input->post('mdpUser');
            $Confmdp = $this->input->post('mdp2User');

            if ($mdp != $Confmdp) {
                $this->load->model('User_model');
                $data['user_by_id'] = $this->User_model->get_user($id);
                $this->session->set_userdata('__ci_last_regenerate', time());
                $data['user'] = $this->session->userdata('username');
                $data['photouser'] = $this->session->userdata('photo');
                $data['typeuser'] = $this->session->userdata('type');
                $data['error'] = array('error' => 'Le mot de passe et sa confirmation sont diffférents');
                $data['nb'] = 7;
                $this->load->view('cms/header', $data);
                $this->load->view('cms/left_menu', $data);
                $this->load->view('cms/updateUser', $data);
                $this->load->view('cms/footer');
            }
            $this->load->model('User_model');
            $this->User_model->update($id);
            header('Location:' . base_url() . 'cms/8');
        }

        //fonction de déconnexion
        public function destroy()
    {
            $this->session->sess_destroy();
            header('Location:' . base_url() . 'login');
        }

        //fonction de mise en veille
        public function dodo()
    {
            $this->session->set_userdata('logged_in', false);
            header('Location:' . base_url() . 'login');
        }

        //fonction de suppression d'un utilisateur
        public function deleteUser()
    {
            $id_user = $this->input->post('id_user');
            $this->load->model('User_model');
            $this->User_model->delete($id_user);
            Cms::view(8);
        }

        //fonction de suppression des citoyens de la bdd
        public function deleteCitoyen($id_table)
    {
            $this->load->model('Bddcit_model');
            $taille = $this->input->post('taille_liste' . $id_table);
            for ($e = 0; $e < $taille; $e++) {
                $citoyen_a_sup = $this->input->post($id_table . 'liste_a_supprimer_' . $e);
                $this->Bddcit_model->delete($citoyen_a_sup);
            }
            CMS::view(13);

        }

        //fonction pour fichier excel
        public function excelCitoyen($id_table)
    {
            $array = $this->input->post($id_table . 'check[]');
            $this->load->model('Bddcit_model');
            $this->Bddcit_model->excel($array, $id_table);
        }

        public function excel_total()
    {
            $this->load->model('Bddcit_model');
            $this->Bddcit_model->excel_total();
        }
    }
