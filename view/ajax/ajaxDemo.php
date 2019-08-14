<?php
include 'model/configRegion.php';
include 'controller/option2Controller.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Ajax</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <body>
        <button id="btn1">Afficher une page</button>
        <button id="btn2">Afficher la liste de produits jarditou</button>
        <button id="btn3">Afficher la liste des régions</button>
        <select id="select1"></select>
        <select id="select2">
           
        </select>
        <div id="div1"></div>
        <div>
            <form action="#" method="GET">
                <label for="search">Recherche :</label>
                <input type="text" name="search" id="search" placeholder="Recherche" />
                <input type="button" name="submit" id="submit" value="Rechercher" />
            </form>
        </div>
        <div id="result">

        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>