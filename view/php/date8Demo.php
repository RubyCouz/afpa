<?php
/* --------------------------------------------------------
* PHP Phase 6 Dates et heures
*
* Exercice 8  
*
* Ajoutez 1 mois à la date courante 
* --------------------------------------------------------- */
date_default_timezone_set("Europe/Paris"); // => défini la localisation du fuseau utilisé
$date = new DateTime();


/* Ajout d'un mois 
* 
* On va avoir recours à :
* - la fonction add() de l'objetDateTime
* - l'objet DateInterval
* 
* Sources :
* - https://www.php.net/manual/fr/datetime.add.php
* - https://www.php.net/manual/fr/class.dateinterval.php
*/
$newDate = new DateTime();
$newDate->add(new DateInterval("P1M"));

/* Valeurs passées en argument de dateInterval : 
* - P : délimiteur de période : 'P' pour la section jour/mois/année, 'T' pour la section des heures/minutes/secondes
* - 1 : indique la valeur à ajouter 
* - M : indique la période à ajouter , ici 'M' pour 'months' donc mois.
*
* Autre exemple :
* Pour ajouter 10 jours et 2 heures 
* $date->add(new DateInterval("P30DT2H")); 
*/


include '../header.php';
?>
<div class="container">
    <p class="exo">
        Nous sommes le <?= $date->format('d/m/Y') ?>.
    </p>
    <p class="exo">
        Dans un mois nous serons le <?= $newDate->format('d/m/Y') ?>
    </p>
</div>

<?php
include '../footer.php';
?>

