<?php
print_r($_POST);
try {
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=jarditou', 'root', '');
} catch (Exception $e) {
    echo 'erreur : ' . $e->getMessage() . '<br>';
    echo 'N° : ' . $e->getCode();
    die('fin du script');
}
//try {
//    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=cedric', 'cedric', 'couz02072014');
//} catch (Exception $e) {
//    echo 'erreur : ' . $e->getMessage() . '<br>';
//    echo 'N° : ' . $e->getCode();
//    die('fin du script');
//}

/**
 * Ajout d'un produit dans la bdd
 */
// déclaration du tableau d'erreur
$formError = array();
// déclaration des regexs
$refPattern = '/^[a-zA-Z\_\-\d]+$/';
$textPattern = '/^[a-zA-Z\-\,\. \déèàçùëüïôäâêûîô#&]+$/';
$pricePattern = '/^[\d]*[.]?[\d]{1,2}+$/';
$numPattern = '/^[\d]+$/';
$radioPattern = '/^[1-2]{1}$/';
$colorPattern = '/^[a-zA-Zéèëê]+$/';
$pro_photo = '';

if (isset($_POST['file']))
{
    echo 'blabla';
    /**
     * Vérification du champs fichier
     */
    $data = false;
    // si le champs file n'est pas vide
    
        // on peut vérifier que le type de fichier est bien pris en compte :
        // on définis les type de fichiers acceptés
        $aMimeTypes = array('image/gif', 'image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png', 'image/tiff');
        /**
         *  On extrait le type du fichier via l'extension FILE_INFO  
         */
        // création d'une nouvelle ressource fileinfo dans laquelle nous indiquons l'info recherchée  
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        // on récupère le type MIME du fichier et on le stock dans une variable
        $mimetype = finfo_file($finfo, $_FILES['file']['tmp_name']);

        finfo_close($finfo);
        //si le type de fichier est correct
        if (in_array($mimetype, $aMimeTypes))
        {
            // récupération de l'extension du fichier et stockage dans une variable
            $pro_photo = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        }
        // stockage du chemein de destintaion dans une variable
        $upload_dir = '../../assets/img/';
        // renommage du fichier
        $_FILES['file']['name'] = $_POST['pic'];
        // indication du chemin + nom de fichier pour le déplacement
        $upload_file = $upload_dir . $_FILES['file']['name'];
        // autaorisation pour l'écriture
        chmod($_FILES['file']['tmp_name'], 0777);
        //déplacement du fichier
        if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file))
        {
            echo 'ok';
            $data = true;
        }
    
    echo $data;
}

