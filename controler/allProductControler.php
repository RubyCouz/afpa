<?php
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

$query = 'SELECT *, DATE_FORMAT(`pro_d_ajout`, \'%d/%m/%Y\') as pro_d_ajout, DATE_FORMAT(`pro_d_modif`, \'%d/%m/%Y\') as pro_d_modif FROM `produits`'
        . 'INNER JOIN `categories`'
        . 'ON `pro_cat_id` = `cat_id`';
$result = $db->query($query);
$allProduct = $result->fetchAll(PDO::FETCH_OBJ);
$result->closeCursor();
?>