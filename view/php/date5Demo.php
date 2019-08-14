<?php
/* --------------------------------------------------------
 * PHP Phase 6 Dates et heures
 *
 * Exercice 5  
 *
 * Quelle sera la prochaine année bissextile ?
 * ---------------------------------------------------------- */
$date = new DateTime();
include '../header.php';
?>
<div class="container">
    <?php
    // début de la boucle parcourant les 4 prochaines années
    for ($i = 0; $i < 4; $i++)
    {
        // on ajout un an à chaque tour
        $date->modify('+1 years');

        if ($date->format('L') == 1) // si la fonction retourne 1
        {
            ?>

            <p class="exo">
                L'année <?= $date->format('Y') ?> sera la prochaine année bissextile.
            </p>
            <?php
        }
    }
    ?>
</div>
<?php
include '../footer.php';
?>
