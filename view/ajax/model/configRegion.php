<?php
/**
 * fichier de configuration du site ( id bdd, etc...)
 */

 define('HOST', '127.0.0.1'); // -> constante 
 define('LOGIN', 'root'); 
 define('PASSWORD', '');
 define('DBNAME', 'regions');
 
 // ajout des fichiers nécessaire au fonctionnement du site
 include_once 'connectionRegion.php';
 include_once 'regions.php';
 include_once 'departements.php';
 
 

