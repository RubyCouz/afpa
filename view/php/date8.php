
<div class="container">
    <h1>Ajouter un mois à la date courante</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Présentation</div>
            <div class="collapsible-body">
                <p>
                    Nous devons faire un programme qui ajoute un mois à la date courante. Pour cela, nous devons utilier l'objet <code>DateTime()</code>
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le code</div>
            <div class="collapsible-body">
                <p>
                    Nous commençons par définir le fuseau horaire, puis nous instancions un nouvel objet <code>DateTime()</code>
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
date_default_timezone_set("Europe/Paris"); // => défini la loclaistion du fuseau utilisé
$newDate = new DateTime();') ?>
    </code>
                </pre>
                <p>
                    A l'aide de l'objet <a href="https://www.php.net/manual/fr/class.dateinterval.php" title="Lien vers documentation php.net" target="_blanked"><code>DateInterval()</code></a> et de la méthode <code>add()</code>, nous allons pouvoir ajouter la période souhaitée à notre date :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
$newDate = $date->add(new DateInterval("P1M"));
') ?>
    </code>
                </pre>
                <p>
                    Nous pouvons procéder enfin à l'affichage :
                </p>
                <pre>
    <code class="HTMLBars">
                        <?= htmlspecialchars('
<div class="container">
    <p>
        Nous sommes le <?= $date->format(\'d/m/Y\') ?>.
    </p>
    <p>
        Dans un mois nous serons le <?= $newDate->format(\'d/m/Y\') ?>
    </p>
</div>') ?>
    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résumé et code</div>
            <div class="collapsible-body">
                <pre>
    <code class="HTMLBars">
                        <?= htmlspecialchars('
date_default_timezone_set("Europe/Paris"); // => défni la loclaistion du fuseau utilisé
// instanciation d\'un objet DateTime pour l\'affichage de la date courante 
$date = new DateTime();

var_dump($date);
/* Ajout d\'un mois 
* 
* On va avoir recours à :
* - la fonction add() de l\'objetDateTime
* - l\'objet DateInterval
* 
* Sources :
* - https://www.php.net/manual/fr/datetime.add.php
* - https://www.php.net/manual/fr/class.dateinterval.php
*/
// instanciation d\'un objet DateTime pour l\ajout d\'un mois
$newDate = new DateTime();
$newDate->add(new DateInterval("P1M"));

/* Valeurs passées en argument de dateInterval : 
* - P : délimiteur de période : \'P\' pour la section jour/mois/année, \'T\' pour la section des heures/minutes/secondes
* - 1 : indique la valeur à ajouter 
* - M : indique la période à ajouter , ici \'M\' pour \'months\' donc mois.
*
* Autre exemple :
* Pour ajouter 10 jours et 2 heures 
* $date->add(new DateInterval("P30DT2H")); 
*/

var_dump($newDate);
include \'../header.php\';
?>
<div class="container">
    <p>
        Nous sommes le <?= $date->format(\'d/m/Y\') ?>.
    </p>
    <p>
        Dans un mois nous serons le <?= $newDate->format(\'d/m/Y\') ?>
    </p>
</div>

<?php
include \'../footer.php\';
?>


') ?>
    </code>
                </pre>
                <a href="date8Demo.php" class="waves-effect waves-light btn" title="Lien vers démo" target="_blanked"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>