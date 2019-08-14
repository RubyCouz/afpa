<?php
try {
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=cedric', 'cedric', 'couz02072014');
} catch (Exception $e) {
    echo 'erreur : ' . $e->getMessage() . '<br>';
    echo 'N° : ' . $e->getCode();
    die('fin du script');
}

$query = 'SELECT * FROM `produits`';
$result = $db->query($query);
$allProduct = $result->fetchAll(PDO::FETCH_OBJ);
$result->closeCursor();
?>