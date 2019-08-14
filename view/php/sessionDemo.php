<?php
// déclaration de session
session_start();
include '../header.php';
include '../../controler/sessionDemoControler.php';
var_dump($_SESSION);
var_dump($_POST);
?>

<div class="container">
    <?php
    // si une vraiable de session est définie
    if (isset($_SESSION['login']) && (count($loginError) == 0))
    {
        ?>
        <p>
            Bienvenue <?= $_SESSION['login'] ?>. Votre connexion est un succès!
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
include '../footer.php';
?>