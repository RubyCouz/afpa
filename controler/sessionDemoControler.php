<?php

// declaration d'un tableau d'erreur
$loginError = array();
// déclaration des regexs
$loginPattern = '/^[a-zA-Z0-9]+$/';
$passwordPattern = '/^[a-zA-Z0-9]+$/';
if (isset($_POST['submit'])) {
    /**
     * Vérification du login
     */
    if (!empty($_POST['login'])) {
        if (preg_match($loginPattern, $_POST['login'])) {
            $login = $_POST['login'];
            $_SESSION['login'] = $login;
        } else {
            $loginError['login'] = 'Renseignez un login valide!';
        }
    } else {
        $loginError['login'] = 'Renseignez un login!';
    }
    /**
     * Vérification du mdp
     */
    if (!empty($_POST['password'])) {
        if (preg_match($passwordPattern, $_POST['password'])) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $_SESSION['password'] = $password;
        } else {
            $loginError['password'] = 'Renseignez un mot de passe valide!';
        }
    } else {
        $loginError['password'] = 'Renseignez un mot de passe!';
    }
    if (count($loginError) == 0) {
   
    }
}
if(isset($_POST['back'])) {
    session_unset();
}

