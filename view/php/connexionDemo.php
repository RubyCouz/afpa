<?php
session_start();
include '../header.php';
include '../../controler/connexionControler.php';
?>
<div class="container">
    <?php
    if (isset($_POST['signIn']) && count($connexionError) == 0)
    {
        ?>
        <p class="exo">
            Bon retour parmis nous <?= isset($_SESSION['login']) ? $_SESSION['login'] : $_POST['login'] ?>
        </p>
        <?php
    }
    else if (isset($_POST['submit']) && count($connexionError) == 0)
    {
        ?>
        <p class="exo">
            L'inscription a bien été prise en compte <?= isset($_SESSION['login']) ? ', bienvenue ' . $_SESSION['login'] : '' ?>.
        </p>
        <a href="connexionDemo.php" class="waves-effect waves-light btn" title="Retour vers la connexion">Retour vers la connexion</a>
        <?php
    }
    else
    {
        ?> 

        <div class="row">
            <!-- formulaire d'inscription -->
            <form class="col s12" action="#" method="POST">
                <div class="row">        
                    <div class="input-field col s6">
                        <input id="lastname" type="text" class="validate" name="lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>">
                        <label for="lastname">Nom</label>
                        <span class="error"><?= isset($connexionError['lastname']) ? $connexionError['lastname'] : '' ?></span>
                    </div>
                    <div class="input-field col s6">
                        <input id="firstname" type="text" class="validate" name="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>">
                        <label for="firstname">Prénom</label>
                        <span class="error"><?= isset($connexionError['firstname']) ? $connexionError['firstname'] : '' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="login" type="text" class="validate" name="login" value="<?= isset($_POST['login']) ? $_POST['login'] : '' ?>">
                        <label for="login">Login</label>
                        <span class="error"><?= isset($connexionError['login']) ? $connexionError['login'] : '' ?></span>
                        <span id="loginError"></span>
                    </div>
                    <div class="input-field col s6">
                        <input id="password" type="password" class="validate" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
                        <label for="password">Mot de passe</label>
                        <span class="error"><?= isset($connexionError['password']) ? $connexionError['password'] : '' ?></span>
                    </div>
                </div>   
                <div class="row">
                    <div class="input-field col s12">
                        <input id="mail" type="email" class="validate" name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>">
                        <label for="email">Email</label>
                        <span class="error"><?= isset($connexionError['mail']) ? $connexionError['mail'] : '' ?></span>
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
                            <input id="login" type="text" class="validate" name="login" value="<?= isset($_POST['login']) ? $_POST['login'] : '' ?>">
                            <label for="login">Login</label>
                            <span class="error"><?= isset($connexionError['login']) ? $connexionError['login'] : '' ?></span>

                        </div>
                        <div class="input-field col s5">
                            <input id="password" type="password" class="validate" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
                            <label for="password">Mot de passe</label>
                            <span class="error"><?= isset($connexionError['password']) ? $connexionError['password'] : '' ?></span>
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
include '../footer.php';
?>