<?php
class Bulles_model extends CI_Model
{

    //constructeur charge la classe permettant l'interrogation de la base de données
    public function __construct()
    {
        $this->load->database();
    }

    //méthode qui extrait les données de la table acceuil
    public function get_bulle($id = false)
    {
        if ($id === false) {
            $query = $this->db->get('bulle');
            return $query->result_array();
        }

        $query = $this->db->get_where('bulle', array('id_pages' => $id));
        return $query->result_array();
    }
    public function create($id_pages)
    {
        //définition des paramètres de config pour la récupèration des photos
        $this->upload->set_upload_path("./assets/site/img/about/");

        //tableau de récupération de path photo pour l'injection en bdd
        $photo = [];
        $nb = $this->input->post('selectbulle');
        for ($i = 1; $i <= $nb; $i++) {
            if (!$this->upload->do_upload('photo' . $i)) {
                //si upload hs retour vers la page de création de page avec info sur l'echec du transfert
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('cms/header');
                $this->load->view('cms/left_menu');
                $this->load->view('cms/createPages', $error);
                $this->load->view('cms/footer');
            } else {
                //si upload ok, on récupère le nom de la photo et on met le chemin dans l'array
                $array = $this->upload->data();
                $photo[$i] = 'assets/site/img/about/' . $array['orig_name'];

            }
        }
        //on rempli le reste du tableau pour atteindre 10
        if ($nb < 10) {
            $nb1 = $nb + 1;
            for ($a = $nb1; $a <= 10; $a++) {
                $photo[$a] = '';
            }
        }

        $données = ['id_pages' => $id_pages,
            'titre' => $this->input->post('titrebulle'),
            'soustitre' => $this->input->post('soustitrebulle'),
            'tx1' => $this->input->post('tx1'),
            'photo1' => $photo[1],
            'trt1' => $this->input->post('trt1'),
            'tx2' => $this->input->post('tx2'),
            'photo2' => $photo[2],
            'trt2' => $this->input->post('trt2'),
            'tx3' => $this->input->post('tx3'),
            'photo3' => $photo[3],
            'trt3' => $this->input->post('trt3'),
            'tx4' => $this->input->post('tx4'),
            'photo4' => $photo[4],
            'trt4' => $this->input->post('trt4'),
            'tx5' => $this->input->post('tx5'),
            'photo5' => $photo[5],
            'trt5' => $this->input->post('trt5'),
            'tx6' => $this->input->post('tx6'),
            'photo6' => $photo[6],
            'trt6' => $this->input->post('trt6'),
            'tx7' => $this->input->post('tx7'),
            'photo7' => $photo[7],
            'trt7' => $this->input->post('trt7'),
            'tx8' => $this->input->post('tx8'),
            'photo8' => $photo[8],
            'trt8' => $this->input->post('trt8'),
            'tx9' => $this->input->post('tx9'),
            'photo9' => $photo[9],
            'trt9' => $this->input->post('trt9'),
            'tx10' => $this->input->post('tx10'),
            'photo10' => $photo[10],
            'trt10' => $this->input->post('trt10'),
            'sup' => $this->input->post('sup'),
            'trtsup' => $this->input->post('trtsup'),
        ];

        $this->db->insert('bulle', $données);

    }

    public function supBulle($id_a_modif, $n)
    {
        $bulle = Bulles_model::get_bulle($id_a_modif);
        for ($i = $n; $i < 10; $i++) {
            $bulle[0]['tx' . $i] = $bulle[0]['tx' . ($i + 1)];
            $bulle[0]['photo' . $i] = $bulle[0]['photo' . ($i + 1)];
            $bulle[0]['trt' . $i] = $bulle[0]['trt' . ($i + 1)];
        }
        $this->db->replace('bulle', $bulle[0]);
    }

