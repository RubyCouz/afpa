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
                    Nous commençons par charger les différents helpers et librairies dont nous aurons besoin, puis nous procédons à la vérification du formulaire :
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
 // configuration du chemin où le fichier sera enregistré
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
            <div class="collapsible-header">Gestion des messages d'erreur</div>
            <div class="collapsible-body">
                <p>
                    Sous CodeIgniter, les erreurs que nous avons défini avec les <code>set_rules()</code> sont exploitables dans la vue à l'aide de la méthode <a href="https://codeigniter.com/user_guide/helpers/form_helper.html?highlight=form_error#form_error" class="second" title="Lien vers la documentation de CodeIgniter" target="_blanked"><code>form_error()</code></a>.
                </p>
                <p>
                    Pour l'exemple, nous utiliserons cette méthode de cette façon :
                </p>
                <pre>
    <code class="HTMLBars">
                        <?= htmlspecialchars(' 
<input id="price" type="text" name="pro_prix" class="" value="<?= set_value(\'pro_prix\') != NULL ? set_value(\'pro_prix\') : $produits->pro_prix ?>">
<label for="price">Prix</label>
<?php
if (form_error(\'pro_prix\') != NULL)
{
    ?>
    <span class="new badge"><?= form_error(\'pro_prix\') ?></span>
    <?php
}
?>
') ?>
    </code>
                </pre>
                <p>
                    A l'endroit où nous voulons afficher notre message d'erreur, nous plaçons notre conditions. Plutôt que de vérifier si un valeur est présente à l'aide de <code>isset()</code>, nous vérifions la valeur retournée par la méthode <code>form_error()</code> avec en paramêtre le <code>name</code> du champs concerné. Si cette valeur est différente de <code>NULL</code>, c'est qu'il y eu une erreur, on va donc en infomer l'utilisateur.
                </p>
                <p>
                    Si une erreur est présente, le formulaire sera toujours afficher, avec le message d'erreur. Mais il faut que les champs restent remplis, afin d'éviter à l'utilisateur une nouvelle saisie. Pour cela nous ferons appel à la méthode <a href="https://codeigniter.com/user_guide/helpers/form_helper.html?highlight=set_value#set_value" title="Lien vers la documentation de codeigniter" target="_blanked"><code>set_value()</code></a>.
                </p>
                <p>
                    la vérification de cette valeur se fait de la même façon que pour <code>form_error()</code>, et elle se fera au sein de l'attribut <code>value</code> de nos inputs :
                </p>
                <pre>
    <code class="HTMLBars">
                        <?= htmlspecialchars('
<input id="price" type="text" name="pro_prix" class="" value="<?= set_value(\'pro_prix\') != NULL ? set_value(\'pro_prix\') : $produits->pro_prix ?>">
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
                            <li class="tab col s2 offset-s3"><a class="active" href="#ciModel2">Model</a></li>
                            <li class="tab col s2"><a href="#ciControleur2">Contrôleur</a></li>
                            <li class="tab col s2"><a href="#ciView">Vue</a></li>
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
    public function update($id)
    {
        //affichage du détail de l\'action (-> debbuger, Ã  retenir)
        $this->output->enable_profiler(TRUE);
        // chargement des helpers d\'url
        $this->load->helper(\'url\');
        // chargement du helper de formulaire
        $this->load->helper(\'form\');
        // chargement du helper de validation du formulaire
        $this->load->library(\'form_validation\');

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

                // appel de la classe catégoriesModel
                $this->load->model(\'Prod_model\');
                // appel de la méthode "liste()" du model précédemment chargé
                $productById = $this->Prod_model->productById($id);
                // récupération du résultat (premiÃ¨re ligne)
                $productByIdView[\'produits\'] = $productById->row();


//                 // appel de la classe catégoriesModel
                $this->load->model(\'Cat_model\');
                // appel de la méthode "liste()" du model précédemment chargé
                $categoriesList = $this->Cat_model->categoriesList();

                // ajout des résultats de la requÃ¨te dans le tableau des variables Ã  transmettre Ã  la vue
                $productByIdView[\'categoriesList\'] = $categoriesList;
                // chargement des vues
                $this->load->view(\'header\');
                $this->load->view(\'updateProduct\', $productByIdView);
                $this->load->view(\'footer\');
            }
            else
            {
                $data = $this->input->post();
                // configuration du chemin ou le fichier sera enregistré
                $config[\'upload_path\'] = realpath(\'assets/img/\');
                //type de fichier autorisés
                $config[\'allowed_types\'] = \'gif|jpg|png\';
                // chargement du helper pour l\'upload
                $this->load->library(\'upload\', $config);
                // condition s\'il n\'y a pas de photo ajoutée
                if ($this->upload->do_upload(\'pro_photo\'))
                {
                    //gestion des erreurs pour l\'upload
                    $error = $this->upload->display_errors();
                    $file = $this->upload->data();
                    // renommage du fichier final
                    rename($file[\'full_path\'], realpath(\'assets/img/\') . \'/\' . $id . $file[\'file_ext\']);
                }
                // appel de la classe Prod_model
                $this->load->model(\'Prod_model\');
                // appel de la méthode modifiant un produit selon son id
                $this->Prod_model->update($id);
                $this->load->view(\'header\');
                $this->load->view(\'confirm\');
                $this->load->view(\'footer\');
                //redirect(\'produits/liste\');
            }
        }
        else
        {
            // appel de la classe catégoriesModel
            $this->load->model(\'Prod_model\');
            // appel de la méthode "liste()" du model précédemment chargé
            $productById = $this->Prod_model->productById($id);
            // récupération du résultat (premiÃ¨re ligne)
            $productByIdView[\'produits\'] = $productById->row();
            // appel de la classe catégoriesModel
            $this->load->model(\'Cat_model\');
            // appel de la méthode "liste()" du model précédemment chargé
            $categoriesList = $this->Cat_model->categoriesList();

            // ajout des résultats de la requÃ¨te dans le tableau des variables Ã  transmettre Ã  la vue

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
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card light-green lighten-5">
                    <div class="card-content">
                        <span class="card-title">Détail du produit <?= $produits->pro_libelle ?> :</span>
                        <form method="POST" action="#" enctype="multipart/form-data">   
                            <div class="row">
                                <div class="col s6" id="prev">
                                    <img src="<?= base_url(\'assets/img/\' . $produits->pro_id . \'.\' . $produits->pro_photo) ?>" alt="image de <?= $produits->pro_libelle ?>" class="pic2">
                                </div>
                                <div class="col s6">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="id" type="text" name="id" class="" disabled value="<?= $produits->pro_id ?>">
                                            <label for="id">ID</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select name="pro_cat_id" id="categories">
                                                <option value="" disabled selected>Choisissez une catégorie</option>
                                                <?php
                                                foreach ($categoriesList as $cat)
                                                {
                                                    ?>
                                                    <option value="<?= $cat->cat_id ?>"<?= isset($_POST[\'pro_cat_id\']) && $_POST[\'pro_cat_id\'] == $cat->cat_id || ($cat->cat_id == $produits->pro_cat_id) ? \'selected\' : \'\' ?>><?= $cat->cat_nom ?></option>
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
                                            <input id="ref" type="text" name="pro_ref" class="" value="<?= set_value(\'pro_ref\') != NULL ? set_value(\'pro_ref\') : $produits->pro_ref ?>">
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
                                            <input id="label" type="text" name="pro_libelle" class="" value="<?= set_value(\'pro_libelle\') != NULL ? set_value(\'pro_libelle\') : $produits->pro_libelle ?>">
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
                                    <input id="color" type="text" name="pro_couleur" class="" value="<?= set_value(\'pro_couleur\') != NULL ? set_value(\'pro_couleur\') : $produits->pro_couleur ?>">
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
                                        <input id="stock" type="text" name="pro_stock" class="" value="<?= set_value(\'pro_stock\') != NULL ? set_value(\'pro_stock\') : $produits->pro_stock ?>">
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
                                        <input id="price" type="text" name="pro_prix" class="" value="<?= set_value(\'pro_prix\') != NULL ? set_value(\'pro_prix\') : $produits->pro_prix ?>">
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
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="input-field">
                                        <textarea id="description" class="materialize-textarea" name="pro_description"><?= set_value(\'pro_description\') != NULL ? set_value(\'pro_description\') : $produits->pro_description ?></textarea>
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
                                        <input name="pro_bloque" type="radio" value="1" <?= $produits->pro_bloque == 1 ? \'checked\' : \'\' ?>>
                                        <span>Oui</span>
                                    </label>
                                </div>
                                <div class="col s1 radio">
                                    <label>
                                        <input name="pro_bloque" type="radio" value="2" <?= ($produits->pro_bloque == NULL) || ($produits->pro_bloque == 2) ? \'checked\' : \'\' ?>>
                                        <span>Non</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6">
                                    <p>Date d\'ajout : <?= $produits->pro_d_ajout ?></p>
                                </div>
                                <div class="col s6">
                                    <p>Date de modification : <?= $produits->pro_d_modif == NULL ? \'Pas de modification enregistrée\' : $produits->pro_d_modif ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s4 center-align">
                                    <input type="submit" value="Modifier le produit" class="waves-effect waves-light btn">
                                </div>
                                <div class="col s4 center-align">
                                    <a type="submit" name="delete" id="delete" href="#modal<?= $produits->pro_id ?>" class="waves-effect waves-light btn modal-trigger red accent-4">Effacer le produit</a>
                                </div>
                                <div class="col s4 center-align">
                                    <a href="<?= site_url(\'Produits/liste\') ?>" title="Lien vers le catalogue" class="waves-effect waves-light btn cyan accent-4">Retour au catalogue</a>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
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