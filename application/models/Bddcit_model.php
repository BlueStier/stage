<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Bddcit_model extends CI_Model
{
    private $bdd;
    //constructeur charge la classe permettant l'interrogation de la base de données
    public function __construct()
    {
        $this->load->model('Form_model');
        $this->load->model('Liste_model');
        $this->load->model('Pages_model');
        $this->load->library('encryption');
        $this->load->database();
        $this->bdd = $this->db;
    }

    public function get_cit($array = false, $id = false)
    {
        /*si il n'y a pas 'array en paramètres ou d'id on retourne la totalité
        de la table*/
        if ($array === false && $id === false) {
            $array = $this->bdd->get('citoyen')->result_array();
            $taille_de_array = sizeof($array);
            for ($h = 0; $h < $taille_de_array; $h++) {
                $array[$h]['nom'] = $this->encryption->decrypt($array[$h]['nom']);
                $array[$h]['prenom'] = $this->encryption->decrypt($array[$h]['prenom']);
                $array[$h]['adresse'] = $this->encryption->decrypt($array[$h]['adresse']);
                $array[$h]['email'] = $this->encryption->decrypt($array[$h]['email']);
                $array[$h]['tel'] = $this->encryption->decrypt($array[$h]['tel']);
                $array[$h]['type_contact'] = $array[$h]['type_contact'];
            }
            return $array;
        }
        /*si un tableau est en paramètre on recherche en fonction du tableau*/
        if ($array != false && !empty($array)) {
            $str = 'SELECT * from citoyen where ';
            if (isset($array['nom']) && !empty($array['nom'])) {
                $str .= "nom='" . $array['nom'] . "'";
            }
            if (isset($array['prenom']) && !empty($array['prenom'])) {
                $str .= " or prenom='" . $array['prenom'] . "'";
            }

            return $this->bdd->query($str)->row_array();
        }
        if ($id != false) {
            $return = [];
            $result = $this->bdd->get_where('citoyen', array('id_citoyen' => $id))->row_array();
            $return['id_citoyen'] = $result['id_citoyen'];
            $return['nom'] = $this->encryption->decrypt($result['nom']);
            $return['prenom'] = $this->encryption->decrypt($result['prenom']);
            $return['adresse'] = $this->encryption->decrypt($result['adresse']);
            $return['email'] = $this->encryption->decrypt($result['email']);
            $return['tel'] = $this->encryption->decrypt($result['tel']);
            $return['type_contact'] = $result['type_contact'];
            $return['date'] = $result['date'];
            return $return;
        }

    }

    public function get_message($id = false)
    {
        if ($id === false) {
            return $this->bdd->get('message')->result_array();
        } else {
            return $this->bdd->get_where('message', array('id_citoyen' => $id))->row_array();
        }
    }

    public function get_cit_avec_messages($id = false)
    {
        if ($id === false) {
            $array_des_citoyens = Bddcit_model::get_cit();
            $array_de_sortie = [];
            foreach ($array_des_citoyens as $citoyen):
                $array_message = Bddcit_model::get_message($citoyen['id_citoyen']);
                $size_of_message = sizeof($array_message);
                if ($size_of_message > 0) {
                    $array_complete = [
                        'id_citoyen' => $citoyen['id_citoyen'],
                        'nom' => $citoyen['nom'],
                        'prenom' => $citoyen['prenom'],
                        'adresse' => $citoyen['adresse'],
                        'tel' => $citoyen['tel'],
                        'email' => $citoyen['email'],
                        'date' => $citoyen['date'],
                        'message' => $this->encryption->decrypt($array_message['message']),
                        'mail_dest' => $this->encryption->decrypt($array_message['mail_dest']),
                        'service' => $this->encryption->decrypt($array_message['service']),
                        'file' => $this->encryption->decrypt($array_message['file']),
                        'envoi' => $array_message['envoi'],
                        'type_contact' => $citoyen['type_contact'],
                    ];
                    $array_de_sortie[] = $array_complete;
                }
            endforeach;

            return $array_de_sortie;
        } else {
            $array_de_sortie = [];
            $citoyen = Bddcit_model::get_cit(false, $id);
            $array_message = Bddcit_model::get_message($id);
            $array_de_sortie = [
                'id_citoyen' => $citoyen['id_citoyen'],
                'nom' => $citoyen['nom'],
                'prenom' => $citoyen['prenom'],
                'adresse' => $citoyen['adresse'],
                'tel' => $citoyen['tel'],
                'email' => $citoyen['email'],
                'date' => $citoyen['date'],
                'message' => $this->encryption->decrypt($array_message['message']),
                'mail_dest' => $this->encryption->decrypt($array_message['mail_dest']),
                'service' => $this->encryption->decrypt($array_message['service']),
                'file' => $this->encryption->decrypt($array_message['file']),
                'envoi' => $array_message['envoi'],
                'type_contact' => $citoyen['type_contact'],
            ];
            return $array_de_sortie;
        }
    }

    public function get_type_contact()
    {
        $query = $this->db->query("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME like 'id_du_formulaire'")->result_array();
        $size_query = sizeof($query);
        $sortie = [];
        for($a = 0; $a < $size_query; $a++){
        $sortie[] = $query[$a]['TABLE_NAME'];
        }
        return $sortie;
    }

   public function get_table_name(){
    return $this->db->query("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME like 'id_du_formulaire'")->result_array();
   }

   public function get_column_name($nom){
       return $this->db->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME like '".$nom."'")->result_array();
   }

    public function get_data(){
        $query = Bddcit_model::get_table_name();
        $size_query = sizeof($query);
        $sortie = [];
        for($a = 0; $a < $size_query; $a++){
        $nom_table[] = $query[$a]['TABLE_NAME'];        
        }

        $taille_table = sizeof($nom_table);
        for($b=0; $b < $taille_table; $b++){
            $sortie[$nom_table[$b]] = Bddcit_model::extract_data($nom_table[$b]);
        }        
        return $sortie;

    }
    public function extract_data($nom){
        $array = $this->bdd->get($nom)->result_array();
        $size_array = sizeof($array);
        $nom_colonne = Bddcit_model::get_column_name($nom);       
        $response = [];
        $size_nom_colonne = sizeof($nom_colonne);
        
        for($b = 0; $b < $size_array; $b++){
            for($c = 0; $c < $size_nom_colonne; $c++){
                if($nom_colonne[$c]['COLUMN_NAME'] != 'id_du_formulaire' &&  $nom_colonne[$c]['COLUMN_NAME'] != 'date_enregistrement'){
                    $array[$b][$nom_colonne[$c]['COLUMN_NAME']] = $this->encryption->decrypt($array[$b][$nom_colonne[$c]['COLUMN_NAME']]);
                }else{
                    $array[$b][$nom_colonne[$c]['COLUMN_NAME']] = $array[$b][$nom_colonne[$c]['COLUMN_NAME']];
                }
            }
        }       
        return $array;
    }

    public function create($array, $id, $g)
    {
        $array_a_enregistrer = [];
        $form = $this->Form_model->get_form($id);
        $nb_champ = $this->Form_model->nb_champ($id);
        $colonne = [];
        for ($i = 1; $i <= $nb_champ; $i++) {
            if ($form['type' . $i] != 'liste') {
                $nom_col = str_replace(' ', '_', $form['champ' . $i]);
            } else {
                $liste = $this->Liste_model->get_liste($g);
                $nom_col = str_replace(' ', '_', $liste['nom_champ']);
            }
            $colonne[] = $nom_col;
        }
        $array_size = sizeof($array);
        for ($d = 0; $d < $array_size; $d++) {
            $array_a_enregistrer[$colonne[$d]] = $this->encryption->encrypt($array[$colonne[$d]]);
        }
        $tab_page = $this->Pages_model->get_page_by_id($id);
        $nom_table = str_replace('-','_',$tab_page[0]['nom']);
        $this->bdd->set('date_enregistrement','NOW()',FALSE);
        $this->bdd->insert($nom_table,$array_a_enregistrer);       

    }

    public function delete($page,$id)
    {
        $this->bdd->delete($page, array('id_du_formulaire' => $id));
        
    }

    public function excel($array, $id_table, $page)
    {
        $type_contact = Bddcit_model::get_type_contact();
        $nom_du_fichier = $type_contact[$id_table]['type_contact'] . "-" . date("m-d-y");
        $excel_a_creer = [];
        $excel_a_creer[] = ['ID', 'Nom', 'Prénom', 'Adresse', 'Téléphone', 'Email', 'Date de naissance', 'Message', 'Mail destinataire'
            , 'service', 'fichier', "Date d'envoi", 'page de contact'];
        foreach ($array as $a):
            $recup = Bddcit_model::get_cit_avec_messages($a);
            $excel_a_creer[] = [
                $recup['id_citoyen'],
                $recup['nom'],
                $recup['prenom'],
                $recup['adresse'],
                $recup['tel'],
                $recup['email'],
                $recup['date'],
                $recup['message'],
                $recup['mail_dest'],
                $recup['service'],
                $recup['file'],
                $recup['envoi'],
                $recup['type_contact'],
            ];
        endforeach;
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray($excel_a_creer);
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $nom_du_fichier . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output'); // download file

    }

    public function excel_total()
    {
        $nom_du_fichier = 'informations_globales' . "-" . date("m-d-y");
        $donnees = Bddcit_model::get_cit_avec_messages();
        $excel_a_creer = [];
        $excel_a_creer[] = ['ID', 'Nom', 'Prénom', 'Adresse', 'Téléphone', 'Email', 'Date de naissance', 'Message', 'Mail destinataire'
            , 'service', 'fichier', "Date d'envoi", 'page de contact'];
        foreach ($donnees as $recup):
            $excel_a_creer[] = [
                $recup['id_citoyen'],
                $recup['nom'],
                $recup['prenom'],
                $recup['adresse'],
                $recup['tel'],
                $recup['email'],
                $recup['date'],
                $recup['message'],
                $recup['mail_dest'],
                $recup['service'],
                $recup['file'],
                $recup['envoi'],
                $recup['type_contact'],
            ];
        endforeach;
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray($excel_a_creer);
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $nom_du_fichier . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output'); // download file
    }
}
