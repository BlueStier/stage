<?php
class Personnaes_model extends CI_Model
{

    //constructeur charge la classe permettant l'interrogation de la base de données
    public function __construct()
    {
        $this->load->database();
    }

    public function get_personnaes($id = false)
    {
        if ($id === false) {
            return $this->db->get('personnaes')->result_array();
        }
        return $this->db->get_where('personnaes', array('id_personnae' => $id))->row_array();
    }

    public function create($nom, $tab_des_pages, $background)
    {
        $taille = sizeof($tab_des_pages);
        personnaes_model::augNbCol($taille);

        $array_a_enregistré = [];
        $array_a_enregistré['nom'] = $nom;
        $array_a_enregistré['background'] = $background;
        for ($i = 0; $i < $taille; $i++) {
            $array_a_enregistré['id_page' . $i] = $tab_des_pages[$i];
        }
        //et on l'injecte en BDD
        $this->db->insert('personnaes', $array_a_enregistré);

    }

    public function update($id, $nom, $tab_des_pages, $background = FALSE)
    {        
        $taille = sizeof($tab_des_pages);
        personnaes_model::augNbCol($taille);

        $array_a_enregistré = personnaes_model::get_personnaes($id);
        $nb_id_page = personnaes_model::nbId();
        //supprime tous les id du tableau
        for ($i = 0; $i < $nb_id_page; $i++) {
                $array_a_enregistré['id_page' . $i] = null;
            }
        $array_a_enregistré['nom'] = $nom;
        for ($i = 0; $i < $taille; $i++) {
            $array_a_enregistré['id_page' . $i] = $tab_des_pages[$i];
        }
        if($background === FALSE){
        //et on l'injecte en BDD
        $this->db->replace('personnaes', $array_a_enregistré);
        }else{
            $array_a_enregistré['background'] = $background;
            $this->db->replace('personnaes', $array_a_enregistré);  
        }

    }

    public function augNbCol($taille)
    {
        //la table personnae contient combien de colonne pour enregistrer les id des pages?
        $query = $this->db->query("SELECT COUNT(*) AS 'nb_table' FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'personnaes' and COLUMN_NAME like 'id_page%'")->row_array();
        $nb_table = $query['nb_table'];
        //si la table est plus petite que le nb de champ  insérer on la modifie
        if ($taille > $nb_table) {
            $deb = $nb_table + 1;
            for ($deb; $deb <= $taille; $deb++) {
                $str1 = "ALTER TABLE personnaes ADD id_page" . $deb . " INTEGER";
                $this->db->query($str1);
            }
        }
    }

    //fonction pour rendre visible ou non l'article
    public function visibleOrNot($id)
    {
        //passe l'id en paramètre et récupère les infos de la bdd
        $result = $this->db->get_where('personnaes', array('id_personnae' => $id))->row_array();
        //petit ternaire qui va bien pour changer visible ou non
        $result['visible'] = ($result['visible']) ? false : true;
        //réinjection en bdd du changement
        $this->db->replace('personnaes', $result);
    }

    public function delete($id)
    {
       $this->db->delete('personnaes', array('id_personnae' => $id));
    }

    public function nbId(){
                //la table personnae contient combien de colonne pour enregistrer les id des pages?
        $query = $this->db->query("SELECT COUNT(*) AS 'nb_table' FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'personnaes' and COLUMN_NAME like 'id_page%'")->row_array();
        return $query['nb_table'];
    }
}
