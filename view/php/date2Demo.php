<?php
/* --------------------------------------------------------
 * PHP Phase 6 Dates et heures
 *
 * Exercice 2
 *
 * Affichez le numéro de semaine de la date suivante : 14/07/2019 (un dimanche).
 * ---------------------------------------------------------- */
/**
 * Style orienté objet
 */
$date = new DateTime('2019-07-14');
$weekNumber = $date->format('W'); // récupération du numéro de semaine selon la date passée en paramêtre de la classe DateTime
/**
 * méthode procédurale
 */
// création de l'instance DateTime
$d = date_create('2019-07-14');
// Récupération du numéro de semaine de la date donnée
$w = date_format($d, 'W');
include '../header.php';
?>
<div class="container">
    <h1>Numéro de la semaine d'une date donnée</h1>
    <h2 class="exo">Style orienté objet</h2>
    <!-- affichage style orienté objet -->
    <p class="exo">La date 14/07/2019 se situe dans la semaine n°: <?= $weekNumber ?></p>
    <h2 class="exo">Méthode procédurale</h2>
    <!-- affichage méthode procédurale -->
    <p class="exo">La date 14/07/2019 se situe dans la semaine n°: <?= $w ?></p>
</div>


<?php include '../footer.php' ?>


