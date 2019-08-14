<?php
include '../header.php';
?>
<div class="row">
    <div class="col s12">
        <ul class="tabs summary">
            <li class="tab col s3 offset-s3"><a class="active" href="#event1">Evènement sur un bouton</a></li>
            <li class="tab col s3"><a href="#magicEvent">Nombre magique avec évènement</a></li>
        </ul>
    </div>
    <div id="event1" class="col s12">
    <?php include 'event1.php'; ?>
    </div>
    <div id="magicEvent" class="col s12">
    <?php include 'magicEvent.php'; ?>
    </div>
</div>
<?php
include '../footer.php';
?>