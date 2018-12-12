<?php
class Pages extends CI_Controller {        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Header_model');
            $this->load->model('Rapide_model');
            $this->load->model('Pages_model');
            $this->load->helper('url_helper','security_helper');
            $this->load->library('form_validation');
        }

        public function index(){
                Pages::view('home');
        }
        //construit la page demandée 
        public function view($page, $str = FALSE){       
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
                $data['css'] = 'page page-child page-template-default  with_aside aside_right color-custom sticky-header layout-full-width header-dark header-bg';                

                $page = 'portfolio';  
        }
        if($pagestab['type'] == 'text'){
                $this->load->model('Text_model');
                $data['text_item'] = $this->Text_model->get_text($pagestab['id_pages']);
                $page = 'text';  
        }
        if($pagestab['type'] == 'sans'){
                $this->load->model('Sans_model');
                $data['text_item'] = $this->Sans_model->get_sans($pagestab['id_pages']);
                $page = 'text';  
        }
        if($pagestab['type'] == 'home'){
                $this->load->model('Home_model');
                $data['home_item'] = $this->Home_model->get_home($pagestab['id_pages']);
                $data['css'] = 'home page page-parent page-template-default template-slider color-custom sticky-header layout-full-width header-dark header-bg';
                $page = 'home';  
        }
        if($pagestab['type'] == 'carroussel'){
                $this->load->model('Carroussel_model');
                $data['car_item'] = $this->Carroussel_model->get_car($pagestab['id_pages']);
                $data['photo_item'] = $this->Carroussel_model-> read_all_files($data['car_item'][0]['path']);
                $data['path'] = $data['car_item'][0]['path'];
                $data['css'] = 'home page page-parent page-template-default template-slider color-custom sticky-header layout-full-width header-dark header-bg';                $page = 'carrousel2';  
        }
        if($pagestab['type'] == 'article'){
                $this->load->model('Articles_model');
                $recup = $this->Articles_model->get_article($pagestab['id_pages'],TRUE);
                $id = $recup[0]['id_articlespage'];
                $data['intro']=$recup[0]['text'];
                $data['article_item'] = $this->Articles_model->get_article_by_page($id,FALSE);
                $data['css'] = 'page page-id-289 page-child parent-pageid-131 page-template-default  with_aside aside_right color-custom sticky-header layout-full-width header-dark header-bg';                
                $page = 'article';  
        }
        if($pagestab['type'] == 'document'){
                $this->load->model('Document_model');
                $data['doc_item'] = $this->Document_model->get_document($pagestab['id_pages']);
                $pathname = './'.$data['doc_item'][0]['path'];
                $data['folder'] = $this->Document_model->read_all_files($pathname);
                $data['file'] = [];
                foreach($data['folder']as $f):
                    $data['file'][$f] =  $this->Document_model->read_all_files($pathname.'/'.$f);
                endforeach;
                $page = 'document';          
        } 
        if($pagestab['type'] == 'formulaire'){
                $this->load->model('Form_model');
                $this->load->model('Liste_model');
                $recup = $this->Form_model->get_form($pagestab['id_pages']);
                $data['css'] = 'page page-id-165 page-child parent-pageid-131 page-template-default  with_aside aside_right color-custom sticky-header layout-full-width header-dark header-bg';
                if($str != FALSE){
                $data['message'] = "Votre demande à bien été transmise nous vous en remercions.";
        }
                $data['page'] = $page;
                $data['id'] = $pagestab['id_pages'];               
                $data['intro'] = $recup['intro'];
                $data['form'] = $recup;
                $data['nb_champ'] = $this->Form_model->nb_champ($pagestab['id_pages']);
                for($i = 1; $i <= $data['nb_champ']; $i++){
                        //on vérifie si on à une liste dans les champs
                        if($recup['type'.$i] == 'liste'){
                                $data['liste'] = $this->Liste_model->get_liste($recup['champ'.$i]);
                                $data['nb_item'] =  $this->Liste_model->nb_item($recup['champ'.$i]);
                        }
                }              
                $page = 'formulaire';
                  
        }    
       
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                //oops y'a pas ce fichier !!!
                show_404();
        }

        $this->load->view('templates/header',$data); 
        $this->load->view('pages/'.$page,$data);        
        $this->load->view('templates/footer');
        
}

        public function form($id){
                $nom = $prenom = $adresse = $email = $message = $nombre = $liste = $date = $file = $tel = '';
                $service = 0;
                $this->load->model('Form_model');
                $this->load->model('Pages_model');
                $tab_page = $this->Pages_model->get_page_by_id($id);
                $type_contact = $tab_page[0]['nom']; 
                $this->load->model('Liste_model');
                $recup = $this->Form_model->get_form($id);
                $mail_dest = $recup['mail_dest1'].', ';
                $nb_champ = $this->Form_model->nb_champ($id);

                for($i = 1; $i <= $nb_champ; $i++){
                        switch($recup['type'.$i]){
                                //pour chaque cas on récupère les données et on rend inoffensives les attques javascript
                                case"nom" :
                                $n = $this->input->post('nom');
                                $nom = $this->security->xss_clean($n);                                
                                break;
                                case"prenom" :
                                $p = $this->input->post('prenom');
                                $prenom = $this->security->xss_clean($p);
                                break;
                                case"adresse" :
                                $a = $this->input->post('adresse');
                                $adresse = $this->security->xss_clean($a);
                                break;
                                case"email" :
                                $e = $this->input->post('email');
                                $email = $this->security->xss_clean($e);                                
                                break;
                                case"tel" :
                                $t = $this->input->post('tel');
                                $tel= $this->security->xss_clean($t);                                
                                break;
                                case"area" :
                                $m = $this->input->post('area');
                                $message = $this->security->xss_clean($m);                                
                                break; 
                                case"nb" :
                                $nb = $this->input->post('nb');
                                $nombre = $this->security->xss_clean($nb);
                                break;                
                                case"date" :
                                $da= $this->input->post('date');
                                $date = $this->security->xss_clean($da);                                
                                break;
                                case"liste" :
                                $liste = $this->input->post('liste');
                                $g = $this->input->post('nb_champ');
                                $this->load->model('Liste_model');
                                $arrayListe =  $this->Liste_model->get_liste($g);
                                $n = $this->Liste_model->nb_item($g);
                                for($v = 1; $v <= $n; $v++){
                                        if($arrayListe['titreitem'.$v] == $liste){
                                                $mail_dest .= $arrayListe['mailitem'.$v].', ';
                                                $service = 1;
                                        }
                                }
                                break;
                                case"file" :
                                $file = $this->input->post('file');
                                //on vérifie que le fichier n'est pas vérollé
                                if($this->security->xss_clean($file, TRUE) === FALSE){
                                        echo "c pas bien";
                                }else{                                        
                                $config['upload_path']= "./ressources/doc_citoyen/";
                                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|xls|doc|docx';
                                $config ['max_size'] = 10000000 ;
                                $config ['max_width'] = 10000 ;
                                $config ['max_height'] = 10000 ;
                                $config ['overwrite'] = false;
                        
                                //upload la photo vers le serveur
                                $this->load->library('upload', $config);
                                if($this->upload->do_upload('file'))
                                {
                                        $data = array('upload_data'=>$this->upload->data());
                                        $file = '/ressources/doc_citoyen/'.$data['upload_data']['orig_name']; 
                                }
                        }
                                break;                                        
                        }     

                }

                //on doit envoyer le mail à combien de destinataires ?
                $nb_dest = $this->Form_model->mail_dest($id);                

                for($r = 2; $r <= $nb_dest; $r++){
                        $mail_dest .= $recup['mail_dest'.$r].', '; 
                }
               
               $array =[
                       'nom' => $nom,
                       'prenom' => $prenom,
                       'adresse' => $adresse,
                       'tel'=>$tel,
                       'date' => $date,
                       'nb' => $nombre,
                       'message' => $message,
                       'mail_cit' => $email,
                       'mail_dest' => $mail_dest,
                       'liste'=> $liste,
                       'service' => $service,
                       'file' => $file,
                       'type_contact'=>$type_contact,                       
               ];
                
               $this->load->model('Bddcit_model'); 
               $this->Bddcit_model->create($array);           
               //Pages::send_mail($array);              
               Pages::view($this->input->post('page'), TRUE);
}

