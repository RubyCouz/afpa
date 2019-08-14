<?php
try {
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=jarditou', 'root', '');
} catch (Exception $e) {
    echo 'erreur : ' . $e->getMessage() . '<br>';
    echo 'N° : ' . $e->getCode();
    die('fin du script');
}
$query = 'SELECT * FROM `produits` WHERE `pro_id` = 7';
$result = $db->query($query);
$produit = $result->fetch(PDO::FETCH_OBJ);
$result->closeCursor();

?>