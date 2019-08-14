<?php
include '../header.php';
?>
<div class="row">
    <div class="col s12">
        <ul class="tabs summary">
            <li class="tab col s3"><a class="active" href="#picutre">Afficher une image et du texte</a></li>
            <li class="tab col s3"><a href="#letter">Compter le nombre de lettre</a></li>
            <li class="tab col s3"><a href="#menu">Menu</a></li>
            <li class="tab col s3"><a href="#stringtoken">String Token</a></li>
        </ul>
    </div>
    <div id="picutre" class="col s12">
        <?php include 'picture.php' ?>
    </div>
    <div id="letter" class="col s12">
        <?php include 'letter.php' ?>
    </div>
    <div id="menu" class="col s12">
        <?php include 'menu.php' ?>
    </div>
    <div id="stringtoken" class="col s12">
        <?php include 'stringtoken.php' ?>
    </div>
</div>
<?php
include '../footer.php';
?>