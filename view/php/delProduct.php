
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
<input type="submit" name="submit" value="Modifier le produit" class="waves-effect waves-light btn" />
<input type="submit" name="delete" id="delete" class="uk-button uk-button-danger" value="Effacer le produit" />') ?>
    </code>
                </pre>
                <p>Ce bouton fera toujours partie du formulaire, et aura lui aussi un type <code>submit</code>, ce qui permettra le rechargement de la page au click sur celui-ci.</p>
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
            <div class="collapsible-header">Code final : affichage produit, modification et suppressionF</div>
            <div class="collapsible-body">
                <p>
                    Puisque nous restons sur la même page pour faire chacune de ces actions, nous devons ajouter une condition portant sur la présence de la valeur du <code>name</code> du bouton "Supprimer" pour afficher un message de condfirmation. De la même manière, nous ajouteront une condtion identique sur notre script PHP afin de déclencher la requète uniquement lorsque la valeur du <code>name</code> du bouton "Supprimer" est présente :
                </p>
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3 offset-s3"><a class="active" href="#html1">HTML</a></li>
                            <li class="tab col s3"><a href="#php1">PHP</a></li>
                        </ul>
                    </div>
                    <div id="html1" class="col s12">
                        <pre>
            <code class="html">
                                <?= htmlspecialchars('
<?php
include \'header.php\';
include \'../controler/productControler.php\';
?>
<div class="uk-container">
    <?php
    if (isset($_POST[\'submit\']))
    {
        if (count($formError) == 0)
        {
            ?>
            <p>
                Produit modifié !!
            </p>
            <a href="allProduct.php" title="Retour à la liste de produit" class="waves-effect waves-light btn">Retour à la liste de produit</a>
            <?php
        }
        else
        {
            ?>
            <p>
                Oups! Une erreur est survenue !!
            </p>
            <a href="allProduct.php" title="Retour à la liste de produit" class="waves-effect waves-light btn">Retour à la liste de produit</a>

            <?php
        }
    }
    else if (isset($_POST[\'delete\']))
    {
        ?>
        <p>
            Produit supprimé !!
        </p>
        <a href="allProduct.php" title="Retour à la liste de produit" class="waves-effect waves-light btn">Retour à la liste de produit</a>
        <?php
    }
    else
    {
        ?>
        <form method="POST" action="#" enctype="multipart/form-data">
            <fieldset class="uk-fieldset">
                <legend class="uk-legend">Détail du produit <?= $product->pro_libelle ?></legend>

                <div class="uk-child-width-1-2 uk-text-center" uk-grid>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body">
                            <img src="../assets/img/<?= $product->pro_id . \'.\' . $product->pro_photo ?>" />
                        </div>
                    </div>
                    <div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="id">Id</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="id" type="text" name="id" placeholder="Some text..." value="<?= $product->pro_id ?>" disabled />
                            </div>
                        </div>
                        <div class="uk-margin">
                            <select class="uk-select">
                                <?php
                                foreach ($isObjectResult as $cat)
                                {
                                    ?>
                                    <option value="<?= $cat->cat_id ?>" <?= $cat->cat_id == $product->pro_cat_id ? \'selected\' : \'\' ?>><?= $cat->cat_nom ?></option>
        <?php
    }
    ?>
                            </select>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="cat">Catégorie</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="cat" type="text" name="cat" placeholder="Some text..." value="<?= $product->pro_cat_id ?>" disabled/>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="ref">Référence</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="ref" type="text" name="ref" placeholder="Some text..." value="<?= $product->pro_ref ?>" />
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="color">Couleur</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="color" type="text" name="color" placeholder="Some text..." value="<?= $product->pro_couleur ?>" />
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="label">Libellé</label> /
                            <div class="uk-form-controls">
                                <input class="uk-input" id="label" type="text" name="label" placeholder="Some text..." value="<?= $product->pro_libelle ?>" />
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="price">Prix</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="price" type="text" name="price" placeholder="Some text..." value="<?= $product->pro_prix ?>" />
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="stock">Stock</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="stock" type="text" name="stock" placeholder="Some text..." value="<?= $product->pro_stock ?>" />
                            </div>
                        </div>
                        <div class="uk-margin">
                            <div uk-form-custom="target: true">
                                <input type="file" name="file" >
                                <input class="uk-input uk-form-width-medium" type="text" disabled>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="description">Description</label>
                    <textarea class="uk-textarea" rows="5" id="description" placeholder="Textarea" name="description" value=""><?= $product->pro_description ?></textarea>
                </div>
                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                    <label>Produit bloqué :</label>
                    <label><input class="uk-radio" type="radio" name="radio2" value="1" <?= $product->pro_bloque == 1 ? \'checked\' : \'\' ?>> Oui</label>
                    <label><input class="uk-radio" type="radio" name="radio2" value="2" <?= ($product->pro_bloque == NULL) || ($product->pro_bloque == 2) ? \'checked\' : \'\' ?>> Non</label>
                </div>
                <div class="uk-margin">
                    <p>Date d\'ajout : <?= $product->pro_d_ajout ?></p>
                </div>
                <div class="uk-margin">
                    <p>Date de modification : <?= $product->pro_d_modif ?></p>
                </div>
            </fieldset>
            <input type="submit" name="submit" value="Modifier le produit" class="waves-effect waves-light btn" />
            <input type="submit" name="delete" id="delete" class="uk-button uk-button-danger" value="Effacer le produit" />
        </form>
    <?php
}
?>
</div>



<?php
include \'footer.php\';
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
// récupération de l\'id du produit
$id = $_GET[\'id\'];
/**
 * Suppression d\'un produit
 */
 // vérification de la présence de la valeur du name du bouton supprimer
if(isset($_POST[\'delete\'])) {
// requète
    $query = \'DELETE FROM `produits` \'
            . \'WHERE `pro_id` = :id \';
     $result = $db->prepare($query);
     $result->bindvalue(\':id\', $id, PDO::PARAM_INT);
     // execution de la requète
     return $result->execute();
}
/**
 * Modification d\'un produit
 */


// déclaration du tableau d\'erreur
$formError = array();
// déclaration des regexs
$textPattern = \'/^[a-zA-Z\-\,\. \déèàçùëüïôäâêûîô#&]+$/\';
$pricePattern = \'/^[\d]+[.]{1}[\d]{2,}+$/\';
$numPattern = \'/^[\d]+$/\';
$radioPattern = \'/^[1-2]{1}$/\';
$extension = \'\';
// si la valeur du bouton submit est présente
if (isset($_POST[\'submit\'])) {
    /**
     * vérification du champs référence
     */
    if (!empty($_POST[\'ref\'])) {
        if (preg_match($textPattern, $_POST[\'ref\'])) {
            $ref = $_POST[\'ref\'];
        } else {
            $formError[\'ref\'] = \'Veuillez renseigner une référence valide.\';
        }
    } else {
        $formError[\'ref\'] = \'Veuillez renseigner le champs "Référence".\';
    }
    /**
     * vérification du champs couler
     */
    if (!empty($_POST[\'color\'])) {
        if (preg_match($textPattern, $_POST[\'color\'])) {
            $color = $_POST[\'color\'];
        } else {
            $formError[\'color\'] = \'Veuillez renseigner une couleur valide.\';
        }
    } else {
        $formError[\'color\'] = \'Veuillez renseigner le champs "Couleur".\';
    }
    /**
     * Vérificaiton du champs libellé
     */
    if (!empty($_POST[\'label\'])) {
        if (preg_match($textPattern, $_POST[\'label\'])) {
            $label = $_POST[\'label\'];
        } else {
            $formError[\'label\'] = \'Veuillez renseigner un libellé valide.\';
        }
    } else {
        $formError[\'label\'] = \'Veuillez renseigner le champs "Libellé".\';
    }
    /**
     * Vérificaiton du champs prix
     */
    if (!empty($_POST[\'price\'])) {
        if (preg_match($pricePattern, $_POST[\'price\'])) {
            $price = $_POST[\'price\'];
        } else {
            $formError[\'price\'] = \'Veuillez renseigner un prix valide.\';
        }
    } else {
        $formError[\'price\'] = \'Veuillez renseigner le champs "Prix".\';
    }
    /**
     * Vérification du champs stock
     */
    if (!empty($_POST[\'stock\'])) {
        if (preg_match($numPattern, $_POST[\'stock\'])) {
            $stock = $_POST[\'stock\'];
        } else {
            $formError[\'stock\'] = \'Veuillez renseigner un stock valide.\';
        }
    } else {
        $formError[\'stock\'] = \'Veuillez renseigner le champs "Stock".\';
    }
    /**
     * Vérification du champs description
     */
    if (!empty($_POST[\'description\'])) {
        if (preg_match($textPattern, $_POST[\'description\'])) {
            $description = $_POST[\'description\'];
        } else {
            $formError[\'description\'] = \'Veuillez renseigner une description valide.\';
        }
    } else {
        $formError[\'description\'] = \'Veuillez renseigner le champs "Description".\';
    }

    if (!empty($_POST[\'radio2\'])) {
        if (preg_match($radioPattern, $_POST[\'radio2\'])) {
            $bloque = $_POST[\'radio2\'];
        } else {
            $formError[\'radio2\'] = \'Veuillez renseigner un blocage valide.\';
        }
    }
    /**
     * Vérification du champs fichier
     */
    // si le champs file n\'est pas vide
    if ($_FILES[\'file\'][\'name\'] != \'\') {
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
        if (in_array($mimetype, $aMimeTypes)) {
            // récupération de l\'extension du fichier et stockage dans une variable
            $extension = pathinfo($_FILES[\'file\'][\'name\'], PATHINFO_EXTENSION);
            // stockage du chemein de destintaion dans une variable
            $upload_dir = \'../assets/img/\';
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
         else {
            // cas où il n\'y a pas de fichier d\'uploader, dans le cas d\'un ajoût de produit
            $formError[\'file\'] = \'Vous devez joindre une photo valide au produit !\';
        }
    }
    /**
     * si le tableau d\'erreur est vide
     */
    if (count($formError) == 0) {
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

    //si la valeur de submti n\'est pas présente (pas de click sur le bouton) on affiche le détal du produit
} else {
    $query = \'SELECT * FROM `produits` WHERE `pro_id` = :id\';
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
                <a href="allProduct.php" class="waves-effect waves-light btn" title="lien vers demo" target="_blank">RUN CODE</a>
            </div>
        </li>
    </ul>
</div>