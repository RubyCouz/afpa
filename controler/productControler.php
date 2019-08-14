<?php
try {
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=cedric', 'cedric', 'couz02072014');
} catch (Exception $e) {
    echo 'erreur : ' . $e->getMessage() . '<br>';
    echo 'N° : ' . $e->getCode();
    die('fin du script');
}
$id = $_GET['id'];
/**
 * Suppression d'un produit
 */
if(isset($_POST['delete'])) {
    $query = 'DELETE FROM `produits` '
            . 'WHERE `pro_id` = :id ';
     $result = $db->prepare($query);
     $result->bindvalue(':id', $id, PDO::PARAM_INT);
     return $result->execute();
}
/**
 * Modification d'un produit
 */
// récupération de l'id du produit

// déclaration du tableau d'erreur
$formError = array();
// déclaration des regexs
$textPattern = '/^[a-zA-Z\-\,\. \déèàçùëüïôäâêûîô#&]+$/';
$pricePattern = '/^[\d]+[.]{1}[\d]{2,}+$/';
$numPattern = '/^[\d]+$/';
$radioPattern = '/^[1-2]{1}$/';
$extension = '';
// si la valeur du bouton submit est présente
if (isset($_POST['submit'])) {
    /**
     * vérification du champs référence
     */
    if (!empty($_POST['ref'])) {
        if (preg_match($textPattern, $_POST['ref'])) {
            $ref = $_POST['ref'];
        } else {
            $formError['ref'] = 'Veuillez renseigner une référence valide.';
        }
    } else {
        $formError['ref'] = 'Veuillez renseigner le champs "Référence".';
    }
    /**
     * vérification du champs couler
     */
    if (!empty($_POST['color'])) {
        if (preg_match($textPattern, $_POST['color'])) {
            $color = $_POST['color'];
        } else {
            $formError['color'] = 'Veuillez renseigner une couleur valide.';
        }
    } else {
        $formError['color'] = 'Veuillez renseigner le champs "Couleur".';
    }
    /**
     * Vérificaiton du champs libellé
     */
    if (!empty($_POST['label'])) {
        if (preg_match($textPattern, $_POST['label'])) {
            $label = $_POST['label'];
        } else {
            $formError['label'] = 'Veuillez renseigner un libellé valide.';
        }
    } else {
        $formError['label'] = 'Veuillez renseigner le champs "Libellé".';
    }
    /**
     * Vérificaiton du champs prix
     */
    if (!empty($_POST['price'])) {
        if (preg_match($pricePattern, $_POST['price'])) {
            $price = $_POST['price'];
        } else {
            $formError['price'] = 'Veuillez renseigner un prix valide.';
        }
    } else {
        $formError['price'] = 'Veuillez renseigner le champs "Prix".';
    }
    /**
     * Vérification du champs stock
     */
    if (!empty($_POST['stock'])) {
        if (preg_match($numPattern, $_POST['stock'])) {
            $stock = $_POST['stock'];
        } else {
            $formError['stock'] = 'Veuillez renseigner un stock valide.';
        }
    } else {
        $formError['stock'] = 'Veuillez renseigner le champs "Stock".';
    }
    /**
     * Vérification du champs description
     */
    if (!empty($_POST['description'])) {
        if (preg_match($textPattern, $_POST['description'])) {
            $description = $_POST['description'];
        } else {
            $formError['description'] = 'Veuillez renseigner une description valide.';
        }
    } else {
        $formError['description'] = 'Veuillez renseigner le champs "Description".';
    }

    if (!empty($_POST['radio2'])) {
        if (preg_match($radioPattern, $_POST['radio2'])) {
            $bloque = $_POST['radio2'];
        } else {
            $formError['radio2'] = 'Veuillez renseigner un blocage valide.';
        }
    }
    /**
     * Vérification du champs fichier
     */
    // si le champs file n'est pas vide
    if ($_FILES['file']['name'] != '') {
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
        if (in_array($mimetype, $aMimeTypes)) {
            // récupération de l'extension du fichier et stockage dans une variable
            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            // stockage du chemein de destintaion dans une variable
            $upload_dir = '../../assets/img/';
            // renommage du fichier
            $_FILES['file']['name'] = $id;
            // indication du chemin + nom de fichier pour le déplacement
            $upload_file = $upload_dir . $_FILES['file']['name'] . '.' . $extension;
            // autaorisation pour l'écriture
            chmod($_FILES['file']['tmp_name'], 0750);
            //déplacement du fichier
            move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);
            // message de confirmation
                 }
         else {
            // cas où il n'y a pas de fichier d'uploader, dans le cas d'un ajoût de produit
            $formError['file'] = 'Vous devez joindre une photo valide au produit !';
        }
    }
    /**
     * si le tableau d'erreur est vide
     */
    if (count($formError) == 0) {
        $query = 'UPDATE `produits` SET `pro_ref` = :ref, `pro_libelle` = :label, `pro_description` = :descrip, `pro_photo` = :extension, `pro_couleur` = :color, `pro_bloque` = :bloque, `pro_d_modif` = NOW(), `pro_stock` = :pro_stock WHERE `pro_id` = :id';
        $result = $db->prepare($query);
        $result->bindvalue(':id', $id, PDO::PARAM_INT);
        $result->bindvalue(':ref', $ref, PDO::PARAM_STR);
        $result->bindvalue(':label', $label, PDO::PARAM_STR);
        $result->bindvalue(':descrip', $description, PDO::PARAM_STR);
        $result->bindvalue(':extension', $extension, PDO::PARAM_STR);
        $result->bindvalue(':color', $color, PDO::PARAM_STR);
        $result->bindvalue(':pro_stock', $stock, PDO::PARAM_STR);
        $result->bindvalue(':bloque', $bloque, PDO::PARAM_STR);
        // $result->bindvalue(':pro_d_modif', NOW(), PDO::PARAM_STR);
        return $result->execute();
    } 

    //si la valeur de submti n'est pas présente (pas de click sur le bouton) on affiche le détal du produit
} else {
    $query = 'SELECT * FROM `produits` WHERE `pro_id` = :id';
    $result = $db->prepare($query);
    $result->bindValue(':id', $id, PDO::PARAM_INT);
    $result->execute();
    $product = $result->fetch(PDO::FETCH_OBJ);
    $result->closeCursor();

    $query = 'SELECT * FROM `categories`';
    $result = $db->query($query);
    if (is_object($result))
    {
        $isObjectResult = $result->fetchAll(PDO::FETCH_OBJ);
    }
    return $isObjectResult;
}

