
<div class="container">
    <h1>Ecrire 500X</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Besoins</div>
            <div class="collapsible-body">
                <p>
                    Nous devons faire une punition : écrire 500 fois la phrase "Je dois faire des sauvegardes régulières de mes fichiers".
                </p>
                <p>
                    Puisque nous sommes de bons développeurs et un peu fainéant, nous allons simplement faire un programme qui l'écrira à notre place.
                </p>
                <p>
                    Il nous suffira de définir une variable qui servira à compter le nombre de répétition, nous aurons besoin aussi d'une boucle <a href="https://www.php.net/manual/fr/control-structures.for.php" target="_blank" title="Lien vers définitin php.net"><code>for()</code></a> qui nous permettra d'écrire une ligne à chaque tour.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Construction de la boucle</div>
            <div class="collapsible-body">
                <p>
                    Nous déclarons notre variable de comptage :
                </p>
                <pre>
                    <code class="php">
                        <?= htmlspecialchars('
$count = 0;                 
                   ') ?> 
                    </code>
                </pre>
                <p>
                    On veut que notre boucle <code>for()</code> se construise de cette façon : pour <code>$count</code> égale à 1, <code>$count</code> inférieur ou égale à 500, on incrémente <code>$count</code>.
                </p>
                <p>
                    Le code :
                </p>
                <pre>
                    <code class="php">
                        <?= htmlspecialchars('
for ($count = 1; $count <= 500; $count++) {
   
}
') ?>
                    </code>
                </pre>
                <p>
                    A l'intérieur de cette boucle nous allons inclure notre affichage :
                </p>
                <pre>
                    <code class="php">
                        <?= htmlspecialchars('
for ($count = 1; $count <= 500; $count++) {
    ?>
<p>N°
    <?= $count ?> : Je dois faire des sauvegardes régulières de mes fichiers</p>
<?php
}
                    ') ?>
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat</div>
            <div class="collapsible-body">
                <p>Le code final de notre page :</p>
                <pre>
                    <code class="html">
                        <?= htmlspecialchars('
<?php
$count = 0;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Correction AFPA</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <div class="uk-container">
     <?php       
     for ($count = 1; $count <= 500; $count++) {
         ?>
     <p>N°<?= $count ?> : Je dois faire des sauvegardes régulières de mes fichiers</p>
     <?php
    }
    ?>
    </div>
</body>
</html>
')
                        ?>
                    </code>
                </pre>
                <a href="punishmentDemo.php" target="_blank" class="waves-effect waves-light btn" title="Lien vers la démo du code"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Solution alternative</div>
            <div class="collapsible-body">
                <p>
                    Une autre solution consiste à utiliser une boucle <a href="https://www.php.net/manual/fr/control-structures.while.php" title="Lien vers la définition php.net" target="_blank"><code>while()</code></a> : tant que $count sera inférieur ou égale à 500, nous affichons notre phrase. A chaque tour de boucle, nous incrémentons <code>$count</code>.
                </p>
                <p>
                    Le code :
                </p>
                <pre>
                    <code class="html">
                        <?= htmlspecialchars('
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Correction AFPA</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <div class="uk-container">
     <?php       
     while ($count <= 500) {
         ?>
     <p>N°<?= $count ?> : Je dois faire des sauvegardes régulières de mes fichiers</p>
     <?php
     $count++;
    }
    ?>
    </div>
</body>
</html>
')
                        ?>
                    </code>
                </pre>
            </div>
        </li>
    </ul>
</div>