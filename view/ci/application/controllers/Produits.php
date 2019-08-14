<?php

// application/controllers/Produits.php	
//instruction de sÃ©curitÃ© empÃ©chant l'accÃ¨s direct au fichier
defined('BASEPATH') OR exit('No direct script access allowed');

// crÃ©ation de la classe Produits hÃ©ritant des propriÃ©tÃ©s de la classe CI_Controller (important : nom de la classe avec premiÃ¨re lettre en majuscule, tout comme le fichier)
class Produits extends CI_Controller {

    /**
     * affichage de la liste de produits
     */
    public function liste() {
        // appel de l'helper pour la gestion des urls
        $this->load->helper('url');
        /**
         * mÃ©thode pour affichage de la liste de produit
         */
        //------------------- sans model -----------------
//        //appel de la methode database -> permet la connexion Ã  la base de donnÃ©es.
//        $this->load->database();
//        // stockage de la requÃ¨te dans une variable
//        $query = 'SELECT * from `produits`';
//        // exÃ©cution de la requÃ¨te
//        $result = $this->db->query($query);
//        // rÃ©cupÃ©ration des rÃ©sultats
//        $productList = $result->result();
        // ajout des rÃ©sultats de la requÃ¨te dans le tableau des variables Ã  transmettre Ã  la vue
        //-------------------- avec model -----------------
        // chargement du model "Prod_model"
        $this->load->model('Prod_model');
        // appel de la mÃ©thode "liste()" du model prÃ©cÃ©demment chargÃ©
        $productList = $this->Prod_model->liste();
        $listView['productList'] = $productList;
        /**
         *  chargement des fichiers vue
         */
        $this->load->view('header');
        $this->load->view('liste', $listView);
        $this->load->view('footer');
    }

