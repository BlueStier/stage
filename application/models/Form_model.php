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
                return $this->db->get_where('formulaire', array('id_pages' => $id))->row_array();
        }

        //fonction permettant de récupérer le nombre de champ dans un formulaire
        public function nb_champ($id){
            $query = $this->db->query("SELECT COUNT(*) AS 'nb_table' FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'formulaire' and COLUMN_NAME like 'type%'")->row_array();
            $nb_table = $query['nb_table'];
            $nb = 0;
            $array = Form_model::get_form($id);
            for($i = 1; $i <= $nb_table; $i++ ){
                if($array['type'.$i] != NULL){
                    $nb++;
                }
            }
            return $nb;
        }

        //fonction permettant de récupérer le nombre de mail de destinataire dans un formulaire
        public function mail_dest($id){
            $query = $this->db->query("SELECT COUNT(*) AS 'nb_mail' FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'formulaire' and COLUMN_NAME like 'mail_dest%'")->row_array();
            $nb_table = $query['nb_mail'];
            $nb = 0;
            $array = Form_model::get_form($id);
            for($i = 1; $i <= $nb_table; $i++ ){
                if($array['mail_dest'.$i] != NULL){
                    $nb++;
                }
            }
            return $nb;
        }

        public function augNBCol($n,$bool){
            if($bool){
            //la table formulaire contient combien de colonne pour enregistrer les champs?
            $query = $this->db->query("SELECT COUNT(*) AS 'nb_table' FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'formulaire' and COLUMN_NAME like 'type%'")->row_array();
            
            $nb_table = $query['nb_table'];
            //si la table est plus petite que le nb de champ  insérer on la modifie
            if($n > $nb_table){
                $deb = $nb_table + 1;
                for($deb; $deb <= $n; $deb++){
                    $str1 = "ALTER TABLE formulaire ADD type".$deb." VARCHAR(100)";
                    $this->db->query($str1);
                    $str2 = "ALTER TABLE formulaire ADD champ".$deb." TEXT";
                    $this->db->query($str2);
                    $str3 = "ALTER TABLE formulaire ADD ob".$deb." BOOLEAN";
                    $this->db->query($str3);
                }

            }
            }else{
            //combien de colonne de type adresse mail contient la table formulaire ?
            $query2 = $this->db->query("SELECT COUNT(*) AS 'mail_table' FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'formulaire' and COLUMN_NAME like 'mail_dest%'")->row_array();
            
            $mail_table = $query2['mail_table'];
            //si la table est plus petite que le nb de champ  insérer on la modifie
            if($n > $mail_table){
            $a = $mail_table + 1;
            for($a; $a <= $n; $a++){
            $str4 = "ALTER TABLE formulaire ADD mail_dest".$a." VARCHAR(100)";
            $this->db->query($str4);
     }

 }
            }
        }

        //fonction de creation et d'enregistrement d'un formulaire en bdd
        public function create($id_pages){
            //on récupère le nombre de champ à mettre dans le formulaire
            $nb_champ = $this->input->post('nbform');

            Form_model::augNBCol($nb_champ,TRUE);
            
            //récupère les données de l'utilisateur
            $array = ["id_pages" => $id_pages];
            $array['intro'] = $this->input->post("intro_form");

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

            Form_model::augNBCol($nb_mail,FALSE);
            
            //récupère les champs d'adresse mail
            for($b = 1; $b <= $nb_mail ; $b++){
                $atester = $this->input->post('mail_dest'.$b);
                //concatène avec @oignies.fr
                $array["mail_dest".$b] = $atester."@oignies.fr";
            } 
            //et on l'injecte en BDD
            $this->db->insert('formulaire',$array);
            
        }

        public function supChamp($id_a_modif,$n){
            $form = Form_model::get_form($id_a_modif);
            $nb_champ = Form_model::nb_champ($id_a_modif);
            for($i = $n; $i < $nb_champ; $i++){
                $form['type'.$i] = $form['type'.($i+1)];
                $form['champ'.$i] = $form['champ'.($i+1)];
                $form['ob'.$i] = $form['ob'.($i+1)];  
            }
                $form['type'.$nb_champ] = "";
                $form['champ'.$nb_champ] = "";
                $form['ob'.$nb_champ] = "";
            $this->db->replace('formulaire',$form);
        }

        public function supMail($id_a_modif,$n){
            $form = Form_model::get_form($id_a_modif);
            $query2 = $this->db->query("SELECT COUNT(*) AS 'mail_table' FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'formulaire' and COLUMN_NAME like 'mail_dest%'")->row_array();
            
            $mail_table = $query2['mail_table'];
            for($d = $n; $d < $mail_table; $d++){
                $form['mail_dest'.$d] = $form['mail_dest'.($d+1)];
            }
            $form['mail_dest'.$mail_table] = "";
            $this->db->replace('formulaire',$form);
        }

        public function update($id){
            //extraction des données de la bdd concernant ce formulaire
            $array = Form_model::get_form($id);
             //on récupère le nombre de champ à mettre dans le formulaire
             $nb_champ = $this->input->post('nbform2');

             Form_model::augNBCol($nb_champ,TRUE);
             
             //récupère les données de l'utilisateur             
             $array['intro'] = $this->input->post("intro_form");
 
             for($i = 1; $i <= $nb_champ; $i++){
                 $array["type".$i] = $this->input->post("input".$i);
                 if($array["type".$i] == 'liste'){
                     //si le champ est du type liste on insert la liste dans la table correspondant
                     //et on récupère l'id  
                     $this->load->model('Liste_model');
                     $array["champ".$i] = $this->Liste_model->create($id,$i);                     
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
            
             Form_model::augNBCol($nb_mail,FALSE);
             
             //récupère les champs d'adresse mail
             for($b = 1; $b <= $nb_mail ; $b++){
                 $atester = $this->input->post('mail_dest'.$b);
                 //concatène avec @oignies.fr
                 $array["mail_dest".$b] = $atester."@oignies.fr";
             } 
             //et on l'injecte en BDD
             $this->db->replace('formulaire',$array);
            
         }
        
}
