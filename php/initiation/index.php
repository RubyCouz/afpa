<?php
$serverIp = $_SERVER['SERVER_ADDR'];
$clientIp = $_SERVER['REMOTE_ADDR'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHP phase 1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <p>L'adresse du serveur est <?= $serverIp ?></p>
    <p>L'adresse du client est <?= $clientIp ?></p>
</body>
</html>