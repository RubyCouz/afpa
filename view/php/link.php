
<div class="container">
    <h1>Afficher une liste de lien</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Ouverture d'un fichier</div>
            <div class="collapsible-body">
                <p>
                    Pour ouvrir un fichier à l'aide de PHP, nous alons utiliser la fonction <a href="https://www.php.net/manual/fr/function.fopen.php" title="Lien vers la définition php.net" target="_blank"><code><?= htmlspecialchars('fopen()') ?></code></a>.  Elle prends plusieur paramêtres dont le chemin du fichier concerné, ainsi que la méthode d'ouverture (lecture seule, écriture et lecture, etc ...).
                </p>
                <p>
                    Cette ouverture de fichier sera stockée dans une variable afin de facilité sa manipulation.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Lecture du fichier</div>
            <div class="collapsible-body">
                <p>
                    Pour lire le fichier, nous allons utiliser une boucle qui récupérera chaque ligne du fichier tant que le curseur n'arrive pas à la fin du fichier. Nous utiliserons ici une boucle <code><?= htmlspecialchars('while') ?></code>, articulée avec la fonction <a href="https://www.php.net/manual/fr/function.feof.php" title="Lien vers définition php.net" target="_blank"><code><?= htmlspecialchars('feof()') ?></code></a>. Cette fonction va permettre de détecter la fin du fichier. 
                </p>
                <pre>
                <code class="php">
                        <?= htmlspecialchars('
while (!feof($openFile)) {
instruction
}
') ?>
                </code>
                </pre>
                <p>
                    Enfin pour récupérer chaque ligne de notre fichier, nous utiliserons la fonction <a href="https://www.php.net/manual/fr/function.fgets.php" title="Lien vers défintion php.net" target="_blank"><code><?= htmlspecialchars('fgets()') ?></code></a>.
                </p>
                <p>
                    Cette fonction prend 2 paramêtres :
                </p>
                <ul>
                    <li>L'ouverture valide du fichier</li>
                    <li>La taille du fichier, en octets. Si aucune valeur n'est fournie, le curseur lira le fichier jusqu'à la fin de la ligne.</li>
                </ul>
                <pre>
                <code class="php">
                        <?= htmlspecialchars('
while (!feof($openFile)) {
    // lecture des lignes (fgets récupère la ligne courante sur laquelle se trouve le pointeur du fichier)
    $line = fgets($openFile, 4096);
}
') ?>
                </code>
                </pre>
                <p>
                    Nous pouvons procéder à l'affichage : il nous suffira d'insérer la variable <code><?= htmlspecialchars('$line') ?></code> dans le code avec du code HTML de cette façon :
                </p>
                <pre>
                <code class="php">
                        <?= htmlspecialchars('
                        /**
                         * Boucle permettant la lecture du fichier
                         */
                        // tant qu\'on est pas à la fin du fichier ( feof test la fi du fichier )
                        while (!feof($openFile)) {
                            // lecture des lignes (fgets récupère la ligne courante sur laquelle se trouve le pointeur du fichier)
                            $line = fgets($openFile, 4096);
                            // formatage de l\'affichage en h
                            ?>
                        <p><a href="<?= $line ?>"><?= $line ?></a></p>
                        <?php
                    }
                    ?>
                ') ?>
                </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat</div>
            <div class="collapsible-body">
                <p>Code final :</p>
                <pre>
                <code class="html">
                        <?= htmlspecialchars('
<?php
$openFile = fopen(\'ListeLiens.txt\', \'r\');
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
/**
 * Boucle permettant la lecture du fichier
 */
// tant qu\'on est pas à la fin du fichier ( feof test la fi du fichier )
while (!feof($openFile)) {
    // lecture des lignes (fgets récupère la ligne courante sur laquelle se trouve le pointeur du fichier)
    $line = fgets($openFile, 4096);
    // formatage de l\'affichage en h
    ?>
<p><a href="<?= $line ?>"><?= $line ?></a></p>
<?php

}
?>
</div>
</body>
</html>
') ?>
                </code>
                </pre>
                <a href="linkDemo.php" title="Lien vers démo de l'exercice" target="_blank" class="waves-effect waves-light btn"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>
