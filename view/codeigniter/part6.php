<?php
include '../header.php';
?>
<div class="container">
    <h1>Ajout d'un produit</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Explications</div>
            <div class="collapsible-body">
                <p>
                    La méthode pour ajouter une ligne dans une table est très proche de la modification. Seule la requète d'insertion en base de données change, et cette fois-ci l'upload du fichier n'est pas facultatif. Il n'y aura donc pas de conditions selon si l'upload se fait ou pas, on récupère l'extension pour la mettre en base de données et on déplace le fichier sur le serveur.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Code et démo</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s4"><a class="active" href="#modelAdd">Modèle</a></li>
                            <li class="tab col s4"><a href="#controlAdd">Contrôleur</a></li>
                            <li class="tab col s4"><a href="#viewAdd">Vue</a></li>
                        </ul>
                    </div>
                    <div id="modelAdd" class="col s12">
                        <pre>
<code class="php">
                                <?= htmlspecialchars('
     /**
     * Ajout d\'un produit
     */
    public function addProduct()
    {
        // chargement/connexion à la base de données
        $this->load->database();
        $file = $this->upload->data();
        // récupération des données du formulaire
        $data = $this->input->post();
        // récupération et formatage de la date (date courante) d\'ajout du produit
        $data["pro_d_ajout"] = date("Y-m-d");
        // récupération de l\'extensio du fichier en vue de son insertion en base de données
        $data["pro_photo"] = substr($file["file_ext"], 1);
        // insertion des données du formulaire en base de données ($data -> données du formulaire)
        $this->db->insert("produits", $data);
    }

') ?>
    </code>
                        </pre>
                    </div>
                    <div id="controlAdd" class="col s12">
                        <pre>
<code class="php">
                                <?= htmlspecialchars('
/**
     * Ajout d\'un produit
     */
    public function addProduct()
    {
        //$this->output->enable_profiler(TRUE);
        // appel de l\'helper pour la gestion des urls
        $this->load->helper(\'url\');
        // appel du helper form
        $this->load->helper(\'form\');
        // chargement de la librairie validation du formulaire
        $this->load->library(\'form_validation\');
        // ATTENTION Au FORMULAIRE : IL FAUT QUE LES NAMES DES INPUT SOIENT IDENTIQUES AUX NOMS DES CHAMPS DE LA TABLE, ET SUPPRIMER LE POST[\'SUBMIT\']
        if ($this->input->post())
        {
            $this->form_validation->set_rules(
                    \'pro_cat_id\', \'Catégories\', \'required|regex_match[/^[\d]+$/]\', array(\'required\' => \'Le champs catégorie n\\\'est pas renseigné\', \'regex_match\' => \'Champs catégorie non valide\'));
            $this->form_validation->set_rules(
                    \'pro_ref\', \'Référence\', \'required|regex_match[/^[a-zA-Z\d]+$/]\', array(\'required\' => \'Le champs référence n\\\'est pas renseigné\', \'regex_match\' => \'Champs référence non valide\'));
            $this->form_validation->set_rules(
                    \'pro_couleur\', \'Couleur\', \'required|regex_match[/^[a-zA-Z]+$/]\', array(\'required\' => \'Le champs couleur n\\\'est pas renseigné\', \'regex_match\' => \'Champs couleur non valide\'));
            $this->form_validation->set_rules(
                    \'pro_libelle\', \'Libellé\', \'required|regex_match[/^[a-zA-Z\d ]+$/]\', array(\'required\' => \'Le champs libellé n\\\'est pas renseigné\', \'regex_match\' => \'Champs libellé non valide\'));
            $this->form_validation->set_rules(
                    \'pro_prix\', \'Prix\', \'required|regex_match[/^[\d]+[.]?[\d]{1,2}$/]\', array(\'required\' => \'Le champs prix n\\\'est pas renseigné\', \'regex_match\' => \'Champs prix non valide\'));
            $this->form_validation->set_rules(
                    \'pro_stock\', \'Stock\', \'required|regex_match[/^[\d]+$/]\', array(\'required\' => \'Le champs stock n\\\'est pas renseigné\', \'regex_match\' => \'Champs stock non valide\'));
            $this->form_validation->set_rules(
                    \'pro_description\', \'Description\', \'required|regex_match[/^[a-zA-Z\d\|\_ ÃªÃ«Ã¹Ã¼Ã»Ã®Ã¯Ã Ã¤Ã¢Ã¶Ã´\,\.\:\;\!\?]+$/]\', array(\'required\' => \'Le champs description n\\\'est pas renseigné\', \'regex_match\' => \'Champs description non valide\'));
            if ($this->form_validation->run() == FALSE)
            {
                /**
                 * Affichage des categories de produits dans la liste déroulante
                 */
                // chargement du model "Prod_model"
                $this->load->model(\'Cat_model\');
                // appel de la méthode "liste()" du model précédemment chargé
                $categoriesList = $this->Cat_model->categoriesList();
                $catView[\'categoriesList\'] = $categoriesList;
                /**
                 * Affichage du formulaire d\'ajout
                 */
                $this->load->view(\'header\');
                $this->load->view(\'addProduct\', $catView);
                $this->load->view(\'footer\');
            }
            else
            {
                // configuration du chemin ou le fichier sera enregistré
                $config[\'upload_path\'] = realpath(\'assets/img/\');
                //type de fichier autorisés
                $config[\'allowed_types\'] = \'gif|jpg|png\';
                // chargement du helper pour l\'upload
                $this->load->library(\'upload\', $config);
                // upload du fichier
                $this->upload->do_upload("pro_photo");
                //gestion des erreurs pour l\'upload
                $error = $this->upload->display_errors();
                if ($error == \'\')
                {
                    $file = $this->upload->data();

                    $this->load->model(\'Prod_model\');
                    $this->Prod_model->addProduct();
                    $id = $this->db->insert_id();
                    // renommage du final
                    rename($file["full_path"], realpath(\'assets/img/\') . "/" . $id . $file["file_ext"]);
                    $this->load->view(\'header\');
                    $this->load->view(\'confirmAdd\');
                    $this->load->view(\'footer\');

                    //Ã  utiliser si les classes sont autochargées
                    //$this->upload->initialize($config);
                }
                else
                {
                    /**
                     * Affichage des categories de produits dans la liste déroulante
                     */
                    // appel de la classe catégoriesModel
                    $this->load->model(\'Cat_model\');
                    // appel de la méthode "liste()" du model précédemment chargé
                    $categoriesList = $this->Cat_model->categoriesList();
                    // ajout des résultats de la requÃ¨te dans le tableau des variables Ã  transmettre Ã  la vue
                    $catView[\'categoriesList\'] = $categoriesList;
                    $catView[\'error\'] = $error;
                    /**
                     * Affichage du formulaire d\'ajout
                     */
                    $this->load->view(\'header\');
                    $this->load->view(\'addProduct\', $catView);
                    $this->load->view(\'footer\');
                }
            }
        }
        else
        {

            /**
             * Affichage des categories de produits dans la liste déroulante
             */
            // appel de la classe catégoriesModel
            $this->load->model(\'Cat_model\');
            // appel de la méthode "liste()" du model précédemment chargé
            $categoriesList = $this->Cat_model->categoriesList();
            // ajout des résultats de la requÃ¨te dans le tableau des variables Ã  transmettre Ã  la vue
            $catView[\'categoriesList\'] = $categoriesList;
            /**
             * Affichage du formulaire d\'ajout
             */
            $this->load->view(\'header\');
            $this->load->view(\'addProduct\', $catView);
            $this->load->view(\'footer\');
        }
    }

                            ') ?>
    </code>
                        </pre>
                    </div>
                    <div id="viewAdd" class="col s12">
                        <pre>
<code class="HTMLBars">
                                <?= htmlspecialchars('                      
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card light-green lighten-5">
                <div class="card-content">
                    <span class="card-title">Ajout d\'un produit</span>
                    <form method="POST" action="#" enctype="multipart/form-data">   
                        <div class="row">
                            <div class="col s6" id="prev">
                                <img src="" alt="image" title="preview de l\'image du produit" class="pic2">
                            </div>
                            <div class="col s6">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <select name="pro_cat_id" id="categories">
                                            <option value="" disabled selected>Choisissez une catégorie</option>
                                            <?php
                                            foreach ($categoriesList as $cat)
                                            {
                                                ?>
                                                <option value="<?= $cat->cat_id ?>" <?= set_value(\'pro_cat_id\') == $cat->cat_id ? \'selected\' : \'\' ?>><?= $cat->cat_nom ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="categories">Catégorie</label>
                                        <?php
                                        if (form_error(\'pro_cat_id\') != NULL)
                                        {
                                            ?>
                                            <span class="new badge"><?= form_error(\'pro_cat_id\') ?></span>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="ref" type="text" name="pro_ref" class="" value="<?= set_value(\'pro_ref\') != NULL ? set_value(\'pro_ref\') : \'\' ?>">
                                        <label for="ref">Référence</label>
                                        <?php
                                        if (form_error(\'pro_ref\') != NULL)
                                        {
                                            ?>
                                            <span class="new badge"><?= form_error(\'pro_ref\') ?></span>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="label" type="text" name="pro_libelle" class="" value="<?= set_value(\'pro_libelle\') != NULL ? set_value(\'pro_libelle\') : \'\' ?>">
                                        <label for="label">Libellé</label>
                                        <?php
                                        if (form_error(\'pro_libelle\') != NULL)
                                        {
                                            ?>
                                            <span class="new badge"><?= form_error(\'pro_libelle\') ?></span>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>                                                    
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="color" type="text" name="pro_couleur" class="" value="<?= set_value(\'pro_couleur\') != NULL ? set_value(\'pro_couleur\') : \'\' ?>">
                                <label for="color">Couleur</label>
                                <?php
                                if (form_error(\'pro_couleur\') != NULL)
                                {
                                    ?>
                                    <span class="new badge"><?= form_error(\'pro_couleur\') ?></span>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="col s6">
                                <div class="input-field">
                                    <input id="stock" type="text" name="pro_stock" class="" value="<?= set_value(\'pro_stock\') != NULL ? set_value(\'pro_stock\') : \'\' ?>">
                                    <label for="stock">Stock</label>
                                    <?php
                                    if (form_error(\'pro_stock\') != NULL)
                                    {
                                        ?>
                                        <span class="new badge"><?= form_error(\'pro_stock\') ?></span>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col s6">
                                <div class="input-field">
                                    <input id="price" type="text" name="pro_prix" class="" value="<?= set_value(\'pro_prix\') != NULL ? set_value(\'pro_prix\') : \'\' ?>">
                                    <label for="price">Prix</label>
                                    <?php
                                    if (form_error(\'pro_prix\') != NULL)
                                    {
                                        ?>
                                        <span class="new badge"><?= form_error(\'pro_prix\') ?></span>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col s6">
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Insérer une photo</span>
                                        <input type="file" name="pro_photo" id="upload">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" id="file">
                                    </div>
                                    <span class="info">Au format .gif, .jpg, .jpeg, .pjpeg ou .png</span>
                                </div>
                                <?php
                                    if (isset($error) && $error != \'\')
                                    {
                                        ?>
                                        <span class="new badge"><?= $error ?></span>
                                        <?php
                                    }
                                    ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <div class="input-field">
                                    <textarea id="description" class="materialize-textarea" name="pro_description"><?= set_value(\'pro_description\') != NULL ? set_value(\'pro_description\') : \'\' ?></textarea>
                                    <label for="description">Description</label>
                                    <?php
                                    if (form_error(\'pro_description\') != NULL)
                                    {
                                        ?>
                                        <span class="new badge"><?= form_error(\'pro_description\') ?></span>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row valign-wrapper left-align">
                            <div class="col s2 radio">
                                <p>Produit bloqué :</p>
                            </div>
                            <div class="col s1 radio">
                                <label>
                                    <input name="pro_bloque" type="radio" value="1" <?= set_value(\'pro_bloque\') == 1 ? \'checked\' : \'\' ?>>
                                    <span>Oui</span>
                                </label>
                            </div>
                            <div class="col s1 radio">
                                <label>
                                    <input name="pro_bloque" type="radio" value="2" <?= set_value(\'pro_bloque\') == 2 ? \'checked\' : \'\' ?>>
                                    <span>Non</span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6 center-align">
                                <input type="submit" value="Ajouter le produit" class="waves-effect waves-light btn">
                            </div>
                            <div class="col s6 center-align">
                                <a href="<?= site_url(\'Produits/liste\') ?>" title="Lien vers le catalogue" class="waves-effect waves-light btn cyan accent-4">Retour au catalogue</a>
                            </div>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>   
') ?>
    </code>
                        </pre>
                    </div>
                </div>
                <a href="../ci/index.php/produits/liste" class="waves-effect waves-light btn" title="Lien vers démo" target="_blank"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>