<?php
class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Autocomplete_model');
        $this->load->model('Header_model');
        $this->load->model('Personnaes_model');
        $this->load->model('Pages_model');
        $this->load->model('General_model');
        $this->load->model('Consultvox_model');
        $this->load->helper('url_helper', 'security_helper');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('captcha');
    }

    public function index()
    {
        Pages::view('home');
    }
    //construit la page demandée
    public function view($page, $str = false)
    {
        //récupère les infos pour le header (menu, sousmenu...)
        $data['gen'] = $this->General_model->get();
        $data['black_or_white'] = strstr($data['gen']['entete'], 'white');
        $data['consultvox'] = $this->Consultvox_model->get();
        $data['autocomplete'] = $this->Autocomplete_model->get();
        $data['header_item'] = $this->Header_model->get_menu();
        $data['sub_item'] = $this->Header_model->get_sousmenu();
        $data['third_item'] = $this->Header_model->get_thirdmenu();
        $pagestab = $this->Pages_model->get_page($page);
        $data['background'] = base_url() . $pagestab['background'];
        $data['title'] = $pagestab['titre'];
        $data['subtitle'] = $pagestab['soustitre'];
        $data['intro_doc'] = $pagestab['intro_doc'];
        $data['path_doc'] = $pagestab['path_doc'];
        $data['consult'] = $pagestab['consultvox'];
        $data['type_de_page'] = $pagestab['type'];

        //récupère les infos du type de page
        if ($pagestab['type'] == 'bulle') {
            $this->load->model('Bulles_model');
            $data['bulle_item'] = $this->Bulles_model->get_bulle($pagestab['id_pages']);
            $data['css'] = 'home page page-parent page-template-default template-slider color-custom sticky-header layout-full-width ' . $data['gen']['entete'];
            $page = 'portfolio';
        }
        if ($pagestab['type'] == 'text') {
            $this->load->model('Text_model');
            $data['text_item'] = $this->Text_model->get_text($pagestab['id_pages']);
            $data['css'] = 'home page page-parent page-template-default template-slider color-custom sticky-header layout-full-width ' . $data['gen']['entete'];
            $page = 'text';
        }
        if ($pagestab['type'] == 'sans') {
            $this->load->model('Sans_model');
            $data['text_item'] = $this->Sans_model->get_sans($pagestab['id_pages']);
            $data['css'] = 'home page page-parent page-template-default template-slider color-custom sticky-header layout-full-width ' . $data['gen']['entete'];
            $page = 'text';
        }
        if ($pagestab['type'] == 'home') {
            $this->load->model('Home_model');
            $data['personnaes_item'] = $this->Personnaes_model->get_personnaes();
            $data['home_item'] = $this->Home_model->get_home($pagestab['id_pages']);
            $data['css'] = 'home page page-parent page-template-default template-slider color-custom sticky-header layout-full-width ' . $data['gen']['entete'];
            $page = 'home';
        }
        if ($pagestab['type'] == 'carroussel') {
            $this->load->model('Carroussel_model');
            $data['car_item'] = $this->Carroussel_model->get_car($pagestab['id_pages']);
            $data['photo_item'] = $this->Carroussel_model->read_all_files($data['car_item'][0]['path']);
            $data['path'] = $data['car_item'][0]['path'];
            $data['css'] = 'home page page-parent page-template-default template-slider color-custom sticky-header layout-full-width ' . $data['gen']['entete'];
            $page = 'carrousel2';
        }
        if ($pagestab['type'] == 'article') {
            $this->load->model('Articles_model');
            $recup = $this->Articles_model->get_article($pagestab['id_pages'], true);
            $id = $recup[0]['id_articlespage'];
            $data['intro'] = $recup[0]['text'];
            $data['article_item'] = $this->Articles_model->get_article_by_page($id, false);
            $data['css'] = 'page page-id-289 page-child parent-pageid-131 page-template-default  with_aside aside_right color-custom sticky-header layout-full-width ' . $data['gen']['entete'];
            $page = 'article';
        }
        if ($pagestab['type'] == 'document') {
            $this->load->model('Document_model');
            $data['doc_item'] = $this->Document_model->get_document($pagestab['id_pages']);
            $pathname = './' . $data['doc_item'][0]['path'];
            $data['folder'] = $this->Document_model->read_all_files($pathname);
            $data['file'] = [];
            foreach ($data['folder'] as $f):
                $data['file'][$f] = $this->Document_model->read_all_files($pathname . '/' . $f);
            endforeach;
            $data['css'] = 'home page page-parent page-template-default template-slider color-custom sticky-header layout-full-width ' . $data['gen']['entete'];
            $page = 'document';
        }
        if ($pagestab['type'] == 'formulaire') {
            $this->load->model('Form_model');
            $this->load->model('Liste_model');
            $recup = $this->Form_model->get_form($pagestab['id_pages']);
            $data['css'] = 'home page page-parent page-template-default template-slider color-custom sticky-header layout-full-width ' . $data['gen']['entete'];
            if ($str != false) {
                $data['message'] = "Votre demande à bien été transmise nous vous en remercions.";
            }
            $data['page'] = $page;
            $data['id'] = $pagestab['id_pages'];
            $data['intro'] = $recup['intro'];
            $data['form'] = $recup;
            $data['nb_champ'] = $this->Form_model->nb_champ($pagestab['id_pages']);
            for ($i = 1; $i <= $data['nb_champ']; $i++) {
                //on vérifie si on à une liste dans les champs
                if ($recup['type' . $i] == 'liste') {
                    $data['liste'] = $this->Liste_model->get_liste($recup['champ' . $i]);
                    $data['liste']['nom_champ'] = str_replace(' ', '_', $data['liste']['nom_champ']);
                    $data['nb_item'] = $this->Liste_model->nb_item($recup['champ' . $i]);
                }
            }
            for ($i = 1; $i <= $data['nb_champ']; $i++) {
                $data['form']['champ' . $i] = str_replace(' ', '_', $data['form']['champ' . $i]);
            }
            $page = 'formulaire';

        }

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            //oops y'a pas ce fichier !!!
            show_404();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer', $data);

    }

    public function form($id)
    {
        $g = $this->input->post('nb_champ');
        $this->load->model('Form_model');
        $this->load->model('Pages_model');
        $tab_page = $this->Pages_model->get_page_by_id($id);
        $type_contact = $tab_page[0]['nom'];
        $get_column = str_replace('-', '_', $tab_page[0]['nom']);
        $nom_colonnes = $this->Form_model->get_column_name($get_column);
        $this->load->model('Liste_model');
        $recup = $this->Form_model->get_form($id);
        $mail_dest = [];
        $mail_client = null;
        $nb_champ = $this->Form_model->nb_champ($id);
        $array = [];
        $array['file_to_attached'] = '';
        $array_bdd = [];
        for ($i = 1; $i <= $nb_champ; $i++) {
            $array_champ = [];
            if ($recup['type' . $i] == 'liste') {
                $liste = $this->Liste_model->get_liste($g);
                $nom_col = str_replace(' ', '_', $liste['nom_champ']);
                $rep_xss = $this->input->post($nom_col);
                $array[$nom_col] = $rep_xss;
                $array_bdd[$nom_col] = $rep_xss;
                $array_champ[] = $nom_col;
                $liste_mail = $this->Liste_model->get_mail_by_liste($g);
                if ($liste_mail != false) {
                    $mail_dest = $liste_mail;
                }
            } else if ($recup['type' . $i] == 'file') {
                $champ = str_replace(' ', '_', $recup['champ' . $i]);
                $file = $this->input->post($champ);
                //on vérifie que le fichier n'est pas vérollé
                if ($this->security->xss_clean($file, true) === false) {
                    echo "c pas bien";
                } else {
                    $config['upload_path'] = "./ressources/doc_citoyen/";
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|xls|doc|docx';
                    $config['max_size'] = 10000000;
                    $config['max_width'] = 10000;
                    $config['max_height'] = 10000;
                    $config['overwrite'] = true;

                    //upload la photo vers le serveur
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload($champ)) {
                        $data = array('upload_data' => $this->upload->data());
                        $rep_xss = '/ressources/doc_citoyen/' . $data['upload_data']['orig_name'];
                        $array[$champ] = $rep_xss;
                        $array_bdd[$champ] = $rep_xss;
                        $array_champ[] = $champ;
                        $array['file_to_attached'] = $rep_xss;
                    } else {
                        $array[$champ] = '';
                        $array_bdd[$champ]= '';
                        $array_champ[] = $champ;
                    }
                }

            } else {
                $champ = str_replace(' ', '_', $recup['champ' . $i]);
                $rep = $this->input->post($champ);
                $rep_xss = $this->security->xss_clean($rep);
                $array_bdd[$champ]= $rep_xss;
                if ($recup['type' . $i] == 'date') {
                    $expl = explode('-', $rep_xss);
                    $rev = array_reverse($expl);
                    $rep_xss = implode('-', $rev);
                }
                $array[$champ] = $rep_xss;
                $array_champ[] = $champ;
            }if ($recup['type' . $i] == 'email') {
                $champ = str_replace(' ', '_', $recup['champ' . $i]);
                $rep = $this->input->post($champ);
                $mail_client = $this->security->xss_clean($rep);

            }
        }

        //on doit envoyer le mail à combien de destinataires ?
        $nb_dest = $this->Form_model->mail_dest($id);

        for ($r = 1; $r <= $nb_dest; $r++) {
            $mail_dest[] = $recup['mail_dest' . $r];
        }

        //var_dump($mail_dest); var_dump($array);die;
        $champ_pour_mail = [];
        foreach ($nom_colonnes as $nc) {
            if ($nc['COLUMN_NAME'] != 'id_du_formulaire' && $nc['COLUMN_NAME'] != 'date_enregistrement') {
                $champ_pour_mail[] = $nc['COLUMN_NAME'];
            }
        }
       
        $this->load->model('Bddcit_model');
        $this->Bddcit_model->create($array_bdd,$id,$g);
       if ($mail_client != null) {
            Pages::send_mail($array, $champ_pour_mail, $mail_dest, $mail_client);
        }
        Pages::view($this->input->post('page'), true);
    }

    public function send_mail($array, $champ_pour_mail, $mail_dest, $mail_client)
    {
        //préparation du mail
        $mess = '<table align="center" border="0" cellspacing="0" width="100%">
        <tbody><tr>
        <td></td>
        <td width="550" style="text-align:center">
        <img src="' . base_url() . 'assets\site\img\logos\logo2.gif" style="vertical-align:middle" alt="Logo de la ville de Oignies">
        <h1 align="center" style="margin-top:10px;margin-bottom:30px;font-size:22px;color:rgb(147, 19, 143);font-family:"Titillium Web, sans-serif;">Confirmation de prise en <br> compte de votre demande </h1>
        <h5>Reprise des informations que vous nous avez fournis :</h5>
        <hr style="height:1px;background-color:rgb(147, 19, 143);border:0">
        <br>
        <table style="background-color:#f4f4f4;border:20px solid #f4f4f4;width:100%" cellspacing="0" cellpadding="0">
        <tbody>
        ';
        foreach ($champ_pour_mail as $champ) {
            $mess .= '<tr><td align="left"><div> <b style="color:#989898;font-family:"Titillium Web, sans-serif;">' . str_replace('_', ' ', $champ) . ' :</b></td></div><td width="20"></td> ';
            $mess .= '<td align="left"><div><b style="font-family:"Titillium Web, sans-serif;">' . $array[$champ] . '</b></div></td></tr>';
        }
        $mess .= '

        </tbody></table>
        <br>
        <br>
        <table cellspacing="0" cellpadding="0" style="width:100%;background-color:#f4f4f4">
        <tbody><tr>
        <b style="font-family:"Titillium Web, sans-serif;">Nous répondrons à votre demande dans les plus brefs délais.</b>
        <br>
        </td>
        </tr>
        <hr style="height:1px;background-color:rgb(147, 19, 143);border:0">
        </tbody></table>
        </td>
        <td></td>
        </tr>
        </tbody></table>"';

        //initialisation de la librairie
        $this->load->library('email');
        $this->load->library('email');
        $config['protocol'] = 'SMTP';
        $config['smtp_host'] = 'ssl0.ovh.net';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'ne-pas-repondre@bluestier.fr';
        $config['smtp_pass'] = 'Boubidou1';
        $config['crlf'] = '\r\n';
        $config['newline'] = '\r\n';
        $config['mailtype'] = 'html';
        $config['protocols'] = array('mail', 'sendmail', 'smtp');

        $this->email->initialize($config);
        $this->email->from('ne-pas-repondre@bluestier.fr', 'Votre Message');
        $this->email->to($mail_client);
        $nb_destinataires = sizeof($mail_dest);
        for ($i = 0; $i < $nb_destinataires; $i++) {
            $this->email->bcc($mail_dest[$i]);
        }
        $this->email->subject('Votre message auprès de la ville de Oignies');
        $this->email->message($mess);
        if ($array['file_to_attached'] != '') {
            $this->email->attach('.' . $array['file_to_attached']);
        }
        $this->email->send();

    }

    public function acces_rapide($id)
    {
        if ($id == -1) {
            $pagestab = $this->Pages_model->get_page('acces_rapide_page');
            $data['consult'] = $pagestab['consultvox'];
            $data['gen'] = $this->General_model->get();
            $data['black_or_white'] = strstr($data['gen']['entete'], 'white');
            $data['autocomplete'] = $this->Autocomplete_model->get();
            $data['header_item'] = $this->Header_model->get_menu();
            $data['sub_item'] = $this->Header_model->get_sousmenu();
            $data['third_item'] = $this->Header_model->get_thirdmenu();
            $data['personnaes_item'] = $this->Personnaes_model->get_personnaes();
            $data['type_de_page'] = $pagestab['type'];
            $data['background'] = base_url() . $pagestab['background'];
            $data['title'] = $pagestab['titre'];
            $data['subtitle'] = "";
            $data['css'] = 'home page page-parent page-template-default template-slider color-custom sticky-header layout-full-width ' . $data['gen']['entete'];
            $data['consultvox'] = $this->Consultvox_model->get();
            $this->load->view('templates/header', $data);
            $this->load->view('pages/acces_rapide', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $person = $this->Personnaes_model->get_personnaes($id);
            $array_des_pages = [];
            $nb_id_des_pages = $this->Personnaes_model->nbId();
            for ($a = 0; $a < $nb_id_des_pages; $a++) {
                if ($person['id_page' . $a] != null) {
                    $result = $this->Pages_model->get_page_by_id(intval($person['id_page' . $a]));
                    $array_des_pages[] = $result[0];
                }
            }

            $data['gen'] = $this->General_model->get();
            $data['black_or_white'] = strstr($data['gen']['entete'], 'white');
            $data['autocomplete'] = $this->Autocomplete_model->get();
            $data['page_item'] = $array_des_pages;
            //récupère les infos pour le header (menu, sousmenu...)
            $data['header_item'] = $this->Header_model->get_menu();
            $data['sub_item'] = $this->Header_model->get_sousmenu();
            $data['third_item'] = $this->Header_model->get_thirdmenu();
            $data['personnaes_item'] = $this->Personnaes_model->get_personnaes();
            $pagestab = $this->Pages_model->get_page('acces_rapide_page');
            $data['background'] = base_url() . $person['background'];
            $data['title'] = $pagestab['titre'];
            $data['subtitle'] = $person['nom'];
            $data['type_de_page'] = $pagestab['type'];
            $data['css'] = 'home page page-parent page-template-default template-slider color-custom sticky-header layout-full-width ' . $data['gen']['entete'];
            $data['consult'] = $pagestab['consultvox'];
            $data['consultvox'] = $this->Consultvox_model->get();
            $this->load->view('templates/header', $data);
            $this->load->view('pages/acces_rapide_page', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function search()
    {
        //creation du tableau des id_pages à afficher
        $tab_id_page = [];
        //création du tableau de resultat
        $result = [];
        $recherche_avant_clean = $this->input->post("search");
        $recherche = $this->security->xss_clean($recherche_avant_clean);

        //on met la recherhce dans la table pour future autocompletion
        $this->Autocomplete_model->create_word($recherche);

        //on charge les modèles
        $this->load->model('Articles_model');
        $this->load->model('Bulles_model');
        $this->load->model('Carroussel_model');
        $this->load->model('Document_model');
        $this->load->model('Sans_model');
        $this->load->model('Text_model');

        //on effectue la recherche
        $result_articles = $this->Articles_model->search($recherche);
        $result[] = $this->Pages_model->search($recherche);
        $result[] = $this->Bulles_model->search($recherche);
        $result[] = $this->Carroussel_model->search($recherche);
        $result[] = $this->Document_model->search($recherche);
        $result[] = $this->Sans_model->search($recherche);
        $result[] = $this->Text_model->search($recherche);
        $recherche_pour_page = str_replace(' ', '-', $recherche);
        $result_pages = $this->Pages_model->get_page($recherche_pour_page);

        if (!empty($result_pages)) {
            if (!in_array($result_pages['id_pages'], $tab_id_page)) {
                $tab_id_page[] = $result_pages['id_pages'];
            }
        }

        foreach ($result as $r) {
            if (!empty($r)) {
                $size_array = sizeof($r);
                for ($i = 0; $i < $size_array; $i++) {
                    if (!in_array($r[$i]['id_pages'], $tab_id_page)) {
                        $tab_id_page[] = $r[$i]['id_pages'];
                    }
                }
            }
        }
        foreach ($result_articles as $r) {
            if (!empty($r)) {
                $size_array = sizeof($r);
                for ($i = 0; $i < $size_array; $i++) {
                    if (!in_array($r[$i]['id_pages'], $tab_id_page)) {
                        $tab_id_page[] = $r[$i]['id_pages'];
                    }
                }
            }
        }

        $data['pages_item'] = [];

        foreach ($tab_id_page as $tab) {
            $array = $this->Pages_model->get_page_by_id($tab);
            if (!empty($array)) {
                $data['pages_item'][] = $array[0];
            }
        }

        $data['search'] = $recherche;
        $data['gen'] = $this->General_model->get();
        $data['black_or_white'] = strstr($data['gen']['entete'], 'white');
        $data['autocomplete'] = $this->Autocomplete_model->get();
        //récupère les infos pour le header (menu, sousmenu...)
        $data['header_item'] = $this->Header_model->get_menu();
        $data['sub_item'] = $this->Header_model->get_sousmenu();
        $data['third_item'] = $this->Header_model->get_thirdmenu();
        $data['personnaes_item'] = $this->Personnaes_model->get_personnaes();
        $data['type_de_page'] = '';
        $pagestab = $this->Pages_model->get_page('recherche');
        $data['background'] = base_url() . $pagestab['background'];
        $data['title'] = $pagestab['titre'];
        $data['subtitle'] = '';
        $data['consultvox'] = $this->Consultvox_model->get();
        $data['consult'] = $pagestab['consultvox'];
        $data['css'] = 'home page page-parent page-template-default template-slider color-custom sticky-header layout-full-width header-dark header-bg';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/recherche', $data);
        $this->load->view('templates/footer', $data);
    }
}
