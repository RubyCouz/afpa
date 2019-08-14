<?php
// déclaration du tableau d'erreur
$formError = array();
// déclaration des regexs
$textPattern = '/^[a-zA-Z\-\déèàçùëüïôäâêûîô#&]+$/';
$postalPattern = '/^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/';
$mailPattern = '/[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}/';
$phonePattern = '/^0[1-9]([-. ]?[0-9]{2}){4}$/';
$envPattern = '/^[a-zA-Z\-\d\, éèàçùëüïôäâêûîô#&]+$/';
// si la valeur du bouton envoyer est présente
if (isset($_POST['submit'])) {
    // si le champs compagny n'est pas vide
    if (!empty($_POST['compagny'])) {
        // si la donnée saisie passe la regex
        if (preg_match($textPattern, $_POST['compagny'])) {
            //on stocke la saisie dans une variable
            $compagny = $_POST['compagny'];
        } else {
            // remplissage du tableau d'erreur si la saisie est incorrect
            $formError['compagny'] = 'Saisie incorrect!!';
        }
    } else {
        // remplissage du tableau d'erreur si la saisie est manquante
        $formError['compagny'] = 'Veuillez renseigner le champs "Société"';
    }
//vérification du champ contact
    if (!empty($_POST['contact'])) {
        if (preg_match($textPattern, $_POST['contact'])) {
            $contact = $_POST['contact'];
        } else {
            $formError['contact'] = 'Saisie incorrect!!';
        }
    } else {
        $formError['contact'] = 'Veuillez renseigner le champs "Personne à contacter"';
    }
// vérification du champs adresse
    if (!empty($_POST['address'])) {
        if (preg_match($textPattern, $_POST['address'])) {
            $address = $_POST['address'];
        } else {
            $formError['address'] = 'Saisie incorrect!!';
        }
    } else {
        $formError['address'] = 'Veuillez renseigner le champs "Adresse"';
    }
    // vérification du champs code postale
    if (!empty($_POST['postalCode'])) {
        if (preg_match($postalPattern, $_POST['postalCode'])) {
            $postalCode = $_POST['postalCode'];
        } else {
            $formError['postalCode'] = 'Saisie incorrect!!';
        }
    } else {
        $formError['postalCode'] = 'Veuillez renseigner le champs "Code postal"';
    }
    // cérification du champs ville
    if (!empty($_POST['city'])) {
        if (preg_match($textPattern, $_POST['city'])) {
            $city = $_POST['city'];
        } else {
            $formError['city'] = 'Saisie incorrect!!';
        }
    } else {
        $formError['city'] = 'Veuillez renseigner le champs "Ville"';
    }
    // vérification du champs email
    if (!empty($_POST['mail'])) {
        if (preg_match($mailPattern, $_POST['mail'])) {
            $mail = $_POST['mail'];
        } else {
            $formError['mail'] = 'Saisie incorrect!!';
        }
    } else {
        $formError['mail'] = 'Veuillez renseigner le champs "Email"';
    }
    // vérification du champs environnement
    if (!empty($_POST['environment'])) {
        if (preg_match($textPattern, $_POST['environment'])) {
            $environment = $_POST['environment'];
        } else {
            $formError['environment'] = 'Saisie incorrect!!';
        }
    } else {
        $formError['environment'] = 'Veuillez renseigner le champs "environnement"';
    }
    // vérification du champs textenvironement
    if (!empty($_POST['textEnvironment'])) {
        if (preg_match($envPattern, $_POST['textEnvironment'])) {
            $textEnvironment = $_POST['textEnvironment'];
        } else {
            $formError['textEnvironment'] = 'Saisie incorrect!!';
        }
    } else {
        $formError['textEnvironment'] = 'Veuillez renseigner le champs "Environnement"';
    }
    // vérification du champs phone
    if (!empty($_POST['phone'])) {
        if (preg_match($phonePattern, $_POST['phone'])) {
            $phone = $_POST['phone'];
        } else {
            $formError['phone'] = 'Saisie incorrect!!';
        }
    } else {
        $formError['phone'] = 'Veuillez renseigner le champs société';
    }
}