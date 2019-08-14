
<div class="container">
    <h1>Modification d'un produit</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Mis en place de l'upload de fichier</div>
            <div class="collapsible-body">
                <p>
                    Pour ajouter un produit, ou le modifier, nous devrons pouvoir télécharger une photo, la renommer et la stocker sur notre serveur. Pour cela, nous allons ajouter à notre formulaire affiché pour le détail d'un produit un <code><?= htmlspecialchars('<input type="file" />') ?></code>.
                </p>
                <p>
                    Cet <code>input</code> affichera automatiquement un bouton "Parcourir", qui permettra la recherche d'un fichier à télécharger.
                </p>
                <pre>
                <code class="html">
                        <?= htmlspecialchars('
<label for="file">Télécharger un fichier</label>
<input type="file" name="file" id="file" />
') ?>
                </code>
                </pre>
                <p>
                    <b>ATTENTION : ne pas oublier d'ajouter en attribut de la balsie form : <code>enctype="multipart/form-data"</code></b>. Sans ça, il est impossible de récupérer le fichier à télécharger!!
                </p>
                <p>
                    Remarque : pour la démonstration, le frameworks ne met pas à disposition de bouton "Parcourir", juste un <code>input</code> sur lequel il suffit de cliquer pour pouvoir télécharger un fichier.
                </p>
                <p>
                    Une fois l'<code>input</code> en place dans le HTML, il suffit de rajouter une vérification du champs de saisie, comme un <code>input</code> classique, avec en plus un contrôle de l'extension du fichier (voir <a href="">exercice sur l'upload</a> de fichier pour plus de précision).
                </p>
                <p>
                    Pour la vérification du téléchargement de fichier, nous auront donc :
                </p>
                <pre>
            <code class="php">
                        <?= htmlspecialchars('
// récupération de l\'id du produit passé dans l\'url
$id = $_GET[\'id\'];
// déclaration du tableau d\'erreur
$formError = array();
/**
 * Vérification du champs fichier
 */
 // si le nom du fichier n\'est pas vide, cas où l\'upload est facultatif
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
        $upload_file = $upload_dir . $_FILES[\'fil\'][\'name\'] . \'.\' . $extension;
        var_dump($upload_file);
        // autaorisation pour l\'écriture
        chmod($_FILES[\'file\'][\'tmp_name\'], 0750);
        //déplacement du fichier
        move_uploaded_file($_FILES[\'file\'][\'tmp_name\'], $upload_file);
        // message de confirmation
        //     }
    } else {
        // stockage d\'un message d\'erreur en cas de mauvaise extension
        $formError[\'file\'] = \'Vous devez joindre une photo valide au produit !\';
    }
}
') ?>
            </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Modification d'un produit</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3"><a class="active" href="#html">HTML</a></li>
                            <li class="tab col s3"><a href="#php">PHP</a></li>
                        </ul>
                    </div>
                    <div id="html" class="col s12">
                        <pre>
            <code class="html">
                                <?= htmlspecialchars('
<?php
include \'header.php\';
include \'../controler/productControler.php\';
?>
<div class="uk-container">
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
                                <input class="uk-input" id="id" type="text" name="id" placeholder="Some text..." value="<?= $product->pro_id >" disabled />
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="cat">Catégorie</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="cat" type="text" name="cat" placeholder="Some text..." value="<?=$product->pro_cat_id ?>" />
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="ref">Référence</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="ref" type="text" name="ref" placeholder="Some text..." value="<?=$product->pro_ref ?>" />
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="color">Couleur</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="color" type="text" name="color" placeholder="Some text..." value="<?=$product->pro_couleur ?>" />
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="label">Libellé</label> /
                            <div class="uk-form-controls">
                                <input class="uk-input" id="label" type="text" name="label" placeholder="Some text..." value="<?=$product->pro_libelle ?>" />
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="price">Prix</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="price" type="text" name="price" placeholder="Some text..." value="<?=$product->pro_prix ?>" />
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="stock">Stock</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="stock" type="text" name="stock" placeholder="Some text..." value="<?=$product->pro_stock ?>" />
                            </div>
                        </div>
                        <div class="uk-margin" uk-margin>
                            <div uk-form-custom="target: true">
                                <input type="file" name="file">
                                <input class="uk-input uk-form-width-medium" type="text" placeholder="Selectionnez un fichier" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="description">Description</label>
                    <textarea class="uk-textarea" rows="5" id="description" placeholder="Textarea" name="description" value=""><?=$product->pro_description ?></textarea>
                </div>
                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                    <label>Produit bloqué :</label>
                    <label><input class="uk-radio" type="radio" name="radio2" checked> Oui</label>
                    <label><input class="uk-radio" type="radio" name="radio2"> Non</label>
                </div>
                <div class="uk-margin">
                    <p>Date d\'ajout : <?= $product->pro_d_ajout ?></p>
                </div>
                <div class="uk-margin">
                    <p>Date de modification : <?= $product->pro_d_modif ?></p>
                </div>
            </fieldset>
            <input type="submit" name="submit" value="Modifier le produit" class="waves-effect waves-light btn" />
        </form>
    </div>
<?php
include \'footer.php\';
?>
    ') ?>
            </code>
                        </pre>
                    </div>
                    <div id="php" class="col s12">
                        <pre>
            <code class="php">
                                <?= htmlspecialchars('
try {
    $db = new PDO(\'mysql:host=localhost;charset=utf8;dbname=jarditou\', \'root\', \'\');
} catch (Exception $e) {
    echo \'erreur : \' . $e->getMessage() . \'<br>\';
    echo \'N° : \' . $e->getCode();
    die(\'fin du script\');
}
$id = $_GET[\'id\'];
$query = \'SELECT * FROM `produits` WHERE `pro_id` = :id\';
$result = $db->prepare($query);
$result->bindValue(\':id\', $id, PDO::PARAM_INT);
$result->execute(); 
$product = $result->fetch(PDO::FETCH_OBJ);
$result->closeCursor();
') ?>
            </code>
                        </pre>
                    </div>
                </div>
                <p>
                    Nous y avons ajouter notre champs d'upload, ainsi qu'un bouton validant la modification.
                </p>
                <p>
                    Il nous reste à ajouter dans le fichier PHP la vérification du formulaire (voir exemple <a href="form.php" class="ul-link-muted" title="Lien vers validation de formulaire" target="_blank">ici</a>) et la modification en base de données :
                </p>
                <pre>
        <code class="php">
                        <?= htmlspecialchars('
/**
 * Modification d\'un produit
 */
// récupération de l\'id du produit
$id = $_GET[\'id\'];
// déclaration du tableau d\'erreur
$formError = array();
// déclaration des regexs
$textPattern = \'/^[a-zA-Z\-\. \déèàçùëüïôäâêûîô#&]+$/\';
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
    // si le nom du fichier n\'est pas vide
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
                 } else {
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
}
') ?>
        </code>
                </pre> 
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat final</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3 offset-s3"><a class="active" href="#finalHTML">HTML</a></li>
                            <li class="tab col s3"><a href="#finalPHP">PHP</a></li>
                        </ul>
                    </div>
                    <div id="finalHTML" class="col s12">
                        <pre>
            <code class="html">
                                <?= htmlspecialchars('
<?php
include \'header.php\';
include \'../controler/productControler.php\';
?>
<div class="uk-container">
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
                                <input class="uk-input" id="id" type="text" name="id" placeholder="Some text..." value="<?= $product->pro_id >" disabled />
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="cat">Catégorie</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="cat" type="text" name="cat" placeholder="Some text..." value="<?=$product->pro_cat_id ?>" />
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="ref">Référence</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="ref" type="text" name="ref" placeholder="Some text..." value="<?=$product->pro_ref ?>" />
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="color">Couleur</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="color" type="text" name="color" placeholder="Some text..." value="<?=$product->pro_couleur ?>" />
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="label">Libellé</label> /
                            <div class="uk-form-controls">
                                <input class="uk-input" id="label" type="text" name="label" placeholder="Some text..." value="<?=$product->pro_libelle ?>" />
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="price">Prix</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="price" type="text" name="price" placeholder="Some text..." value="<?=$product->pro_prix ?>" />
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="stock">Stock</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="stock" type="text" name="stock" placeholder="Some text..." value="<?=$product->pro_stock ?>" />
                            </div>
                        </div>
                        <div class="uk-margin" uk-margin>
                            <div uk-form-custom="target: true">
                                <input type="file" name="file">
                                <input class="uk-input uk-form-width-medium" type="text" placeholder="Selectionnez un fichier" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="description">Description</label>
                    <textarea class="uk-textarea" rows="5" id="description" placeholder="Textarea" name="description" value=""><?=$product->pro_description ?></textarea>
                </div>
                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                    <label>Produit bloqué :</label>
                    <label><input class="uk-radio" type="radio" name="radio2" checked> Oui</label>
                    <label><input class="uk-radio" type="radio" name="radio2"> Non</label>
                </div>
                <div class="uk-margin">
                    <p>Date d\'ajout : <?= $product->pro_d_ajout ?></p>
                </div>
                <div class="uk-margin">
                    <p>Date de modification : <?= $product->pro_d_modif ?></p>
                </div>
            </fieldset>
            <input type="submit" name="submit" value="Modifier le produit" class="waves-effect waves-light btn" />
        </form>
    </div>
<?php
include \'footer.php\';
?>
    ') ?>
            </code>
                        </pre>
                    </div>
                    <div id="finalPHP" class="col s12">
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
/**
 * Modification d\'un produit
 */
// récupération de l\'id du produit
$id = $_GET[\'id\'];
// déclaration du tableau d\'erreur
$formError = array();
// déclaration des regexs
$textPattern = \'/^[a-zA-Z\-\. \déèàçùëüïôäâêûîô#&]+$/\';
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
    // si le nom du fichier n\'est pas vide
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

    $id = $_GET[\'id\'];
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
                <a href="allProduct.php" class="uk-button uk-button-secondary" title="lien vers demo" target="_blank">RUN CODE</a>
            </div>
        </li>
    </ul>
</div>