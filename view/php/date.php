<?php
include '../header.php';
?>
<div class="row">
    <div class="col s12">
        <ul class="tabs summary">
            <li class="tab col s1 boucle"><a class="active" href="#currentDAte">Manipulation de la date courante</a></li>
            <li class="tab col s1 boucle"><a href="#weekNumber">Numéro de semaine</a></li>
            <li class="tab col s1 boucle"><a href="#dayRest">Nombre de jour restant</a></li>
            <li class="tab col s1 boucle"><a href="#dayrest2">Jours restant (2ème version)</a></li>
            <li class="tab col s1 boucle"><a href="#yearBi">Années bisextiles</a></li>
            <li class="tab col s1 boucle"><a href="#wrongDate">Dates erronées</a></li>
            <li class="tab col s1 boucle"><a href="#timeFormat">Formatage de l'heure</a></li>
            <li class="tab col s1 boucle"><a href="#addPeriod">Ajout de période</a></li>
        </ul>
    </div>
    <div id="currentDAte" class="col s12">
    <?php include 'date1.php'; ?>
    </div>
    <div id="weekNumber" class="col s12">
    <?php include 'date2.php'; ?>
    </div>
    <div id="dayRest" class="col s12">
    <?php include 'date3.php'; ?>
    </div>
    <div id="dayrest2" class="col s12">
    <?php include 'date4.php'; ?>
    </div>
    <div id="yearBi" class="col s12">
    <?php include 'date5.php'; ?>
    </div>
    <div id="wrongDate" class="col s12">
    <?php include 'date6.php'; ?>
    </div>
    <div id="timeFormat" class="col s12">
    <?php include 'date7.php'; ?>
    </div>
    <div id="addPeriod" class="col s12">
    <?php include 'date8.php'; ?>
    </div>
</div>
<?php
include '../footer.php';
?>