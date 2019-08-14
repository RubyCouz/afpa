<?php
/**
 * Méthode orienté objet
 */
$date = new DateTime();

// récupération du numéro du jour, sans 0 initial
$dayNumber = $date->format('j');
// récupération du numéro du jour de la semaine (1 => lundi, ...., 7 => dimanche)
$dayName = $date->format('N');
// récupération de l'année
$year = $date->format('Y');
// Numéro du mois, sans 0 initial
$monthName = $date->format('n');
// ==> source php.net https://www.php.net/manual/fr/class.datetime.php
// tableau des jours, première valeur vide
$dayList = ['', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
// Attention, 1 à 12, donc un vide au début pour la position 0
$monthList = ['', 'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];

/**
 * Méthode prcédurale
 */
// récupération de la date courante
$a = date_create();
// récupération des élements de la date qui nous intéresse
$b = date_format($a, 'j'); // => numéro du jour dans le mois
$c = date_format($a, 'N'); // => numéro du jour dans la semaine
$d = date_format($a, 'n'); // => numéro du mois dans l'année
$e = date_format($a, 'Y'); // => année


include '../header.php';
?>


<!-- affichage du résultat en HTML -->
<div class="container ">
    <h1>Date courante</h1>
    <h2 class="exo">Méthode orientée objet</h2>
    <p class="exo">
        Aujourd'hui, nous sommes le <?= $dayList[$dayName] . " " . $dayNumber . " " . $monthList[$monthName] . " " . $year ?>
    </p>
    <h2 class="exo">Méthode procédurale</h2>
    <p class="exo">
        Aujourd'hui, nous somme le <?= $dayList[$c] . " " . $b . " " . $monthList[$d] . " " . $e ?>
    </p>
</div>

<?php
include '../footer.php';
?>