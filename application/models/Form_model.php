<?php
class Form_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
        }


        //fonction d'extraction des données de le bdd pour un formulaire
        public function get_form($id = FALSE)
        {
                if ($id === FALSE)
                {
                        //récupération des éléments                 
                        $query = $this->db->get('formulaire');                
                        return $query->result_array();
                }
                return $this->db->get_where('formulaire', array('id_form' => $id))->row_array();
        }

        //fonction de creation et d'enregistrement d'un formulaire en bdd
        public function create($id_pages){
            //on récupère le nombre de champ à mettre dans le formulaire
            $nb_champ = $this->input->post('nbform');

            //la table formulaire contient combien de colonne pour enregistrer les champs?
            $query = $this->db->query("SELECT COUNT(*) AS 'nb_table' FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'formulaire' and COLUMN_NAME like 'type%'")->row_array();
            
            $nb_table = $query['nb_table'];
            //si la table est plus petite que le nb de champ  insérer on la modifie
            if($nb_champ > $nb_table){
                $deb = $nb_table + 1;
                for($deb; $deb <= $nb_champ; $deb++){
                    $str1 = "ALTER TABLE formulaire ADD type".$deb." VARCHAR(100)";
                    $this->db->query($str1);
                    $str2 = "ALTER TABLE formulaire ADD champ".$deb." VARCHAR(256)";
                    $this->db->query($str2);
                    $str3 = "ALTER TABLE formulaire ADD ob".$deb." BOOLEAN";
                    $this->db->query($str3);
                }

            }
            
            //récupère les données de l'utilisateur
            $array = ["id_pages" => $id_pages];

            for($i = 1; $i <= $nb_champ; $i++){
                $array["type".$i] = $this->input->post("input".$i);
                if($array["type".$i] == 'liste'){
                    //si le champ est der type liste on insert la liste dans la table correspondant
                    //et on récupère l'id  
                    $this->load->model('Liste_model');
                    $array["champ".$i] = $this->Liste_model->create($id_pages,$i);
                }else{
                $array["champ".$i] = $this->input->post("champ".$i);
                }
                //défini si le champ est obligatoire ou pas
                if($this->input->post("ch".$i)!== NULL){
                    $array["ob".$i] = TRUE;
                }else{
                    $array["ob".$i] = FALSE;
                }
            }

            //combien d'adresse mail de destinataire ?
            $nb_mail = $this->input->post('nbmail');

            //combien de colonne de type adresse mail contient la table formulaire ?
            $query = $this->db->query("SELECT COUNT(*) AS 'mail_table' FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'formulaire' and COLUMN_NAME like 'mail_dest%'")->row_array();
            
            $mail_table = $query['mail_table'];
            //si la table est plus petite que le nb de champ  insérer on la modifie
            if($nb_mail > $mail_table){
                $a = $mail_table + 1;
                for($a; $a <= $nb_mail; $a++){
                    $str4 = "ALTER TABLE formulaire ADD mail_dest".$a." VARCHAR(100)";
                    $this->db->query($str4);
                }

            }
            
            //récupère les champs d'adresse mail
            for($b = 1; $b <= $nb_mail ; $b++){
                $atester = $this->input->post('mail_dest'+$b);
                //si le mail contient bien @oignies.fr on le met dans l'array
                if(strpos($atester, '@oignies.fr')){
                    $array["mail_dest".$b];
                }else{
                    $data["error_mail"] = "au moins une adresse mail n'est pas valide";
                    $this->load->model('Pages_model');                    
                    $data['header_item'] = $this->Header_model->get_menu();
                    $data['sub_item'] = $this->Header_model->get_sousmenu();
                    $data['third_item'] = $this->Header_model->get_thirdmenu();            
                    $data['type_item'] = $this->Pages_model->get_type();
                    $this->load->view('cms/header',$data);
                    $this->load->view('cms/left_menu',$data);
                    $this->load->view('cms/createPages', $data);
                    $this->load->view('cms/footer'); 
                }
            } 
            //et on l'injecte en BDD
            $this->db->insert('formulaire',$array);
            var_dump($array);
        }

}
