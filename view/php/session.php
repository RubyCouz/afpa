<?php
include '../header.php';
?>
<div class="container">
    <h1>Les sessions</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Introduction</div>
            <div class="collapsible-body">
                <p>
                    Les sessions permettent de le transfère d'informations de page en page pendant un certain temps. Cela peut être utile pour garder la connexion d'un utilisateur sur le site.
                </p>
                <p>
                    Voyons en guise d'exemple la connexion d'un utilisateur via un formulaire qui demandera la saisie d'un identifiant et d'un mot de passe.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le formulaire</div>
            <div class="collapsible-body">
                <p>
                    Nous utiliserons un formulaire simple avec 2 inputs et un bouton d'envoie :
                </p>
                <pre>
    <code class="html">
                        <?= htmlspecialchars('
<form action="#" method="POST">
    <label for="login">Identifiant</label>
    <input id="login" name="login" type="text" placeholder="Identifiant" />
    <label for="password">Mot de passe</label>
    <input id="password" type="password" name="pasword" placeholder="Mot de passe" />/>
    <input type="submit" id="submit" name="submit" value="Se connecter" /> 
</form>
                ') ?>
    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Contrôle du formulaire</div>
            <div class="collapsible-body">
                <p>
                    Une fois le formualire construit, nous pouvons nous attaquer à sa vérification. Pas de changement par rapport à ce qui a été vu précédemment, on vérifie la présence de la valeur du bouton d'envoie, on vérifie que les champs ne sont pas vides, on vérifie que les données saisies correspondent bien à nos attentes. Si tout est bon, nou spouvons stocker les données saisies dans des variables afin de faciliter leur utilisation ultérieur :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
if (isset($_POST[\'submit\'])) {
   /**
    * Vérification du login
    */
    if (!empty($_POST[\'login\'])) {
        if (preg_match($loginPattern, $_POST[\'login\'])) {
            $login = $_POST[\'login\'];
        } else {
            $formError = \'Renseignez un login valide!\';
        }
    } else {
        $formError = \'Renseignez un login!\';
    }
    /**
     * Vérification du mdp
     */
    if (!empty($_POST[\'password\'])) {
        if (preg_match($passwordPattern, $_POST[\'password\'])) {
            $login = $_POST[\'password\'];
        } else {
            $formError = \'Renseignez un mot de passe valide!\';
        }
    } else {
        $formError = \'Renseignez un mot de passe!\';
    }
}') ?>
    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Définition des sessions</div>
            <div class="collapsible-body">
                <p>
                    Pour pouvoir utiliser les sessions, il suffit de les déclarer <b>au tout début du document</b>. C'est la première instruction à trouver sur le code :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
<?php
session_start();
?>') ?>
</code>
                </pre>
                <p>
                    <a href="https://www.php.net/manual/fr/function.session-start.php" title="Lien vers définition php.net" target="_blank" class="uk-link-muted"><code>session_start()</code></a> permet d'ouvrir ou de reprendre un session déjà existante.
                </p>
                <p>
                    A partir de là, nous pouvons commencer à définir nos variables de sessions. Pour cela nous utiliserons la variable superglobale <a href="https://www.php.net/manual/fr/reserved.variables.session.php" title="Lien vers définition php.net" target="_blank"><code>$_SESSION</code></a>.
                </p>
                <p>
                    Une fois que le formulaire est valide, nous pouvons définir nos variables de session et les remplir avec les données collectée :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
<?php
$_SESSION[\'login\'] = $login;
$_SESSION[\'password\'] = $password;
') ?>
    </code>
                </pre>
                <p>
                    Une fois qu'elles sont définies, les variables de session sont prêtes à être utilisées. On peut donc personnaliser l'affichage de connexion selon les identifiants de l'utilisateur, ou afficher un message d'erreur en cas de mauvaise connexion. Pour cela, nous pouvons soit organiser une condition sur la page de connexion permettant un affichage selon s'il y a connexion ou non, soit nous pouvons faire une redirection selon ce qu'il se passe avec <a href="https://www.php.net/manual/fr/function.header.php" title="Lien vers définition php.net" target="_blank"><code>header</code></a>.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat</div>
            <div class="collapsible-body">
                <p>
                    En utilisant une condition vérifiant la présence de variable de session (qui decidera donc de quoi afficher à l'utilisateur) et en insérant la déclaration des variables de session dans notre script PHP, nous obtenons alors :
                </p>

                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3 offset-s3"><a class="active" href="#sessionHTML">HTML</a></li>
                            <li class="tab col s3"><a href="#sessionPHP">PHP</a></li>
                        </ul>
                    </div>
                    <div id="sessionHTML" class="col s12">
                        <pre>
    <code class="html">
                                <?= htmlspecialchars('<?php
// déclaration de session
session_start();
include \'header.php\';
include \'../controler/sessionDemoControler.php\';
?>

<div class="uk-container">
    <?php
    // si une vraiable de session est définie
    if (isset($_SESSION[\'login\']) && (count($loginError) == 0)) {
        ?>
        <p>
            Bienvenue <?= $_SESSION[\'login\'] ?>. Votre connexion est un succès!
        </p>
        <form method="POST" action="#">
            <input type="submit" id="back" name="back" value="Retour à la connexion" class="waves-effect waves-light btn" /> 
        </form>
        <?php
        // sinon on affiche le formulaire de connexion
    } else {
        var_dump($_POST);
        ?>
        
        <div class = "uk-card uk-card-default uk-card-body uk-width-1-2@m">
            <form action = "#" method = "POST">
                <div class = "uk-margin">
                    <label for = "login">Identifiant</label>
                    <input id = "login" name = "login" type = "text" class = "uk-input" placeholder = "Identifiant" />
                </div>
                <div class = "uk-margin">
                    <label for = "password">Mot de passe</label>
                    <input id = "password" type = "password" name = "password" class = "uk-input" placeholder = "Mot de passe" />
                </div>
                <input type = "submit" id = "submit" name = "submit" class = "waves-effect waves-light btn" value = "Se connecter" />
            </form>
        </div>
        <?php
    }
    ?>

</div>

<?php
include \'footer.php\';
?>') ?>
    </code>
                        </pre>
                    </div>
                    <div id="sessionPHP" class="col s12">
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('<?php

<?php
// déclaration de session
session_start();
include \'../header.php\';
include \'../../controler/sessionDemoControler.php\';
var_dump($_SESSION);
var_dump($_POST);
?>

<div class="container">
    <?php
    // si une vraiable de session est définie
    if (isset($_SESSION[\'login\']) && (count($loginError) == 0))
    {
        ?>
        <p>
            Bienvenue <?= $_SESSION[\'login\'] ?>. Votre connexion est un succès!
        </p>
        <form method="POST" action="#">
            <input type="submit" id="back" name="back" value="Retour à la connexion" class="waves-effect waves-light btn" /> 
        </form>
        <?php
        // sinon on affiche le formulaire de connexion
    }
    else
    {
        ?>


        <div class="row">
            <form class="col s12" action="#" method="POST">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="login" type="text" class="validate"  name="login" placeholder="Identifiant">
                        <label for="login">Identifiant</label>
                    </div>                
                    <div class="input-field col s6">
                        <input id="password" type="password" class="validate" name="password" >
                        <label for="password">Mot de passe</label>
                    </div>
                </div>
                <input type="submit" id="submit" name="submit" class="waves-effect waves-light btn" value="Se connecter">
            </form>
        </div>

        <?php
    }
    ?>

</div>

<?php
include \'../footer.php\';
?>

') ?>
    </code>
                        </pre>
                    </div>
                </div>
                <a href="sessionDemo.php" title="Lien vers démo" target="_blank" class="waves-effect waves-light btn"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Bonus : "destruction" de la session</div>
            <div class="collapsible-body">
                <p>
                    Nous en profitons pour faire que la session puisse être réinitialisée au click sur un bouton. Nous avons fait un "mini" formulaire (contenant un unique bouton) sur la page de confirmation de connexion. Au click sur ce bouton, la page se recharge et on vérifie la présence de sa valeur. Si c'est le cas, nous utilisons alors la fonction <a href="https://www.php.net/manual/fr/function.session-unset.php" title="Lien vers définition php.net" target="_blank"><code>session_unset()</code></a> pour vider les variables de session et nous retournons sur le formulaire de connexion :
                </p>
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3 offset-s3"><a class="active" href="#sessionHTML2">HTML</a></li>
                            <li class="tab col s3"><a href="#sessionPHP2">PHP</a></li>
                        </ul>
                    </div>
                    <div id="sessionHTML2" class="col s12">
                        <pre>
    <code class="html">
                                <?= htmlspecialchars('
<form method="POST" action="#">
    <input type="submit" id="back" name="back" value="Retour à la connexion" class="waves-effect waves-light btn" /> 
</form>') ?>
    </code>
                        </pre>
                    </div>
                    <div id="sessionPHP2" class="col s12">
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('
if(isset($_POST[\'back\'])) {
  session_unset();
}') ?>
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