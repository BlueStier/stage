<?php
class Header_model extends CI_Model {

        //constructeur charge la classe permettant l'interrogation de la base de données
        public function __construct()
        {
                $this->load->database();
        }

        //méthode qui extrait les données de la table menu
        public function get_menu($id = FALSE)
{
        if ($id === FALSE)
        {
                //récupération des éléments classé par la colonne ordre
                $this->db->order_by('ordre');
                $query = $this->db->get('menu');                
                return $query->result_array();
        }

        $query = $this->db->get_where('menu', array('id_menu' => $id));
        return $query->row_array();
}
         //méthode qui extrait les données de la table sousmenu
        public function get_sousmenu($id = FALSE)
{
        if ($id === FALSE)
        {
                //récupération des éléments classé par la colonne menu et ensuite par la colonne ordre
                $this->db->order_by('menu, ordre');
                $query = $this->db->get('sousmenu');
                return $query->result_array();
        }

        $query = $this->db->get_where('sousmenu', array('id_sousmenu' => $id));
        return $query->row_array();
}
         //méthode qui extrait les données de la table third_level
        public function get_thirdmenu($id = FALSE)
{
        if ($id === FALSE)
        {
                //récupération des éléments classé par la colonne sousmenu et ensuite par la colonne ordre
                $this->db->order_by('sousmenu, ordre');
                $query = $this->db->get('third_level');
                return $query->result_array();
        }

        $query = $this->db->get_where('third_level', array('id_third' => $id));
        return $query->row_array();
}
        //suppression d'un menu, sous-menu ou 3eme niveau
        public function delete_menu($i)
{       
        switch ($i){
                case 1 :
                        //récupère l'id du menu à sup 
                        $id = $this->input->post('idmenu');
                        //extraction du nom du menu de la bdd
                        $result = $this->db->get_where('menu', array('id_menu' => $id))->result_array();
                        $menu = $result[0]['nom'];
                        //extraction de la bdd de tous les sousmenu affilié à ce menu
                        $result1 = $this->db->get_where('sousmenu', array('menu' => $menu))->result_array();
                        //vérifie la taille du tableau de réponse
                        $tailleTab = sizeof($result1);
                        if($tailleTab > 0){
                                for($i = 0;$i < $tailleTab;$i++){
                                        //on passe tous les sous-menu en sans menus d'affiliation
                                        $result1[$i]['menu']='sans';
                                        $this->db->replace('sousmenu',$result1[$i]);
                                }
                        }
                       //on fini par supprimer le menu
                        return $this->db->delete('menu', array('id_menu' => $id));                        
                        break;
                case 2 :
                        //récupère l'id du sous-menu à sup
                        $id = $this->input->post('idmenu');
                        //extraction du nom du menu de la bdd
                        $result2 = $this->db->get_where('sousmenu', array('id_sousmenu' => $id))->result_array();
                        $sousmenu = $result2[0]['nom'];
                        //extraction de la bdd de tous les 3eme niveau affilié à ce menu
                        $result3 = $this->db->get_where('third_level', array('sousmenu' => $sousmenu))->result_array();
                        //vérifie la taille du tableau de réponse
                        $tailleTab = sizeof($result3);
                        if($tailleTab > 0){
                                for($i = 0;$i < $tailleTab;$i++){
                                        //on passe tous les 3eme niveau en sans sousmenus d'affiliation
                                        $result3[$i]['sousmenu']='sans';
                                        $this->db->replace('third_level',$result3[$i]);
                                }
                        } 
                        //on fini par supprimer le sousmenu
                        return $this->db->delete('sousmenu', array('id_sousmenu' => $id));
                        break;
                case 3 :
                        //récupère l'id du 3eme niveau à sup 
                        $data = array('id_third' => $this->input->post('idmenu'));
                        return $this->db->delete('third_level', $data);
                        break;
                default:
                        show_404();
                        break;
        }                
}

//fonction permettant de changer l'ordre des menus, sousmenus et 3eme niveau
        public function upOrDown($sens, $id)
{
        switch ($id){
                case 1 ://pour modif l'ordre d'un menu
                        //passe l'id en paramètre et récupère les infos de la bdd 
                        $idAModif = $this->input->post('idmenu');
                        $query = $this->db->get_where('menu', array('id_menu' => $idAModif));
                        $result = $query->result_array();                                                 
                        
                        //passe l'ordre récupéré en paramètre
                        $ordreActuel = $result[0]['ordre'];
                        $ordreResult = 0;
                        //si sens est à vrai on descend l'ordre
                        if($sens == 1){
                        $ordreResult = $ordreActuel - 1;
                  
                        }else/*sinon on monte l'ordre*/{
                        $ordreResult = $ordreActuel + 1;
                        }
                        //on passe l'ordre à 0
                        $result[0]['ordre'] = 0;
                        $this->db->replace('menu',$result[0]);

                        //on récupère l'ordre de destination
                        $result1 = $this->db->get_where('menu', array('ordre' => $ordreResult))->result_array();
                        $result1[0]['ordre'] = $ordreActuel;
                        $this->db->replace('menu',$result1[0]);
                        
                        //on remet l'ordre de destination
                        $result[0]['ordre'] = $ordreResult;
                        $this->db->replace('menu',$result[0]);
                        break;

                case 2 ://pour modif l'ordre d'un sousmenu
                        //passe l'id en paramètre et récupère les infos de la bdd 
                        $idAModif = $this->input->post('idmenu');
                        $query = $this->db->get_where('sousmenu', array('id_sousmenu' => $idAModif));
                        $result = $query->result_array();                                                
                        
                        //passe l'ordre récupéré en paramètre
                        $ordreActuel = $result[0]['ordre'];
                        $ordreResult = 0;
                        //si sens est à vrai on descend l'ordre
                        if($sens == 1){
                        $ordreResult = $ordreActuel - 1;
                  
                        }else/*sinon on monte l'ordre*/{
                        $ordreResult = $ordreActuel + 1;
                        }
                        //on passe l'ordre à 0
                        $result[0]['ordre'] = 0;
                        $this->db->replace('sousmenu',$result[0]);

                        //on récupère l'ordre de destination
                        $result1 = $this->db->get_where('sousmenu', array('menu' =>  $result[0]['menu'],'ordre' => $ordreResult))->result_array();
                        $result1[0]['ordre'] = $ordreActuel;
                        $this->db->replace('sousmenu',$result1[0]);
                        
                        //on remet l'ordre de destination
                        $result[0]['ordre'] = $ordreResult;
                        $this->db->replace('sousmenu',$result[0]);
                        break;

                case 3 ://pour modif l'ordre du 3eme niveau
                        //passe l'id en paramètre et récupère les infos de la bdd 
                        $idAModif = $this->input->post('idmenu');
                        $query = $this->db->get_where('third_level', array('id_third' => $idAModif));
                        $result = $query->result_array();                                                
                        
                        //passe l'ordre récupéré en paramètre
                        $ordreActuel = $result[0]['ordre'];
                        $ordreResult = 0;
                        //si sens est à vrai on descend l'ordre
                        if($sens == 1){
                        $ordreResult = $ordreActuel - 1;
                  
                        }else/*sinon on monte l'ordre*/{
                        $ordreResult = $ordreActuel + 1;
                        }
                        //on passe l'ordre à 0
                        $result[0]['ordre'] = 0;
                        $this->db->replace('third_level',$result[0]);

                        //on récupère l'ordre de destination
                        $result1 = $this->db->get_where('third_level', array('sousmenu' =>  $result[0]['sousmenu'],'ordre' => $ordreResult))->result_array();
                        $result1[0]['ordre'] = $ordreActuel;
                        $this->db->replace('third_level',$result1[0]);
                        
                        //on remet l'ordre de destination
                        $result[0]['ordre'] = $ordreResult;
                        $this->db->replace('third_level',$result[0]);
                        break;
                default:
                        show_404();
                        break;
                }

}

