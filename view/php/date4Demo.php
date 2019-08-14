<?php

/* --------------------------------------------------------
 * PHP Phase 6 Dates et heures
 *
 * Exercice 4  
 *
 * Reprenez l'exercice 3, mais traitez le problème avec les 
 * fonctions de gestion du timestamp, `time()` et `mktime()`
 * ---------------------------------------------------------- */
$endDate = "2021-01-31";

// La fonction time() retourne le timestamp de l'instant
$currentTimestamp = time();



/*  
 * Sources :
 * 
 * - https://www.php.net/manual/fr/function.time.php
 * - https://www.php.net/manual/fr/function.mktime.php
 */
// $mk_timestamp = mktime(heure, minutes, secondes, mois, jour, annee);
// la fonction list() - rien à voir les dates - permet d'assigner directement des valeurs à des variables inexistantes

list($y, $m, $d) = explode("-", $endDate);

//var_dump($y);
//var_dump($m);
//var_dump($d);
$dateDiff = mktime(0, 0, 0, $m, $d, $y) - $currentTimestamp;
$days = round($dateDiff / (3600 * 24));
include '../header.php';
?>
<div class="container">
    <p class="exo">
        Le timestamp pour la date actuelle est : <?= $currentTimestamp ?>
    </p>
    <p class="exo">
        Il reste <?= $dateDiff ?> secondes jusqu'à la fin de la formation (le 31/01/2031)
    </p>
    <p class="exo">
        Ce qui correspond à <?= $days ?> jours !
    </p>
</div>

/
<?php

include '../footer.php';
?>
