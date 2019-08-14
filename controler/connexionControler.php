<?php

//try {
//    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=cedric', 'cedric', 'couz02072014');
//} catch (Exception $e) {
//    echo 'erreur : ' . $e->getMessage() . '<br>';
//    echo 'N° : ' . $e->getCode();
//    die('fin du script');
//}
try {
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=jarditou', 'root', '');
} catch (Exception $e) {
    echo 'erreur : ' . $e->getMessage() . '<br>';
    echo 'N° : ' . $e->getCode();
    die('fin du script');
}

/**
 * contrôle du formulaire
 */
// tableau d'erreur de inscription/connexion
$connexionError = array();
//regex
$state = false;
$namePattern = '/^[\w]+$/';
$passwordPattern = '/^[a-zA-Z0-9]+$/';
$mailPattern = '/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/';

if (isset($_POST['loginVerify']))
{
    $login = $_POST['loginVerify'];
    $state = false;
    $query = 'SELECT COUNT(`id_user`) AS `count` FROM `user` WHERE `login_user` = :login';
    $result = $db->prepare($query);
    $result->bindValue(':login', $login, PDO::PARAM_STR);
    $result->execute();

    $selectResult = $result->fetch(PDO::FETCH_OBJ);
    $state = $selectResult->count;
    echo $state;
}
if (isset($_POST['submit']))
{
    /**
     * champs nom
     */
    if (!empty($_POST['lastname']))
    {
        if (preg_match($namePattern, $_POST['lastname']))
        {
            $lastname = htmlspecialchars($_POST['lastname']);
        }
        else
        {
            $connexionError['lastname'] = 'Mauvaise saisie du nom de famille!';
        }
    }
    else
    {
        $connexionError['lastname'] = 'Veuillez renseigner un nom de famille!';
    }
    /**
     * champs prenom
     */
    if (!empty($_POST['firstname']))
    {
        if (preg_match($namePattern, $_POST['firstname']))
        {
            $firstname = htmlspecialchars($_POST['firstname']);
        }
        else
        {
            $connexionError['firstname'] = 'Mauvaise saisie du prénom!';
        }
    }
    else
    {
        $connexionError['password'] = 'Veuillez renseigner un prénom!';
    }
    /**
     * champs mot de passe
     */
    if (!empty($_POST['password']))
    {
        if (preg_match($passwordPattern, $_POST['password']))
        {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        else
        {
            $connexionError['password'] = 'Mauvaise saisie du mot de passe!';
        }
    }
    else
    {
        $connexionError['password'] = 'Veuillez renseigner un mot de passe!';
    }
    /**
     * champ mail
     */
    if (!empty($_POST['mail']))
    {
        if (preg_match($mailPattern, $_POST['mail']))
        {
            $mail = htmlspecialchars($_POST['mail']);
        }
        else
        {
            $connexionError['mail'] = 'Mauvaise saisie de l\'adresse mail!';
        }
    }
    else
    {
        $connexionError['mail'] = 'Veuillez renseigner une adresse mail!';
    }
    /**
     * champs login (pseudo)
     */
    if (!empty($_POST['login']))
    {
        if (preg_match($namePattern, $_POST['login']))
        {
            $login = htmlspecialchars($_POST['login']);
        }
        else
        {
            $connexionError['login'] = 'Mauvaise saisie du login!';
        }
    }
    else
    {
        $connexionError['login'] = 'Veuillez renseigner login!';
    }
    // s'il n'y pas d'erreur de saisie
    if (count($connexionError) == 0)
    {
        $query = 'INSERT INTO `user` (`lastname_user`, `firstname_user`, `password_user`, `mail_user`, `login_user`, `inscript_user`) VALUE (:lastname, :firstname, :password, :mail, :login, NOW())';
        $result = $db->prepare($query);
        $result->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $result->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $result->bindValue(':password', $password, PDO::PARAM_STR);
        $result->bindValue(':mail', $mail, PDO::PARAM_STR);
        $result->bindValue(':login', $login, PDO::PARAM_STR);
        if ($result->execute())// si la requète s'exécute
        {
           /**
            * Envoie de mail
            */
            // définition de l'adresse du destinataire
            $destinataire = $mail;
            // définition de l'aobjet du mail
            $objet = 'Confirmation d\'inscription';
            // définition et formatage du message envoyé
            $message = 'Félicitation ' . $lastname . ' ' . $firstname . '! Votre inscription a bien été prise en compte!'
                    . 'Vos identifiants : '
                    . 'Login : ' . $login
                    . 'Mot de passe : ' . $password;
            // définition des informations contenues dans le header du mail
            $header = array(
                'From' => 'contact@jarditou.com',
                'Reply-to' => $mail,
                'X-Mailer' => 'PHP/' . phpversion()
            );
            // envoie du mail
            mail($destinataire, $objet, $message, $header);
        }
        else
        {
            $connexionError['signin'] = 'Erreur lors de l\'inscription';
        }
    }
    // définition des variables de sessions si la case est coché
    if (isset($_POST['keepLog']))
    {
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['login'] = $login;
        $_SESSION['mail'] = $mail;
        $_SESSION['password'] = $password;
    }
}
/**
 * connexion
 */
if (isset($_POST['signIn']))
{
    // on vide les sessions pour les besoins de l'exercice lors du clic su rle bouton connecter.
    session_unset();
    // champs login
    if (!empty($_POST['login']))
    {
        if (preg_match($namePattern, $_POST['login']))
        {
            $login = htmlspecialchars($_POST['login']);
        }
        else
        {
            $connexionError['login'] = 'Veuillez renseigner un login valide!';
        }
    }
    else
    {
        $connexionError['login'] = 'Veuillez renseigner votre login!';
    }
    //champs mot de passe
    if (!empty($_POST['password']))
    {
        if (preg_match($namePattern, $_POST['password']))
        {
            $password = htmlspecialchars($_POST['password']);
        }
        else
        {
            $connexionError['password'] = 'Veuillez renseigner un mot de passe valide!';
        }
    }
    else
    {
        $connexionError['password'] = 'Veuillez renseigner votre mot de passe!';
    }
    // s'il n'y pas d'erreur
    if (count($connexionError) == 0)
    {
        $state = false;
        $query = 'SELECT * FROM `user`'
                . 'WHERE `login_user` = :login';
        $result = $db->prepare($query);
        $result->bindValue(':login', $login, PDO::PARAM_STR);
        // si la requète s'exécute
        if ($result->execute())
        {
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            // si on a bien un objet
            if (is_object($selectResult))
            {
                // vérification du mot de passe
                if (password_verify($password, $selectResult->password_user))
                {
                    // definission des variable de session selon le choix de l'utilisateur
                    if (isset($_POST['keepLog']))
                    {
                        $_SESSION['login'] = $login;
                        $_SESSION['password'] = $password;
                    }
                    $state = true;
                }
                else
                {
                    // message d'erreur en cas d'erreur de mot de passe
                    $connexionError['password'] = 'Mot de passe éronné!!';
                }
            }
            else
            {
                // message d'erreur en cas d'erreur de pseudo
                $connexionError['error'] = 'Login erroné!';
            }
        }
        else
        {
            // message en cas mauvaise connexion à la BDD
            $connexionError['Error'] = 'Problème de connexion à la base de données';
        }
        return $state;
    }
}

    