<?php
// déclaration d'une variable permettant l'ouverture du fichier utilisé
$openFile = fopen('ListeLiens.txt', 'r');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHP phase 7 : Manipulation sur les fichiers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/uikit.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.css">
</head>

<body>
    <header>
        <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
            <nav class="uk-navbar-container" uk-navbar>
                <div class="uk-navbar-center">
                    <ul class="uk-navbar-nav">
                        <li class=""><a href="#">Affichage d'une liste de liens</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="uk-container">
        <?php
        /**
         * Boucle permettant la lecture du fichier
         */
        // tant qu'on est pas à la fin du fichier ( feof test la fi du fichier )
        while (!feof($openFile)) {
            // lecture des lignes (fgets récupère la ligne courante sur laquelle se trouve le pointeur du fichier)
            $line = fgets($openFile, 4096);
            // formatage de l'affichage en h
            ?>
        <p><a href="<?= $line ?>"><?= $line ?></a></p>
        <?php

    }
    ?>
    </div>




    <script src="assets/js/jquery-3.3.1.js"></script>
    <script src="assets/js/uikit.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html> 