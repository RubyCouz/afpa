<?php
include '../header.php';
$startNumber = 0;
?>
<div class="container">

    <div class="row">
        <div class="col s12 m6">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Liste des nombres impairs de 0 à 150</span>
                    <p>
                        <?php
                        for ($startNumber = 0; $startNumber < 150; $startNumber++)
                        {
                            if ($startNumber % 2 !== 0)
                            {
                                echo $startNumber . ', ';
                            }
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>



<?php
include '../footer.php';
?>