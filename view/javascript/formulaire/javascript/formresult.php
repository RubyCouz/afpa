
<?php
include 'formVerif.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Les formulaires</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.css">
</head>

<body>

    <header>

        <nav>
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo">Les formulaires</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">

                </ul>
                <ul class="side-nav" id="mobile-demo">

                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <h1>Données envoyées :</h1>
        <p>Société : <?= !isset($formError['compagny']) ? $compagny : $formError['compagny'] ?></p>
        <p>Personne à contacter : <?= !isset($formError['contact']) ? $contact : $formError['contact'] ?></p>
        <p>Adresse de l'entreprise : <?= !isset($formError['address']) ? $address : $formError['address'] ?></p>
        <p>Code postale : <?= !isset($formError['postalCode']) ? $postalCode : $formError['postalCode'] ?></p>
        <p>Ville : <?= !isset($formError['city']) ? $city : $formError['city'] ?></p>
        <p>Email : <?= !isset($formError['mail']) ? $mail : $formError['mail'] ?></p>
        <p>Téléphone : <?= !isset($formError['phone']) ? $phone : $formError['phone'] ?></p>
        <p>Evironnement : <?= !isset($formError['environment']) ? $environment : $formError['environment'] ?></p>
        <p>Texte environnement : <?= !isset($formError['textEnvironment']) ? $textEnvironment : $formError['textEnvironment'] ?></p>
    </div>


    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/materialize.min.js"></script>

</body>

</html>