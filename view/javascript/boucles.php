<?php
include '../header.php';
?>
<div class="row">
    <div class="col s12">
        <ul class="tabs summary">
            <li class="tab col s1 boucle"><a class="active" href="#saisie">Saisie</a></li>
            <li class="tab col s1 boucle"><a href="#integer">Entier inférieur à N</a></li>
            <li class="tab col s1 boucle"><a href="#sum">Somme d'intervalle</a></li>
            <li class="tab col s1 boucle"><a href="#average">Moyenne</a></li>
            <li class="tab col s1 boucle"><a href="#multiple">Multiplication</a></li>
            <li class="tab col s1 boucle"><a href="#voyelle">Voyelles</a></li>
            <li class="tab col s1 boucle"><a href="#primary">Nombre premier</a></li>
            <li class="tab col s1 boucle"><a href="#magic">Nombre magique</a></li>
        </ul>
    </div>
    <div id="saisie" class="col s12">
        <?php
        include 'saisie.php';
        ?>
    </div>
    <div id="integer" class="col s12">
        <?php
        include 'integer.php'
        ?>
    </div>
    <div id="sum" class="col s12">
        <?php
        include 'sum.php'
        ?>
    </div>
    <div id="average" class="col s12">
        <?php
        include 'average.php'
        ?>
    </div>
    <div id="multiple" class="col s12">
        <?php
        include 'multiple.php';
        ?>
    </div>
    <div id="voyelle" class="col s12">
        <?php
        include 'voyelle.php'
        ?>
    </div>
    <div id="primary" class="col s12">
        <?php
        include 'primary.php'
        ?>
    </div>
    <div id="magic" class="col s12">
        <?php
        include 'magic.php'
        ?>
    </div>
</div>

<?php
include '../footer.php';
?>