    /**
     * Ajout d'un produit
     */
    public function addProduct() {
        $this->output->enable_profiler(TRUE);
        // appel de l'helper pour la gestion des urls
        $this->load->helper('url');
        // appel du helper form
        $this->load->helper('form');
        // chargement de la librairie validation du formulaire
        $this->load->library('form_validation');
        // ATTENTION Au FORMULAIRE : IL FAUT QUE LES NAMES DES INPUT SOIENT IDENTIQUES AUX NOMS DES CHAMPS DE LA TABLE, ET SUPPRIMER LE POST['SUBMIT']
        if ($this->input->post()) {
            $this->form_validation->set_rules(
                    'pro_cat_id', 'CatÃ©gories', 'required|regex_match[/^[\d]+$/]', array('required' => 'Le champs catÃ©gorie n\'est pas renseignÃ©', 'regex_match' => 'Champs catÃ©gorie non valide'));
            $this->form_validation->set_rules(
                    'pro_ref', 'RÃ©fÃ©rence', 'required|regex_match[/^[a-zA-Z\d]+$/]', array('required' => 'Le champs rÃ©fÃ©rence n\'est pas renseignÃ©', 'regex_match' => 'Champs rÃ©fÃ©rence non valide'));
            $this->form_validation->set_rules(
                    'pro_couleur', 'Couleur', 'required|regex_match[/^[a-zA-Z]+$/]', array('required' => 'Le champs couleur n\'est pas renseignÃ©', 'regex_match' => 'Champs couleur non valide'));
            $this->form_validation->set_rules(
                    'pro_libelle', 'LibellÃ©', 'required|regex_match[/^[a-zA-Z\d ]+$/]', array('required' => 'Le champs libellÃ© n\'est pas renseignÃ©', 'regex_match' => 'Champs libellÃ© non valide'));
            $this->form_validation->set_rules(
                    'pro_prix', 'Prix', 'required|regex_match[/^[\d]+[.]?[\d]{1,2}$/]', array('required' => 'Le champs prix n\'est pas renseignÃ©', 'regex_match' => 'Champs prix non valide'));
            $this->form_validation->set_rules(
                    'pro_stock', 'Stock', 'required|regex_match[/^[\d]+$/]', array('required' => 'Le champs stock n\'est pas renseignÃ©', 'regex_match' => 'Champs stock non valide'));
            $this->form_validation->set_rules(
                    'pro_description', 'Description', 'required|regex_match[/^[a-zA-Z\d\|\_ ÃªÃ«Ã¹Ã¼Ã»Ã®Ã¯Ã Ã¤Ã¢Ã¶Ã´\,\.\:\;\!\?]+$/]', array('required' => 'Le champs description n\'est pas renseignÃ©', 'regex_match' => 'Champs description non valide'));
            if ($this->form_validation->run() == FALSE) {
                /**
                 * Affichage des categories de produits dans la liste dÃ©roulante
                 */
                //------------------------ sans model ---------------
//                $this->load->database();
//                // stockage de la requÃ¨te dans une variable
//                $query = 'SELECT * from `categories`';
//                // exÃ©cution de la requÃ¨te
//                $result = $this->db->query($query);
//                // rÃ©cupÃ©ration des rÃ©sultats
//                $categoriesList = $result->result();
//                // ajout des rÃ©sultats de la requÃ¨te dans le tableau des variables Ã  transmettre Ã  la vue
                //----------------------- avec model ----------------
                // chargement du model "Prod_model"
                $this->load->model('Cat_model');
                // appel de la mÃ©thode "liste()" du model prÃ©cÃ©demment chargÃ©
                $categoriesList = $this->Cat_model->categoriesList();
                $catView['categoriesList'] = $categoriesList;
                /**
                 * Affichage du formulaire d'ajout
                 */
                $this->load->view('header');
                $this->load->view('addProduct', $catView);
                $this->load->view('footer');
            } else {
                // configuration du chemin ou le fichier sera enregistrÃ©
                $config['upload_path'] = realpath('assets/img/');
                //type de fichier autorisÃ©s
                $config['allowed_types'] = 'gif|jpg|png';
                // chargement du helper pour l'upload
                $this->load->library('upload', $config);
                // upload du fichier
                $this->upload->do_upload("pro_photo");
                //gestion des erreurs pour l'upload
                $error = $this->upload->display_errors();
                $file = $this->upload->data();
                //----------------------- sans model --------------------
//                // chargement/connexion Ã  la base de donnÃ©es
//                $this->load->database();
//                // rÃ©cupÃ©ration des donnÃ©es du formulaire
//                $data = $this->input->post();
                $this->load->model('Prod_model');
                $this->Prod_model->addProduct();

//                // rÃ©cupÃ©ration et formatage de la date (date courante) d'ajout du produit
//                $data["pro_d_ajout"] = date("Y-m-d");
//                // rÃ©cupÃ©ration de l'extensio du fichier en vue de son insertion en base de donnÃ©es
//                $data["pro_photo"] = substr($file["file_ext"], 1);
//                // insertion des donnÃ©es du formulaire en base de donnÃ©es ($data -> donnÃ©es du formulaire)
//                $this->db->insert("produits", $data);
                // rÃ©cupÃ©ration du dernier id insÃ©rÃ© dans la base de donnÃ©es
                $id = $this->db->insert_id();
                // renommage du final
                rename($file["full_path"], realpath('assets/img/') . "/" . $id . $file["file_ext"]);


                //Ã  utiliser si les classes sont autochargÃ©es
                //$this->upload->initialize($config);
//            redirect('produits/liste');
            }
        } else {

            /**
             * Affichage des categories de produits dans la liste dÃ©roulante
             */
            // -------------------------- sans model ---------------------------
//            $this->load->database();
//            // stockage de la requÃ¨te dans une variable
//            $query = 'SELECT * from `categories`';
//            // exÃ©cution de la requÃ¨te
//            $result = $this->db->query($query);
//            // rÃ©cupÃ©ration des rÃ©sultats
//            $categoriesList = $result->result();
//            // ------------------------- avec model --------------------------
            // appel de la classe catÃ©goriesModel
            $this->load->model('Cat_model');
            // appel de la mÃ©thode "liste()" du model prÃ©cÃ©demment chargÃ©
            $categoriesList = $this->Cat_model->categoriesList();
            // ajout des rÃ©sultats de la requÃ¨te dans le tableau des variables Ã  transmettre Ã  la vue
            $catView['categoriesList'] = $categoriesList;
            /**
             * Affichage du formulaire d'ajout
             */
            $this->load->view('header');
            $this->load->view('addProduct', $catView);
            $this->load->view('footer');
        }
    }

