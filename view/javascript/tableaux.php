<?php
include '../header.php'
?>
<div class="row">
    <div class="col s12">
        <ul class="tabs summary">
            <li class="tab col s4"><a class="active" href="#create">Création d'un tableau</a></li>
            <li class="tab col s4"><a href="#array">Parcours d'un tableau</a></li>
            <li class="tab col s4"><a href="#test3">Tri d'un tableau</a></li>
        </ul>
    </div>
    <div id="create" class="col s12">
        <?php include 'create.php' ?>
    </div>

    <div id="array" class="col s12">
        <?php include 'array.php' ?>
    </div>

    <div id="test3" class="col s12">
        <?php include 'sort.php' ?>
    </div>

</div>
<?php
include '../footer.php'
?>