<html lang="fr">

    <head>
        <meta charset="utf-8" />
        <title>Jarditou</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <link rel="stylesheet" href="assets/css/style.css" />
    </head>

    <body>
        <div class="container-fluid">
            <header>
                <img src="assets/img/jarditou_logo.jpg" alt="logo Jarditou" title="logo jarditou" class="logo"/>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="jardiboot.php">Accueil <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="table.php">Tableau</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php" tabindex="-1">Formulaire</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="row">
                    <div class="col-sm-12">
                        <img src="assets/img/promotion.jpg" title="Promotion" alt="photo de promotion" class="img" />
                    </div>
                </div>
            </header>
            <div class="container">
                <form action="#" method="POST">
                    <fieldset>
                        <legend>Vos Coordonnées</legend>
                        <div class="form-group row">
                            <label for="lastname" class="col-sm-2 col-form-label">Votre Nom :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Nom de famille" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-2 col-form-label">Votre prénom :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Prénom" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="birthdate" class="col-sm-2 col-form-label">Votre date de naissance :</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Date de naissance" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Votre adresse :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Adresse" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-sm-2 col-form-label">Votre ville :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="city" name="city" placeholder="Ville" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="postalCode" class="col-sm-2 col-form-label">Votre code postal :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="Code postal" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mail" class="col-sm-2 col-form-label">Votre e-maill :</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="mail" name="mail" placeholder="name@example.com" />
                            </div>
                        </div>                           
                    </fieldset>
                    <fieldset>
                        <label for="gender">Vous êtes :</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="man" name="gender" class="custom-control-input" value="homme" />
                            <label class="custom-control-label" for="man">un homme</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="woman" name="gender" class="custom-control-input" value="femme" />
                            <label class="custom-control-label" for="woman">une femme</label>
                        </div>
                    </fieldset>


                    <div class="form-group">
                        <label for="job"></label>
                        <select class="form-control" id="job" name="job">
                            <option value="" selected disabled>Choisissez la formation suivi</option>
                            <option value="1">Développeur web, web mobile</option>
                            <option value="2">Concepteur développeur d'application</option>
                            <option value="3">Autre ...</option>
                        </select>
                    </div>                    
                    <div class="form-group row">
                        <label for="other" class="col-sm-2 col-form-label">Si vous avez répondu autre, précisez :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="other" name="other" placeholder="Précisez" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="money"></label>
                        <select class="form-control" id="money" name="money">
                            <option value="" selected disabled>Subvention mensuelle</option>
                            <option value="1">&lt300</option>
                            <option value="2">&lt750</option>
                            <option value="3">&lt1000</option>
                        </select>
                    </div>                    
                    <div class="form-group row">
                        <label for="year" class="col-sm-2 col-form-label">En quelle année avez-vous suivi les stage AFPA?</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="year" name="year" placeholder="xx/xx/xxxx" />
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="comments">Vos commentaires :</label>
                        <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-2 offset-4">
                            <input type="submit" value="Envoyer" id="submit" class="btn btn-primary" />
                        </div>
                        <div class="col-2 offset-1">
                            <input type="reset" name="reset" value="Effacer" class="btn btn-danger" />
                        </div>
                    </div>
                </form>
            </div>

            <hr />

            <footer class="footer bg-dark">
                <ul>
                    <li class="li1"><a href="mentions.html">mentions légales</a></li>
                    <li class="li1"><a href="horaires">horaires</a></li>
                    <li class="li1"><a href="plan">plan du site</a></li>
                </ul>
            </footer>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
    </body>

</html>