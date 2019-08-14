<?php
include '../header.php';
?>
<div class="row">
    <div class="col s12">
        <ul class="tabs summary">
            <li class="tab col s3"><a class="active" href="#test1">Pair ou impairs</a></li>
            <li class="tab col s3"><a href="#test2">Age</a></li>
            <li class="tab col s3"><a href="#test3">Calculatrice</a></li>
            <li class="tab col s3"><a href="#test4">Participation</a></li>
        </ul>
    </div>
    <div id="test1" class="col s12">
        <?php
        include 'pair.php';
        ?>
    </div>
    <div id="test2" class="col s12">
        <?php
        include 'age.php'
        ?>
    </div>
    <div id="test3" class="col s12">
        <?php
        include 'calcul.php'
        ?>
    </div>
    <div id="test4" class="col s12">
        <?php
        include 'participation.php'
        ?>
    </div>
</div>

<?php
include '../footer.php';
?>