<?php
include '../header.php';
?>
<div class="container">
    <h1>Envoie d'e-mail</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Préparation</div>
            <div class="collapsible-body">
                <p>
                    Pour programmer l'envoie d'un mail sous Windows, nous devrons au préalable installer un serveur mail sur Wampserver. Puis nous devrons le configurer.
                </p>
                <p>
                    Ici nous utiliserons "mailhog", ce qui nous permettra de simuler l'envoir d'un mail. Si le mail apparait dans "mailhog", alors l'envoie est réussi.
                </p>
                <p>
                    Nous devrons donc commencer par télécharger "mailhog" <a href="https://github.com/mailhog/MailHog/releases/download/v0.2.1/MailHog_windows_386.exe" class="uk-link-muted" title="Lien vers le téléchargement de mailhog" target="_blank">ici</a>.
                </p>
                <p>
                    Une fois le logiciel télécharger, nous le renommerons "mailhog.exe" et le déplaçons dans "C:/wamp64/mailhog" (créez le dossier si besoin). Ensuite nous devrons configurer le fichier "php.ini" (situé dans les menu de wampserver, en cliquant gauche sur l'icone de wamp, puis sur php). Dans la section <code>[mail function]</code>, nous entrerons les lignes suivantes :
                </p>
                <ul>
                    <li><code>SMTP = 127.0.0.1</code></li>
                    <li><code>smtp_port = 1025</code></li>
                    <li><code>sendmail_path = "C:/wamp/mailhog/mailhog.exe sendmail"</code></li>
                    <li><code>mail.log = "C:/wamp/logs/mails.log"</code></li>
                </ul>
                <p>
                    Nous pouvons maintenant commencer à coder notre envoie de mail!
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Cas d'un formulaire de contact</div>
            <div class="collapsible-body">
                <p>
                    Le premier cas à gérer est le cas d'un formulaire de contact. Voici notre formulaire :
                </p>
                <pre>
    <code class="html">
                        <?= htmlspecialchars('
<?php
include \'header.php\';
include \'mailController.php\';
?>

<div class="uk-container">
    <form action="#" method="POST">
        <form class="uk-form-horizontal uk-margin-large">
            <legend>Envoie d\'un mail</legend>
            <div class="uk-margin">
                <label class="uk-form-label" for="for">Destinataire :</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="for" type="text" name="for" placeholder="Destinataire" value="" <?= isset($_POST[\'for\']) ? $_POST[\'for\'] : \'\' ?> />
                </div>
            </div>
            <span><?= isset($mailError[\'for\']) ? $mailError[\'for\'] : \'\' ?></span>
            <div class="uk-margin">
                <label class="uk-form-label" for="from">De :</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="from" type="text" name="from" placeholder="De" value="" <?= isset($_POST[\'from\']) ? $_POST[\'from\'] : \'\' ?> />
                </div>
            </div>
            <span><?= isset($mailError[\'from\']) ? $mailError[\'from\'] : \'\' ?></span>
            <div class="uk-margin">
                <label class="uk-form-label" for="object">Objet :</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="object" type="text" name="object" placeholder="Objet" value="" <?= isset($_POST[\'object\']) ? $_POST[\'object\'] : \'\' ?> />
                </div>
            </div>
            <span><?= isset($mailError[\'object\']) ? $mailError[\'object\'] : \'\' ?></span>
            <div class="uk-margin">
                <label class="uk-form-label" for="content">Message :</label>
                <div class="uk-form-controls">
                    <textarea class="uk-textarea" rows="5" id="content" name="content" placeholder="Textarea"><?= isset($_POST[\'content\']) ? $_POST[\'content\'] : \'\' ?></textarea>
                </div>
            </div>
            <span><?= isset($mailError[\'content\']) ? $mailError[\'content\'] : \'\' ?></span>
            <div class="uk-margin">
                <input type="submit" name="send" id="send" class="waves-effect waves-light btn" />
            </div>
        </form>
    </form>
</div>



<?php
include \'footer.php\';
?>') ?>
    </code>
                </pre>
                <p>
                    Comme toute vérification de formulaire, nous allons analyser les données avant de les traiter :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
<?php
// déclaration d\'un tableau d\'erreur
$mailError = [];
// déclaration des regexs
$mailPattern = \'/^[a-zA-Z\d äâêîôûëïöüéèàù%!:;,?.@\"\\\'&\(\)]+$/\';
// vérification si click sur le bouton d\'envoie
if (isset($_POST[\'send\'])) {
    /**
     * vérification du champ destinataire
     */
    if(!empty($_POST[\'from\'])) {
        if(preg_match($mailPattern, $_POST[\'from\'])) {
            $from = $_POST[\'from\'];
        } else {
            $mailError[\'from\'] = \'Caractère non valide dans le champs "de"!\'; 
        }
    } else {
        $mailError[\'from\'] = \'Champs non rempli!\';
    }
    /**
     * vérifiaction du champs provenance
     */
    if(!empty($_POST[\'for\'])) {
        if(preg_match($mailPattern, $_POST[\'for\'])) {
            $for = $_POST[\'for\'];
        } else {
            $mailError[\'for\'] = \'Caractère non valide dans le champs "destinataire"!\'; 
        }
    } else {
        $mailError[\'for\'] = \'Champs non rempli!\';
    }
    /**
     * Vérificaiton du champs objet
     */
    if(!empty($_POST[\'object\'])) {
        if(preg_match($mailPattern, $_POST[\'object\'])) {
            $object = $_POST[\'object\'];
        } else {
            $mailError[\'object\'] = \'Caractère non valide dans le champs "objet"!\'; 
        }
    } else {
        $mailError[\'from\'] = \'Champs non rempli!\';
    }
    /**
     * vérification du champs message
     */
    if(!empty($_POST[\'content\'])) {
        if(preg_match($mailPattern, $_POST[\'content\'])) {
            $content = $_POST[\'content\'];
        } else {
            $mailError[\'content\'] = \'Caractère non valide dans le champs "message"!\'; 
        }
    } else {
        $mailError[\'content\'] = \'Champs non rempli!\';
    }
    ') ?>
    </code>
                </pre>
                <p>
                    Une fois le formulaire contrôlé, nous pouvons procéder à l'envoie du mail. Pour cela, nous utiliserons la fonction <a href="https://www.php.net/manual/fr/function.mail.php" class="uk-link-muted" title="Lien vers la documentation php.net" target="_blank"><code>mail()</code></a>. Elle permet l'envoie d'un mail en y spécifiant en paramêtre l'adresse du destinataire, l'objet et le contenu du mail. L'entête est optionnelle.
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
//S\'il n\'y a pas d\'erreur
    if (count($mailError) == 0)
    {
        // définition de l\'entête du mail
        $header = array (
            \'From\' => $from,
            \'Reply-To\' => $for,
            \'X-Mailer\' => \'PHP/\' . phpversion()
        );
        // envoie du mail à l\'aide de la fonction php mail()
        mail($for, $object, $content, $header);
    }') ?>
    </code>
                </pre>
                <p>
                    Au final nous obtenons donc ceci :
                </p>
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3 offset-s3"><a class="active" href="#mailHTML">HTML</a></li>
                            <li class="tab col s3"><a href="#mailPHP">PHP</a></li>
                        </ul>
                    </div>
                    <div id="mailHTML" class="col s12">
                        <pre>
    <code class="html">
                                <?= htmlspecialchars('
<?php
include \'header.php\';
include \'mailController.php\';
?>

<div class="uk-container">
    <form action="#" method="POST">
        <form class="uk-form-horizontal uk-margin-large">
            <legend>Envoie d\'un mail</legend>
            <div class="uk-margin">
                <label class="uk-form-label" for="for">Destinataire :</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="for" type="text" name="for" placeholder="Destinataire" value="" <?= isset($_POST[\'for\']) ? $_POST[\'for\'] : \'\' ?> />
                </div>
            </div>
            <span><?= isset($mailError[\'for\']) ? $mailError[\'for\'] : \'\' ?></span>
            <div class="uk-margin">
                <label class="uk-form-label" for="from">De :</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="from" type="text" name="from" placeholder="De" value="" <?= isset($_POST[\'from\']) ? $_POST[\'from\'] : \'\' ?> />
                </div>
            </div>
            <span><?= isset($mailError[\'from\']) ? $mailError[\'from\'] : \'\' ?></span>
            <div class="uk-margin">
                <label class="uk-form-label" for="object">Objet :</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="object" type="text" name="object" placeholder="Objet" value="" <?= isset($_POST[\'object\']) ? $_POST[\'object\'] : \'\' ?> />
                </div>
            </div>
            <span><?= isset($mailError[\'object\']) ? $mailError[\'object\'] : \'\' ?></span>
            <div class="uk-margin">
                <label class="uk-form-label" for="content">Message :</label>
                <div class="uk-form-controls">
                    <textarea class="uk-textarea" rows="5" id="content" name="content" placeholder="Textarea"><?= isset($_POST[\'content\']) ? $_POST[\'content\'] : \'\' ?></textarea>
                </div>
            </div>
            <span><?= isset($mailError[\'content\']) ? $mailError[\'content\'] : \'\' ?></span>
            <div class="uk-margin">
                <input type="submit" name="send" id="send" class="waves-effect waves-light btn" />
            </div>
        </form>
    </form>
</div>



<?php
include \'footer.php\';
?>') ?>
    </code>
                        </pre>
                    </div>
                    <div id="mailPHP" class="col s12">
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('
<?php
// déclaration d\'un tableau d\'erreur
$mailError = [];
// déclaration des regexs
$mailPattern = \'/^[a-zA-Z\d äâêîôûëïöüéèàù%!:;,?.@\"\\\'&\(\)]+$/\';
// vérification si click sur le bouton d\'envoie
if (isset($_POST[\'send\'])) {
    /**
     * vérification du champ destinataire
     */
    if(!empty($_POST[\'from\'])) {
        if(preg_match($mailPattern, $_POST[\'from\'])) {
            $from = $_POST[\'from\'];
        } else {
            $mailError[\'from\'] = \'Caractère non valide dans le champs "de"!\'; 
        }
    } else {
        $mailError[\'from\'] = \'Champs non rempli!\';
    }
    /**
     * vérifiaction du champs provenance
     */
    if(!empty($_POST[\'for\'])) {
        if(preg_match($mailPattern, $_POST[\'for\'])) {
            $for = $_POST[\'for\'];
        } else {
            $mailError[\'for\'] = \'Caractère non valide dans le champs "destinataire"!\'; 
        }
    } else {
        $mailError[\'for\'] = \'Champs non rempli!\';
    }
    /**
     * Vérificaiton du champs objet
     */
    if(!empty($_POST[\'object\'])) {
        if(preg_match($mailPattern, $_POST[\'object\'])) {
            $object = $_POST[\'object\'];
        } else {
            $mailError[\'object\'] = \'Caractère non valide dans le champs "objet"!\'; 
        }
    } else {
        $mailError[\'from\'] = \'Champs non rempli!\';
    }
    /**
     * vérification du champs message
     */
    if(!empty($_POST[\'content\'])) {
        if(preg_match($mailPattern, $_POST[\'content\'])) {
            $content = $_POST[\'content\'];
        } else {
            $mailError[\'content\'] = \'Caractère non valide dans le champs "message"!\'; 
        }
    } else {
        $mailError[\'content\'] = \'Champs non rempli!\';
    }') ?>
    </code>
                        </pre>
                    </div>
                </div>
                <p>
                    Une fois notre code en place, nous devons lancer "mailhog" en double-cliquant sur l'icone du programme, puis se rendre à l'adresse : "http://localhost:8025". Enfin nous pouvons lancer notre programme et vérifier l'envoie sur http:/localhost:8025.
                </p> 
            </div>
        </li>
        <li>
            <div class="collapsible-header">Cas d'un envoie automatique</div>
            <div class="collapsible-body">
                <p>
                    Pour le cas d'un envoe automatique (exemple : confirmaiton d'inscription), la procédure sera semblable, à ceci près que nous devrons définir nos paramêtre pour l'envoie du message (objet, message). Pour l'exercice nous reprendrons l'exemple de l'inscription/connexion.
                </p>
                <p>
                    Le formulaire ne changera pas, nous ajouterons uniquement ce morceau de code à la suite de l'exécution de la requète :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars(' 
           $destinataire = $mail;
           $objet = \'Confirmation d\\\'inscription\';
           $message = \'Félicitation \' . $lastname . \' \' . $firstname . \'! Votre inscription a bien été prise en compte!\' 
                   . \'Vos identifiants : \'
                   . \'Login : \' . $login
                   . \'Mot de passe : \' . $password;
           $header = array(
               \'From\' => \'contact@jarditou.com\',
               \'Reply-to\' => $mail,
               \'X-Mailer\' => \'PHP/\' . phpversion()
           );
           mail($destinataire, $objet, $message, $header);
       }') ?>
    </code>
                </pre>
                <ul>
                    <li>La variable <code>$mail</code> reprend l'email de l'utilisateur</li>
                    <li><code>$objet</code> contiendra un objet défini à l'avance (ici une confirmation d'inscription)</li>
                    <li><code>$message</code> contiendra le message destiné à l'utilisateur une fois l'inscritpion validée</li>
                    <li>Nous retrouvons toujours notre tableau qui contient l'entête (<code>$header</code>), ainsi que la fonction <code>mail()</code> permettant l'envoie du mail de confirmation</li>
                </ul>
                <p>Code final :</p>
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3 offset-s3"><a href="#mailHTML2">HTML</a></li>
                            <li class="tab col s3"><a class="active" href="#MailPHP2">PHP</a></li>
                        </ul>
                    </div>
                    <div id="mailHTML2" class="col s12">
                        <pre>
    <code class="html">
                                <?= htmlspecialchars('
<?php
session_start();
include \'../header.php\';
include \'../../controler/connexionControler.php\';
?>
<div class="uk-container">
    <?php
    if (isset($_POST[\'signIn\']) && count($connexionError) == 0)
    {
        
        ?>
        <p>
            Bon retour parmis nous <?= isset($_SESSION[\'login\']) ? $_SESSION[\'login\'] : $_POST[\'login\'] ?>
        </p>
        <?php
    }
    else if (isset($_POST[\'submit\']) && count($connexionError) == 0)
    {
        ?>
        <p>
            L\'inscription a bien été prise en compte <?= isset($_SESSION[\'login\']) ? \', bienvenue \' . $_SESSION[\'login\'] : \'\' ?>.
        </p>
    <?php
}
else
{
    ?>
        <form action="#" method="POST">
            <fieldset class="uk-fieldset">

                <legend class="uk-legend">Inscription</legend>

                <div class="uk-margin">
                    <label for="lastname">Nom</label>
                    <input class="uk-input" id="lastname" type="text" placeholder="Nom" name="lastname" value="<?= isset($_POST[\'submit\']) ? $_POST[\'lastname\'] : \'\' ?>" />
                    <span class="error"><?= isset($connexionError[\'lastname\']) ? $connexionError[\'lastname\'] : \'\' ?></span>
                </div>
                <div class="uk-margin">
                    <label for="firstname">Prénom</label>
                    <input class="uk-input" type="text" id="firstname" placeholder="Prénom" name="firstname" value="<?= isset($_POST[\'submit\']) ? $_POST[\'firstname\'] : \'\' ?>" />
                    <span class="error"><?= isset($connexionError[\'firstname\']) ? $connexionError[\'firstname\'] : \'\' ?></span>
                </div>
                <div class="uk-margin">
                    <label for="email">Email</label>
                    <input class="uk-input" type="email" id="email" placeholder="Adresse mail" name="mail" value="<?= isset($_POST[\'submit\']) ? $_POST[\'mail\'] : \'\' ?>" />
                    <span class="error"><?= isset($connexionError[\'mail\']) ? $connexionError[\'mail\'] : \'\' ?></span>
                </div>
                <div class="uk-margin">
                    <label for="login">Pseudo</label>
                    <input class="uk-input" type="text" id="login" placeholder="Pseudo" name="login" value="<?= isset($_POST[\'submit\']) ? $_POST[\'login\'] : \'\' ?>" />
                    <span class="error"><?= isset($connexionError[\'login\']) ? $connexionError[\'login\'] : \'\' ?></span>
                    <span id="loginError"></span>
                </div>
                <div class="uk-margin">
                    <label for="password">Mot de passe</label>
                    <input class="uk-input" type="password" id="password" placeholder="Mot de passe" name="password" value="<?= isset($_POST[\'submit\']) ? $_POST[\'password\'] : \'\' ?>" />
                    <span class="error"><?= isset($connexionError[\'password\']) ? $connexionError[\'password\'] : \'\' ?></span>
                </div>
                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                    <label><input class="uk-checkbox" type="checkbox" name="keepLog" />Restez connecter!</label>
                </div>
                <div class="uk-margin">
                    <input class="waves-effect waves-light btn" type="submit" name="submit" value="S\'inscrire" />
                </div>

            </fieldset>
        </form>
        <a class="waves-effect waves-light btn" href="#modal-sections" uk-toggle>Se connecter</a>

        <div id="modal-sections" uk-modal>
            <div class="uk-modal-dialog">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="uk-modal-header">
                    <h2 class="uk-modal-title">Se connecter</h2>
                </div>
                <form action="#" method="POST">
                    <div class="uk-modal-body">
                        <div class="uk-margin">
                            <label for="login">Pseudo</label>
                            <input class="uk-input" type="text" id="login" placeholder="Pseudo" name="login" />
                        </div>
                        <div class="uk-margin">
                            <label for="password">Mot de passe</label>
                            <input class="uk-input" type="password" id="password" placeholder="Mot de passe" name="password" />
                        </div>
                        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                            <label><input class="uk-checkbox" type="checkbox" name="keepLog" />Restez connecter!</label>
                        </div>
                    </div>
                    <div class="uk-modal-footer uk-text-right">
                        <button class="uk-button uk-button-default uk-modal-close" type="button">Annuler</button>
                        <form action="#" method="POST">
                            <input class="waves-effect waves-light btn" type="submit" name="signIn" value="Se connecter" />
                        </form>
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
                    <div id="MailPHP2" class="col s12">
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
$state = false;
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
            $connexionError[\'mail\'] = \'Mauvaise saisie de l\\\'adresse mail!\';
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
       if($result->execute()) {
           $destinataire = $mail;
           $objet = \'Confirmation d\\\'inscription\';
           $message = \'Félicitation \' . $lastname . \' \' . $firstname . \'! Votre inscription a bien été prise en compte!\' 
                   . \'Vos identifiants : \'
                   . \'Login : \' . $login
                   . \'Mot de passe : \' . $password;
           $header = array(
               \'From\' => \'contact@jarditou.com\',
               \'Reply-to\' => $mail,
               \'X-Mailer\' => \'PHP/\' . phpversion()
           );
           mail($destinataire, $objet, $message, $header);
       }
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
                </div>
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>