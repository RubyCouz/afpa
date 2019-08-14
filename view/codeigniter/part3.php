<?php
include '../header.php';
?>
<div class="container">
    <h1>Modification d'un produit</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Affichage du détail d'un produit dans un formulaire</div>
            <div class="collapsible-body">
                <p>
                    La vue avec CodeIgniter reste identique à la vue créée sans le framework, nous n'allons plus nous attarder dessus.
                </p>
                <p>
                    Pour afficher le détail d'un produit avec CodeIgniter, nous allons procéder de la même manière que précédement, mais en passant l'id du produit dans l'url de manière un peu différente. A présent, l'id transitera de cette façon : <code>contrôleur/méthode/id</code>.
                </p>
                <p>
                    Nous obtiendrons donc ici, par exemple : 
                </p>
                <pre>
    <code class="html">
                        <?= htmlspecialchars('
<a href="<?= site_url(\'Produits/update\') . \'/\' . $row->pro_id ?>" title="Lien vers la fiche produit" class="waves-effect waves-light btn uk-button-small">Fiche Produit</a>') ?>
    </code>
                </pre>
                <p>
                    La méthode <code>site_url()</code> de CodeIgniter nous permet de naviguer d'une page à une autre ou d'effectuer un action en passsant par le contôleur de manière simplifée.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le model</div>
            <div class="collapsible-body">
                <p>
                    Pour afficher le détail selon un id, notre méthode se présentera de cette façon :            
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
     /**
     * Affichage d\'un produit selon son id
     */
    public function productById($id)
    {
        // chargement/connexion à la BDD
        $this->load->database();
        // stockage de la requète pour afficher un produit dans une variable
        $query = \'SELECT * FROM `produits` WHERE `pro_id` = ?\';
        // lancement de la requète
        $productById = $this->db->query($query, array($id));

        return $productById;
    }
') ?>
    </code>
                </pre>
                <p>
                    On peut remarquer que pour récupérer l'id passé dans l'url ici, il nous suffit de le passer en paramêtre de la méthode (<code>productbyId($id)</code>).
                </p>
                <p>
                    Nous commençons par charger notre connexion à la base de donnée (<code>$this->load->database</code>), puis nous stockons notre requète dans une variable (<code>$query = 'SELECT * FROM `produits` WHERE `pro_id` = ?'</code>).
                </p>
                <p>
                    Ensuite, nous pouvons lancer notre requète et stocker le resultat dans un tableau (<code>$productById = $this->db->query($query, array($id))</code>).
                </p>
                <p>
                    Puis le résultat est retourné afin de pouvoir le récupérer dans le contrôleur (<code>return $productById;</code>)
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le contrôleur</div>
            <div class="collapsible-body">
                <p>
                    Dans un premier temps, le contrôleur ressemblera à ceci :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
         public function update($id) {
        
        // chargement/connexion à la BDD
        $this->load->database();
        // chargement des helpers \'url
        $this->load->helper(\'url\');
        
        
         // appel de la classe catégoriesModel
            $this->load->model(\'produitModel\');
            // appel de la méthode "productById()" 
            $productById = $this->produitModel->productById($id);
            // récupération du résultat (première ligne)
            $productByIdView[\'produits\'] = $productById->row();
            // appel de la classe catégoriesModel
            $this->load->model(\'categoriesModel\');
            // appel de la méthode "categoriesList()" 
            $categoriesList = $this->categoriesModel->categoriesList();

            // ajout des résultats de la requète dans le tableau des variables à transmettre à la vue

            $productByIdView[\'categoriesList\'] = $categoriesList;
            // chargement des vues
            $this->load->view(\'header\');
            $this->load->view(\'updateProduct\', $productByIdView);
            $this->load->view(\'footer\');
}') ?>
    </code>
                </pre>
                <p>
                    Nous commençons par charger les différents <code>helper</code> dont nous avons besoin, puis nous appelons le modèle et la méthode qui seront utilisés :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars(' 
       // chargement/connexion à la BDD
        $this->load->database();
        // chargement des helpers \'url
        $this->load->helper(\'url\');
        
        
         // appel de la classe catégoriesModel
            $this->load->model(\'produitModel\');
            // appel de la méthode "productById()" 
            $productById = $this->produitModel->productById($id);
') ?>
    </code>
                </pre>
                <p>
                    On récupère la première ligne de notre résultat, que nous stockons dans un tableau :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars(' 
            // récupération du résultat (première ligne)
            $productByIdView[\'produits\'] = $productById->row();') ?>
    </code>
                </pre>
                <p>
                    Les lignes suivantes servent à récupérer les différentes catégories de produits afin de les afficher dans une liste déroulante :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars(' // appel de la classe catégoriesModel
            $this->load->model(\'categoriesModel\');
            // appel de la méthode "categoriesList()" 
            $categoriesList = $this->categoriesModel->categoriesList();
               // ajout des résultats de la requète dans le tableau des variables à transmettre à la vue
            $productByIdView[\'categoriesList\'] = $categoriesList;
') ?>
    </code>
                </pre>
                <p>
                    Enfin, nous pouvons charger nos vues, avec le tableau qui contient les données à y afficher que nous passons en paramêtre de notre vue principale :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
            // chargement des vues
            $this->load->view(\'header\');
            $this->load->view(\'updateProduct\', $productByIdView);
            $this->load->view(\'footer\');') ?>
    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Code final</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s2 offset-s3"><a class="active" href="#ciView1">Vue</a></li>
                            <li class="tab col s2"><a href="#ciController1">Contrôleur</a></li>
                            <li class="tab col s2"><a href="#ciModel1">Model</a></li>
                        </ul>
                    </div>
                    <div id="ciView1" class="col s12">
                        <pre>
    <code class="html">
                                <?= htmlspecialchars('<div class="uk-container">

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
</div> ') ?>
    </code>
                        </pre>
                    </div>
                    <div id="ciController1" class="col s12">
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('
    public function update($id) {
        
        // chargement/connexion à la BDD
        $this->load->database();
        // chargement des helpers \'url
        $this->load->helper(\'url\');
        
        
         // appel de la classe catégoriesModel
            $this->load->model(\'produitModel\');
            // appel de la méthode "productById()" 
            $productById = $this->produitModel->productById($id);
            // récupération du résultat (première ligne)
            $productByIdView[\'produits\'] = $productById->row();
            // appel de la classe catégoriesModel
            $this->load->model(\'categoriesModel\');
            // appel de la méthode "categoriesList()" 
            $categoriesList = $this->categoriesModel->categoriesList();

            // ajout des résultats de la requète dans le tableau des variables à transmettre à la vue

            $productByIdView[\'categoriesList\'] = $categoriesList;
            // chargement des vues
            $this->load->view(\'header\');
            $this->load->view(\'updateProduct\', $productByIdView);
            $this->load->view(\'footer\');') ?>
    </code>
                        </pre>
                    </div>
                    <div id="ciModel1" class="col s12">
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('
     /**
     * Affichage d\'un produit selon son id
     */
    public function productById($id)
    {
        // chargement/connexion à la BDD
        $this->load->database();
        // stockage de la requète pour afficher un produit dans une variable
        $query = \'SELECT * FROM `produits` WHERE `pro_id` = ?\';
        // lancement de la requète
        $productById = $this->db->query($query, array($id));

        return $productById;
    }') ?>
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