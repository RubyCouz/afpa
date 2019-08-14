<?php
include '../header.php';
?>
<div class="container">
    <h1>Modification d'un produit (suite)</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Le modèle</div>
            <div class="collapsible-body">
                <p>
                    Maintenant que nous avons réussi à afficher le détail d'un produit, nous allons le modifier. Pour cela il nous suffit de créer une nouvelle méthode dans notre modèle "Prod_model" :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
     /**
     * Modification d\'un produit
     */
    public function update($id)
    {
        // chargement/connexion à la BDD
        $this->load->database();
        // stockage du résultat de l\'upload dans un tableau
        $file = $this->upload->data();
        // stockage des données du formulaire dans un tableau
        $data = $this->input->post();
        // S\'il y a upload d\'image
        if ($this->upload->do_upload(\'pro_photo\'))
        {
        // récupération de l\'extension du fichier en vue de son insertion en base de données et extraction du \'.\' (codeigniter garde le point avant l\'extension)
            $data[\'pro_photo\'] = substr($file[\'file_ext\'], 1);
        }
        // récupération et formatage de la date (date courante) d\'ajout du produit
        $data[\'pro_d_modif\'] = date(\'Y-m-d\');
        // envoie de la requète
        $this->db->where(\'pro_id\', $id);
        $this->db->update(\'produits\', $data);
        
    }') ?>
    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le contrôleur</div>
            <div class="collapsible-body">
                <p>
                    On commance par charger les différents helpers et librairies dont nous auront besoin, puis nous procédons à la vérification du formulaire :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('     
     /**
     * Modification d\'un produit
     */
    public function update($id)
    {
        // chargement/connexion Ã  la BDD
        $this->load->database();
        // chargement des helpers d\'url
        $this->load->helper(\'url\');
        // chargement du helper de formulaire
        $this->load->helper(\'form\');
        // chargement du helper de validation du formulaire
        $this->load->library(\'form_validation\');

        if ($this->input->post()) {
            $this->form_validation->set_rules(
                    \'pro_cat_id\',
                    \'Catégories\',
                    \'required|regex_match[/^[\d]+$/]\',
                        array(
                            \'required\' => \'Le champs catégorie n\\\'est pas renseigné\',
                            \'regex_match\' => \'Champs catégorie non valide\'
                            )
                    );
            $this->form_validation->set_rules(
                    \'pro_ref\',
                    \'Référence\',
                    \'required|regex_match[/^[a-zA-Z\d]+$/]\',
                        array(
                            \'required\' => \'Le champs référence n\\\'est pas renseigné\',
                            \'regex_match\' => \'Champs référence non valide\'
                        )
                    );
            $this->form_validation->set_rules(
                    \'pro_couleur\',
                    \'Couleur\',
                    \'required|regex_match[/^[a-zA-Z]+$/]\',
                        array(
                            \'required\' => \'Le champs couleur n\\\'est pas renseigné\',
                            \'regex_match\' => \'Champs couleur non valide\'
                        )
                    );
            $this->form_validation->set_rules(
                    \'pro_libelle\',
                    \'Libellé\', \'required|regex_match[/^[a-zA-Z\d ]+$/]\',
                        array(
                            \'required\' => \'Le champs libellé n\\\'est pas renseigné\',
                            \'regex_match\' => \'Champs libellé non valide\'
                        )
                    );
            $this->form_validation->set_rules(
                    \'pro_prix\',
                    \'Prix\',
                    \'required|regex_match[/^[\d]+[.]?[\d]{1,2}$/]\',
                        array(
                            \'required\' => \'Le champs prix n\\\'est pas renseigné\',
                            \'regex_match\' => \'Champs prix non valide\'
                        )
                    );
            $this->form_validation->set_rules(
                    \'pro_stock\',
                    \'Stock\',
                    \'required|regex_match[/^[\d]+$/]\',
                        array(
                            \'required\' => \'Le champs stock n\\\'est pas renseigné\',
                            \'regex_match\' => \'Champs stock non valide\'
                        )
                    );
            $this->form_validation->set_rules(
                    \'pro_description\',
                    \'Description\',
                    \'required|regex_match[/^[a-zA-Z\d\|\_ ÃªÃ«Ã¹Ã¼Ã»Ã®Ã¯Ã Ã¤Ã¢Ã¶Ã´\,\.\:\;\!\?]+$/]\',
                        array(
                            \'required\' => \'Le champs description n\\\'est pas renseigné\',
                            \'regex_match\' => \'Champs description non valide\'
                        )
                    );
    }') ?>
    </code>
                </pre>
                <p>
                    La validation du formulaire ne s'effectuera uniquement s'il y envoie des données (<code>$this->input->post()</code>)
                </p>
                <p>
                    Avec CodeIgniter, il y a plusieurs façon de définir des règles de validation. CodeIgniter possède des messages d'erreurs déjà tout fait, qui peuvent être traduit si besoin. Nous préférons utilisé une personnalisation des messages, selon le type d'erreur effectuées. La règle de validation se fera donc sous cette forme :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
$this->form_validation->set_rules(
                        \'name input\', 
                        \'label\', 
                        \'règle1|règle2|...\', 
                        array(\'règle1 => \'message d\'erreur 1\',
                                règle2 => \'message d\'erreur 2\'
                              \')              ') ?>
    </code>
                </pre>
                <p>
                    Si la validation du formulaire est fausse, alors nous affichons le formulaire de modification :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
if ($this->form_validation->run() == FALSE) {
    // appel de la classe catégoriesModel
    $this->load->model(\'Prod_model\');
    // appel de la classe catégoriesModel
    $this->load->model(\'Prod_model\');
    // appel de la méthode "liste()" du model précédemment chargé
    $productById = $this->Prod_model->productById($id);
    // récupération du résultat (première ligne)
    $productByIdView[\'produits\'] = $productById->row();
    // appel de la classe catégoriesModel
    $this->load->model(\'Cat_model\');
    // appel de la méthode "liste()" du model précédemment chargé
    $categoriesList = $this->Cat_model->categoriesList();

    // ajout d$productByIdes résultats de la requète dans le tableau des variables Ã  transmettre Ã  la vue
    $productByIdView[\'categoriesList\'] = $categoriesList;
    // chargement des vues
    $this->load->view(\'header\');
    $this->load->view(\'updateProduct\', $productByIdView);
    $this->load->view(\'footer\');
}


') ?>
    </code>
                </pre>
                <p>
                    Sinon nous pouvons contrôler l'upload du fichier. Si l'upload se fait, alors nous pouvons extraire l'extension du fichier en vue de son insertion dans la base de données. Dans le cadre de l'exercice, et afin de respecter la syntaxe des données déjà inscrites dans la base, nous devons manipuler cette extension. CodeIgniter nous fournit l'extension directement MAIS avec le '.'. Il nous faut donc l'extraire afin de ne pas avoir d'erreur lors de l'affichage de nos photos :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
 $data = $this->input->post();
 // configuration du chemin ou le fichier sera enregistré
 $config[\'upload_path\'] = realpath(\'assets/img/\');
 //type de fichier autorisés
 $config[\'allowed_types\'] = \'gif|jpg|png\';
 // chargement du helper pour l\'upload
 $this->load->library(\'upload\', $config);
 // récupération de l\'extension du fichier en vue de son insertion en base de données et extraction du \'.\' (codeigniter garde le point avant l\'extension)
 // Si l\'upload se fait
    if ($this->upload->do_upload(\'pro_photo\'))
      {
      //gestion des erreurs pour l\'upload
      $error = $this->upload->display_errors();
      $file = $this->upload->data();
      // récupération de l\'extensio du fichier en vue de son insertion en base de données et extraction du \'.\' (codeigniter garde le point avant l\'extension)
        $data[\'pro_photo\'] = substr($file[\'file_ext\'], 1);
        }') ?>
    </code>
                </pre>
                <p>
                    Nous pouvons ensuite récupérer la date de modification (date en cours) et enfin lancer notre modification dans la base de données :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
        // récupération et formatage de la date (date courante) d\'ajout du produit
        $data["pro_d_modif"] = date("Y-m-d");
        // update
        $this->db->where(\'pro_id\', $id);
        $this->db->update(\'produits\', $data);
') ?>
    </code>
                </pre>
                <p>
                    Enfin, s'il n'y a pas d'envoie de formuaire, alors nous affichons le formulaire de modification :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
if ($this->form_validation->run() == FALSE) {
    // appel de la classe catégoriesModel
    $this->load->model(\'Prod_model\');
    // appel de la classe catégoriesModel
    $this->load->model(\'Prod_model\');
    // appel de la méthode "liste()" du model précédemment chargé
    $productById = $this->Prod_model->productById($id);
    // récupération du résultat (première ligne)
    $productByIdView[\'produits\'] = $productById->row();
    // appel de la classe catégoriesModel
    $this->load->model(\'Cat_model\');
    // appel de la méthode "liste()" du model précédemment chargé
    $categoriesList = $this->Cat_model->categoriesList();

    // ajout d$productByIdes résultats de la requète dans le tableau des variables Ã  transmettre Ã  la vue
    $productByIdView[\'categoriesList\'] = $categoriesList;
    // chargement des vues
    $this->load->view(\'header\');
    $this->load->view(\'updateProduct\', $productByIdView);
    $this->load->view(\'footer\');
}


') ?>
    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">En résumé</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3"><a class="active" href="#ciModel2">Model</a></li>
                            <li class="tab col s3"><a href="#ciControleur2">Contrôleur</a></li>
                            <li class="tab col s3"><a href="#ciView">Vue</a></li>
                        </ul>
                    </div>
                    <div id="ciModel2" class="col s12">
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('
     /**
     * Modification d\'un produit
     */
    public function update($id)
    {
        // chargement/connexion à la BDD
        $this->load->database();
        // stockage du résultat de l\'upload dans un tableau
        $file = $this->upload->data();
        // stockage des données du formulaire dans un tableau
        $data = $this->input->post();
        // S\'il y a upload d\'image
        if ($this->upload->do_upload(\'pro_photo\'))
        {
        // récupération de l\'extension du fichier en vue de son insertion en base de données et extraction du \'.\' (codeigniter garde le point avant l\'extension)
            $data[\'pro_photo\'] = substr($file[\'file_ext\'], 1);
        }
        // récupération et formatage de la date (date courante) d\'ajout du produit
        $data[\'pro_d_modif\'] = date(\'Y-m-d\');
        // envoie de la requète
        $this->db->where(\'pro_id\', $id);
        $this->db->update(\'produits\', $data);        
    } 
') ?>
    </code>
                        </pre>
                    </div>
                    <div id="ciControleur2" class="col s12">
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('
     /**
     * modification d\'un produit
     */
    public function update($id) {
        //affichage du détail de l\'action (-> debbuger, Ã  retenir)
        // $this->output->enable_profiler(TRUE);
        // chargement/connexion Ã  la BDD
        $this->load->database();
        // chargement des helpers d\'url
        $this->load->helper(\'url\');
        // chargement du helper de formulaire
        $this->load->helper(\'form\');
        // chargement du helper de validation du formulaire
        $this->load->library(\'form_validation\');

        if ($this->input->post()) {
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
                    \'pro_description\', \'Description\', \'required|regex_match[/^[a-zA-Z\d\|\_ éèàäâêëîïùöô´\,\.\:\;\!\?]+$/]\', array(\'required\' => \'Le champs description n\\\'est pas renseigné\', \'regex_match\' => \'Champs description non valide\'));
            if ($this->form_validation->run() == FALSE) {
                // appel de la classe catégoriesModel
                $this->load->model(\'Prod_model\');
                // appel de la méthode "liste()" du model précédemment chargé
                $productById = $this->Prod_model->productById($id);
                // récupération du résultat (première ligne)
                $productByIdView[\'produits\'] = $productById->row();                           
                // appel de la classe Cat_model
                $this->load->model(\'Cat_model\');
                // appel de la méthode "categoriesList()" 
                $categoriesList = $this->Cat_model->categoriesList();

                // ajout des résultats de la requète dans le tableau des variables Ã  transmettre Ã  la vue
                $productByIdView[\'categoriesList\'] = $categoriesList;
                // chargement des vues
                $this->load->view(\'header\');
                $this->load->view(\'updateProduct\', $productByIdView);
                $this->load->view(\'footer\');
            } else {
                $data = $this->input->post();
                // configuration du chemin ou le fichier sera enregistré
                $config[\'upload_path\'] = realpath(\'assets/img/\');
                //type de fichier autorisés
                $config[\'allowed_types\'] = \'gif|jpg|png\';
                // chargement du helper pour l\'upload
                $this->load->library(\'upload\', $config);               
                // condition s\'il n\'y a pas de photo ajoutée
                if ($this->upload->do_upload("pro_photo")) {

                    //gestion des erreurs pour l\'upload
                    $error = $this->upload->display_errors();
                    $file = $this->upload->data();
                   
                    // renommage du fichier final
                    rename($file["full_path"], realpath(\'assets/img/\') . "/" . $id . $file["file_ext"]);
                }
                // récupération et formatage de la date (date courante) d\\\'ajout du produit
                $data["pro_d_modif"] = date("Y-m-d");
                // appel de la classe Prod_model
                $this->load->model(\'Prod_model\');
                // appel de la méthode modifiant un produit selon son id
                $this->Prod_model->update($id);
                redirect(\'produits/liste\');
            }
        } else {
            // appel de la classe catégoriesModel
            $this->load->model(\'Prod_model\');
            // appel de la méthode "productById()" 
            $productById = $this->Prod_model->productById($id);
            // récupération du résultat (première ligne)
            $productByIdView[\'produits\'] = $productById->row();
            // appel de la classe catégoriesModel
            $this->load->model(\'Cat_model\');
            // appel de la méthode "categoriesList()" 
            $categoriesList = $this->Cat_model->categoriesList();

            // ajout d$productByIdes résultats de la requête dans le tableau des variables à  transmettre à  la vue

            $productByIdView[\'categoriesList\'] = $categoriesList;
            // chargement des vues
            $this->load->view(\'header\');
            $this->load->view(\'updateProduct\', $productByIdView);
            $this->load->view(\'footer\');
        }
    }

                ') ?>
    </code>
                        </pre>
                    </div>
                    <div id="ciView" class="col s12">
                        <pre>
    <code class="html">
                                <?= htmlspecialchars(' 
                <div class="uk-container">

    <?php //echo validation_errors(); ?>
    <form action="" method="POST" enctype="multipart/form-data">

        <div class="uk-alert-danger">
            <!-- <?= $error ?> -->
        </div>
        <fieldset class="uk-fieldset">
            <legend class="uk-legend">Modifier un produit</legend>

            <div class="uk-child-width-1-2 uk-text-center" uk-grid>
                <div>
                    <div class="uk-card uk-card-default uk-card-body">
                        <img src="<?= base_url(\'assets/img/\' . $produits->pro_id . \'.\' . $produits->pro_photo) ?>" alt="Photo d\'illustration" title="Photo de <?= $produits->pro_libelle ?>" />
                    </div>
                </div>

                <div>
                    <div class="uk-margin">
                        <div class="uk-form-controls">
                            <input class="uk-input" id="id" type="hidden" name="pro_id" value="<?= $produits->pro_id ?>" />
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label for="categories"></label>
                        <select class="uk-select" id="categories" name="pro_cat_id">
                            <option disabled selected>Choisissez une catégorie</option>
                            <?php
                            foreach ($categoriesList as $row)
                            {
                                ?>
                                <option value="<?= $row->cat_id ?>" <?= $row->cat_id == $produits->pro_cat_id ? \'selected\' : \'\' ?>><?= $row->cat_nom ?></option>
                                <?php
                            }
                            ?>
                        </select>   
                        <?php
                        if (form_error(\'pro_cat_id\') != NULL)
                        {
                            ?>
                            <div class="uk-alert-danger" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p><?= form_error(\'pro_cat_id\') ?></p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="ref">Référence</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="ref" type="text" name="pro_ref" placeholder="Indiquez une référence" value="<?= set_value(\'pro_ref\') != NULL ? set_value(\'pro_ref\') : $produits->pro_ref ?>" />
                        </div>
                        <?php
                        if (form_error(\'pro_ref\') != NULL)
                        {
                            ?>
                            <div class="uk-alert-danger" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p><?= form_error(\'pro_ref\') ?></p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="color">Couleur</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="color" type="text" name="pro_couleur" placeholder="Indiquez une couleur"  value="<?= set_value(\'pro_couleur\') != NULL ? set_value(\'pro_couleur\') : $produits->pro_couleur ?>" />
                        </div>
                        <?php
                        if (form_error(\'pro_couleur\') != NULL)
                        {
                            ?>
                            <div class="uk-alert-danger" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p><?= form_error(\'pro_couleur\') ?></p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="label">Libellé</label> /
                        <div class="uk-form-controls">
                            <input class="uk-input" id="label" type="text" name="pro_libelle" placeholder="Libellé" value="<?= set_value(\'pro_libelle\') != NULL ? set_value(\'pro_libelle\') : $produits->pro_libelle ?>" />
                        </div>
                        <?php
                        if (form_error(\'pro_libelle\') != NULL)
                        {
                            ?>
                            <div class="uk-alert-danger" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p><?= form_error(\'pro_libelle\') ?></p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="price">Prix</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="price" type="text" name="pro_prix" placeholder="Prix"  value="<?= set_value(\'pro_prix\') != NULL ? set_value(\'pro_prix\') : $produits->pro_prix ?>" />
                        </div>
                        <?php
                        if (form_error(\'pro_prix\') != NULL)
                        {
                            ?>
                            <div class="uk-alert-danger" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p><?= form_error(\'pro_prix\') ?></p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="stock">Stock</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="stock" type="text" name="pro_stock" placeholder="Quantité en stock"  value="<?= set_value(\'pro_stock\') != NULL ? set_value(\'pro_stock\') : $produits->pro_stock ?>" />
                        </div>
                        <?php
                        if (form_error(\'pro_stock\') != NULL)
                        {
                            ?>
                            <div class="uk-alert-danger" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p><?= form_error(\'pro_stock\') ?></p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="uk-margin">
                        <div uk-form-custom="target: true">
                            <input type="file" name="pro_photo" >
                            <input class="uk-input uk-form-width-medium" type="text" placeholder="Insérez une image" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="description">Description</label>
                <textarea class="uk-textarea" rows="5" id="description" placeholder="Description" name="pro_description" ><?= set_value(\'pro_description\') != NULL ? set_value(\'pro_description\') : $produits->pro_description ?></textarea>
                <?php
                if (form_error(\'pro_description\') != NULL)
                {
                    ?>
                    <div class="uk-alert-danger" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <p><?= form_error(\'pro_description\') ?></p>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                <label>Produit bloqué :</label>
                <label><input class="uk-radio" type="radio" name="pro_bloque" value="1" <?= $produits->pro_bloque == 1 ? \'checked\' : \'\' ?>> Oui</label>
                <label><input class="uk-radio" type="radio" name="pro_bloque" value="2" <?= $produits->pro_bloque == 1 ? \'\' : \'checked\' ?>> Non</label>
            </div>
        </fieldset>
        <input type="submit" value="Modifier le produit" class="waves-effect waves-light btn" />
        <button class="uk-button uk-button-danger" type="button" uk-toggle="target: #modal-example">Supprimer le produit</button>
    </form>

    <!-- This is the modal -->
    <div id="modal-example" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <h2 class="uk-modal-title">ATTENTION :</h2>
            <p>Voulez-vous vraiment supprimer ce produit?</p>
            <p>Cette suppression sera irreversible.</p>
            <div class="uk-text-right">
                <form action="<?= site_url(\'Produits/delete\') ?>" method="POST">
                    <input type="hidden" name="pro_id" id="pro_id" value="<?= $produits->pro_id ?>" />
                    <input type="submit" name="delete" id="delete" class="uk-button uk-button-danger" value="Oui" />
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Non</button>
                </form>
            </div>
        </div>
    </div>


    <hr class="uk-divider-icon" />
</div> 
                ') ?>
    </code>
                        </pre>
                    </div>
                </div>
                <a href="../ci/index.php/produits/liste" class="waves-effect waves-light btn" title="Lien vers démo" target="_blank">RUN CODE</a>
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>