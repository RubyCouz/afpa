
<div class="container">
    <h1>Suppression d'un produit</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Ajout d'un bouton "Supprimer" au formulaire</div>
            <div class="collapsible-body">
                <p>Pour pouvoir supprimer un produit de notre base, nous allons commencer par ajouter un bouton "Supprimer" à côté du bouton "Modifier" déjà present :</p>
                <pre>
    <code class="html">
                        <?= htmlspecialchars(' 
<input type="submit" name="submit" value="Modifier le produit" class="waves-effect waves-light btn">
<a type="submit" name="delete" id="delete" href="#modal<?= $product->pro_id ?>" class="waves-effect waves-light btn modal-trigger red accent-4">Effacer le produit</a>
') ?>
    </code>
                </pre>
                <p>
                    Ce bouton déclenchera une modal de confirmation, ce qui évitera de supprimer un produit involontairement.
                </p>
                <p>
                    Code de la modal :
                </p>
                <pre>
    <code class="html">
                        <?= htmlspecialchars('
 <div id="modal<?= $product->pro_id ?>" class="modal">
            <div class="modal-content">
                <h4>ATTENTION !!</h4>
                <p>Voulez-vous supprimer ce produit de la base de données?</p>
                <p>Attention : cette action sera irréversible et vous ne pourrez pas récupérer ces données.</p>
            </div>
            <div class="modal-footer">
                <form action="#" method="POST">
                    <input type="hidden" name="id" id="id" value="<?= $product->pro_id ?>">
                    <input type="submit" name="delete" id="delete" class="modal-close waves-effect waves-green btn red accent-4" value="Valider">
                </form>
            </div>
        </div>           
') ?>
    </code>
                </pre>
                <p>
                    La suppression du produit se fera au clique sur le bouton "Valider".
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">La requète de suppression</div>
            <div class="collapsible-body">
                <p>
                    Nous pouvons alors construire notre requète pour la suppression d'un produit. Elle sera, comme l'affichage d'un produit, basée sur l'id du produit passée dans l'url. Tout comme l'affichage d'un produit, nous utiliserons une requète préparée. Nous commençons par récupérer l'id du produit passé dans l'url et nous vérifions la présence de la valeur du <code>name</code> de notre bouton de suppression :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
$id = $_GET[\'id\'];
if(isset($_POST[\'delete\'])) {
  
}') ?>
    </code>
                </pre>
                <p>
                    Notez que notre mini-formulaire de notre fenêtre modal transmet également l'id du produit. Il est alors possible de le récupérer aussi avec la méthode <code>$_POST['']</code>.
                </p>
                <p>
                    Puis nous insérons notre requète dans cette condition :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
$id = $_GET[\'id\'];
if(isset($_POST[\'delete\'])) {
    $query = \'DELETE FROM `produits` \'
            . \'WHERE `pro_id` = :id \';
    ') ?>
    </code>
                </pre>
                <p>
                    Préparation de la requète :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
$id = $_GET[\'id\'];
if(isset($_POST[\'delete\'])) {
    $query = \'DELETE FROM `produits` \'
            . \'WHERE `pro_id` = :id \';
     $result = $db->prepare($query);
     ') ?>
    </code>
                </pre>
                <p>
                    On "bind" le marqueur nominatif <code>:id</code> afin de lui attribuer la valeur de l'id du produit passée dans l'url
                </p>
                <pre>
    <code class="php">
                        <?=
                        htmlspecialchars('
if(isset($_POST[\'delete\'])) {
    $query = \'DELETE FROM `produits` \'
            . \'WHERE `pro_id` = :id \';
     $result = $db->prepare($query);
     $result->bindvalue(\':id\', $id, PDO::PARAM_INT);
}'
                        )
                        ?>
    </code>
                </pre>
                <p>
                    Enfin nous pouvons lancer l'exécution de notre requète :
                </p>
                <pre>
    <code class="php">
                        <?=
                        htmlspecialchars('
if(isset($_POST[\'delete\'])) {
    $query = \'DELETE FROM `produits` \'
            . \'WHERE `pro_id` = :id \';
     $result = $db->prepare($query);
     $result->bindvalue(\':id\', $id, PDO::PARAM_INT);
     return $result->execute();
}'
                        )
                        ?>
    
    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Code final : affichage produit, modification et suppression</div>
            <div class="collapsible-body">
                <p>
                    Puisque nous restons sur la même page pour faire chacune de ces actions, nous devons ajouter une condition portant sur la présence de la valeur du <code>name</code> du bouton "Supprimer" pour afficher un message de condfirmation. De la même manière, nous ajouteront une condtion identique sur notre script PHP afin de déclencher la requète uniquement lorsque la valeur du <code>name</code> du bouton "Supprimer" est présente :
                </p>
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3 offset-s3"><a class="active" href="#html1">Vue (product.php)</a></li>
                            <li class="tab col s3"><a href="#php1">Contrôleur (productController.php)</a></li>
                        </ul>
                    </div>
                    <div id="html1" class="col s12">
                        <pre>
            <code class="html">
                                <?= htmlspecialchars('
<?php
include \'../header.php\';
include \'../../controler/productControler.php\';
?>
<div class="container">
    <?php
    if (isset($_POST[\'submit\']) && (count($formError) == 0))
    {
        ?>
    <p class="white-text">
            Produit modifié !!
        </p>
        <a href="allProduct.php" title="Retour à la liste de produit" class="waves-effect waves-light btn">Retour à la liste de produit</a>
        <?php
    }
    else if (isset($_POST[\'delete\']))
    {
        ?>
        <p class="white-text">
            Produit supprimé !!
        </p>
        <a href="allProduct.php" title="Retour à la liste de produit" class="waves-effect waves-light btn">Retour à la liste de produit</a>
        <?php
    }
    else
    {
        ?>
        <div class="row">
            <div class="col s12">
                <div class="card light-green lighten-5">
                    <div class="card-content">
                        <span class="card-title">Détail du produit <?= $product->pro_libelle ?> :</span>
                        <form method="POST" action="#" enctype="multipart/form-data">   
                            <div class="row">
                                <div class="col s6">
                                    <img src="../../assets/img/<?= $product->pro_id . \'.\' . $product->pro_photo ?>" alt="" class="materialboxed pic2">
                                </div>
                                <div class="col s6">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="id" type="text" name="id" class="" disabled value="<?= $product->pro_id ?>">
                                            <label for="id">ID</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select>
                                                <option value="" disabled selected>Choose your option</option>
                                                <?php
                                                foreach ($isObjectResult as $cat)
                                                {
                                                    ?>
                                                    <option value="<?= $cat->cat_id ?>" <?= $cat->cat_id == $product->pro_cat_id ? \'selected\' : \'\' ?>><?= $cat->cat_nom ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <label>Catégorie</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="ref" type="text" name="ref" class="" value="<?= isset($_POST[\'ref\']) ? $_POST[\'ref\'] : $product->pro_ref ?>">
                                            <label for="ref">Référence</label>
                                            <span class="error" id="errorRef"><?= isset($formError[\'ref\']) ? $formError[\'ref\'] : \'\' ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="label" type="text" name="label" class="" value="<?= isset($_POST[\'label\']) ? $_POST[\'label\'] : $product->pro_libelle ?>">
                                            <label for="label">Libellé</label>
                                            <span class="error" id="errorLabel"></span>
                                        </div>
                                    </div>                                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="color" type="text" name="color" class="" value="<?= isset($_POST[\'color\']) ? $_POST[\'color\'] : $product->pro_couleur ?>">
                                    <label for="color">Couleur</label>
                                    <span class="error" id="errorColor"></span>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="stock" type="text" name="stock" class="" value="<?= isset($_POST[\'stock\']) ? $_POST[\'stock\'] : $product->pro_stock ?>">
                                        <label for="stock">Stock</label>
                                        <span class="error" id="errorStock"></span>
                                    </div>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="price" type="text" name="price" class="" value="<?= isset($_POST[\'price\']) ? $_POST[\'price\'] : $product->pro_prix ?>">
                                        <label for="price">Prix</label>
                                        <span class="error" id="errorPrice"></span>
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Insérer une photo</span>
                                            <input type="file" name="file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                        <span class="info">Au format .gif, .jpg, .jpeg, .pjpeg ou .png</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="input-field">
                                        <textarea id="description" class="materialize-textarea" name="description"><?= isset($_POST[\'decription\']) ? $_POST[\'description\'] : $product->pro_description ?></textarea>
                                        <label for="description">Description</label>
                                        <span class="error" id="errorDesc"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row valign-wrapper left-align">
                                <div class="col s2 radio">
                                    <p>Produit bloqué :</p>
                                </div>
                                <div class="col s1 radio">
                                    <label>
                                        <input name="radio2" type="radio" value="1" <?= $product->pro_bloque == 1 ? \'checked\' : \'\' ?>>
                                        <span>Oui</span>
                                    </label>
                                </div>
                                <div class="col s1 radio">
                                    <label>
                                        <input name="radio2" type="radio" value="2" <?= ($product->pro_bloque == NULL) || ($product->pro_bloque == 2) ? \'checked\' : \'\' ?>>
                                        <span>Non</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6">
                                    <p>Date d\'ajout : <?= $product->pro_d_ajout ?></p>
                                </div>
                                <div class="col s6">
                                    <p>Date de modification : <?= $product->pro_d_modif == NULL ? \'Pas de modification enregistrée\' : $product->pro_d_modif ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s4 center-align">
                                    <input type="submit" name="submit" value="Modifier le produit" class="waves-effect waves-light btn">
                                </div>
                                <div class="col s4 center-align">
                                    <a type="submit" name="delete" id="delete" href="#modal<?= $product->pro_id ?>" class="waves-effect waves-light btn modal-trigger red accent-4">Effacer le produit</a>
                                </div>
                                <div class="col s4 center-align">
                                    <a href="allProduct.php" title="Lien vers le catalogue" class="waves-effect waves-light btn cyan accent-4">Retour au catalogue</a>
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
    <?php
    include \'../footer.php\';
    ?>


    <?php
    if (isset($product->pro_id))
    {
        ?>
        <!-- Modal Structure -->
        <div id="modal<?= $product->pro_id ?>" class="modal">
            <div class="modal-content">
                <h4>ATTENTION !!</h4>
                <p>Voulez-vous supprimer ce produit de la base de données?</p>
                <p>Attention : cette action sera irréversible et vous ne pourrez pas récupérer ces données.</p>
            </div>
            <div class="modal-footer">
                <form action="#" method="POST">
                    <input type="hidden" name="id" id="id" value="<?= $product->pro_id ?>">
                    <input type="submit" name="delete" id="delete" class="modal-close waves-effect waves-green btn red accent-4" value="Valider">
                </form>
            </div>
        </div>
        <?php
    }
    ?>
    ') ?>
            </code>
                        </pre>
                    </div>
                    <div id="php1" class="col s12">
                        <pre>
            <code class="php">
                                <?= htmlspecialchars('
<?php

try {
    $db = new PDO(\'mysql:host=localhost;charset=utf8;dbname=jarditou\', \'root\', \'\');
} catch (Exception $e) {
    echo \'erreur : \' . $e->getMessage() . \'<br>\';
    echo \'N° : \' . $e->getCode();
    die(\'fin du script\');
}

// récupération de l\'id passé dans l\'url
$id = $_GET[\'id\'];
/**
 * Suppression d\'un produit
 */
if (isset($_POST[\'delete\']))
{
    $query = \'DELETE FROM `produits` \'
            . \'WHERE `pro_id` = :id \';
    $result = $db->prepare($query);
    $result->bindvalue(\':id\', $id, PDO::PARAM_INT);
    return $result->execute();
}
/**
 * Modification d\'un produit
 */
// récupération de l\'id du produit
// déclaration du tableau d\'erreur
$formError = array();
// déclaration des regexs
$textPattern = \'/^[a-zA-Z\-\,\. \déèàçùëüïôäâêûîô#&]+$/\';
$pricePattern = \'/^[\d]+[.]{1}[\d]{2,}+$/\';
$numPattern = \'/^[0-9]+$/\';
$radioPattern = \'/^[1-2]{1}$/\';
$extension = \'\';
// si la valeur du bouton submit est présente
if (isset($_POST[\'submit\']))
{
    /**
     * vérification du champs référence
     */
    if (!empty($_POST[\'ref\']))
    {
        if (preg_match($textPattern, $_POST[\'ref\']))
        {
            $ref = $_POST[\'ref\'];
        }
        else
        {
            $formError[\'ref\'] = \'Veuillez renseigner une référence valide.\';
        }
    }
    else
    {
        $formError[\'ref\'] = \'Veuillez renseigner le champs "Référence".\';
    }
    /**
     * vérification du champs couler
     */
    if (!empty($_POST[\'color\']))
    {
        if (preg_match($textPattern, $_POST[\'color\']))
        {
            $color = $_POST[\'color\'];
        }
        else
        {
            $formError[\'color\'] = \'Veuillez renseigner une couleur valide.\';
        }
    }
    else
    {
        $formError[\'color\'] = \'Veuillez renseigner le champs "Couleur".\';
    }
    /**
     * Vérificaiton du champs libellé
     */
    if (!empty($_POST[\'label\']))
    {
        if (preg_match($textPattern, $_POST[\'label\']))
        {
            $label = $_POST[\'label\'];
        }
        else
        {
            $formError[\'label\'] = \'Veuillez renseigner un libellé valide.\';
        }
    }
    else
    {
        $formError[\'label\'] = \'Veuillez renseigner le champs "Libellé".\';
    }
    /**
     * Vérificaiton du champs prix
     */
    if (!empty($_POST[\'price\']))
    {
        if (preg_match($pricePattern, $_POST[\'price\']))
        {
            $price = $_POST[\'price\'];
        }
        else
        {
            $formError[\'price\'] = \'Veuillez renseigner un prix valide.\';
        }
    }
    else
    {
        $formError[\'price\'] = \'Veuillez renseigner le champs "Prix".\';
    }
    /**
     * Vérification du champs stock
     */
    if (!empty($_POST[\'stock\']))
    {
        if (preg_match($numPattern, $_POST[\'stock\']))
        {
            $stock = $_POST[\'stock\'];
        }
        else
        {
            $formError[\'stock\'] = \'Veuillez renseigner un stock valide.\';
        }
    }
    else
    {
        $formError[\'stock\'] = \'Veuillez renseigner le champs "Stock".\';
    }
    /**
     * Vérification du champs description
     */
    if (!empty($_POST[\'description\']))
    {
        if (preg_match($textPattern, $_POST[\'description\']))
        {
            $description = $_POST[\'description\'];
        }
        else
        {
            $formError[\'description\'] = \'Veuillez renseigner une description valide.\';
        }
    }
    else
    {
        $formError[\'description\'] = \'Veuillez renseigner le champs "Description".\';
    }

    if (!empty($_POST[\'radio2\']))
    {
        if (preg_match($radioPattern, $_POST[\'radio2\']))
        {
            $bloque = $_POST[\'radio2\'];
        }
        else
        {
            $formError[\'radio2\'] = \'Veuillez renseigner un blocage valide.\';
        }
    }
    /**
     * Vérification du champs fichier
     */
    // si le champs file n\'est pas vide
    if ($_FILES[\'file\'][\'name\'] != \'\')
    {
        // on peut vérifier que le type de fichier est bien pris en compte :
        // on définis les type de fichiers acceptés
        $aMimeTypes = array(\'image/gif\', \'image/jpg\', \'image/jpeg\', \'image/pjpeg\', \'image/png\', \'image/x-png\', \'image/tiff\');
        /**
         *  On extrait le type du fichier via l\'extension FILE_INFO  
         */
        // création d\'une nouvelle ressource fileinfo dans laquelle nous indiquons l\'info recherchée  
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        // on récupère le type MIME du fichier et on le stock dans une variable
        $mimetype = finfo_file($finfo, $_FILES[\'file\'][\'tmp_name\']);

        finfo_close($finfo);
        //si le type de fichier est correct
        if (in_array($mimetype, $aMimeTypes))
        {
            // récupération de l\'extension du fichier et stockage dans une variable
            $extension = pathinfo($_FILES[\'file\'][\'name\'], PATHINFO_EXTENSION);
            // stockage du chemein de destintaion dans une variable
            $upload_dir = \'../../assets/img/\';
            // renommage du fichier
            $_FILES[\'file\'][\'name\'] = $id;
            // indication du chemin + nom de fichier pour le déplacement
            $upload_file = $upload_dir . $_FILES[\'file\'][\'name\'] . \'.\' . $extension;
            // autaorisation pour l\'écriture
            chmod($_FILES[\'file\'][\'tmp_name\'], 0750);
            //déplacement du fichier
            move_uploaded_file($_FILES[\'file\'][\'tmp_name\'], $upload_file);
            // message de confirmation
        }
        else
        {
            // cas où il n\'y a pas de fichier d\'uploader, dans le cas d\'un ajoût de produit
            $formError[\'file\'] = \'Vous devez joindre une photo valide au produit !\';
        }
    }
    /**
     * si le tableau d\'erreur est vide
     */
    if (count($formError) == 0)
    {
        $query = \'UPDATE `produits` SET `pro_ref` = :ref, `pro_libelle` = :label, `pro_description` = :descrip, `pro_photo` = :extension, `pro_couleur` = :color, `pro_bloque` = :bloque, `pro_d_modif` = NOW(), `pro_stock` = :pro_stock WHERE `pro_id` = :id\';
        $result = $db->prepare($query);
        $result->bindvalue(\':id\', $id, PDO::PARAM_INT);
        $result->bindvalue(\':ref\', $ref, PDO::PARAM_STR);
        $result->bindvalue(\':label\', $label, PDO::PARAM_STR);
        $result->bindvalue(\':descrip\', $description, PDO::PARAM_STR);
        $result->bindvalue(\':extension\', $extension, PDO::PARAM_STR);
        $result->bindvalue(\':color\', $color, PDO::PARAM_STR);
        $result->bindvalue(\':pro_stock\', $stock, PDO::PARAM_STR);
        $result->bindvalue(\':bloque\', $bloque, PDO::PARAM_STR);
        // $result->bindvalue(\':pro_d_modif\', NOW(), PDO::PARAM_STR);
        return $result->execute();
    }
    $query = \'SELECT *, DATE_FORMAT(`pro_d_ajout`, \\\'%d/%m/%Y\\\') as pro_d_ajout, DATE_FORMAT(`pro_d_modif`, \\\'%d/%m/%Y à %H:%i:%s\\\') as pro_d_modif FROM `produits` \'
            . \'INNER JOIN `categories`\'
            . \'ON `pro_cat_id` = `cat_id`\'
            . \'WHERE `pro_id` = :id\';
    $result = $db->prepare($query);
    $result->bindValue(\':id\', $id, PDO::PARAM_INT);
    $result->execute();
    $product = $result->fetch(PDO::FETCH_OBJ);
    $result->closeCursor();

    $query = \'SELECT * FROM `categories`\';
    $result = $db->query($query);
    if (is_object($result))
    {
        $isObjectResult = $result->fetchAll(PDO::FETCH_OBJ);
    }
    return $isObjectResult;

    //si la valeur de submit n\'est pas présente (pas de click sur le bouton) on affiche le détal du produit
}
else
{
    $query = \'SELECT *, DATE_FORMAT(`pro_d_ajout`, \\\'%d/%m/%Y\\\') as pro_d_ajout, DATE_FORMAT(`pro_d_modif`, \\\'%d/%m/%Y à %H:%i:%s\\\') as pro_d_modif FROM `produits` \'
            . \'INNER JOIN `categories`\'
            . \'ON `pro_cat_id` = `cat_id`\'
            . \'WHERE `pro_id` = :id\';
    $result = $db->prepare($query);
    $result->bindValue(\':id\', $id, PDO::PARAM_INT);
    $result->execute();
    $product = $result->fetch(PDO::FETCH_OBJ);
    $result->closeCursor();

    $query = \'SELECT * FROM `categories`\';
    $result = $db->query($query);
    if (is_object($result))
    {
        $isObjectResult = $result->fetchAll(PDO::FETCH_OBJ);
    }
    return $isObjectResult;
}



') ?>
            </code>
                        </pre>
                    </div>
                </div>
                <a href="allProduct.php" class="waves-effect waves-light btn" title="lien vers demo" target="_blank"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>