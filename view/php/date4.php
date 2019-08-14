
<div class="container">
    <h1>Nombre de jours restant avant la fin de la formation en utilisant <code>time()</code> et <code>mktime()</code></h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Présentation</div>
            <div class="collapsible-body">
                <p>
                    Nous reprenons l'exercice précédant, mais nous utiliserons cette fois les fonctions <a href="https://www.php.net/manual/fr/function.time.php" title="Lien vers documentation php.net" target="_blanked"><code>time()</code></a> (qui retournera le timestamp actuel) et la fonction <a href="https://www.php.net/manual/fr/function.mktime.php" title="Lien vers documentation php.net" target="_blanked"><code>mktime()</code></a> (qui retourne le timestamp d'une date donnée).
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le code</div>
            <div class="collapsible-body">
                <p>
                    Nous commençons par stocker dans une variable la date de fin, et nous récupérons le timestamp courant :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
$endDate = "2021-01-31";
// La fonction time() retourne le timestamp de l\'instant
$currentTimestamp = time();') ?>
    </code>
                </pre>
                <p>
                    A l'aide de la fonction <a href="https://www.php.net/manual/fr/function.list.php" title="Lien vers la documentation php.net" target="_blanked"><code>list()</code></a>, nous assignons la valeur des jours, mois et année de la date de fin à 3 variables :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars(' 
list($y, $m, $d) = explode("-", $endDate);'
                        )
                        ?>
    </code>
                </pre>
                <p>
                    Nous récupérons le timestamp de la date de fin à l'aide de <a href="https://www.php.net/manual/fr/function.mktime.php" title="Lien vers documentation php.net" target="_blanked"><code>mktime()</code></a> :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars(' 
mktime(0, 0, 0, $m, $d, $y)'
                        )
                        ?>
    </code>
                </pre>
                <p>Il nous ait désormais possible de calculer la différence entre les 2 timestamps :</p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars(' 
$dateDiff = mktime(0, 0, 0, $m, $d, $y) - $currentTimestamp;'
                        )
                        ?>
    </code>
                </pre>
                <p>
                    Pour obtenir le nombre de jour correspond ce timestamp nous devons le convertir de cette façon :
                </p>
                <pre>
    <code class="php">
                    <?= htmlspecialchars(' 
$days = round($dateDiff / (3600 * 24));'
                    )
                    ?>
    </code>
                </pre>
                <p>
                    Il ne reste plus qu'à formater l'affichage pour finir notre programme.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résumé et code</div>
            <div class="collapsible-body">
                <pre>
    <code class="HTMLBars">
                        <?= htmlspecialchars('
 /* --------------------------------------------------------
 * PHP Phase 6 Dates et heures
 *
 * Exercice 4  
 *
 * Reprenez l\'exercice 3, mais traitez le problème avec les 
 * fonctions de gestion du timestamp, `time()` et `mktime()`
 * ---------------------------------------------------------- */
$endDate = "2021-01-31";

// La fonction time() retourne le timestamp de l\'instant
$currentTimestamp = time();



/*
 * Sources :
 * 
 * - https://www.php.net/manual/fr/function.time.php
 * - https://www.php.net/manual/fr/function.mktime.php
 */
// $mk_timestamp = mktime(heure, minutes, secondes, mois, jour, annee);
// la fonction list() - rien à voir les dates - permet d\'assigner directement des valeurs à des variables inexistantes

list($y, $m, $d) = explode("-", $endDate);

$dateDiff = mktime(0, 0, 0, $m, $d, $y) - $currentTimestamp;
$days = round($dateDiff / (3600 * 24));
include \'../header.php\';
?>
<div class="uk-container">
    <p>
        Le timestamp pour la date actuelle est : <?= $currentTimestamp ?>
    </p>
    <p>
        Il reste <?= $dateDiff ?> secondes jusqu\'à la fin de la formation (le 31/01/2031)
    </p>
    <p>
        Ce qui correspond à <?= $days ?> jours !
    </p>
</div>

<?php
include \'footer.php\';
?>
') ?>
    </code>
                </pre>
                <a href="date4Demo.php" class="waves-effect waves-light btn" title="Lien vers démo" target="_blanked"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>