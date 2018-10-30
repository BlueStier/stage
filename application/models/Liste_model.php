<?php
class Liste_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
        }


        //fonction d'extraction des données de le bdd pour un formulaire
        public function get_liste($id = FALSE)
        {
                if ($id === FALSE)
                {
                        //récupération des éléments                 
                        $query = $this->db->get('liste');                
                        return $query->result_array();
                }
                return $this->db->get_where('liste', array('id_liste' => $id))->row_array();
        }

        //fonction récupérant le nbre d'item d'un liste
        public function nb_item($id){
            $query = $this->db->query("SELECT COUNT(*) AS 'nb_item' FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'liste' and COLUMN_NAME like 'titreitem%'")->row_array();
            $nb_item = $query['nb_item'];
            $nb = 0;
            $array = Liste_model::get_liste($id);

            for($a = 1; $a <= $nb_item; $a++){
                if($array['titreitem'.$a] != NULL){
                    $nb++;
                }
            }
            return $nb;
        }

        //fonction de creation et d'enregistrement d'un formulaire en bdd
        public function create($id_pages,$nb_liste){            
            //on récupère le nombre de champ à mettre dans le formulaire
            $nb_item = $this->input->post('nbitembyliste'.$nb_liste);

            //la table formulaire contient combien de colonne pour enregistrer les champs?
            $query = $this->db->query("SELECT COUNT(*) AS 'nb_item' FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'liste' and COLUMN_NAME like 'titreitem%'")->row_array();
            
            $nb_table = $query['nb_item'];
            //si la table est plus petite que le nb de champ  insérer on la modifie
            if($nb_item > $nb_table){
                $deb = $nb_table + 1;
                for($deb; $deb <= $nb_item; $deb++){
                    $str1 = "ALTER TABLE liste ADD titreitem".$deb." VARCHAR(100)";
                    $this->db->query($str1);
                    $str2 = "ALTER TABLE liste ADD mailitem".$deb." VARCHAR(256)";
                    $this->db->query($str2);                    
                }
                
            }
            //on récupère le dernier id de la table liste
            $idquery = $this->db->query("SELECT MAX(id_liste) as 'id' FROM liste")->row_array();
            $id_liste = $idquery['id'] + 1;
            //récupère les données de l'utilisateur            
            $array["id_liste"] = $id_liste;
            $array["id_pages"] =  $id_pages;
            $array["nom_champ"] = $this->input->post("champ".$nb_liste);

            for($i = 1; $i <= $nb_item; $i++){
                $array["titreitem".$i] = $this->input->post($nb_liste."titreitem".$i);
                $array["mailitem".$i] = $this->input->post($nb_liste."mailitem".$i);                
            }
             
            //et on l'injecte en BDD
            var_dump($array);
            echo $id_liste;            
            //$this->db->insert('liste',$array);
            return $id_liste;
            
        }

        public function delete($id){
            $this->db->delete('liste', array('id_liste' => $id));
        }

        public function supItem($id_a_modif,$n){
            $liste = Liste_model::get_liste($id_a_modif);
            $nb_item = Liste_model::nb_item($id_a_modif);
            for($i = $n; $i < $nb_item; $i++){
                $liste['titreitem'.$i] = $liste['titreitem'.($i+1)];
                $liste['mailitem'.$i] = $liste['mailitem'.($i+1)];
                
            }
            $liste['titreitem'.$nb_item] = NULL;
            $liste['mailitem'.$nb_item] = NULL;
            $this->db->replace('liste',$liste);
        }

}
