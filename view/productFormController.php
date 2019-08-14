<?php
try {
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=jarditou', 'root', '');
} catch (Exception $e) {
    echo 'erreur : ' . $e->getMessage() . '<br>';
    echo 'N° : ' . $e->getCode();
    die('fin du script');
}

 $query = 'SELECT * FROM `categories`';
    $result = $db->query($query);
    if (is_object($result))
    {
        $isObjectResult = $result->fetchAll(PDO::FETCH_OBJ);
    }
    return $isObjectResult;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

