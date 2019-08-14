<?php
try {
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=jarditou', 'root', '');
} catch (Exception $e) {
    echo 'erreur : ' . $e->getMessage() . '<br>';
    echo 'N° : ' . $e->getCode();
    die('fin du script');
}
$id = $_GET['id'];
$query = 'SELECT * FROM `produits` WHERE `pro_id` = :id';
$result = $db->prepare($query);
$result->bindValue(':id', $id, PDO::PARAM_INT);
$result->execute(); 
$product = $result->fetch(PDO::FETCH_OBJ);
$result->closeCursor();