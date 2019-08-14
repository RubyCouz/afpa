<?php
include '../header.php'
?>
<div class="row">
    <div class="col s12">
        <ul class="tabs summary">
            <li class="tab col s3 offset-s3"><a class="active" href="#link">Afficher une liste de liens </a></li>
            <li class="tab col s3"><a href="#upload">Upload</a></li>
        </ul>
    </div>
    <div id="link" class="col s12">
        <?php include 'link.php' ?>
    </div>
    <div id="upload" class="col s12">
        <?php include 'upload.php' ?>
    </div>
</div>
<?php
include '../footer.php'
?>