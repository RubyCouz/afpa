
<div class="container">
    <h1>Modification d'un produit</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Mis en place de l'upload de fichier</div>
            <div class="collapsible-body">
                <p>
                    Pour ajouter un produit, ou le modifier, nous devrons pouvoir télécharger une photo, la renommer et la stocker sur notre serveur. Pour cela, nous allons ajouter à notre formulaire affiché pour le détail d'un produit un <code><?= htmlspecialchars('<input type="file">') ?></code>.
                </p>
                <p>
                    Cet <code>input</code> affichera automatiquement un bouton "Parcourir", qui permettra la recherche d'un fichier à télécharger.
                </p>
                <pre>
                <code class="html">
                        <?= htmlspecialchars('
<label for="file">Télécharger un fichier</label>
<input type="file" name="file" id="file">
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
                            <li class="tab col s4 offset-s2"><a class="active" href="#html">Vue (updateProduct.php)</a></li>
                            <li class="tab col s4"><a href="#php">Contrôleur (productController.php)</a></li>
                        </ul>
                    </div>
                    <div id="html" class="col s12">
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
        <p>
            Produit modifié !!
        </p>
        <a href="allProduct.php" title="Retour à la liste de produit" class="waves-effect waves-light btn">Retour à la liste de produit</a>
        <?php
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
                                            <select name="categories" id="categories">
                                                <option value="" disabled selected>Choisissez une catégorie</option>
                                                <?php
                                                foreach ($isObjectResult as $cat)
                                                {
                                                    ?>
                                                <option value="<?= $cat->cat_id ?>"<?= isset($_POST[\'categories\']) && $_POST[\'categories\'] == $cat->cat_id ? \'selected\' : \'\' ?>><?= $cat->cat_nom ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <label for="categories">Catégorie</label>
                                             <span class="error" id="errorCAt"><?= isset($formError[\'categories\']) ? $formError[\'categories\'] : \'\' ?></span>
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
                                            <span class="error" id="errorLabel"><?= isset($formError[\'label\']) ? $formError[\'label\'] : \'\' ?></span>
                                        </div>
                                    </div>                                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="color" type="text" name="color" class="" value="<?= isset($_POST[\'color\']) ? $_POST[\'color\'] : $product->pro_couleur ?>">
                                    <label for="color">Couleur</label>
                                    <span class="error" id="errorColor"><?= isset($formError[\'color\']) ? $formError[\'color\'] : \'\' ?></span>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="stock" type="text" name="stock" class="" value="<?= isset($_POST[\'stock\']) ? $_POST[\'stock\'] : $product->pro_stock ?>">
                                        <label for="stock">Stock</label>
                                        <span class="error" id="errorStock"><?= isset($formError[\'stock\']) ? $formError[\'stock\'] : \'\' ?></span>
                                    </div>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="price" type="text" name="price" class="" value="<?= isset($_POST[\'price\']) ? $_POST[\'price\'] : $product->pro_prix ?>">
                                        <label for="price">Prix</label>
                                        <span class="error" id="errorPrice"><?= isset($formError[\'price\']) ? $formError[\'price\'] : \'\' ?></span>
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
                                        <span class="error" id="errorDesc"><?= isset($formError[\'description\']) ? $formError[\'description\'] : \'\' ?></span>
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
                                    <input type="submit" name="delete" id="delete" class="waves-effect waves-light btn red accent-4" value="Effacer le produit">
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
$query = \'SELECT *, DATE_FORMAT(`pro_d_ajout`, \'%d/%m/%Y\') as pro_d_ajout, DATE_FORMAT(`pro_d_modif`, \'%d/%m/%Y à %H:%i:%s\') as pro_d_modif FROM `produits` \'
            . \'INNER JOIN `categories`\'
            . \'ON `pro_cat_id` = `cat_id`\'
            . \'WHERE `pro_id` = :id\';
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
                    Nous y avons ajouté notre champs d'upload, ainsi qu'un bouton validant la modification.
                </p>
                <p>
                    Il nous reste à ajouter dans le fichier PHP la vérification du formulaire (voir exemple <a href="form.php" title="Lien vers validation de formulaire" target="_blank">ici</a>) et la modification en base de données :
                </p>
                <pre>
        <code class="php">
                        <?= htmlspecialchars('
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
                            <li class="tab col s3 offset-s3"><a class="active" href="#finalHTML">Vue (product.php)</a></li>
                            <li class="tab col s3"><a href="#finalPHP">Contrôleur (productController.php)</a></li>
                        </ul>
                    </div>
                    <div id="finalHTML" class="col s12">
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
        <p>
            Produit modifié !!
        </p>
        <a href="allProduct.php" title="Retour à la liste de produit" class="waves-effect waves-light btn">Retour à la liste de produit</a>
        <?php
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
                                         <select name="categories" id="categories">
                                                <option value="" disabled selected>Choisissez une catégorie</option>
                                                <?php
                                                foreach ($isObjectResult as $cat)
                                                {
                                                    ?>
                                                <option value="<?= $cat->cat_id ?>"<?= isset($_POST[\'categories\']) && $_POST[\'categories\'] == $cat->cat_id ? \'selected\' : \'\' ?>><?= $cat->cat_nom ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <label for="categories">Catégorie</label>
                                             <span class="error" id="errorCAt"><?= isset($formError[\'categories\']) ? $formError[\'categories\'] : \'\' ?></span>
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
                                            <span class="error" id="errorLabel"><?= isset($formError[\'label\']) ? $formError[\'label\'] : \'\' ?></span>
                                        </div>
                                    </div>                                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="color" type="text" name="color" class="" value="<?= isset($_POST[\'color\']) ? $_POST[\'color\'] : $product->pro_couleur ?>">
                                    <label for="color">Couleur</label>
                                    <span class="error" id="errorColor"><?= isset($formError[\'color\']) ? $formError[\'color\'] : \'\' ?></span>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="stock" type="text" name="stock" class="" value="<?= isset($_POST[\'stock\']) ? $_POST[\'stock\'] : $product->pro_stock ?>">
                                        <label for="stock">Stock</label>
                                        <span class="error" id="errorStock"><?= isset($formError[\'stock\']) ? $formError[\'stock\'] : \'\' ?></span>
                                    </div>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="price" type="text" name="price" class="" value="<?= isset($_POST[\'price\']) ? $_POST[\'price\'] : $product->pro_prix ?>">
                                        <label for="price">Prix</label>
                                        <span class="error" id="errorPrice"><?= isset($formError[\'price\']) ? $formError[\'price\'] : \'\' ?></span>
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
                                        <span class="error" id="errorDesc"><?= isset($formError[\'description\']) ? $formError[\'description\'] : \'\' ?></span>
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
                                    <input type="submit" name="delete" id="delete" class="waves-effect waves-light btn red accent-4" value="Effacer le produit">
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
//try {
//    $db = new PDO(\'mysql:host=localhost;charset=utf8;dbname=cedric\', \'cedric\', \'couz02072014\');
//} catch (Exception $e) {
//    echo \'erreur : \' . $e->getMessage() . \'<br>\';
//    echo \'N° : \' . $e->getCode();
//    die(\'fin du script\');
//}
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
     * vérification du champs couleur
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
                <a href="allProduct.php" class="waves-effect waves-light btn" title="lien vers demo" target="_blank">
  <i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>