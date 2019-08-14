<?php
include '../header.php';
?>
<div class="container">
    <h1>L'inscription et la connexion</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Introduction</div>
            <div class="collapsible-body">
                <p>
                    Le mot de passe est important pour la sécurisation de la connexion de l'utilisateur à son compte. Nous verrons donc ici comment récupérer les données de l'utilisateur, les sécuriser et les comparer avec celle déja présente dans la base de données.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le visuel</div>
            <div class="collapsible-body">
                <p>
                    Nous allons commencer par étudier ce dont nous avons besoin : afin de voir un cas global, nous allons construire une page d'inscription. Nous trouverons dessus :
                </p>
                <ul>
                    <li>Un formulaire d'inscription (permettra l'ajout de données utilisateurs dans la base de données)</li>
                    <li>Un bouton de validation du formulaire</li>
                    <li>Un bouton de déclenchement de fenêtre modal</li>
                    <li>Une modal avec un formulation de connexion (login + mot de passe)</li>
                </ul>
                <p>
                    Voici donc le code html de cette page :
                </p>
                <pre>
    <code class="html">
                        <?= htmlspecialchars(' 
         <div class="row">
            <!-- formulaire d\'inscription -->
            <form class="col s12" action="#" method="POST">
                <div class="row">        
                    <div class="input-field col s6">
                        <input id="lastname" type="text" class="validate" name="lastname" value="<?= isset($_POST[\'lastname\']) ? $_POST[\'lastname\'] : \'\' ?>">
                        <label for="lastname">Nom</label>
                        <span class="error"><?= isset($connexionError[\'lastname\']) ? $connexionError[\'lastname\'] : \'\' ?></span>
                    </div>
                    <div class="input-field col s6">
                        <input id="firstname" type="text" class="validate" name="firstname" value="<?= isset($_POST[\'firstname\']) ? $_POST[\'firstname\'] : \'\' ?>">
                        <label for="firstname">Prénom</label>
                        <span class="error"><?= isset($connexionError[\'firstname\']) ? $connexionError[\'firstname\'] : \'\' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="login" type="text" class="validate" name="login" value="<?= isset($_POST[\'login\']) ? $_POST[\'login\'] : \'\' ?>">
                        <label for="login">Login</label>
                        <span class="error"><?= isset($connexionError[\'login\']) ? $connexionError[\'login\'] : \'\' ?></span>
                        <span id="loginError"></span>
                    </div>
                    <div class="input-field col s6">
                        <input id="password" type="password" class="validate" name="password" value="<?= isset($_POST[\'password\']) ? $_POST[\'password\'] : \'\' ?>">
                        <label for="password">Mot de passe</label>
                        <span class="error"><?= isset($connexionError[\'password\']) ? $connexionError[\'password\'] : \'\' ?></span>
                    </div>
                </div>   
                <div class="row">
                    <div class="input-field col s12">
                        <input id="mail" type="email" class="validate" name="mail" value="<?= isset($_POST[\'mail\']) ? $_POST[\'mail\'] : \'\' ?>">
                        <label for="email">Email</label>
                        <span class="error"><?= isset($connexionError[\'mail\']) ? $connexionError[\'mail\'] : \'\' ?></span>
                    </div>
                </div>
                 <div class="row">
                    <div class="col s2">
                        <label>
                            <input type="checkbox" name="keepLog" id="keepLog">
                            <span>Rester connecter</span>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 center-align">
                        <input type="submit" name="submit" id="submit" class="waves-effect waves-light btn">
                    </div>
                    <div class="col s6 center-align">
                        <!-- Boutton déclenchenr de la modal -->
                        <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Connexion</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- Modal  de connexion -->
        <div id="modal1" class="modal bottom-sheet">
            <div class="modal-content">
                <h4>Connexion</h4>
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col s2">
                            <label>
                                <input type="checkbox" name="keepLog" id="keepLog">
                                <span>Rester connecter</span>
                            </label>
                        </div>
                        <div class="input-field col s5">
                            <input id="login" type="text" class="validate" name="login" value="<?= isset($_POST[\'login\']) ? $_POST[\'login\'] : \'\' ?>">
                            <label for="login">Login</label>
                            <span class="error"><?= isset($connexionError[\'login\']) ? $connexionError[\'login\'] : \'\' ?></span>

                        </div>
                        <div class="input-field col s5">
                            <input id="password" type="password" class="validate" name="password" value="<?= isset($_POST[\'password\']) ? $_POST[\'password\'] : \'\' ?>">
                            <label for="password">Mot de passe</label>
                            <span class="error"><?= isset($connexionError[\'password\']) ? $connexionError[\'password\'] : \'\' ?></span>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col s6 center-align">
                            <a href="#!" class="modal-close waves-effect waves-ligth btn cancel">Annuler</a>
                        </div>
                        <div class="col s6 center-align">
                            <input type="submit" name="signIn" id="submit" class="waves-effect waves-light btn" value="Se connecter">
                        </div>
                    </div>

                </form>              
            </div>
        </div>
      
 ');
                        ?>
    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">L'inscription et la vérification du formulaire</div>
            <div class="collapsible-body">
                <p>
                    La vérification de formulaire à l'aide de PHP ici ne change pas, on ne va donc pas s'attarder dessus, nous allons voir la vérification du champs du mot de passe. Les étapes sont les mêmes, le traitement sera légèrement différent :
                </p>
                <ul>
                    <li>On vérifie la présence de la valeur du champs</li>
                    <li>On vérifie que ce qui est saisie correpond à nos attentes en fonction de la regex</li>
                    <li>On assigne la valeur du champs à une variable</li>
                </ul>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
 /**
 * champs mot de passe
 */
if (!empty($_POST[\'password\'])) {
    if (preg_match($passwordPattern, $_POST[\'password\'])) {
        $password = password_hash($_POST[\'password\'], PASSWORD_DEFAULT);
    } else {
        $connexionError[\'password\'] = \'Mauvaise saisie du mot de passe!\';
    }
} else {
    $connexionError[\'password\'] = \'Veuillez renseigner un mot de passe!\';
}') ?>
    </code>
                </pre>
                <p>
                    Sur ce dernier point, nous utiliserons la fonction <a href="https://www.php.net/manual/fr/function.password-hash.php" title="Lien vers définition php.net" target="_blank" class="uk-link-muted-"><code>password_hash()</code></a>. Cette fonction va permettre de créer un "hash" du mot de passe renseigné par l'utilisateur. Le mot de passe sera alors hashé (crypté) et donc plus sécurisé. L'avantage de cette fonction est qu'elle propose un hashage fort, et évolue en fonction des normes de sécurités ajoutées a PHP.
                </p>
                <p>
                    Une fois hashé, le mot de passe peut être envoyé dans la base de données. <b>ON NE STOCKE JAMAIS DE MOT DE PASSE EN CLAIR DANS LA BASE DE DONNEES</b>.
                </p>
                En partant du principe que la connexion se fera avec la vérificaiton du login (pseudo) et du mot de passe, le login se doit d'être unique. Pour cela, nous devons vérifier sa présence dans la base de données, et informer l'utilisateur de la validité de son pseudonyme. Pour que l'inscription soit plus agréable, et donc éviter le rechargement de la page, nous utiliserons la méthode <a href="https://api.jquery.com/jquery.ajax/#jQuery-ajax-url-settings" class="uk-link-muted-" title="Lien vers la documentation jquery ajax" target="_blank">Ajax</a>. Elle va nous permettre d'intéragir avec le contrôleur et la base de données en temps réel : il ne sera pas nécéssaire de recharger la page pour informer l'utilisateur de la bonne saisie de son mot de passe.
                </p>
                <p>
                    Afin de rester sur la même page, nous articulerons l'affichage de notre page autour d'une condition : si la valeur du <code>$_POST['submit']</code> est présente et qu'il n'y a pas d'erreur, alors nous afficheront iun message de confirmation, sinon nous affichons le formulaire d'inscription.
                </p>
                <p>
                    Avec le script de vérification du formulaire et l'insertion en base de données, nous obtenons alors :
                </p>
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s2 offset-s3"><a class="active" href="#connexionHTML">HTML</a></li>
                            <li class="tab col s2"><a href="#connexionPHP">PHP</a></li>
                            <li class="tab col s2"><a href="#connexionJS">JS</a></li>
                        </ul>
                    </div>
                    <div id="connexionHTML" class="col s12">
                        <pre>
    <code class="html">
                                <?= htmlspecialchars('<?php
<?php
session_start();
include \'../header.php\';
include \'../../controler/connexionControler.php\';
?>
<div class="container">
    <?php
    if (isset($_POST[\'signIn\']) && count($connexionError) == 0)
    {
        ?>
        <p class="exo">
            Bon retour parmis nous <?= isset($_SESSION[\'login\']) ? $_SESSION[\'login\'] : $_POST[\'login\'] ?>
        </p>
        <?php
    }
    else if (isset($_POST[\'submit\']) && count($connexionError) == 0)
    {
        ?>
        <p class="exo">
            L\'inscription a bien été prise en compte <?= isset($_SESSION[\'login\']) ? \', bienvenue \' . $_SESSION[\'login\'] : \'\' ?>.
        </p>
        <a href="connexionDemo.php" class="waves-effect waves-light btn" title="Retour vers la connexion">Retour vers la connexion</a>
        <?php
        var_dump(mail($destinataire, $objet, $message, $header));
    }
    else
    {
        ?> 

        <div class="row">
            <!-- formulaire d\'inscription -->
            <form class="col s12" action="#" method="POST">
                <div class="row">        
                    <div class="input-field col s6">
                        <input id="lastname" type="text" class="validate" name="lastname" value="<?= isset($_POST[\'lastname\']) ? $_POST[\'lastname\'] : \'\' ?>">
                        <label for="lastname">Nom</label>
                        <span class="error"><?= isset($connexionError[\'lastname\']) ? $connexionError[\'lastname\'] : \'\' ?></span>
                    </div>
                    <div class="input-field col s6">
                        <input id="firstname" type="text" class="validate" name="firstname" value="<?= isset($_POST[\'firstname\']) ? $_POST[\'firstname\'] : \'\' ?>">
                        <label for="firstname">Prénom</label>
                        <span class="error"><?= isset($connexionError[\'firstname\']) ? $connexionError[\'firstname\'] : \'\' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="login" type="text" class="validate" name="login" value="<?= isset($_POST[\'login\']) ? $_POST[\'login\'] : \'\' ?>">
                        <label for="login">Login</label>
                        <span class="error"><?= isset($connexionError[\'login\']) ? $connexionError[\'login\'] : \'\' ?></span>
                        <span id="loginError"></span>
                    </div>
                    <div class="input-field col s6">
                        <input id="password" type="password" class="validate" name="password" value="<?= isset($_POST[\'password\']) ? $_POST[\'password\'] : \'\' ?>">
                        <label for="password">Mot de passe</label>
                        <span class="error"><?= isset($connexionError[\'password\']) ? $connexionError[\'password\'] : \'\' ?></span>
                    </div>
                </div>   
                <div class="row">
                    <div class="input-field col s12">
                        <input id="mail" type="email" class="validate" name="mail" value="<?= isset($_POST[\'mail\']) ? $_POST[\'mail\'] : \'\' ?>">
                        <label for="email">Email</label>
                        <span class="error"><?= isset($connexionError[\'mail\']) ? $connexionError[\'mail\'] : \'\' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col s2">
                        <label>
                            <input type="checkbox" name="keepLog" id="keepLog">
                            <span>Rester connecter</span>
                        </label>
                    </div>
                </div> 
                <div class="row">
                    <div class="col s6 center-align">
                        <input type="submit" name="submit" id="submit" class="waves-effect waves-light btn">
                    </div>
                    <div class="col s6 center-align">
                        <!-- Boutton déclenchenr de la modal -->
                        <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Connexion</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- Modal  de connexion -->
        <div id="modal1" class="modal bottom-sheet">
            <div class="modal-content">
                <h4>Connexion</h4>
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col s2">
                            <label>
                                <input type="checkbox" name="keepLog" id="keepLog">
                                <span>Rester connecter</span>
                            </label>
                        </div>
                        <div class="input-field col s5">
                            <input id="login" type="text" class="validate" name="login" value="<?= isset($_POST[\'login\']) ? $_POST[\'login\'] : \'\' ?>">
                            <label for="login">Login</label>
                            <span class="error"><?= isset($connexionError[\'login\']) ? $connexionError[\'login\'] : \'\' ?></span>

                        </div>
                        <div class="input-field col s5">
                            <input id="password" type="password" class="validate" name="password" value="<?= isset($_POST[\'password\']) ? $_POST[\'password\'] : \'\' ?>">
                            <label for="password">Mot de passe</label>
                            <span class="error"><?= isset($connexionError[\'password\']) ? $connexionError[\'password\'] : \'\' ?></span>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col s6 center-align">
                            <a href="#!" class="modal-close waves-effect waves-ligth btn cancel">Annuler</a>
                        </div>
                        <div class="col s6 center-align">
                            <input type="submit" name="signIn" id="submit" class="waves-effect waves-light btn" value="Se connecter">
                        </div>
                    </div>

                </form>              
            </div>
        </div>
        <?php
    }
    ?>

</div>

<?php
include \'../footer.php\';
?>') ?>
    </code>
                        </pre>  
                    </div>
                    <div id="connexionPHP" class="col s12">
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('
<?php

try {
    $db = new PDO(\'mysql:host=localhost;charset=utf8;dbname=jarditou\', \'root\', \'\');
} catch (Exception $e) {
    echo \'erreur : \' . $e->getMessage() . \'<br>\';
    echo \'N° : \' . $e->getCode();
    die(\'fin du script\');
}

/**
 * contrôle du formulaire
 */
// tableau d\'erreur de inscription/connexion
$connexionError = array();
//regex
$namePattern = \'/^[\w]+$/\';
$passwordPattern = \'/^[a-zA-Z0-9]+$/\';
$mailPattern = \'/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/\';


if (isset($_POST[\'submit\'])) {
    /**
     * champs nom
     */
    if (!empty($_POST[\'lastname\'])) {
        if (preg_match($namePattern, $_POST[\'lastname\'])) {
            $lastname = htmlspecialchars($_POST[\'lastname\']);
        } else {
            $connexionError[\'lastname\'] = \'Mauvaise saisie du nom de famille!\';
        }
    } else {
        $connexionError[\'lastname\'] = \'Veuillez renseigner un nom de famille!\';
    }
    /**
     * champs prenom
     */
    if (!empty($_POST[\'firstname\'])) {
        if (preg_match($namePattern, $_POST[\'firstname\'])) {
            $firstname = htmlspecialchars($_POST[\'firstname\']);
        } else {
            $connexionError[\'firstname\'] = \'Mauvaise saisie du prénom!\';
        }
    } else {
        $connexionError[\'password\'] = \'Veuillez renseigner un prénom!\';
    }
    /**
     * champs mot de passe
     */
    if (!empty($_POST[\'password\'])) {
        if (preg_match($passwordPattern, $_POST[\'password\'])) {
            $password = password_hash($_POST[\'password\'], PASSWORD_DEFAULT);
        } else {
            $connexionError[\'password\'] = \'Mauvaise saisie du mot de passe!\';
        }
    } else {
        $connexionError[\'password\'] = \'Veuillez renseigner un mot de passe!\';
    }
    /**
     * champ mail
     */
    if (!empty($_POST[\'mail\'])) {
        if (preg_match($mailPattern, $_POST[\'mail\'])) {
            $mail = htmlspecialchars($_POST[\'mail\']);
        } else {
            $connexionError[\'mail\'] = \'Mauvaise saisie de l\\\'adresse mail!\';
        }
    } else {
        $connexionError[\'mail\'] = \'Veuillez renseigner une adresse mail!\';
    }
    /**
     * champs login (pseudo)
     */
    if (!empty($_POST[\'login\'])) {
        if (preg_match($namePattern, $_POST[\'login\'])) {
            $login = htmlspecialchars($_POST[\'login\']);
        } else {
            $connexionError[\'login\'] = \'Mauvaise saisie du login!\';
        }
    } else {
        $connexionError[\'login\'] = \'Veuillez renseigner login!\';
    }
    // s\'il n\'y pas d\'erreur de saisie
    if (count($connexionError) == 0) {
        $query = \'INSERT INTO `user` (`lastname_user`, `firstname_user`, `password_user`, `mail_user`, `login_user`, `inscript_user`) VALUE (:lastname, :firstname, :password, :mail, :login, NOW())\';
        $result = $db->prepare($query);
        $result->bindValue(\':lastname\', $lastname, PDO::PARAM_STR);
        $result->bindValue(\':firstname\', $firstname, PDO::PARAM_STR);
        $result->bindValue(\':password\', $password, PDO::PARAM_STR);
        $result->bindValue(\':mail\', $mail, PDO::PARAM_STR);
        $result->bindValue(\':login\', $login, PDO::PARAM_STR);
        $result->execute();
    }
    // définition des variables de sessions si la case est coché
    if (isset($_POST[\'keepLog\'])) {
        $_SESSION[\'firstname\'] = $firstname;
        $_SESSION[\'lastname\'] = $lastname;
        $_SESSION[\'login\'] = $login;
        $_SESSION[\'mail\'] = $mail;
        $_SESSION[\'password\'] = $password;
    }
}

    ');
                                ?>
    </code>
                        </pre>
                    </div>
                    <div id="connexionJS" class="col s12">
                        <pre>
    <code class="js">
                                <?= htmlspecialchars('
     /**
     * Ajax vérification de l\'existence d\'un login
     */
    $(\'#login\').blur(function () {
        $.post(\'../../controler/connexionControler.php\', {loginVerify: $(this).val()}, function (data) {
            if (data == 1) {
                $(\'#loginError\').html(\'Pseudo déja existant\');
                $(\'#loginError\').addClass(\'error\');
            } else {
                $(\'#loginError\').html(\'\');
            }
        },
                \'HTML\');
    });\'') ?>
    </code>
                        </pre>
                    </div>
                </div>
                <a href="connexionDemo.php" class="waves-effect waves-light btn" title="Lien vers la démo de connexion" target="_blank"><i class="material-icons right">play_arrow</i>RUN CODE</a>
                <p>
                    Explications : 
                </p>
                <ul>
                    <li>
                        Lors de la perte de focus(<code>.blur</code>= du champs <code>#login</code>, nous envoyons la valeur saisie dans le contrôleur en utilisant la méthode <code>POST</code>, en la nommant <code>loginVerify</code> :
                        <pre>
    <code class="js">
                                <?= htmlspecialchars(' 
    $.post(\'../../controler/connexionControler.php\', {loginVerify: $(this).val()},') ?>
    </code>
                        </pre>
                    </li>
                    <li>
                        Une fois cette valeur envoyé dans le contrôleur, nous comptons le nombre de fois que le pseudo peut se trouver dans la table `user`
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('
if (isset($_POST[\'loginVerify\']))
{
    $login = $_POST[\'loginVerify\'];
    $state = false;
    $query = \'SELECT COUNT(`id_user`) AS `count` FROM `user` WHERE `login_user` = :login\';
    $result = $db->prepare($query);
    $result->bindValue(\':login\', $login, PDO::PARAM_STR);
    $result->execute();

    $selectResult = $result->fetch(PDO::FETCH_OBJ);
    $state = $selectResult->count;
    echo $state;
}') ?>
    </code>
                        </pre>
                    </li>
                    <li>
                        Le resultat est renvoyé à l'aide de <code>echo $state</code>. la réponse renvoyée par la reqète correspond au <code>data</code> de la fonction Ajax. 
                    </li>
                    <li>
                        Si <code>data == 1</code>, alors le pseudo existe dans la base de donnée. Si l'utilisateur change de pseudo, la nouvelle valeur est envoyé dans le contrôleur, on effectue une nouvelle vérification et si cette fois le pseudo n'est pas présent, alors nous pouvons masquer le message d'erreur.
                        <pre>
    <code class="js">
                                <?= htmlspecialchars('
        function (data) {
            if (data == 1) {
                $(\'#loginError\').html(\'Pseudo déja existant\');
                $(\'#loginError\').addClass(\'error\');
            } else {
                $(\'#loginError\').html(\'\');
            }'); ?>
    </code>
                        </pre>
                    </li>
                    <li>Le <code>'HTML'</code> à la fin de la fonction correspond au format de données qui sont transmises du script vers la vue</li>
                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header">La connexion</div>
            <div class="collapsible-body">
                <p>
                    Pour que l'utilisateur puisse se connecter, nous vérifierons donc que le pseudo entré dans le formulaire est bien présent dans la base de données, et nous comparerons le mot de passe présent dans la base et le mot de passe saisie par l'utilisateur lors de sa connection.
                </p>
                <p>Pour vérifier la présence du pseudo nous utiliserons la requète suivante :</p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
        $query = \'SELECT * FROM `user`\'
        . \'WHERE `login_user` = :login\';
        $result = $db->prepare($query);
        $result->bindValue(\':login\', $login, PDO::PARAM_STR);
        $result->execute()') ?>
    </code>
                </pre>
                <p>
                    Pour vérifier si le mot de passe est correct, nous utiliserons la méthode PHP <a href="https://www.php.net/manual/fr/function.password-verify.php" title="Lien vers documentation php.net" target="_blank">password_verify</a>. Cette méthode permettra de comparer le mot de passe hashé présent dans la base de données avec celui saisie lors de la tentative de connexion. 
                </p>
                <p>Nous obtenons alors :</p>
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s2 offset-s3"><a class="active" href="#connexionHTML2">HTML</a></li>
                            <li class="tab col s2"><a href="#connexionPHP2">PHP</a></li>
                            <li class="tab col s2"><a href="#connexionJS3">JS</a></li>
                        </ul>
                    </div>
                    <div id="connexionHTML2" class="col s12">
                        <pre>
    <code class="html">
                                <?= htmlspecialchars('
<?php
session_start();
include \'../header.php\';
include \'../../controler/connexionControler.php\';
?>
<div class="container">
    <?php
    if (isset($_POST[\'signIn\']) && count($connexionError) == 0)
    {
        ?>
        <p class="exo">
            Bon retour parmis nous <?= isset($_SESSION[\'login\']) ? $_SESSION[\'login\'] : $_POST[\'login\'] ?>
        </p>
        <?php
    }
    else if (isset($_POST[\'submit\']) && count($connexionError) == 0)
    {
        ?>
        <p class="exo">
            L\'inscription a bien été prise en compte <?= isset($_SESSION[\'login\']) ? \', bienvenue \' . $_SESSION[\'login\'] : \'\' ?>.
        </p>
        <a href="connexionDemo.php" class="waves-effect waves-light btn" title="Retour vers la connexion">Retour vers la connexion</a>
        <?php
    }
    else
    {
        ?> 

        <div class="row">
            <!-- formulaire d\'inscription -->
            <form class="col s12" action="#" method="POST">
                <div class="row">        
                    <div class="input-field col s6">
                        <input id="lastname" type="text" class="validate" name="lastname" value="<?= isset($_POST[\'lastname\']) ? $_POST[\'lastname\'] : \'\' ?>">
                        <label for="lastname">Nom</label>
                        <span class="error"><?= isset($connexionError[\'lastname\']) ? $connexionError[\'lastname\'] : \'\' ?></span>
                    </div>
                    <div class="input-field col s6">
                        <input id="firstname" type="text" class="validate" name="firstname" value="<?= isset($_POST[\'firstname\']) ? $_POST[\'firstname\'] : \'\' ?>">
                        <label for="firstname">Prénom</label>
                        <span class="error"><?= isset($connexionError[\'firstname\']) ? $connexionError[\'firstname\'] : \'\' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="login" type="text" class="validate" name="login" value="<?= isset($_POST[\'login\']) ? $_POST[\'login\'] : \'\' ?>">
                        <label for="login">Login</label>
                        <span class="error"><?= isset($connexionError[\'login\']) ? $connexionError[\'login\'] : \'\' ?></span>
                        <span id="loginError"></span>
                    </div>
                    <div class="input-field col s6">
                        <input id="password" type="password" class="validate" name="password" value="<?= isset($_POST[\'password\']) ? $_POST[\'password\'] : \'\' ?>">
                        <label for="password">Mot de passe</label>
                        <span class="error"><?= isset($connexionError[\'password\']) ? $connexionError[\'password\'] : \'\' ?></span>
                    </div>
                </div>   
                <div class="row">
                    <div class="input-field col s12">
                        <input id="mail" type="email" class="validate" name="mail" value="<?= isset($_POST[\'mail\']) ? $_POST[\'mail\'] : \'\' ?>">
                        <label for="email">Email</label>
                        <span class="error"><?= isset($connexionError[\'mail\']) ? $connexionError[\'mail\'] : \'\' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col s2">
                        <label>
                            <input type="checkbox" name="keepLog" id="keepLog">
                            <span>Rester connecter</span>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 center-align">
                        <input type="submit" name="submit" id="submit" class="waves-effect waves-light btn">
                    </div>
                    <div class="col s6 center-align">
                        <!-- Boutton déclenchenr de la modal -->
                        <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Connexion</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- Modal  de connexion -->
        <div id="modal1" class="modal bottom-sheet">
            <div class="modal-content">
                <h4>Connexion</h4>
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col s2">
                            <label>
                                <input type="checkbox" name="keepLog" id="keepLog">
                                <span>Rester connecter</span>
                            </label>
                        </div>
                        <div class="input-field col s5">
                            <input id="login" type="text" class="validate" name="login" value="<?= isset($_POST[\'login\']) ? $_POST[\'login\'] : \'\' ?>">
                            <label for="login">Login</label>
                            <span class="error"><?= isset($connexionError[\'login\']) ? $connexionError[\'login\'] : \'\' ?></span>

                        </div>
                        <div class="input-field col s5">
                            <input id="password" type="password" class="validate" name="password" value="<?= isset($_POST[\'password\']) ? $_POST[\'password\'] : \'\' ?>">
                            <label for="password">Mot de passe</label>
                            <span class="error"><?= isset($connexionError[\'password\']) ? $connexionError[\'password\'] : \'\' ?></span>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col s6 center-align">
                            <a href="#!" class="modal-close waves-effect waves-ligth btn cancel">Annuler</a>
                        </div>
                        <div class="col s6 center-align">
                            <input type="submit" name="signIn" id="submit" class="waves-effect waves-light btn" value="Se connecter">
                        </div>
                    </div>

                </form>              
            </div>
        </div>
        <?php
    }
    ?>

</div>

<?php
include \'../footer.php\';
?>') ?>
    </code>
                        </pre>
                    </div>
                    <div id="connexionPHP2" class="col s12">
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('
<?php

try {
    $db = new PDO(\'mysql:host=localhost;charset=utf8;dbname=jarditou\', \'root\', \'\');
} catch (Exception $e) {
    echo \'erreur : \' . $e->getMessage() . \'<br>\';
    echo \'N° : \' . $e->getCode();
    die(\'fin du script\');
}

/**
 * contrôle du formulaire
 */
// tableau d\'erreur de inscription/connexion
$connexionError = array();
//regex
$namePattern = \'/^[\w]+$/\';
$passwordPattern = \'/^[a-zA-Z0-9]+$/\';
$mailPattern = \'/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/\';

if (isset($_POST[\'loginVerify\']))
{
    $login = $_POST[\'loginVerify\'];
    $state = false;
    $query = \'SELECT COUNT(`id_user`) AS `count` FROM `user` WHERE `login_user` = :login\';
    $result = $db->prepare($query);
    $result->bindValue(\':login\', $login, PDO::PARAM_STR);
    $result->execute();

    $selectResult = $result->fetch(PDO::FETCH_OBJ);
    $state = $selectResult->count;
    echo $state;
}
if (isset($_POST[\'submit\']))
{
    /**
     * champs nom
     */
    if (!empty($_POST[\'lastname\']))
    {
        if (preg_match($namePattern, $_POST[\'lastname\']))
        {
            $lastname = htmlspecialchars($_POST[\'lastname\']);
        }
        else
        {
            $connexionError[\'lastname\'] = \'Mauvaise saisie du nom de famille!\';
        }
    }
    else
    {
        $connexionError[\'lastname\'] = \'Veuillez renseigner un nom de famille!\';
    }
    /**
     * champs prenom
     */
    if (!empty($_POST[\'firstname\']))
    {
        if (preg_match($namePattern, $_POST[\'firstname\']))
        {
            $firstname = htmlspecialchars($_POST[\'firstname\']);
        }
        else
        {
            $connexionError[\'firstname\'] = \'Mauvaise saisie du prénom!\';
        }
    }
    else
    {
        $connexionError[\'password\'] = \'Veuillez renseigner un prénom!\';
    }
    /**
     * champs mot de passe
     */
    if (!empty($_POST[\'password\']))
    {
        if (preg_match($passwordPattern, $_POST[\'password\']))
        {
            $password = password_hash($_POST[\'password\'], PASSWORD_DEFAULT);
        }
        else
        {
            $connexionError[\'password\'] = \'Mauvaise saisie du mot de passe!\';
        }
    }
    else
    {
        $connexionError[\'password\'] = \'Veuillez renseigner un mot de passe!\';
    }
    /**
     * champ mail
     */
    if (!empty($_POST[\'mail\']))
    {
        if (preg_match($mailPattern, $_POST[\'mail\']))
        {
            $mail = htmlspecialchars($_POST[\'mail\']);
        }
        else
        {
            $connexionError[\'mail\'] = \'Mauvaise saisie de l\_\'adresse mail!\';
        }
    }
    else
    {
        $connexionError[\'mail\'] = \'Veuillez renseigner une adresse mail!\';
    }
    /**
     * champs login (pseudo)
     */
    if (!empty($_POST[\'login\']))
    {
        if (preg_match($namePattern, $_POST[\'login\']))
        {
            $login = htmlspecialchars($_POST[\'login\']);
        }
        else
        {
            $connexionError[\'login\'] = \'Mauvaise saisie du login!\';
        }
    }
    else
    {
        $connexionError[\'login\'] = \'Veuillez renseigner login!\';
    }
    // s\'il n\'y pas d\'erreur de saisie
    if (count($connexionError) == 0)
    {
        $query = \'INSERT INTO `user` (`lastname_user`, `firstname_user`, `password_user`, `mail_user`, `login_user`, `inscript_user`) VALUE (:lastname, :firstname, :password, :mail, :login, NOW())\';
        $result = $db->prepare($query);
        $result->bindValue(\':lastname\', $lastname, PDO::PARAM_STR);
        $result->bindValue(\':firstname\', $firstname, PDO::PARAM_STR);
        $result->bindValue(\':password\', $password, PDO::PARAM_STR);
        $result->bindValue(\':mail\', $mail, PDO::PARAM_STR);
        $result->bindValue(\':login\', $login, PDO::PARAM_STR);
        $result->execute();
    }
    // définition des variables de sessions si la case est coché
    if (isset($_POST[\'keepLog\']))
    {
        $_SESSION[\'firstname\'] = $firstname;
        $_SESSION[\'lastname\'] = $lastname;
        $_SESSION[\'login\'] = $login;
        $_SESSION[\'mail\'] = $mail;
        $_SESSION[\'password\'] = $password;
    }
}
/**
 * connexion
 */
if (isset($_POST[\'signIn\']))
{
    // on vide les sessions pour les besoins de l\'exercice lors du clic su rle bouton connecter.
    session_unset();
    // champs login
    if (!empty($_POST[\'login\']))
    {
        if (preg_match($namePattern, $_POST[\'login\']))
        {
            $login = htmlspecialchars($_POST[\'login\']);
        }
        else
        {
            $connexionError[\'login\'] = \'Veuillez renseigner un login valide!\';
        }
    }
    else
    {
        $connexionError[\'login\'] = \'Veuillez renseigner votre login!\';
    }
    //champs mot de passe
    if (!empty($_POST[\'password\']))
    {
        if (preg_match($namePattern, $_POST[\'password\']))
        {
            $password = htmlspecialchars($_POST[\'password\']);
        }
        else
        {
            $connexionError[\'password\'] = \'Veuillez renseigner un mot de passe valide!\';
        }
    }
    else
    {
        $connexionError[\'password\'] = \'Veuillez renseigner votre mot de passe!\';
    }
    // s\'il n\'y pas d\'erreur
    if (count($connexionError) == 0)
    {
        $state = false;
        $query = \'SELECT * FROM `user`\'
                . \'WHERE `login_user` = :login\';
        $result = $db->prepare($query);
        $result->bindValue(\':login\', $login, PDO::PARAM_STR);
        // si la requète s\'exécute
        if ($result->execute())
        {
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            // si on a bien un objet
            if (is_object($selectResult))
            {
                // vérification du mot de passe
                if (password_verify($password, $selectResult->password_user))
                {
                    // definission des variable de session selon le choix de l\'utilisateur
                    if (isset($_POST[\'keepLog\']))
                    {
                        $_SESSION[\'login\'] = $login;
                        $_SESSION[\'password\'] = $password;
                    }
                    $state = true;
                }
                else
                {
                    // message d\'erreur en cas d\'erreur de mot de passe
                    $connexionError[\'password\'] = \'Mot de passe éronné!!\';
                }
            }
            else
            {
                // message d\'erreur en cas d\'erreur de pseudo
                $connexionError[\'error\'] = \'Login erroné!\';
            }
        }
        else
        {
            // message en cas mauvaise connexion à la BDD
            $connexionError[\'Error\'] = \'Problème de connexion à la base de données\';
        }
        return $state;
    }
}

    ') ?>
    </code>
                        </pre>
                    </div>
                    <div id="connexionJS3" class="col s12">
                        <pre>
    <code class="js">
                                <?= htmlspecialchars(' /**
     * Ajax vérification de l\'existence d\'un login
     */
    $(\'#login\').blur(function () {
        $.post(\'../../controler/connexionControler.php\', {loginVerify: $(this).val()}, function (data) {
            if (data == 1) {
                $(\'#loginError\').html(\'Pseudo déja existant\');
                $(\'#loginError\').addClass(\'error\');
            } else {
                $(\'#loginError\').html(\'\');
            }
        },
                \'HTML\');
    });') ?>
    </code>
                        </pre>
                    </div>
                </div>
                <a href="connexionDemo.php" class="waves-effect waves-light btn" title="Lien vers la démo de connexion" target="_blank"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>