
<div class="container">
    <h1>Ajout d'un produit</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Présentation</div>
            <div class="collapsible-body">
                <p>
                    De la même façon que pour la suppression, nous devons ajouter un bouton pour permettre l'ajout d'un produit dans notre base de donnée. Ce sera en fait un lien vers une autre page contenant un formulaire vierge, qui nous permettra d'envoyer les données dans la base. Nous pouvons donc reprendre le formulaire établi pour l'affichage du détail d'un produit, mais sans le pré-remplir, sans renseigner l'id (vu qu'il est automatiquement renseigné par la BDD). Le contrôle des données se fera de la même façon que pour la validation de la modification. Le seul changement majeur sera fait sur la requète bien évidemment.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le formulaire</div>
            <div class="collapsible-body">
                <pre>
    <code class="html">
                        <?= htmlspecialchars('
          <div class="row">
            <div class="col s12">
                <div class="card light-green lighten-5">
                    <div class="card-content">
                        <span class="card-title">Insertion d\'un produit :</span>
                        <form method="POST" action="#" enctype="multipart/form-data">   
                            <div class="row">
                                <div class="col s6">
                                    <img src="../../assets/img/" alt="" class="materialboxed pic2">
                                </div>
                                <div class="col s6">

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
                                            <input id="ref" type="text" name="ref" class="" value="<?= isset($_POST[\'ref\']) ? $_POST[\'ref\'] : \'\' ?>">
                                            <label for="ref">Référence</label>
                                            <span class="error" id="errorRef"><?= isset($formError[\'ref\']) ? $formError[\'ref\'] : \'\' ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="label" type="text" name="label" class="" value="<?= isset($_POST[\'label\']) ? $_POST[\'label\'] : \'\' ?>">
                                            <label for="label">Libellé</label>
                                            <span class="error" id="errorLabel"><?= isset($formError[\'label\']) ? $formError[\'label\'] : \'\' ?></span>
                                        </div>
                                    </div>                                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="color" type="text" name="color" class="" value="<?= isset($_POST[\'color\']) ? $_POST[\'color\'] : \'\' ?>">
                                    <label for="color">Couleur</label>
                                    <span class="error" id="errorColor"><?= isset($formError[\'color\']) ? $formError[\'color\'] : \'\' ?></span>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="stock" type="text" name="stock" class="" value="<?= isset($_POST[\'stock\']) ? $_POST[\'stock\'] : \'\' ?>">
                                        <label for="stock">Stock</label>
                                        <span class="error" id="errorStock"><?= isset($formError[\'stock\']) ? $formError[\'stock\'] : \'\' ?></span>
                                    </div>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="price" type="text" name="price" class="" value="<?= isset($_POST[\'price\']) ? $_POST[\'price\'] : \'\' ?>">
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
                                        <textarea id="description" class="materialize-textarea" name="description"><?= isset($_POST[\'decription\']) ? $_POST[\'description\'] : \'\' ?></textarea>
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
                                        <input name="radio2" type="radio" value="1">
                                        <span>Oui</span>
                                    </label>
                                </div>
                                <div class="col s1 radio">
                                    <label>
                                        <input name="radio2" type="radio" value="2">
                                        <span>Non</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s5 center-align">
                                    <input type="submit" name="submit" value="Enregistrer" class="waves-effect waves-light btn">
                                </div>
                                <div class="col s5 center-align">
                                    <a href="allProduct.php" title="Lien vers le catalogue" class="waves-effect waves-light btn cyan accent-4">Retour au catalogue</a>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    ') ?>
    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Requète d'ajout</div>
            <div class="collapsible-body">
                <p>Une fois notre formulaire établi, nous pouvons construire la méthode qui permettra l'ajout de données dans la base sur un fichier PHP lié à notre formulaire d'ajout :</p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars(' 
$query = \'INSERT INTO `produits` (`pro_cat_id`, `pro_libelle`, `pro_ref`, `pro_description`, `pro_prix`, `pro_stock`, `pro_couleur`, `pro_photo`, `pro_d_ajout`, `pro_bloque`)\'
. \'VALUE (:pro_cat_id, :pro_libelle, :pro_ref, :pro_description, :pro_prix, :pro_stock, :pro_couleur, :pro_photo, NOW(), :pro_bloque)\';
$addProduct = $db->prepare($query);
$addProduct->bindValue(\':pro_cat_id\', $pro_cat_id, PDO::PARAM_INT);
$addProduct->bindValue(\':pro_libelle\', $pro_libelle, PDO::PARAM_STR);
$addProduct->bindValue(\':pro_ref\', $pro_ref, PDO::PARAM_STR);
$addProduct->bindValue(\':pro_description\', $pro_description, PDO::PARAM_STR);
$addProduct->bindValue(\':pro_prix\', $pro_prix, PDO::PARAM_INT);
$addProduct->bindValue(\':pro_stock\', $pro_stock, PDO::PARAM_INT);
$addProduct->bindValue(\':pro_couleur\', $pro_color, PDO::PARAM_STR);
$addProduct->bindValue(\':pro_photo\', $pro_photo, PDO::PARAM_STR);
$addProduct->bindValue(\':pro_bloque\', $pro_bloque, PDO::PARAM_INT);
$addProduct->execute();') ?>
    </code>
                </pre>
                <p>
                    La requète est construite de la même façon que la requèté d'ajout : on utilise des marqueurs nominatifs, on prépare notre requète, on "bind" ensuite avec leur valeur respective prise dans le formulaire et enfin nous pouvons exécuter notre requète.
                </p>
                <p>
                    Notez ici que nous avons utilisé la fonction SQL <a href="https://sql.sh/fonctions/now" class="uk-link-muted" title="Lien vers définition sql.sh" target="_blank"><code>NOW()</code></a> : cette fonciton permet de récupérer la date et l'heure courante du système.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Vérification d'un champs du formulaire</div>
            <div class="collapsible-body">
                <p>
                    Tout comme une modification, nous devons vérifier qu'il y a bien des données de saisies dans le formulaire, et qu'elle doivent correspondre à nos attentes.
                </p>
                <p>
                    Nous détaillerons la vérification que d'un seul champs, vu cette vérification est identique (dans la méthode) à chaque champs. Par exemple ici le champs "couleur" :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars(' 
if(isset($_POST[\'submit\'] {
// vérification du champs couleur
    if (!empty($_POST[\'color\']))
    {
        if (preg_match($colorPattern, $_POST[\'color\']))
        {
            $pro_color = htmlspecialchars($_POST[\'color\']);
        }
        else
        {
            $formError[\'color\'] = \'Veuillez renseigner une couleur valide.\';
        }
    }
    else
    {
        $formError[\'color\'] = \'Veuillez préciser une couleur au produit.\';
    }
 };') ?>
    </code>
                </pre>
                <p>
                    Nous vérifions toujours si la valeur du <code>$_POST['submit']</code>. Si elle est présente, nous pouvons commencer la vérification du formulaire.
                </p>
                <p>
                    Notez ici que nous avons utilisé la fonction SQL <a href="https://sql.sh/fonctions/now" class="uk-link-muted" title="Lien vers définition sql.sh" target="_blank"><code>NOW()</code></a> : cette fonciton permet de récupérer la date et l'heure courante du système.
                </p>
                <p>
                    Nous vérifions ensuite qu'il y a une valeur de présente dans le champs de saisie avec <code>!empty($_POST['color'])</code>.
                </p>
                <p>
                    Si cette valeur est présente, alors nous pouvons ensuite la passser par la regex afin de voir si la saisie correspond à nos attentes, en utilisant la fonction PHP <a href="https://www.php.net/manual/fr/function.preg-match.php" class="uk-link-muted" title="Lien vers définition php.net" target="_blank"><code>preg_match($regex, $variable)</code></a>.
                </p>
                <p>
                    Si toutes ces conditions sont remplies, nous pouvons alors stocker cette valeur dans une variable afin d'en faciliter la manipulation par la suite. Sinon, nous stockons un message d'erreur personnaliser selon le type d'erreur dans notre tableau d'erreur. Afin de se protéger d'éventuelles injeection SQL, nous utilisons la fonction PHP <a href="https://www.php.net/manual/fr/function.htmlspecialchars.php" title="Lien vers définition php.net" target="_blank" class="uk-link-muted"><code>htmlspecialchars</code></a>. Cela évite que du code soit interprété par le formulaire.
                </p>
                <p>
                    Il ne reste plus qu'à répéter (copier-coller) cette méthode pour les autres champs en changeant les <code>name</code> présent dans les 
                    <code>$_POST['']</code>, les regexs et les messages d'erreur.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Upload de l'image, renommage et déplacement du fichier sur le serveur</div>
            <div class="collapsible-body">
                <p>
                    Pour vérifier la présence d'un fichier à uploader, il suffit de reprendre la méthode vu <a href="http://localhost/correction/view/upload.php" title="Lien vers l'upload de fichier" target="_blank">ici</a>.
                </p>
                <p>
                    Reprenons le code PHP :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
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
        $_FILES[\'file\'][\'name\'] = $db->lastInsertId();
        // indication du chemin + nom de fichier pour le déplacement
        $upload_file = $upload_dir . $_FILES[\'file\'][\'name\'] . \'.\' . $extension;
        // autorisation pour l\'écriture
        chmod($_FILES[\'file\'][\'tmp_name\'], 0750);
        //déplacement du fichier
        move_uploaded_file($_FILES[\'file\'][\'tmp_name\'], $upload_file);
            }
      else {
        // cas où il n\'y a pas de fichier d\'uploader, dans le cas d\'un ajoût de produit
        $formError[\'file\'] = \'Vous devez joindre une photo valide au produit !\';
    }
 }')
                        ?>
    </code>
                </pre>
                <p>
                    Nous commençons par regarder si un nom de fichier est présent avant de déclancher nos opérations. S'il n'y en pas, nous stockons un message dans le tableau d'erreur.
                </p>
                <p>
                    Nous définissons ensuite un tableau contentant les différents types de fichiers qui sont acceptés (<code>$aMimeTypes</code>). Ensuite nous ouvront une ressource finfo (<code>$finfo</code>permet de récupérer les informations du fichier à uploader) et nous cherchons le type MIME (<code>$mimetype</code>).
                </p>
                <p>
                    Nous pouvons alors comparer si le type MIME du fichier à uploader se trouve dans le tableau ou non. Si c'est le cas, nous pouvons commencer le traitement de ce fichier en vu de l'insertion en base de données et de son utilisation ultérieure : pour les besoins de la base de données, nous devons renommer le fichier selon l'id qu'aura le produit une fois inséré, stocker l'extension de ce fichier dans la table "produits" et stocker le fichier sur le serveur. Nous devons donc :
                </p>
                <ul>
                    <li>Récupérer l'extension du fichier :
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('  
// récupération de l\'extension du fichier et stockage dans une variable
$extension = pathinfo($_FILES[\'file\'][\'name\'], PATHINFO_EXTENSION);')
                                ?>
    </code>
                        </pre>
                    </li>
                    <li>Stocker le chemin de destination dans une variable :
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('  
// stockage du chemein de destintaion dans une variable
$upload_dir = \'../assets/img/\';')
                                ?>
    </code>
                        </pre>
                    </li>
                    <li>Renommer le fichier selon l'id qui sera inséré en utilisant la fonction <a href="https://www.php.net/manual/fr/pdo.lastinsertid.php" class="uk-link-muted" title="Lien vers définition php.net" target="_blank">lastInsertId()</a>
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('  
// renommage du fichier
$_FILES[\'file\'][\'name\'] = $id;')
                                ?>
    </code>
                        </pre>
                    </li>
                    <li>Indiquer le chemin total du fichier après déplacement (dossier + nom du fichier) :
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('  
// indication du chemin + nom de fichier pour le déplacement
$upload_file = $upload_dir . $_FILES[\'file\'][\'name\'] . \'.\' . $extension;')
                                ?>
    </code>
                        </pre>
                    </li>
                    <li>Autoriser les droits d'ecriture dans le dossier de destination :
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('
// autorisation pour l\'écriture
chmod($_FILES[\'file\'][\'tmp_name\'], 0750);')
                                ?>
    </code>
                        </pre>
                    </li>
                    <li>Et déplacer le fichier à l'aide la fonction <a href="https://www.php.net/manual/fr/function.move-uploaded-file.php" class="uk-link-muted" title="Lien vers définition php.net" target="_blank">move_uploaded_file()</a> :
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('
//déplacement du fichier
move_uploaded_file($_FILES[\'file\'][\'tmp_name\'], $upload_file);')
                                ?>
    </code>
                        </pre>
                    </li>
                    <p>
                        Cependant en l'état, sans organisation, notre code ne peut fonctionner correctement : pour récupérer le dernier id insérée dans la BDD, nous devons faire l'insertion du produit pour commencer, et ensuite renommer la photo (résultat sur le code final)
                    </p>
                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat final</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3 offset-s3"><a class="active" href="#html2">Vue (addProduct.php)</a></li>
                            <li class="tab col s3"><a href="#php2">Contrôleur (addProductController.php)</a></li>
                        </ul>
                    </div>
                    <div id="html2" class="col s12">
                        <pre>
    <code class="html">
                                <?= htmlspecialchars('
<?php
include \'../header.php\';
include \'../../controler/productFormController.php\';
?>
<div class="container">
    <?php
    if (isset($_POST[\'submit\']) && count($formError) == 0)
    {
        ?>
        <p>Produit ajouté au catalogue avec succès !!</p>
        <?php
    } else {
        ?>
        <div class="row">
            <div class="col s12">
                <div class="card light-green lighten-5">
                    <div class="card-content">
                        <span class="card-title">Insertion d\'un produit :</span>
                        <form method="POST" action="#" enctype="multipart/form-data">   
                            <div class="row">
                                <div class="col s6">
                                    <img src="../../assets/img/" alt="" class="materialboxed pic2">
                                </div>
                                <div class="col s6">

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
                                            <input id="ref" type="text" name="ref" class="" value="<?= isset($_POST[\'ref\']) ? $_POST[\'ref\'] : \'\' ?>">
                                            <label for="ref">Référence</label>
                                            <span class="error" id="errorRef"><?= isset($formError[\'ref\']) ? $formError[\'ref\'] : \'\' ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="label" type="text" name="label" class="" value="<?= isset($_POST[\'label\']) ? $_POST[\'label\'] : \'\' ?>">
                                            <label for="label">Libellé</label>
                                            <span class="error" id="errorLabel"><?= isset($formError[\'label\']) ? $formError[\'label\'] : \'\' ?></span>
                                        </div>
                                    </div>                                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="color" type="text" name="color" class="" value="<?= isset($_POST[\'color\']) ? $_POST[\'color\'] : \'\' ?>">
                                    <label for="color">Couleur</label>
                                    <span class="error" id="errorColor"><?= isset($formError[\'color\']) ? $formError[\'color\'] : \'\' ?></span>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="stock" type="text" name="stock" class="" value="<?= isset($_POST[\'stock\']) ? $_POST[\'stock\'] : \'\' ?>">
                                        <label for="stock">Stock</label>
                                        <span class="error" id="errorStock"><?= isset($formError[\'stock\']) ? $formError[\'stock\'] : \'\' ?></span>
                                    </div>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="price" type="text" name="price" class="" value="<?= isset($_POST[\'price\']) ? $_POST[\'price\'] : \'\' ?>">
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
                                        <span class="error" id="errorFile"><?= isset($formError[\'file\']) ? $formError[\'file\'] : \'\' ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="input-field">
                                        <textarea id="description" class="materialize-textarea" name="description"><?= isset($_POST[\'decription\']) ? $_POST[\'description\'] : \'\' ?></textarea>
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
                                        <input name="radio2" type="radio" value="1">
                                        <span>Oui</span>
                                    </label>
                                </div>
                                <div class="col s1 radio">
                                    <label>
                                        <input name="radio2" type="radio" value="2">
                                        <span>Non</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s5 center-align">
                                    <input type="submit" name="submit" value="Enregistrer" class="waves-effect waves-light btn">
                                </div>
                                <div class="col s5 center-align">
                                    <a href="allProduct.php" title="Lien vers le catalogue" class="waves-effect waves-light btn cyan accent-4">Retour au catalogue</a>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <?php
    include \'../footer.php\';
}
?>

') ?>
    </code>
                        </pre>
                    </div>
                    <div id="php2" class="col s12">
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('<?php

try {
    $db = new PDO(\'mysql:host=localhost;charset=utf8;dbname=jarditou\', \'root\', \'\');
} catch (Exception $e) {
    echo \'erreur : \' . $e->getMessage() . \'<br>\';
    echo \'N° : \' . $e->getCode();
    die(\'fin du script\');
}

/**
 * Ajout d\'un produit dans la bdd
 */
// déclaration du tableau d\'erreur
$formError = array();
// déclaration des regexs
$refPattern = \'/^[a-zA-Z\_\-\d]+$/\';
$textPattern = \'/^[a-zA-Z\-\,\. \déèàçùëüïôäâêûîô#&]+$/\';
$pricePattern = \'/^[\d]+[.]{1}[\d]{2,}+$/\';
$numPattern = \'/^[\d]+$/\';
$radioPattern = \'/^[1-2]{1}$/\';
$colorPattern = \'/^[a-zA-Zéèëê]+$/\';
$pro_photo = \'\';
// si la valeur du bouton submit est présente
if (isset($_POST[\'submit\']))
{
    // vérificaiton de la liste catégorie
    if (!empty($_POST[\'categories\']))
    {
        $pro_cat_id = htmlspecialchars($_POST[\'categories\']);
    }
    else
    {
        $formError[\'categories\'] = \'Veuillez renseigner une catégorie pour le produit.\';
    }
    // vérification du champs référence
    if (!empty($_POST[\'ref\']))
    {
        if (preg_match($refPattern, $_POST[\'ref\']))
        {
            $pro_ref = htmlspecialchars($_POST[\'ref\']);
        }
        else
        {
            $formError[\'ref\'] = \'Veuillez renseigner une référence valide.\';
        }
    }
    else
    {
        $formError[\'ref\'] = \'Veuillez préciser une référence au produit.\';
    }

// vérification du champs couleur
    if (!empty($_POST[\'color\']))
    {
        if (preg_match($colorPattern, $_POST[\'color\']))
        {
            $pro_color = htmlspecialchars($_POST[\'color\']);
        }
        else
        {
            $formError[\'color\'] = \'Veuillez renseigner une couleur valide.\';
        }
    }
    else
    {
        $formError[\'color\'] = \'Veuillez préciser une couleur au produit.\';
    }

    // vérification du champs libellé
    if (!empty($_POST[\'label\']))
    {
        if (preg_match($textPattern, $_POST[\'label\']))
        {
            $pro_libelle = htmlspecialchars($_POST[\'label\']);
        }
        else
        {
            $formError[\'label\'] = \'Veuillez renseigner un libellé valide.\';
        }
    }
    else
    {
        $formError[\'label\'] = \'Veuillez préciser un libellé au produit.\';
    }

    // vérification du champs prix
    if (!empty($_POST[\'price\']))
    {
        if (preg_match($pricePattern, $_POST[\'price\']))
        {
            $pro_prix = htmlspecialchars($_POST[\'price\']);
        }
        else
        {
            $formError[\'price\'] = \'Veuillez renseigner un prix valide.\';
        }
    }
    else
    {
        $formError[\'price\'] = \'Veuillez préciser un prix au produit.\';
    }
    // vérification du champs stcok
    if (!empty($_POST[\'stock\']))
    {
        if (preg_match($numPattern, $_POST[\'stock\']))
        {
            $pro_stock = htmlspecialchars($_POST[\'stock\']);
        }
        else
        {
            $formError[\'stock\'] = \'Veuillez renseigner un stock valide.\';
        }
    }
    else
    {
        $formError[\'stock\'] = \'Veuillez préciser un stock au produit.\';
    }
    // vérification du champs decsription
    if (!empty($_POST[\'description\']))
    {
        if (preg_match($textPattern, $_POST[\'description\']))
        {
            $pro_description = htmlspecialchars($_POST[\'description\']);
        }
        else
        {
            $formError[\'description\'] = \'Veuillez renseigner un description valide valide.\';
        }
    }
    else
    {
        $formError[\'description\'] = \'Veuillez préciser une description au produit.\';
    }
    if (!empty($_POST[\'radio2\']))
    {
        if (preg_match($radioPattern, $_POST[\'radio2\']))
        {
            $pro_bloque = htmlspecialchars($_POST[\'radio2\']);
        }
        else
        {
            $formError[\'radio2\'] = \'Veuillez renseigner un blocage valide.\';
        }
    }
    else
    {
        $formError[\'radio2\'] = \'Veuillez préciser si le produit est bloqué ou non.\';
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
            $pro_photo = pathinfo($_FILES[\'file\'][\'name\'], PATHINFO_EXTENSION);
        }
     } else {
            // cas où il n\'y a pas de fichier d\'uploader, dans le cas d\'un ajoût de produit
            $formError[\'file\'] = \'Vous devez joindre une photo valide au produit !\';
        }    
    if (count($formError) == 0)
    {
        $query = \'INSERT INTO `produits` (`pro_cat_id`, `pro_libelle`, `pro_ref`, `pro_description`, `pro_prix`, `pro_stock`, `pro_couleur`, `pro_photo`, `pro_d_ajout`, `pro_bloque`)\'
                . \'VALUE (:pro_cat_id, :pro_libelle, :pro_ref, :pro_description, :pro_prix, :pro_stock, :pro_couleur, :pro_photo, NOW(), :pro_bloque)\';
        $addProduct = $db->prepare($query);
        $addProduct->bindValue(\':pro_cat_id\', $pro_cat_id, PDO::PARAM_INT);
        $addProduct->bindValue(\':pro_libelle\', $pro_libelle, PDO::PARAM_STR);
        $addProduct->bindValue(\':pro_ref\', $pro_ref, PDO::PARAM_STR);
        $addProduct->bindValue(\':pro_description\', $pro_description, PDO::PARAM_STR);
        $addProduct->bindValue(\':pro_prix\', $pro_prix, PDO::PARAM_INT);
        $addProduct->bindValue(\':pro_stock\', $pro_stock, PDO::PARAM_INT);
        $addProduct->bindValue(\':pro_couleur\', $pro_color, PDO::PARAM_STR);
        $addProduct->bindValue(\':pro_photo\', $pro_photo, PDO::PARAM_STR);
        $addProduct->bindValue(\':pro_bloque\', $pro_bloque, PDO::PARAM_INT);
        if ($addProduct->execute())
        {
            // stockage du chemein de destintaion dans une variable
            $upload_dir = \'../assets/img/\';
            // renommage du fichier
            $_FILES[\'file\'][\'name\'] = $db->lastInsertId();
            // indication du chemin + nom de fichier pour le déplacement
            $upload_file = $upload_dir . $_FILES[\'file\'][\'name\'] . \'.\' . $pro_photo;
            // autaorisation pour l\'écriture
            chmod($_FILES[\'file\'][\'tmp_name\'], 0750);
            //déplacement du fichier
            move_uploaded_file($_FILES[\'file\'][\'tmp_name\'], $upload_file);
            // message de confirmation
           
        }
         return $addProduct->execute();
    }
    else
    {
        $formError[\'error\'] = \'Une erreur est survenue lors de l\\\'insertion du produit dans la base de données.\';
        // affichage des catégories dans la liste déroulante
    $query = \'SELECT * FROM `categories`\';
    $result = $db->query($query);
    if (is_object($result))
    {
        $isObjectResult = $result->fetchAll(PDO::FETCH_OBJ);
    }
    return $isObjectResult;
    }
}
else
{
    // affichage des catégories dans la liste déroulante
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
                <a href="allProduct.php" title="Lien vers demo" target="_blank" class="waves-effect waves-light btn"><i class="material-icons right">play_arrow</i>RUN CODE</a>
                <p>
                    Pour l'affichage de notre de document nous avons opter pour un condition se basant sur la présence de la valeur de <code>$_POST['submit']</code> (validation du formulaire) et sur la présence d'erreur dans le tableau d'erreur (<code>count($formError)</code>. Si il y a validation du formulaire et pas d'erreur, alors nous affichons un message de confirmation. Sinon s'il y a validation et une entrée présente dans le tableau d'erreur, nous affichons un message d'avertissement. Sinon, nous afficons notre formulaire de manière classique.
                </p>
                <p>
                    En ce qui concerne le PHP, nous avons du exécuter la requète d'insertion avant de pouvoir renommmer le fichier afin de récupérer le dernier id inséré. Une fois la requète exécuter nous pouvons reprendre la modification du fichier à uploader. On vérifie d'abord qu'il y a un fichier à uploader, on compare les types MIME :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
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
if (in_array($mimetype, $aMimeTypes))
{
    // récupération de l\'extension du fichier et stockage dans une variable
    $pro_photo = pathinfo($_FILES[\'file\'][\'name\'], PATHINFO_EXTENSION);
}
else
{
    // cas où il n\'y a pas de fichier d\'uploader, dans le cas d\'un ajoût de produit
    $formError[\'file\'] = \'Vous devez joindre une photo valide au produit !\';
}') ?>
    </code>
                </pre>
                <p>
                    Si le type MIME est correct, on peut lancer notre requète et si l'insertion en base de données se fait, nous pouvons alors récupérer le dernier id inséré et renommer notre fichier :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars(' 
if (count($formError) == 0) {
    $query = \'INSERT INTO `produits` (`pro_cat_id`, `pro_libelle`, `pro_ref`, `pro_description`, `pro_prix`, `pro_stock`, `pro_couleur`, `pro_photo`, `pro_d_ajout`, `pro_bloque`)\'
       . \'VALUE (:pro_cat_id, :pro_libelle, :pro_ref, :pro_description, :pro_prix, :pro_stock, :pro_couleur, :pro_photo, NOW(), :pro_bloque)\';
    $addProduct = $db->prepare($query);
    $addProduct->bindValue(\':pro_cat_id\', $pro_cat_id, PDO::PARAM_INT);
    $addProduct->bindValue(\':pro_libelle\', $pro_libelle, PDO::PARAM_STR);
    $addProduct->bindValue(\':pro_ref\', $pro_ref, PDO::PARAM_STR);
    $addProduct->bindValue(\':pro_description\', $pro_description, PDO::PARAM_STR);
    $addProduct->bindValue(\':pro_prix\', $pro_prix, PDO::PARAM_INT);
    $addProduct->bindValue(\':pro_stock\', $pro_stock, PDO::PARAM_INT);
    $addProduct->bindValue(\':pro_couleur\', $pro_color, PDO::PARAM_STR);
    $addProduct->bindValue(\':pro_photo\', $pro_photo, PDO::PARAM_STR);
    $addProduct->bindValue(\':pro_bloque\', $pro_bloque, PDO::PARAM_INT);
    if ($addProduct->execute())
        {
            // stockage du chemein de destintaion dans une variable
            $upload_dir = \'../assets/img/\';
            // renommage du fichier
            $_FILES[\'file\'][\'name\'] = $db->lastInsertId();
            // indication du chemin + nom de fichier pour le déplacement
            $upload_file = $upload_dir . $_FILES[\'file\'][\'name\'] . \'.\' . $pro_photo;
            // autaorisation pour l\'écriture
            chmod($_FILES[\'file\'][\'tmp_name\'], 0750);
            //déplacement du fichier
            move_uploaded_file($_FILES[\'file\'][\'tmp_name\'], $upload_file);
            // message de confirmation
           
        }
         return $addProduct->execute();
}
else
{
    $formError[\'error\'] = \'Une erreur est survenue lors de l\\\'insertion du produit dans la base de données.\';
}') ?>
                        </code>
                </pre>
            </div>
        </li>
    </ul>
</div>