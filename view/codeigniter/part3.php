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
<a href="<?= site_url(\'Produits/update\') . \'/\' . $row->pro_id ?>" title="Lien vers la fiche produit" class="waves-effect waves-light btn">Fiche Produit</a>') ?>
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
                        <?= htmlspecialchars('
// appel de la classe catégoriesModel
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
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="ref" type="text" name="pro_ref" class="" value="<?= set_value(\'pro_ref\') != NULL ? set_value(\'pro_ref\') : $produits->pro_libelle ?>">
                                            <label for="ref">Référence</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="label" type="text" name="pro_libelle" class="" value="<?= set_value(\'pro_libelle\') != NULL ? set_value(\'pro_libelle\') : $produits->pro_libelle ?>">
                                            <label for="label">Libellé</label>
                                        </div>
                                    </div>                                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="color" type="text" name="pro_couleur" class="" value="<?= set_value(\'pro_couleur\') != NULL ? set_value(\'pro_couleur\') : $produits->pro_libelle ?>">
                                    <label for="color">Couleur</label>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="stock" type="text" name="pro_stock" class="" value="<?= set_value(\'pro_stock\') != NULL ? set_value(\'pro_stock\') : $produits->pro_libelle ?>">
                                        <label for="stock">Stock</label>
                                    </div>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="price" type="text" name="pro_prix" class="" value="<?= set_value(\'pro_prix\') != NULL ? set_value(\'pro_prix\') : $produits->pro_libelle ?>">
                                        <label for="price">Prix</label>
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
                                        <textarea id="description" class="materialize-textarea" name="pro_description"><?= set_value(\'pro_description\') != NULL ? set_value(\'pro_description\') : $produits->pro_libelle ?></textarea>
                                        <label for="description">Description</label>
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
                                    <a href="<?= site_url(\'Produits/lite\' ?>" title="Lien vers le catalogue" class="waves-effect waves-light btn cyan accent-4">Retour au catalogue</a>
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
                    <div id="ciController1" class="col s12">
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('    
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
') ?>
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
    }
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