
<div class="container">
    <h1>Numéro d'une semaine</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Présentation</div>
            <div class="collapsible-body">
                <p>
                    Nous devons créer un programme permettant de déterminer le numéro de la semaine selon une date donnée, le tout en utilisant la classe <a href="https://www.php.net/manual/fr/class.datetime.php" title="Liens vers documentation php.net" target="_blanked"><code>DateTime</code></a>.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le code</div>
            <div class="collapsible-body">
                <p>
                    Ici rien de bien compliqué, nous devons toujours instancier la classe <a href="https://www.php.net/manual/fr/class.datetime.php" title="Liens vers documentation php.net" target="_blanked"><code>DateTime</code></a>, en passant en paramêtre la date choisie :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
$date = new DateTime("2019-07-14");
') ?>       
    </code>
                </pre>
                <p>
                    Attention toutefois, la date en paramêtre doit être renseigné au format anglo-saxon (yyyy-mm-dd).
                </p>
                <p>
                    Nous utilisons la méthode <a href="https://www.php.net/manual/fr/datetime.format.php" title="Lien vers documentation php.net" target="_blanked"><code>$date->format()</code></a> pour récupérer le numéro de semaine :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
$weekNumber = $date->format(\'W\');
') ?>
    </code>
                </pre>
                <p>
                    Et enfin nous pouvons procéder à l'affichage. Code complet :
                </p>
                <pre>
    <code class="HTMLBars">
                        <?= htmlspecialchars('
<?php

/**
 * Style orienté objet
 */
$date = new DateTime(\'2019-07-14\');
$weekNumber = $date->format(\'W\'); // récupération du numéro de semaine selon la date passée en paramêtre de la classe DateTime
include \'../header.php\';
?>
<div class="uk-container">
    <p>La date 14/07/2019 se situe dans la semaine n°: <?= $weekNumber ?></p>
</div>
<?php include \'footer.php\' ?>') ?>
        </code>
                </pre>
                <a href="date2Demo.php" class="waves-effect waves-light btn" title="Lien vers démo" target="_blanked"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Alternative</div>
            <div class="collapsible-body">
                <p>
                    Nous pouvons utiliser également la méthode procédurale :
                </p>
                <pre>
    <code class="HTMLBars">
                        <?= htmlspecialchars('
<?php
 /**
 * méthode procédurale
 */
// création de l\'instance DateTime
$d = date_create(\'2019-07-14\');
// Récupération du numéro de semaine de la date donnée
$w = date_format($d, \'W\');
include \'../header.php\';
?>
<div class="uk-container">
    <h1>Numéro de la semaine d\'une date donnée</h1>
    <h2>Style orienté objet</h2>
    <!-- affichage style orienté objet -->
    <p>La date 14/07/2019 se situe dans la semaine n°: <?= $weekNumber ?></p>
    <h2>Méthode procédurale</h2>
    <!-- affichage méthode procédurale -->
    <p>La date 14/07/2019 se situe dans la semaine n°: <?= $w ?></p>
</div>


<?php include \'../footer.php\' ?>') ?>
    </code>
                </pre>
                <a href="date2Demo.php" class="waves-effect waves-light btn" title="Lien vers démo" target="_blanked"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>