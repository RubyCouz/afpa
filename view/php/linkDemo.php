<?php
include '../header.php';
// déclaration d'une variable permettant l'ouverture du fichier utilisé
$openFile = fopen('ListeLiens.txt', 'r');
?>

    <div class="container">
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
        <p class="exo"><a href="<?= $line ?>"><?= $line ?></a></p>
        <?php

    }
    ?>
    </div>
<?php
include '../footer.php';
?>