<?php
include '../header.php';
$serverIp = $_SERVER['SERVER_ADDR'];
$clientIp = $_SERVER['REMOTE_ADDR'];
?>
<div class="container">
    <div class="row">
        <div class="col s12 m6">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Adresse du serveur et du client</span>
                    <p>L'adresse du serveur est <?= $serverIp ?></p>
                    <p>L'adresse du client est <?= $clientIp ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../footer.php';
?>