// si la valeur du bouton submit est présente
if (isset($_POST['submit']))
{
    // vérificaiton de la liste catégorie
    if (!empty($_POST['categories']))
    {
        $pro_cat_id = $_POST['categories'];
    }
    else
    {
        $formError['categories'] = 'Veuillez renseigner une catégorie pour le produit.';
    }
    // vérification du champs référence
    if (!empty($_POST['ref']))
    {
        if (preg_match($refPattern, $_POST['ref']))
        {
            $pro_ref = $_POST['ref'];
        }
        else
        {
            $formError['ref'] = 'Veuillez renseigner une référence valide.';
        }
    }
    else
    {
        $formError['ref'] = 'Veuillez préciser une référence au produit.';
    }

// vérification du champs couleur
    if (!empty($_POST['color']))
    {
        if (preg_match($colorPattern, $_POST['color']))
        {
            $pro_color = $_POST['color'];
        }
        else
        {
            $formError['color'] = 'Veuillez renseigner une couleur valide.';
        }
    }
    else
    {
        $formError['color'] = 'Veuillez préciser une couleur au produit.';
    }

    // vérification du champs libellé
    if (!empty($_POST['label']))
    {
        if (preg_match($textPattern, $_POST['label']))
        {
            $pro_libelle = $_POST['label'];
        }
        else
        {
            $formError['label'] = 'Veuillez renseigner un libellé valide.';
        }
    }
    else
    {
        $formError['label'] = 'Veuillez préciser un libellé au produit.';
    }

    // vérification du champs prix
    if (!empty($_POST['price']))
    {
        if (preg_match($pricePattern, $_POST['price']))
        {
            $pro_prix = $_POST['price'];
        }
        else
        {
            $formError['price'] = 'Veuillez renseigner un prix valide.';
        }
    }
    else
    {
        $formError['price'] = 'Veuillez préciser un prix au produit.';
    }
    // vérification du champs stcok
    if (!empty($_POST['stock']))
    {
        if (preg_match($numPattern, $_POST['stock']))
        {
            $pro_stock = $_POST['stock'];
        }
        else
        {
            $formError['stock'] = 'Veuillez renseigner un stock valide.';
        }
    }
    else
    {
        $formError['stock'] = 'Veuillez préciser un stock au produit.';
    }
    // vérification du champs decsription
    if (!empty($_POST['description']))
    {
        if (preg_match($textPattern, $_POST['description']))
        {
            $pro_description = $_POST['description'];
        }
        else
        {
            $formError['description'] = 'Veuillez renseigner un description valide valide.';
        }
    }
    else
    {
        $formError['description'] = 'Veuillez préciser une description au produit.';
    }
    if (!empty($_POST['radio2']))
    {
        if (preg_match($radioPattern, $_POST['radio2']))
        {
            $pro_bloque = $_POST['radio2'];
        }
        else
        {
            $formError['radio2'] = 'Veuillez renseigner un blocage valide.';
        }
    }
    else
    {
        $formError['radio2'] = 'Veuillez préciser si le produit est bloqué ou non.';
    }
    /**
     * Vérification du champs fichier
     */
    // si le champs file n'est pas vide
    if ($_FILES['file']['name'] != '')
    {
        // on peut vérifier que le type de fichier est bien pris en compte :
        // on définis les type de fichiers acceptés
        $aMimeTypes = array('image/gif', 'image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png', 'image/tiff');
        /**
         *  On extrait le type du fichier via l'extension FILE_INFO  
         */
        // création d'une nouvelle ressource fileinfo dans laquelle nous indiquons l'info recherchée  
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        // on récupère le type MIME du fichier et on le stock dans une variable
        $mimetype = finfo_file($finfo, $_FILES['file']['tmp_name']);

        finfo_close($finfo);
        //si le type de fichier est correct
        if (in_array($mimetype, $aMimeTypes))
        {
            // récupération de l'extension du fichier et stockage dans une variable
            $pro_photo = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        }
    }
    else
    {
        // cas où il n'y a pas de fichier d'uploader, dans le cas d'un ajoût de produit
        $formError['file'] = 'Vous devez joindre une photo valide au produit !';
    }
    if (count($formError) == 0)
    {
        $query = 'INSERT INTO `produits` (`pro_cat_id`, `pro_libelle`, `pro_ref`, `pro_description`, `pro_prix`, `pro_stock`, `pro_couleur`, `pro_photo`, `pro_d_ajout`, `pro_bloque`)'
                . 'VALUE (:pro_cat_id, :pro_libelle, :pro_ref, :pro_description, :pro_prix, :pro_stock, :pro_couleur, :pro_photo, NOW(), :pro_bloque)';
        $addProduct = $db->prepare($query);
        $addProduct->bindValue(':pro_cat_id', $pro_cat_id, PDO::PARAM_INT);
        $addProduct->bindValue(':pro_libelle', $pro_libelle, PDO::PARAM_STR);
        $addProduct->bindValue(':pro_ref', $pro_ref, PDO::PARAM_STR);
        $addProduct->bindValue(':pro_description', $pro_description, PDO::PARAM_STR);
        $addProduct->bindValue(':pro_prix', $pro_prix, PDO::PARAM_INT);
        $addProduct->bindValue(':pro_stock', $pro_stock, PDO::PARAM_INT);
        $addProduct->bindValue(':pro_couleur', $pro_color, PDO::PARAM_STR);
        $addProduct->bindValue(':pro_photo', $pro_photo, PDO::PARAM_STR);
        $addProduct->bindValue(':pro_bloque', $pro_bloque, PDO::PARAM_INT);
        if ($addProduct->execute())
        {


            // stockage du chemein de destintaion dans une variable
            $upload_dir = '../../assets/img/';
            // renommage du fichier
            $_FILES['file']['name'] = $db->lastInsertId();
            // indication du chemin + nom de fichier pour le déplacement
            $upload_file = $upload_dir . $_FILES['file']['name'] . '.' . $pro_photo;
            // autaorisation pour l'écriture
            chmod($_FILES['file']['tmp_name'], 0750);
            //déplacement du fichier
            move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);
            // message de confirmation
        }
        return $addProduct->execute();
    }
    else
    {
        $formError['error'] = 'Une erreur est survenue lors de l\'insertion du produit dans la base de données.';
        // affichage des catégories dans la liste déroulante
        $query = 'SELECT * FROM `categories`';
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
    $query = 'SELECT * FROM `categories`';
    $result = $db->query($query);
    if (is_object($result))
    {
        $isObjectResult = $result->fetchAll(PDO::FETCH_OBJ);
    }
    return $isObjectResult;
}