    /**
     * modification d'un produit
     */
    public function update($id) {
        //affichage du dÃ©tail de l'action (-> debbuger, Ã  retenir)
        // $this->output->enable_profiler(TRUE);
        // chargement/connexion Ã  la BDD
        $this->load->database();
        // chargement des helpers d'url
        $this->load->helper('url');
        // chargement du helper de formulaire
        $this->load->helper('form');
        // chargement du helper de validation du formulaire
        $this->load->library('form_validation');

        if ($this->input->post()) {
            $this->form_validation->set_rules(
                    'pro_cat_id', 'CatÃ©gories', 'required|regex_match[/^[\d]+$/]', array('required' => 'Le champs catÃ©gorie n\'est pas renseignÃ©', 'regex_match' => 'Champs catÃ©gorie non valide'));
            $this->form_validation->set_rules(
                    'pro_ref', 'RÃ©fÃ©rence', 'required|regex_match[/^[a-zA-Z\d]+$/]', array('required' => 'Le champs rÃ©fÃ©rence n\'est pas renseignÃ©', 'regex_match' => 'Champs rÃ©fÃ©rence non valide'));
            $this->form_validation->set_rules(
                    'pro_couleur', 'Couleur', 'required|regex_match[/^[a-zA-Z]+$/]', array('required' => 'Le champs couleur n\'est pas renseignÃ©', 'regex_match' => 'Champs couleur non valide'));
            $this->form_validation->set_rules(
                    'pro_libelle', 'LibellÃ©', 'required|regex_match[/^[a-zA-Z\d ]+$/]', array('required' => 'Le champs libellÃ© n\'est pas renseignÃ©', 'regex_match' => 'Champs libellÃ© non valide'));
            $this->form_validation->set_rules(
                    'pro_prix', 'Prix', 'required|regex_match[/^[\d]+[.]?[\d]{1,2}$/]', array('required' => 'Le champs prix n\'est pas renseignÃ©', 'regex_match' => 'Champs prix non valide'));
            $this->form_validation->set_rules(
                    'pro_stock', 'Stock', 'required|regex_match[/^[\d]+$/]', array('required' => 'Le champs stock n\'est pas renseignÃ©', 'regex_match' => 'Champs stock non valide'));
            $this->form_validation->set_rules(
                    'pro_description', 'Description', 'required|regex_match[/^[a-zA-Z\d\|\_ ÃªÃ«Ã¹Ã¼Ã»Ã®Ã¯Ã Ã¤Ã¢Ã¶Ã´\,\.\:\;\!\?]+$/]', array('required' => 'Le champs description n\'est pas renseignÃ©', 'regex_match' => 'Champs description non valide'));
            if ($this->form_validation->run() == FALSE) {
                //---------------------------- sans model ----------------------------
//                // stockage de la requÃ¨te pour afficher un produit dans une variable
//                $query = 'SELECT * FROM `produits` WHERE `pro_id` = ?';
//                // lancement de la requÃ¨te
//                $productById = $this->db->query($query, array($id));
//                
                //---------------------------- avec model ----------------------------
                // appel de la classe catÃ©goriesModel
                $this->load->model('Prod_model');
                // appel de la mÃ©thode "liste()" du model prÃ©cÃ©demment chargÃ©
                $productById = $this->Prod_model->productById($id);
                // rÃ©cupÃ©ration du rÃ©sultat (premiÃ¨re ligne)
                $productByIdView['produits'] = $productById->row();

                //------------------------- sans model -------------------------------
//                $query = 'SELECT * from `categories`';
//                // exÃ©cution de la requÃ¨te
//                $result = $this->db->query($query);
//                // rÃ©cupÃ©ration des rÃ©sultats
//                $productById = $result->result();
//                
//               --------------------------- avec model ------------------------------
//                 // appel de la classe catÃ©goriesModel
                $this->load->model('Cat_model');
                // appel de la mÃ©thode "liste()" du model prÃ©cÃ©demment chargÃ©
                $categoriesList = $this->Cat_model->categoriesList();

                // ajout d$productByIdes rÃ©sultats de la requÃ¨te dans le tableau des variables Ã  transmettre Ã  la vue
                $productByIdView['categoriesList'] = $categoriesList;
                // chargement des vues
                $this->load->view('header');
                $this->load->view('updateProduct', $productByIdView);
                $this->load->view('footer');
            } else {
                $data = $this->input->post();
                // configuration du chemin ou le fichier sera enregistrÃ©
                $config['upload_path'] = realpath('assets/img/');
                //type de fichier autorisÃ©s
                $config['allowed_types'] = 'gif|jpg|png';
                // chargement du helper pour l'upload
                $this->load->library('upload', $config);
                // chargement de la library 'ftp', permet l'Ã©criture sur un dossier
                //$this->load->library('ftp');
                // autorisation d'Ã©criture sur le serveur
                //$this->ftp->chmod('/assets/img/', 0755);
                // condition s'il n'y a pas de photo ajoutÃ©e
                if ($this->upload->do_upload("pro_photo")) {

                    //gestion des erreurs pour l'upload
                    $error = $this->upload->display_errors();
                    $file = $this->upload->data();
                   
                    // renommage du fichier final
                    rename($file["full_path"], realpath('assets/img/') . "/" . $id . $file["file_ext"]);
                }
                // récupération et formatage de la date (date courante) d\'ajout du produit
                $data["pro_d_modif"] = date("Y-m-d");
                // appel de la classe Prod_model
                $this->load->model('Prod_model');
                // appel de la mÃ©thode modifiant un produit selon son id
                $this->Prod_model->update($id);
                redirect('produits/liste');
            }
        } else {
            // appel de la classe catÃ©goriesModel
            $this->load->model('Prod_model');
            // appel de la mÃ©thode "liste()" du model prÃ©cÃ©demment chargÃ©
            $productById = $this->Prod_model->productById($id);
            // rÃ©cupÃ©ration du rÃ©sultat (premiÃ¨re ligne)
            $productByIdView['produits'] = $productById->row();
            // appel de la classe catÃ©goriesModel
            $this->load->model('Cat_model');
            // appel de la mÃ©thode "liste()" du model prÃ©cÃ©demment chargÃ©
            $categoriesList = $this->Cat_model->categoriesList();

            // ajout d$productByIdes rÃ©sultats de la requÃ¨te dans le tableau des variables Ã  transmettre Ã  la vue

            $productByIdView['categoriesList'] = $categoriesList;
            // chargement des vues
            $this->load->view('header');
            $this->load->view('updateProduct', $productByIdView);
            $this->load->view('footer');
        }
    }

    /**
     * Suppression d'un produit
     */
    public function delete() {
        // appel de l'helper pour la gestion des urls
        $this->load->helper('url');
      // chargement du model Prod_model
        $this->load->model('Prod_model');
        // appel de la méthode delete
        $this->Prod_model->delete();
        // redirection vers la liste de produit
        redirect('produits/liste');
    }

}

/**
 * Affichage de la vue :
 */
// dans url => http://localhost/ci/index.php/produits/liste.
//produit -> nom du controlleur
// liste -> nom de la methode affichant les vues.
