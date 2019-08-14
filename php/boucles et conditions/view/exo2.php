<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHP phase 2 : les conditions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/uikit.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../assets/css/style.css">
</head>

<body>
    <header>
        <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
            <nav class="uk-navbar-container" uk-navbar>
                <div class="uk-navbar-center">
                    <ul class="uk-navbar-nav">
                        <li class=""><a href="../index.php">Exercice 1</a></li>
                        <li class="uk-parent"><a href="exo2.php">Exercice 2</a></li>
                        <li><a href="exo3.php">Exercice 3</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="uk-container">
        <?php
        $number = 0;
        for ($number = 1; $number <= 500; $number++) {
            ?>
        <p>N°
            <?= $number ?> : Je dois faire des sauvegardes régulières de mes fichiers</p>
        <?php

    }
    ?>
    </div>


    <script src="../assets/js/jquery-3.3.1.js"></script>
    <script src="../assets/js/uikit.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html> 