public function send_mail($array){
        //préparation du mail
        $message = "<h1>Bonjour ".$array['prenom']." ".$array['nom']."</h1><br><br><br> 
        Nous avons bien reçu votre demande.";

        if($array['liste'] !='' && $array['service'] == 1){                
                $message .= " Celle-ci est transmise au service ".$array['liste']."<br>";
        }
        
        $message .= " Nous y répondrons le plus rapidement possible.<br><br><br>
        Pour rappel voilà les informations que vous nous avez transmises :<br><br><br>
        Nom : ".$array['nom']."<br>Prenom : ".$array['prenom']."<br>"; 
       
        if($array['adresse'] !=''&& $array['service'] == 0){
                $message .= "Vous résidez au : ".$array['adresse']."<br>";
        }
        if($array['date'] !=''){
                $french_date = date("d-m-Y",strtotime($array['date']));
                $message .= "Date : ".$french_date."<br>";
        }
        if($array['liste'] !=''){                
                $message .= "Vous avez choisi : ".$array['liste']."<br>";
        }
        if($array['message'] !=''){
                $message .= 'Votre message :<br>'.$array['message']."<br><br>";
        }
        if($array['file']!=''){
                $message .= 'Vous retrouverez en pièce jointe le fichier que vous nous avez transmis.<br><br>';
        }
        $message .= "Nous vous remercions de nous avoir contactez.<br>Tous les agents de la commune vous souhaite une agréable journée.<br>";

        //initialisation de la librairie
        $this->load->library('email');
        $config['protocol'] = '';
        $config['smtp_host'] = '';
        $config['smtp_port'] = '';
        $config['smtp_user'] = 'lroussel2703@gmail.com';
        $config['smtp_pass'] = 'Boubidou1';           
        $config['crlf'] = '\r\n';
        $config['newline'] = '\r\n';
        $config['mailtype'] = 'html';
        
        $this->email->initialize($config);
        $this->email->from('lroussel2703@gmail.com', 'Votre Message');
        $this->email->to($array['mail_cit'].', '.$array['mail_dest']);
        $this->email->subject('Votre message auprès de la ville de Oignies');
        $this->email->message($message);
        if($array['file']!=''){
                $this->email->attach('.'.$array['file']);     
        }
        $this->email->send();
        
}
}