        //fonction permettant de rendre visible ou non un menu,sousmenu...
        public function visibleOrNot($type){
                $idAModif = $this->input->post('idmenu');
                switch ($type){
                        case 1://concerne un menu
                                //passe l'id en paramètre et récupère les infos de la bdd 
                                $result = $this->db->get_where('menu', array('id_menu' => $idAModif))->result_array();
                                //petit ternaire qui va bien pour changer visible ou non
                                $result[0]['visible'] = ($result[0]['visible']) ? false : true;
                                //réinjection en bdd du changement
                                $this->db->replace('menu',$result[0]); 
                                break;
                        case 2://concerne un sousmenu
                                //passe l'id en paramètre et récupère les infos de la bdd 
                                $result1 = $this->db->get_where('sousmenu', array('id_sousmenu' => $idAModif))->result_array();
                                //petit ternaire qui va bien pour changer visible ou non
                                $result1[0]['visible'] = ($result1[0]['visible']) ? false : true;
                                //réinjection en bdd du changement
                                $this->db->replace('sousmenu',$result1[0]); 
                                break;
                        case 3://concerne un 3eme niveau
                                //passe l'id en paramètre et récupère les infos de la bdd 
                                $result2 = $this->db->get_where('third_level', array('id_third' => $idAModif))->result_array();
                                //petit ternaire qui va bien pour changer visible ou non
                                $result2[0]['visible'] = ($result2[0]['visible']) ? false : true;
                                //réinjection en bdd du changement
                                $this->db->replace('third_level',$result2[0]); 
                                break;
                default:
                        show_404();
                        break;
                }
        }
        //fonction de déplacement d'un sousmenu vers un autre menu ou d'un 3eme niveau vers un autre sous-menu
        public function dragNdrop(){
                //récupère l'id du sous menu à modif et le nouveau menu concerné
                $idAModif1 = $this->input->post('id');
                $menu = $this->input->post('menu');

                //si l'element déplacé est un sous menu
                if(stristr($idAModif1, 'sousmenu') == TRUE) {
                        $idAModif = stristr($idAModif1, 'sousmenu',true);
                        $idAModif = intval($idAModif);                       
                //extraction de la base de donnée du sousmenu concerné
                $result = $this->db->get_where('sousmenu', array('id_sousmenu' => $idAModif))->result_array();

                //met l'ordre et le menu enlevé en attente
                $ordre = $result[0]['ordre'];
                $menu_depart = $result[0]['menu'];
                //extraction du dernier ordre de la base concernant ce menu
                $this->db->select('count(*) as lastOrdre');
                $result1 = $this->db->get_where('sousmenu', array('menu' => $menu))->result_array();
                //change le menu concerné et remplace dans la bdd               
                $result[0]['menu'] = $menu;
                $result[0]['ordre'] = $result1[0]['lastOrdre']+1;
                $this->db->replace('sousmenu',$result[0]);

                //comble le trou dans les ordre du menu de départ
                $where = ['menu' => $menu_depart, 'ordre >' => $ordre];
                $this->db->where($where);
                $result2 = $this->db->get('sousmenu')->result_array();
                $size = sizeof($result2);             
                if($size > 0){
                        for($i = 0; $i < $size ; $i++){
                                $result2[$i]['ordre'] = $result2[$i]['ordre']-1;
                                $this->db->replace('sousmenu',$result2[$i]);    
                        }
                }
                //in ne reste plus qu'a déplacer les 3eme niveau affiliés au sous menu pour qu'ils suivent
                $result3 = $this->db->get_where('third_level', array('sousmenu' => $result[0]['nom']))->result_array();               
                $size2 = sizeof($result3);                
                if($size2 > 0){                        
                        for($i = 0; $i < $size2 ; $i++){                                
                                $result3[$i]['menu'] = $result[0]['menu'];
                                $this->db->replace('third_level',$result3[$i]);    
                        }
                  }
                
                //sinon l'élément déplacé est un 3eme niveau
                }else{
                //récupère l'id du 3eme niveau à modif
                $idAModif1 = intval($idAModif1);
                $sousmenu = $this->input->post('sousmenu');
                //le menu se présentant sous cette forme :"<small>...nom du menu...nom du sousmenu...</small>" on enlève ce qui ne nous interesse pas
                //et on récupère le nom du menu
                $sousmenu = substr(stristr($sousmenu, '; '),2);
                $sousmenu = stristr($sousmenu,' :',true);
                //extraction de la base de donnée du 3eme niveau concerné
                $result = $this->db->get_where('third_level', array('id_third' => $idAModif1))->result_array();
                
                 //met l'ordre et le sousmenu enlevé en attente
                 $ordre = $result[0]['ordre'];
                 $Smenu_depart = $result[0]['sousmenu'];
                 //extraction du dernier ordre de la base concernant ce sousmenu
                 $this->db->select('count(*) as lastOrdre');
                 $result1 = $this->db->get_where('third_level', array('sousmenu' => $menu))->result_array();
                 //change le menu et sousmenu concerné et remplace dans la bdd
                 $result[0]['menu'] = $sousmenu;             
                 $result[0]['sousmenu'] = $menu;
                 $result[0]['ordre'] = $result1[0]['lastOrdre']+1;
                 $this->db->replace('third_level',$result[0]);

                 //comble le trou dans les ordre du sousmenu de départ 
                 $where = ['sousmenu' => $Smenu_depart, 'ordre >' => $ordre];
                 $this->db->where($where);
                 $result2 = $this->db->get('third_level')->result_array();
                 $size = sizeof($result2);                 
                 if($size > 0){                        
                        for($i = 0; $i < $size ; $i++){
                                $result2[$i]['ordre'] = $result2[$i]['ordre']-1;
                                $this->db->replace('third_level',$result2[$i]);    
                        }                
                }
                //met la colonne "no3level" du sousmenu d'origine à jour
                $extract = $this->db->get_where('third_level', array('sousmenu' => $Smenu_depart))->result_array();
                $sizeO = sizeof($result2);
                if($sizeO == 0){
                        $no3level = true;
                }else{
                        $no3level = false;
                }
                $verif = strcmp($Smenu_depart,'sans');
                if($verif != 0){
                $put3level = $this->db->get_where('sousmenu', array('nom' => $Smenu_depart))->result_array();
                $put3level[0]["no3level"] = $no3level;
                $this->db->replace('sousmenu',$put3level[0]);} 
        }
    }

    public function validateMenu($type){
            switch($type){
                case 1://concerne un menu
                        //récupère le nom et la couleur
                        $nom = $this->input->post('nom');
                        $couleur = $this->input->post('couleur');
                        //extraction de la bdd du plus grand ordre
                        $this->db->select('max(ordre) as max');
                        $max = $this->db->get('menu')->result_array();
                        $ordre = $max[0]['max']+1;
                        //enregistrement en bdd                        
                        $this->db->insert('menu', array('nom' => $nom , 'couleur' => $couleur, 'ordre' =>$ordre,'visible' => false));                
                        break;
                case 2://concerne un sousmenu 
                        break;
                case 3://concerne un 3eme niveau
                        break;
                default:
                        show_404();
                        break;
            }

    }
}