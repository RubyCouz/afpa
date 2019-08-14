<?php
/* --------------------------------------------------------
* PHP Phase 6 Dates et heures
*
* Exercice 3  
*
* Combien reste-t-il de jours avant la fin de votre formation ? 
* ---------------------------------------------------------- */
// instanciation d'un premier objet DateTime pour récupérer la date courante
$currentDate = new DateTime();
// instanciation d'un second objet DateTime pour récupérer la date de fin (passer en paramètre
$endDate= new DateTime('2021-01-31');
// calcul de la différence entre les 2 dates
$numberOfDays = $currentDate->diff($endDate);
// var_dump($oNbJours);
include '../header.php';
?>
<div class="container">
    <p class="exo">Il reste <?= $numberOfDays->days ?> jours avant votre fin de formation le 31/01/2021.</p>
</div>
<?php
include '../footer.php';