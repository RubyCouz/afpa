<?php
/**
 * fichier de configuration du site ( id bdd, etc...)
 */

 define('HOST', '127.0.0.1'); // -> constante 
 define('LOGIN', 'root'); 
 define('PASSWORD', '');
 define('DBNAME', 'jarditou');
 
 // ajout des fichiers nécessaire au fonctionnement du site
 include_once 'connectionBdd.php';
 include_once 'produits.php';
 include_once 'categories.php';
 
 

