<?php
include '../header.php';
$count = 0;
?>
<div class="container">
    <div class="row">
        <div class="col s12 m6">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Card Title</span>
                    <?php
                    for ($count = 1; $count <= 500; $count++)
                    {
                        ?>
                        <p>Ligne n°<?= $count ?> : Je dois faire des sauvegardes régulières de mes fichiers</p>
                        <?php
                    }
                    ?>                        
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../footer.php';
?>