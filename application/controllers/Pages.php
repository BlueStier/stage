<?php
class Pages extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Header_model');
            $this->load->model('Rapide_model');
            $this->load->model('Pages_model');
            $this->load->helper('url_helper');
            $this->load->library('form_validation');
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
                $page = 'bulle2';  
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
                $page = 'home2';  
        }
        if($pagestab['type'] == 'carroussel'){
                $this->load->model('Carroussel_model');
                $data['car_item'] = $this->Carroussel_model->get_car($pagestab['id_pages']);
                $data['photo_item'] = $this->Carroussel_model-> read_all_files($data['car_item'][0]['path']);
                $data['path'] = $data['car_item'][0]['path'];
                $page = 'carroussel';  
        }
        if($pagestab['type'] == 'article'){
                $this->load->model('Articles_model');
                $recup = $this->Articles_model->get_article($pagestab['id_pages'],TRUE);
                $id = $recup[0]['id_articlespage'];
                $data['intro']=$recup[0]['text'];
                $data['article_item'] = $this->Articles_model->get_article_by_page($id,FALSE);                
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
                $page = 'document2';          
        } 
        if($pagestab['type'] == 'formulaire'){
                $this->load->model('Form_model');
                $this->load->model('Liste_model');
                $recup = $this->Form_model->get_form($pagestab['id_pages']);
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

        
        
        if($page == 'arretes-municipaux'){
                $this->load->model('ArretesMunicipaux_model');
                $data['arretes'] = $this->ArretesMunicipaux_model->get_arretes();
                $page = 'arretes-municipaux';  
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

        $this->load->view('header/index2',$data);
        $this->load->view('pages/'.$page,$data);
        $this->load->view('templates/footer2');
        
}

        public function form($id){
                $nom = $prenom = $adresse = $email = $message = $nombre = $liste = $date ='';
                $service = 0;
                $this->load->model('Form_model');
                $this->load->model('Liste_model');
                $recup = $this->Form_model->get_form($id);
                $mail_dest = $recup['mail_dest1'].', ';
                $nb_champ = $this->Form_model->nb_champ($id);

                for($i = 1; $i <= $nb_champ; $i++){
                        switch($recup['type'.$i]){
                                case"nom" :
                                $nom = $this->input->post('nom');
                                break;
                                case"prenom" :
                                $prenom = $this->input->post('prenom');
                                break;
                                case"adresse" :
                                $adresse = $this->input->post('adresse');
                                break;
                                case"email" :
                                $email = $this->input->post('email');
                                break;
                                case"area" :
                                $message = $this->input->post('area');
                                break; 
                                case"nb" :
                                $nombre = $this->input->post('nb');
                                break;                
                                case"date" :
                                $date = $this->input->post('date');
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
                       'date' => $date,
                       'nb' => $nombre,
                       'message' => $message,
                       'mail_cit' => $email,
                       'mail_dest' => $mail_dest,
                       'liste'=> $liste,
                       'service' => $service,                       
               ]; 
                            
               Pages::send_mail($array);
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
        $this->email->send();
        
}
}