    public function update($id_pages)
    {
        //extraction BDD des info de cette page
        $bulle = Bulles_model::get_bulle($id_pages);
        //récupère et copie la photo choisie, définie les caractéristique de celle-ci et le chemin d'upload
        $config['upload_path'] = "./assets/site/img/about/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100000;
        $config['max_width'] = 7000;
        $config['max_height'] = 5000;
        $config['overwrite'] = true;

        //upload la photo vers le serveur
        $this->load->library('upload', $config);

        //on récupère le nombre de bulle
        $nbBu = $this->input->post('nbBu');

        //pour chaque bulle on vérifie si il faut changer le photo
        for ($i = 1; $i <= $nbBu; $i++) {
            $radio = $this->input->post('radio' . $i);
            //si il faut changer la photo
            if ($radio == 'Non') {
                //on upload la photo et on modif la valeur dans le tableau de récup de la bdd
                if (!$this->upload->do_upload('photo' . $i)) {
                    //si upload hs retour vers la page de update de page avec info sur l'echec du transfert
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('cms/header');
                    $this->load->view('cms/left_menu');
                    $this->load->view('cms/updatePage', $error);
                    $this->load->view('cms/footer');
                } else {
                    //si upload ok, on récupère le nom de la photo et on met le chemin dans l'array
                    $array = $this->upload->data();
                    $bulle[0]['photo' . $i] = 'assets/site/img/about/' . $array['orig_name'];

                }
            }

            //et on enregistre les textes associés
            $bulle[0]['tx' . $i] = $this->input->post('tx' . $i);
            $bulle[0]['trt' . $i] = $this->input->post('trt' . $i);
        }

        //on vérifie s'il faut ajouter des bulles
        $radiobul = $this->input->post('radioPlusBulle');
        //si oui
        if ($radiobul == 'Oui') {
            $nbafaire = $this->input->post('nbBui');
            //entre le nbre de bulle existante et le nombre de bulle totale on boucle
            for ($j = $nbBu + 1; $j <= $nbafaire; $j++) {
                //on upload la photo et on modif la valeur dans le tableau de récup de la bdd
                if (!$this->upload->do_upload('photo' . $j)) {
                    //si upload hs retour vers la page de update de page avec info sur l'echec du transfert
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('cms/header');
                    $this->load->view('cms/left_menu');
                    $this->load->view('cms/updatePage', $error);
                    $this->load->view('cms/footer');
                } else {
                    //si upload ok, on récupère le nom de la photo et on met le chemin dans l'array
                    $array = $this->upload->data();
                    $bulle[0]['photo' . $j] = 'assets/site/img/about/' . $array['orig_name'];

                }
                //et on enregistre les textes associés
                $bulle[0]['tx' . $j] = $this->input->post('stx' . $j);
                $bulle[0]['trt' . $j] = $this->input->post('strt' . $j);
            }
        }

        //on récupère les autres données
        $titre = $this->input->post('titrebulle');
        $soustitre = $this->input->post('soustitrebulle');

        if (!empty($titre)) {
            $bulle[0]['titre'] = $titre;
        }
        if (!empty($soustitre)) {
            $bulle[0]['sostitre'] = $soustitre;
        }
        $bulle[0]['sup'] = $this->input->post('sup');
        $bulle[0]['trtsup'] = $this->input->post('trtsup');
        //il ne reste plus qu'à faire le changement en BDD
        $this->db->replace('bulle', $bulle[0]);
    }

    public function search($recherche){
        $this->db->like('titre',$recherche,'both');
        $this->db->or_like('tx1',$recherche,'both');
        $this->db->or_like('trt1',$recherche,'both');
        $this->db->or_like('tx2',$recherche,'both');
        $this->db->or_like('trt2',$recherche,'both');
        $this->db->or_like('tx3',$recherche,'both');
        $this->db->or_like('trt3',$recherche,'both');
        $this->db->or_like('tx4',$recherche,'both');
        $this->db->or_like('trt4',$recherche,'both');
        $this->db->or_like('tx5',$recherche,'both');
        $this->db->or_like('trt5',$recherche,'both');
        $this->db->or_like('tx6',$recherche,'both');
        $this->db->or_like('trt6',$recherche,'both');
        $this->db->or_like('tx7',$recherche,'both');
        $this->db->or_like('trt7',$recherche,'both');
        $this->db->or_like('tx8',$recherche,'both');
        $this->db->or_like('trt8',$recherche,'both');
        $this->db->or_like('tx9',$recherche,'both');
        $this->db->or_like('trt9',$recherche,'both');
        $this->db->or_like('tx10',$recherche,'both');
        $this->db->or_like('trt10',$recherche,'both');
        $this->db->or_like('sup',$recherche,'both');
        $this->db->or_like('trtsup',$recherche,'both');
        $query = $this->db->get('bulle');
        return $query->result_array(); 
    }
}
