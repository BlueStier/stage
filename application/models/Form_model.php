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
                $array["champ".$i] = $this->input->post("champ".$i);
                if($this->input->post("ch".$i)!== NULL){
                    $array["ob".$i] = TRUE;
                }else{
                    $array["ob".$i] = FALSE;
                }
            }
             
            //et on l'injecte en BDD
            $this->db->insert('formulaire',$array);
            
        }

}
