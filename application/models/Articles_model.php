<?php
class Articles_model extends CI_Model
{

    //constructeur charge la classe permettant l'interrogation de la base de données
    public function __construct()
    {
        $this->load->database();

    }

    //méthode qui extrait les données de la table acceuil
    public function get_article($id = false, $type)
    {
        if ($type) {
            if ($id === false) {
                $query = $this->db->get('articlespage');
                return $query->result_array();
            }

            $query = $this->db->get_where('articlespage', array('id_articlespage' => $id));
            return $query->result_array();
        } else {
            if ($id === false) {
                $query = $this->db->get('articles');
                return $query->result_array();
            }
            $this->db->set('jour', 'NOW()', false);
            $this->db->query("SET lc_time_names = 'fr_FR'");
            $this->db->select('date_format(jour,"%W %d %M %Y") as jour,photo,titre,text,visible,
                                  date_format(alerte,"%W %d %M %Y") as alerte,id_articlespage,id_articles');
            $query = $this->db->get_where('articles', array('id_articles' => $id));
            return $query->result_array();
        }
    }

    public function get_article_by_id($id)
    {
        return $this->db->get_where('articles', array('id_articles' => $id))->result_array();
    }

    public function create($id_pages)
    {
        $données = array('id_articlespage' => $id_pages,
            'text' => $this->input->post('article'));

        $this->db->insert('articlespage', $données);

    }

    public function update($id_pages)
    {
        $article = Articles_model::get_article($id_pages, true);
        $article[0]['text'] = $this->input->post('article');
        $this->db->replace('articlespage', $article[0]);

    }

    public function createArticle($id)
    {
        //récupère et copie la photo choisie, définie les caractéristique de celle-ci et le chemin d'upload
        $config['upload_path'] = "./assets/site/img/articles/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        //upload la photo vers le serveur
        $this->load->library('upload', $config);

        //upload la photo
        if (!$this->upload->do_upload('article')) {
            //si upload hs retour vers la page de création de page avec info sur l'echec du transfert
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('cms/header');
            $this->load->view('cms/left_menu');
            $this->load->view('cms/createArticle', $error);
            $this->load->view('cms/footer');
        } else {
            //si upload ok, on récupère le nom de la photo et on met le chemin dans l'array
            $array = $this->upload->data();
            $photo = 'assets/site/img/articles/' . $array['orig_name'];

        }

        //On vérifie si on doit enregistrer une alerte
        $alert = $this->input->post("radio");
        $alertComp = strcmp($alert, "Oui");
        if ($alertComp == 0) {
            $response = $this->input->post("selectPeriode");
            switch ($response) {
                case 1:
                    $this->db->set('alerte', 'DATE_ADD(NOW(), INTERVAL 3 MONTH)', false);
                    break;
                case 2:
                    $this->db->set('alerte', 'DATE_ADD(NOW(), INTERVAL 6 MONTH)', false);
                    break;
                case 3:
                    $this->db->set('alerte', 'DATE_ADD(NOW(), INTERVAL 1 YEAR)', false);
                    break;
                case 4:
                    $this->db->set('alerte', 'DATE_ADD(NOW(), INTERVAL 18 MONTH)', false);
                    break;
                case 5:
                    $this->db->set('alerte', 'DATE_ADD(NOW(), INTERVAL 2 YEAR)', false);
                    break;
                default:
                    $this->db->set('alerte', 'NULL', false);
                    break;
            }
        } else {
            $this->db->set('alerte', 'NULL', false);
        }
        //set le NOW() SQL pour qu'il soit échappé et qu'il passe dans la fonction de Codeigniter
        $this->db->set('jour', 'NOW()', false);
        //création du tableau de données
        $données = ['id_articlespage' => $id,
            'photo' => $photo,
            'titre' => $this->input->post('titreArticle'),
            'text' => $this->input->post('text'),
            'visible' => true,
        ];
        //injection en BDD
        $this->db->insert('articles', $données);

    }

    //fonction retournant les articles en fonction de la page de type article choisie
    public function get_article_by_page($id = false, $past)
    {
        /*si pas d'id on extrait de la bdd tous les articles en fonction de la date*/
        if ($id === false) {
            $this->db->set('jour', 'NOW()', false);
            $this->db->query("SET lc_time_names = 'fr_FR'");
            $this->db->select('date_format(jour,"%W %d %M %Y") as jour,photo,titre,text,visible,
                                  date_format(alerte,"%W %d %M %Y") as alerte,id_articlespage,id_articles');
            $this->db->order_by('jour', 'desc');
            if ($past) {
                $this->db->where('jour < DATE_SUB(NOW(), INTERVAL 3 MONTH)');
            } else {
                $this->db->where('jour > DATE_SUB(NOW(), INTERVAL 3 MONTH)');
            }
            $query = $this->db->get('articles');
            return $query->result_array();
        }
        /*si id de la page on met les date en français et on fait la requete en formattant la date pour avoir
        jour mois année on organise les résultats pour que les arrticles s'affiche du plus récent au plus vieux
        en prenant que les articles des 3derniers mois
         */
        $this->db->set('jour', 'NOW()', false);
        $this->db->query("SET lc_time_names = 'fr_FR'");
        $this->db->select('date_format(jour,"%W %d %M %Y") as jour,photo,titre,text,visible,
                                  date_format(alerte,"%W %d %M %Y") as alerte,id_articlespage,id_articles');
        $this->db->order_by('jour', 'desc');
        if ($past) {
            $this->db->where('jour < DATE_SUB(NOW(), INTERVAL 3 MONTH)');
        } else {
            $this->db->where('jour > DATE_SUB(NOW(), INTERVAL 3 MONTH)');
        }
        $query = $this->db->get_where('articles', array('id_articlespage' => $id));
        $result = $query->result_array();
        return $result;
    }

    public function delete()
    {
        //récupération de l'id de l'article à sup et suppression
        $id = $this->input->post('id_articles');
        $this->db->delete('articles', array('id_articles' => $id));

    }

    //fonction de programmation d'alerte
    public function configAlert($i)
    {
        //récupération de l'id de l'article à sup et suppression
        $id = $this->input->post('id_articles' . $i);
        //on set le jour d'alerte en fonction de la période choisie
        $response = $this->input->post("selectPeriode1");
        switch ($response) {
            case 1:
                $nb = 3;
                break;
            case 2:
                $nb = 6;
                break;
            case 3:
                $nb = 12;
                break;
            case 4:
                $nb = 18;
                break;
            case 5:
                $nb = 24;
                break;
            default:
                $nb = 0;
                break;
        }
        $str = 'UPDATE articles set alerte= DATE_ADD(NOW(), INTERVAL ' . $nb . ' MONTH) where id_articles=' . $i;
        $this->db->query($str);
    }

    //fonction de suppression d'alerte
    public function supAlert($id)
    {
        $alert = $this->db->get_where('articles', array('id_articles' => $id))->result_array();
        $alert[0]['alerte'] = null;
        $this->db->replace('articles', $alert[0]);

    }

    public function findAlert()
    {
        return $this->db->query('SELECT * FROM `articles` WHERE DATEDIFF(alerte,now())<=7')->result_array();

    }

    //fonction pour rendre visible ou non l'article
    public function visibleOrNot($id)
    {
        //passe l'id en paramètre et récupère les infos de la bdd
        $result = $this->db->get_where('articles', array('id_articles' => $id))->result_array();
        //petit ternaire qui va bien pour changer visible ou non
        $result[0]['visible'] = ($result[0]['visible']) ? false : true;
        //réinjection en bdd du changement
        $this->db->replace('articles', $result[0]);
    }

    public function updateArticle($p)
    {
        //id de l'article à modif
        $id = $this->input->post('id_article2');
        //extraction de l'article de la bdd
        $article = $this->db->get_where('articles', array('id_articles' => $id))->result_array();
        //on récupère les infos à changer
        $titre = $this->input->post('titreArticle2');

        if (!empty($titre)) {

            $article[0]['titre'] = $titre;
        }

        //on vérifie si on change de photo
        $photo = $this->input->post("radioP");
        $photoChange = strcmp($photo, "Non");

        if ($photoChange == 0) {
            //Si oui on upload et on change le chemin dans l'article
            //récupère et copie la photo choisie, définie les caractéristique de celle-ci et le chemin d'upload
            $config['upload_path'] = "./assets/site/img/articles/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 100000;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;

            //upload la photo vers le serveur
            $this->load->library('upload', $config);

            //upload la photo
            if (!$this->upload->do_upload('article2')) {
                //si upload hs retour vers la page de création de page avec info sur l'echec du transfert
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('cms/header');
                $this->load->view('cms/left_menu');
                $this->load->view('cms/updateArticle', $error);
                $this->load->view('cms/footer');
            } else {
                //si upload ok, on récupère le nom de la photo et on met le chemin dans l'array
                $array = $this->upload->data();
                $photo = 'assets/site/img/articles/' . $array['orig_name'];
                $article[0]['photo'] = $photo;

            }
        }
        //on change la page contenant l'article
        $article[0]['id_articlespage'] = $p;

        //on récupère le text
        $article[0]['text'] = $this->input->post('text');

        //on remplace l'article de la BDD par le nouvel article
        $this->db->replace('articles', $article[0]);

        //si il y a eu changement de titre et que l'article est dans le carroussel on fait le changement

        $this->load->model('Home_model');
        $this->Home_model->ifupdateArticleOrPage(false, $id);

        //on change le jour d'enregistrement pour le valider à aujourd'hui
        $jour = 'UPDATE articles set jour=now() where id_articles=' . $id;
        $this->db->query($jour);

        //si une alerte existe
        if ($article[0]['alerte'] != null) {
            $alert = $this->input->post("radioA");
            $alertComp = strcmp($alert, "Oui");
            if ($alertComp == 0) {
                $response = $this->input->post("selectPeriodeA");
                switch ($response) {
                    case 1:
                        $nb = 3;
                        break;
                    case 2:
                        $nb = 6;
                        break;
                    case 3:
                        $nb = 12;
                        break;
                    case 4:
                        $nb = 18;
                        break;
                    case 5:
                        $nb = 24;
                        break;
                    default:
                        $nb = 0;
                        break;
                }
                $str = 'UPDATE articles set alerte= DATE_ADD(NOW(), INTERVAL ' . $nb . ' MONTH) where id_articles=' . $id;
                $this->db->query($str);
            }

        } else {
            $alert = $this->input->post("radioB");
            $alertComp = strcmp($alert, "Oui");
            if ($alertComp == 0) {
                $response = $this->input->post("selectPeriodeB");
                switch ($response) {
                    case 1:
                        $nb = 3;
                        break;
                    case 2:
                        $nb = 6;
                        break;
                    case 3:
                        $nb = 12;
                        break;
                    case 4:
                        $nb = 18;
                        break;
                    case 5:
                        $nb = 24;
                        break;
                    default:
                        $nb = 0;
                        break;
                }
                $str = 'UPDATE articles set alerte= DATE_ADD(NOW(), INTERVAL ' . $nb . ' MONTH) where id_articles=' . $id;
                $this->db->query($str);
            }

        }
    }

}
