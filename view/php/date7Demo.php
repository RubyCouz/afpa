<?php
/* --------------------------------------------------------
 * PHP Phase 6 Dates et heures
 *
 * Exercice 7  
 *
 * Affichez l'heure courante sous cette forme : _11h25_.
 * ---------------------------------------------------------- */
date_default_timezone_set('Europe/Paris'); // => défini la localisation du fuseau utilisé

include '../header.php';
?>
<div class="container">
    <p class="exo"><?= date('H\hi e') ?></p>
</div>

<?php
include '../footer.php';
?>