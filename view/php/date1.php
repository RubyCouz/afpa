
<div class="container">
    <h1>Affichage de la date courante</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Présentation de l'exercice</div>
            <div class="collapsible-body">
                <p>
                    Nous devons créer un programme permettant l'affichage de la date courrante, tout en utilisant l'objet <a href="https://www.php.net/manual/fr/class.datetime.php" title="Liens vers documentation php.net" target="_blanked"><code>DateTime</code></a>. Cet affichage doit être affiché au format français.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le code</div>
            <div class="collapsible-body">
                <p>
                    Nous commençons par instancier l'objet <a href="https://www.php.net/manual/fr/book.datetime.php" title="Liens vers documentation php.net" target="_blanked"><code>DateTime</code></a>. Cet objet nous donnera la représentation d'une date et heure. Autour de cet objet peuvent se construire des méthodes permettant de manipuler une date et une heure.
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('$date = new DateTime()') ?>       
    </code>
                </pre>
                <p>
                    Nous récupérons ensuite le numéro du jour dans la semaine (1 pour Lundi, ... , 7 pour Dimanche) : 
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('$dayName  = $date->format(\'j\')') ?>
    </code>
                </pre>
                <p>  Nous pouvons maintenant récupérer le numéro du jour dans le mois :</p>

                <pre>
    <code class="php">
                        <?= htmlspecialchars('$dayNumber  = $date->format(\'N\')') ?>
    </code>
                </pre>
                <p>
                    Nous stockons l'année dans une variable :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('$year = $date->format(\'Y\')') ?>s
    </code>
                </pre>
                <p>
                    Et enfin nous récupérons le numéro du mois :
                </p>
                <pre>
                    <code class="php">
                        <?= htmlspecialchars('$monthName  = $date->format(\'n\')') ?>
                    </code>
                </pre>
                <p>
                    La lettre passée en paramêtre de la méthode <a href="https://www.php.net/manual/fr/datetime.format.php" title="Lien vers documentation php.net" target="_blanked"><code>$date->format()</code></a> permet de récupérer une partie d'une date demandé et d'en spécifier le formatage (lettre, numérique, etc...)
                </p>
                <p>
                    Nous créons ensuite 2 tableaux : Le premier (<code>$dayList[]</code>) contiendra tous les jours de la semaine, du lundi au dimanche, et le second (<code>$monthList[]</code>) contiendra quant à lui tous les mois de Janvier à Décembre.
                </p>
                <p>
                    ATTENTION : le numéro du jour et du mois récupérés commencent à partir de "1". Les tableaux en PHP commencent à l'index "0", nous devons donc laisser la première "case" sans valeur :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
 // tableau répertoriant les jours de la semaine, première valeur vide pour correspondre au numéro du jour retourné par la méthode format
 $dayList = ["", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"];
// tableau répertoriant les mois, première valeur vide pour correspondre au numéro du mois retourné par la méthode format
$monthList = ["", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"];') ?>
    </code>
                </pre>
                <p>
                    Pour trouver le jour et le mois correspondant, nous allons chercher dans nos tableaux les valeurs correspondant aux index <code>$nj</code>et <code>$m</code>. Nous pouvons enfin procéder à l'affichage :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
<p>Aujourd\'hui nous sommes le <?= $dayList[$dayName] . " " . $dayNumber . " " . $monthList[$monthName] . " " . $year ?></p>') ?>
    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Code et démo</div>
            <div class="collapsible-body">
                <pre>
    <code class="HTMLBars">
                        <?= htmlspecialchars('
<?php

$date = new DateTime();

// récupératin des valeurs de la date courante
$dayName = $date->format(\'j\'); //=> récupération du numéro du jour de la semaine (1 => lundi, ...., 7 => dimanche)
$dayNumber = $date->format(\'N\'); // => récupération du numéro du jour dans le mois 
$year = $date->format(\'Y\'); // récupération de l\'année
$monthName = $date->format(\'n\'); // => // Numéro du mois, sans 0 initial
// ==> source php.net https://www.php.net/manual/fr/class.datetime.php
// tableau des jours, première valeur vide
$dayList = [\'\', \'lundi\', \'mardi\', \'mercredi\', \'jeudi\', \'vendredi\', \'samedi\', \'dimanche\'];
// Attention, 1 à 12, donc un vide au début pour la position 0
$monthList = [\'\', \'janvier\', \'février\', \'mars\', \'avril\', \'mai\', \'juin\', \'juillet\', \'août\', \'septembre\', \'octobre\', \'novembre\', \'décembre\'];
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les boucles</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Affichage d\'une date</title>
    </head>
    <body>
    
    <!-- affichage du résultat en HTML -->
        <p>Aujourd\'hui nous sommes le <?= $dayList[$dayNumber] . " " . $dayName . " " . $monthList[$monthName] . " " . $year ?></p>

    </body>
</html>
     
               ') ?>
    </code>
                </pre>
                <a href="date1demo.php" class="waves-effect waves-light btn" title="Lien vers démo" target="_blanked"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        <li>
            <div class="collapsible-header">Méthode alternative</div>
            <div class="collapsible-body">
                <p>
                    Plutôt que d'utiliser la méthode orientée objet (ci-dessus), il est possible d'utiliser un style procédural :
                </p>
                <pre>
    <code class="HTMLBars">
                        <?=
                        htmlspecialchars('
 /**
 * Méthode procédurale
 */
// récupération de la date courante
$a = date_create();
// récupération des élements de la date qui nous intéresse
$b = date_format($a, \'j\'); // => numéro du jour dans le mois
$c = date_format($a, \'N\'); // => numéro du jour dans la semaine
$d = date_format($a, \'n\'); // => numéro du mois dans l\'année
$e = date_format($a, \'Y\'); // => année
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les boucles</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Affichage d\'une date</title>
    </head>
    <body>
    
   <p>
        Aujourd\'hui, nous sommes le <?= $dayList[$c] . " " . $b . " " . $monthList[$d] . " " . $e ?>
    </p>
    </body>
</html>
'
                        )
                        ?>
    </code>
                </pre>
                <a href="date1demo.php" class="waves-effect waves-light btn" title="Lien vers démo" target="_blanked"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>