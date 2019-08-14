<?php
include '../header.php';
?>
<div class="row">
    <div class="col s12">
      <ul class="tabs summary">
        <li class="tab col s3 offset-s2"><a class="active" href="#test1">Nombres impairs entre 0 et 150</a></li>
        <li class="tab col s3"><a href="#test2">500 X</a></li>
        <li class="tab col s3"><a href="#test3">Table de multiplication</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12">
    <?php include 'impair.php' ?>
    </div>
    <div id="test2" class="col s12">
    <?php include 'punishment.php' ?>
    </div>
    <div id="test3" class="col s12">
    <?php include 'multiplication.php' ?>
    </div>
  </div>
<?php
include '../footer.php';
?>