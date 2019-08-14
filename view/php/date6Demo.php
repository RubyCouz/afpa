<?php
/* --------------------------------------------------------
 * PHP Phase 6 Dates et heures
 *
 * Exercice 6  
 *
 * En utilisant l'objet DateTime, montrez que la date du 17/17/2019 est erronée. 
 * ---------------------------------------------------------- */
$date = "17/17/2019";

// Méthode avec l'objet DateTime
$testDate = DateTime::createFromFormat('d/m/Y', $date); // => analyse une date au format texte selon le format spécifié
// getLastErrors retourne les erreurs de l'objet DateTime dans un tableau
$errors = $testDate->getLastErrors();
include '../header.php';
?>
<div class="container">
    <?php
    if ($errors['warning_count'] >= 1)
    {
        ?>
        <p class="exo">
            La date <?= $date ?> est non valide !!
        </p>
    </div>
    <?php
}
else
{
    ?>
    <p class="exo">
        La date <?= $date ?> est valide !!
    </p>
    <?php
}
include '../footer.php';
?>