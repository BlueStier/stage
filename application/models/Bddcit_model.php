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

   

    public function get_message($id = false)
    {
        if ($id === false) {
            return $this->bdd->get('message')->result_array();
        } else {
            return $this->bdd->get_where('message', array('id_citoyen' => $id))->row_array();
        }
    }



    public function get_data_for_citoyen($nom, $id = false){
        if ($id === false) {
            return $this->bdd->get($nom)->result_array();
        } else {
            return $this->bdd->get_where($nom, array('id_du_formulaire' => $id))->row_array();
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
                    $array[$b][$nom_colonne[$c]['COLUMN_NAME']] = $array[$b][$nom_colonne[$c]['COLUMN_NAME']];               
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
            $array_a_enregistrer[$colonne[$d]] = $array[$colonne[$d]];
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

    public function excel($array, $page)
    {
        $nom_colonne = Bddcit_model::get_column_name($page);        
        $nom_du_fichier = $page . "-" . date("m-d-y");
        $excel_a_creer = [];
        $nom_colonne_pour_excel = [];
        $size_nom_colonne = sizeof($nom_colonne);
        for($a=0; $a<$size_nom_colonne; $a++){
            $nom_colonne_pour_excel[] = $nom_colonne[$a]['COLUMN_NAME'];
        }
        $excel_a_creer[] = $nom_colonne_pour_excel;
        foreach($array as $a){
            $excel_a_creer[] = Bddcit_model::get_data_for_citoyen($page,$a);
        }      
       
        
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
        $table = Bddcit_model::get_table_name();       
        $nom_du_fichier = 'informations_globales' . "-" . date("m-d-y");
        $spreadsheet = new Spreadsheet();
        foreach($table as $k=>$table_name){            
            $data_cit = Bddcit_model::get_data_for_citoyen($table_name['TABLE_NAME']);
            $nom_colonne = Bddcit_model::get_column_name($table_name['TABLE_NAME']);
            $excel_a_creer = [];
            $nom_colonne_pour_excel = [];
            $size_nom_colonne = sizeof($nom_colonne);
            for($a=0; $a<$size_nom_colonne; $a++){
                $nom_colonne_pour_excel[] = $nom_colonne[$a]['COLUMN_NAME'];
            }
            $excel_a_creer[] = $nom_colonne_pour_excel;
            foreach($data_cit as $cit){
                $excel_a_creer[] = $cit;  
            }
            if($k == 0){
                $sheet = $spreadsheet->getActiveSheet();
                $sheet_title = 'table : '.$table_name['TABLE_NAME'];
                $sheet->setTitle($table_name['TABLE_NAME']);
                $sheet->fromArray($excel_a_creer);   
            }else{
                $sheet = $spreadsheet->createSheet();
                $sheet_title = 'table : '.$table_name['TABLE_NAME'];
                $sheet->setTitle($table_name['TABLE_NAME']);
                $sheet->fromArray($excel_a_creer);
            }
           
        }
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $nom_du_fichier . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output'); // download file        
       
    }
}
