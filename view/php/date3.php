
<div class="container">
    <h1>Calcul du nombre de jours restant avant la fin de la formation</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Présentation</div>
            <div class="collapsible-body">
                <p>
                    Le but de cet exercice est de créer une application permettant de calculer le nombre de jours restant avant la fin de la formation. Nous utiliserons ici toujours la classe <code>DateTime()</code>, et pour l'exercice nous choisirons une date arbitraire.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le code</div>
            <div class="collapsible-body">
                <p>
                    Nous allons commencer par instancier un premier objet <code>DateTime()</code> afin de récupérer les informations de la date courante, puis nous instancions un second objet <code>DateTime()</code> afin de récupérer les informations de la date de fin de période (on passera alors la date de fin en paramètre de notre objet) :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
// instanciation d\'un premier objet DateTime pour récupérer la date courante
$currentDate = new DateTime();
// instanciation d\'un second objet DateTime pour récupérer la date de fin (passer en paramètre
$endDate= new DateTime(\'2021-01-31\');') ?>
    </code>
                </pre>
                <p>TOUJOURS PENSER A METTRE LA DATE AU FORMAT ANGLOSAXON !!!</p>
                <p>
                    Nous pouvons à présent calculer la différence entre la date courante et la date de fin. Pour cela nous allons utiliser la méthode <a href="https://www.php.net/manual/fr/datetime.diff.php" class="Lien vers la documentation php.net" title="Lien vers la documentation php.net" target="_blanked"><code>date_diff()</code></a>. Nous l'utiliserons en style orienté objet:
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
// calcul de la différence entre les 2 dates 
$numberOfDays = $currentDate->diff($endDate);') ?>
    </code>
                </pre>
                <p>
                    Nous pouvons dès à présent procéder à notre affichage. En analysant le retour de la méthode <code>date_diff</code> (en faison un <code>var_dump()</code> par exemple), nous remarquons qu'elle retourne un tableau d'objet. Nous pouvons utiliser l'objet <code>days</code> (de cette manière nous restons dans notre optique de programmation orientée objet) pour formater notre affichage:
                </p>
                <pre>
    <code class="HTMLBars">
                        <?= htmlspecialchars('
<div class="uk-container">
    <p>Il reste <?= $numberOfDays->days ?> jours avant votre fin de formation le 31/01/2021.</p>
</div>') ?>
    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résumé et démo</div>
            <div class="collapsible-body">
                <pre>
    <code class="HTMLBars">
                        <?= htmlspecialchars('
<?php
/* --------------------------------------------------------
* PHP Phase 6 Dates et heures
*
* Exercice 3  
*
* Combien reste-t-il de jours avant la fin de votre formation ? 
* ---------------------------------------------------------- */
// instanciation d\'un premier objet DateTime pour récupérer la date courante
$currentDate = new DateTime();
// instanciation d\'un second objet DateTime pour récupérer la date de fin (passer en paramètre
$endDate= new DateTime(\'2021-01-31\');
// calcul de la différence entre les 2 dates
$numberOfDays = $currentDate->diff($endDate);
var_dump($numberOfDays);
// var_dump($oNbJours);
include \'../header.php\';
?>
<div class="uk-container">
    <p>Il reste <?= $numberOfDays->days ?> jours avant votre fin de formation le 31/01/2021.</p>
</div>
<?php
include \'../footer.php\';') ?>
    </code>
                </pre>
                <a href="date3Demo.php" class="waves-effect waves-light btn" title="Lien vers démo" target="_blanked"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>