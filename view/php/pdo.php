<?php
include '../header.php';
?>
<div class="row">
    <div class="col s12">
        <ul class="tabs">
            <li class="tab col s2 offset-s1"><a class="active" href="#cut">Séparation du code</a></li>
            <li class="tab col s2"><a href="#connect">Connexion à la base de données et affichage du contenu d'une table</a></li>
            <li class="tab col s2"><a href="#update">Modification</a></li>
            <li class="tab col s2"><a href="#del">Suppression</a></li>
            <li class="tab col s2"><a href="#add">Ajout</a></li>
        </ul>
    </div>
    <div id="cut" class="col s12">
        <?php include 'atelier1.php' ?>
    </div>
    <div id="connect" class="col s12">
        <?php include 'connectionBdd.php' ?>
    </div>
    <div id="update" class="col s12">
        <?php include 'updateProduct.php' ?>
    </div>
    <div id="del" class="col s12">
        <?php include 'delProduct.php' ?>
    </div>
    <div id="add" class="col s12">
        <?php include 'addproduct.php' ?>
    </div>
</div>
<?php
include '../footer.php'
?>