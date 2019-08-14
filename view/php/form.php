<?php
include '../header.php';
?>
<div class="container">
    <h1>La validation des formulaire en php</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Introduction</div>
            <div class="collapsible-body">
                <p>
                    Bien que vous ayez mis en place une vérification du formulaire en Javascript, il est impératif de faire une vérification en PHP. La vérification par Javascript est optionnelle, mais obligatoire en PHP. PHP est un langage serveur, il va donc intéragir avec votre base de données. Il est donc nécessaire de contrôler toutes les données que l'utilisateur va saisir et/ou les "modifier" pour qu'elles correspondent à vos attentes et éviter un maximum le piratage de votre base. Pour cela, PHP dispose de diverses fontions déjà établies permettant la sécurisation de votre formulaire, et des données saisies par l'utilisateur.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le formulaire</div>
            <div class="collapsible-body">
                <pre>
               <code class="html">
                        <?= htmlspecialchars('
<!DOCTYPE html>
<html>

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
  <section class="container">
    <div class="row">
      <form class="col s12" action="formVerif.php" method="POST">
        <div class="row">
          <div class="input-field col s6">
            <input id="compagny" type="text" class="validate" name="compagny" required>
            <label for="compagny">Société :</label>
            <span class="missCompagny" id="missCompagny"></span>
          </div>
          <div class="input-field col s6">
            <input id="contact" type="text" class="validate" name="contact" required>
            <label for="contact">Personne à contacter :</label>
            <span class="missContact" id="missContact"></span>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea id="address" type="text" class="materialize-textarea validate" name="address" required></textarea>
            <label for="address">Adresse de l\'entreprise :</label>
            <span class="missAddress" id="missAddress"></span>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="postalCode" type="text" class="validate" name="postalCode" required>
            <label for="postalCode">Code postal :</label>
            <span class="misspostalCode" id="missPostalCode"></span>
          </div>
          <div class="input-field col s6">
            <input id="city" type="text" class="validate" name="city" required>
            <label for="city">Ville :</label>
            <span class="missCity" id="missCity"></span>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="mail" type="email" class="validate" name="mail" required>
            <label for="mail">Email :</label>
            <span class="missMail" id="missMail"></span>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="phone" type="text" class="validate" name="phone" required>
            <label for="phone">Téléphone :</label>
            <span class="missPhone" id="missPhone"></span>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <select name="environment" id="environment" required>
              <option value="" disabled selected>Choississez</option>
              <option value="1">Access</option>
              <option value="2">Java</option>
              <option value="3">Delphi</option>
              <option value="4">Windev</option>
              <option value="5">Visual Basic</option>
              <option value="6">Power Builder</option>
              <option value="7">Internet</option>
              <option value="8">Intranet</option>
              <option value="9">Windows NT</option>
              <option value="10">Unix</option>
              <option value="11">SQL Server</option>
              <option value="12">Oracle</option>
              <option value="13">Autres...</option>
            </select>
            <label for="environment">Sélectionnez l\'environnement technique du projet :</label>
           
          </div>
          <div class="input-field col s6">
            <textarea id="textEnvironment" type="text" class="materialize-textarea validate" name="textEnvironment"></textarea>
            <span class="missTextEnvironment" id="missTextEnvironment"></span>
          </div>
        </div>
        <div class="row">
          <div class="col s6 center-align">
            <input type="submit" id="submit" name="submit" value="Envoyer" class="btn waves-effect waves-light green darken-2">
          </div>
          <div class="col s6 center-align">
            <input type="reset" name="reset" value="Effacer" class="btn waves-effect waves-dark red darken-4">
          </div>
        </div>
      </form>
    </div>

  </section>

  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/js/materialize.min.js"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>
') ?>
               </code>
                </pre>
                <p>
                    Si le formulaire est établit correctement depuis le debut, il n'y a pas de changement dessus (Materialize est utilisé ici, d'où le nom des classes). Nous avons juste spécifié un fichier php pour l'action du formulaire. C'est à dire que lorsque que l'utilisateur cliquera sur le bouton de validation, lui et les données saisies seront redirigés vers une autre page (celle spécifiée dans action). C'est sur cette page que les données seront analysées par le script PHP.
                </p>
                <p>
                    Nous choisissons ici la méthode <code>post</code> au vue de la quantité de données à traiter (et aussi pour la sécurité de ces données), mais il est tout à fait possible d'utiliser la méthode <code>get</code> aussi en PHP.
                </p>
                <p>
                    Notez que nous verrons ici l'importance de l'attribut <code>name</code>.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le traitement des données</div>
            <div class="collapsible-body">
                <p>
                    Après avoir créer le fichier qui contiendra notre script de vérification, nous pouvons commencer la vérification des champs de saisies. Pour cela il suffit de récupérer les valeurs saisies par l'utilisateur à l'aide des superglobales <code>$_POST['valeur_du_name']</code> (pour la méthode <code>post</code>),, <code>$_GET['valeur_du_name']</code> (pour la méthode <code>get</code>) ou <code>$_REQUEST['valeur_du_name']</code> (pour les deux méthodes). Le formulaire est envoyé avec la méthode <code>post</code>, nous utiliserons donc la superglobale <code>$_POST</code> pour effectuer le passage des données d'une page à une autre.
                </p>
                <p>
                    C'est donc ici que l'attribut <code>name</code> prend toute son importance. Il permet de cibler un <code>input</code> et de permettre ainsi la récupération de sa valeur.
                </p>
                <p>
                    Pour traiter un formulaire en PHP, il faut comme en Javascript vérifier si le champs est rempli, si les données sont valides et enfin sécurier les données envoyées afin d'éviter le piratage de votre base.
                </p>
                <p>
                    Pour faciliter le traitement des données saisies, elles seront stockées dans des variables <b>si elles sont valides</b>. Exemple :
                <pre>
          <code class="php">
                        <?= htmlspecialchars('
$compagny = $_POST[\'compagny\'];
') ?>
          </code>
                </pre>
                <p>
                    Nous définirons également un tableaux d'erreur, qui nous permettra de signaler une erreur personnalisée en fonction du type d'erreur à l'utilisateur :
                </p>
                <pre>
          <code class="php">
                        <?= htmlspecialchars('
$formError = array();
') ?>
          </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Vérifier la présence de données dans les champs de saisie</div>
            <div class="collapsible-body">
                <p>
                    L'explication se portera sur un unique champs (le champs "société"), sachant que si la validation est correcte pour un champs, elle est identique pour les autres, en changeant bien sûr les <code>name</code>, <code>id</code> et les modalités de contrôle (regex).
                </p>
                <p>
                    Nous commencerons d'abord par faire de sorte que notre script PHP ne se déclenchera qu'à l'envoie du formulaire (au click sur le bouton "envoyer") à l'aide d'une condition.
                </p>
                <p>
                    Pour cela nous utiliserons la fonction <a href="https://www.php.net/manual/fr/function.isset.php" title="Lien vers définition MDN" target="_blank"><code>isset()</code></a> de PHP. cette fonction permet de tester la présence d'une valeur dans une variable. Elle renvoie TRUE si une valeur est présente, FALSE si aucune valeur n'est présente.
                </p>
                <pre>
                  <code class="php">
                        <?= htmlspecialchars('
if(isset($_POST[\'submit\'])) {
//instruction si le formulaire est envoyé
} else  {
//instruction si le formulaire n\est pas envoyé (pas de click sur le bouton d\'envoie)
}
') ?>
                  </code>
                </pre>
                <p>
                    Explication : Le type <code>submit</code> du bouton permet la redirection vers la page où seront traitées les données. En arrivant sur la page de traitement, on vérifie que la valeur du <code>submit</code> est présente, si c'est le cas, nous pouvons commencer l'analyse des données transmises.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Récupérer les données saisies par l'utilisateur</div>
            <div class="collapsible-body">
                <p>
                    Si <code>$_POST['submit']</code> renvoie TRUE, nous pouvons vérifier à présent si le champs concerné n'est pas vide. Pour cela nous utiliserons la fonction <a href="https://www.php.net/manual/fr/function.empty.php" title="Lien vers définition MDN" target="_blank"><code>empty()</code></a>.
                </p>
                <pre>
                <code class="php">
                        <?= htmlspecialchars('
if(isset($_POST[\'submit\'])) {
  if(!empty([\'compagny\'])) {
//instruction si le champs n\'est pas vide 
  } else {
    //instruction si le champs est vide
  }
} else  {
//instruction si le formulaire n\est pas envoyé (pas de click sur le bouton d\'envoie)
}
') ?>
                </code>
                </pre>
                <p>
                    Pour cela nous utiliserons la fonction <a href="https://www.php.net/manual/fr/function.isset.php" title="Lien vers définition MDN" target="_blank"><code>isset()</code></a> de PHP. cette fonction permet de tester la présence d'une valeur dans une variable. Elle renvoie TRUE si une valeur est présente, FALSE si aucune valeur n'est présente.
                </p>
        </li>
        <li>
            <div class="collapsible-header">Passage des données par la regex</div>
            <div class="collapsible-body">
                <p>
                    Une fois que nous avons vérifié que le champs n'est pas vide, nous pouvons contrôler si les données saisies par l'utilisateur sont valides (correspondent à nos attentes) ou non. Pour cela, nous utiliserons une regex comme en javascript. Elle se déclare comme ceci:
                </p>
                <pre>
                  <code class="php">
                        <?= htmlspecialchars('
$textPattern = \'/^[a-zA-Z\-\déèàçùëüïôäâêûîô#&]+$/\';
') ?>
                  </code>
                </pre>
                <p>
                    Pour vérifier que la saisie passe correctement la regex, nous allons utiliser la fonction <a href="https://www.php.net/manual/fr/function.preg-match.php" title="Lien ver définition php.net" target="_blank"><code>preg_match()</code></a> :
                </p>
                <pre>
                <code class="php">
                        <?= htmlspecialchars('
if(isset($_POST[\'submit\'])) {
  if(!empty($_POST[\'compagny\'])) {
    if(preg_match($textPattern, $_POST[\'compagny\'])) {
      //instruction si la saisie passe la regex
    } else {
      //instruction si la saisie ne passe pas la regex
    }
  } else {
    //instruction si le champs est vide
  } 
}else  {
//instruction si le formulaire n\est pas envoyé (pas de click sur le bouton d\'envoie)
}
') ?>
                </code>
                </pre>
                <p>
                    Si la saisie passe la regex, alors nous pouvons la stockée dans une variable. Il sera ainsi plus simple de la manipuler par la suite.
                </p>
                <pre>
            <code class="php">
                        <?= htmlspecialchars('
if(isset($_POST[\'submit\'])) {
  if(!empty($_POST[\'compagny\'])) {
    if(preg_match($textPattern, $_POST[\'compagny\'])) {
     $compagny = $_POST[\'compagny\'];
    } else {
      //instruction si la saisie ne passe pas la regex
    }
  } else {
    //instruction si le champs est vide
  } 
}else  {
//instruction si le formulaire n\est pas envoyé (pas de click sur le bouton d\'envoie)
}
') ?>
            </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Remplissage du tableau d'errreur</div>
            <div class="collapsible-body">
                <p>
                    Si des données ne sont pas présentes dans les champs de saisie, ou si elles sont incorrectes, alors nous stockerons un message d'erreur dans notre tableaux d'erreur :
                </p>
                <pre>
            <code class="php">
                        <?= htmlspecialchars('
  if(isset($_POST[\'submit\'])) {
    if(!empty($_POST[\'compagny\'])) {
      if(preg_match($textPattern, $_POST[\'compagny\'])) {
       $compagny = $_POST[\'compagny\'];
      } else {
       $formError[\'compagny\'] = \'Saisie incorrect!!\';
      }
    } else {
      $formError[\'compagny\'] = \'Veuillez renseigner le champs société\';
    }
  } 
') ?>
            </code>
                </pre>
                <p>
                    Si le formulaire n'est pas envoyé, il n'y pas d'action à affectuer, donc nous pouvons supprimmer le dernier <code>else</code>.
            </div>
        </li>
        <li>
            <div class="collapsible-header">En résumé</div>
            <div class="collapsible-body">
                <p>
                    Pour résumé, lorsque l'utilisateur envoie le formulaire, nous devons déclencher la vérification uniquement lorsque la valeur du bouton "envoyer" est présente. Puis nous vérifions que le champs de saisie n'est pas vide, et enfin nous contrôlons que les données correspondent à nos attentes en utilisant une regex. 
                </p>
                <p>
                    Code final (PHP uniquement) :
                </p>
                <pre>
              <code>
                        <?= htmlspecialchars('
<?php
// déclaration du tableau d\'erreur
$formError = array();
// déclaration des regexs
$textPattern = \'/^[a-zA-Z\-\déèàçùëüïôäâêûîô#&]+$/\';
$postalPattern = \'/^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/\';
$mailPattern = \'/[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}/\';
$phonePattern = \'/^0[1-9]([-. ]?[0-9]{2}){4}$/\';
$envPattern = \'/^[a-zA-Z\-\d\, éèàçùëüïôäâêûîô#&]+$/\';
// si la valeur du bouton envoyer est présente
if (isset($_POST[\'submit\'])) {
    // si le champs compagny n\'est pas vide
    if (!empty($_POST[\'compagny\'])) {
        // si la donnée saisie passe la regex
        if (preg_match($textPattern, $_POST[\'compagny\'])) {
            //on stocke la saisie dans une variable
            $compagny = $_POST[\'compagny\'];
        } else {
            // remplissage du tableau d\'erreur si la saisie est incorrect
            $formError[\'compagny\'] = \'Saisie incorrect!!\';
        }
    } else {
        // remplissage du tableau d\'erreur si la saisie est manquante
        $formError[\'compagny\'] = \'Veuillez renseigner le champs "Société"\';
    }
//vérification du champ contact
    if (!empty($_POST[\'contact\'])) {
        if (preg_match($textPattern, $_POST[\'contact\'])) {
            $contact = $_POST[\'contact\'];
        } else {
            $formError[\'contact\'] = \'Saisie incorrect!!\';
        }
    } else {
        $formError[\'contact\'] = \'Veuillez renseigner le champs "Personne à contacter"\';
    }
// vérification du champs adresse
    if (!empty($_POST[\'address\'])) {
        if (preg_match($textPattern, $_POST[\'address\'])) {
            $address = $_POST[\'address\'];
        } else {
            $formError[\'address\'] = \'Saisie incorrect!!\';
        }
    } else {
        $formError[\'address\'] = \'Veuillez renseigner le champs "Adresse"\';
    }
    // vérification du champs code postale
    if (!empty($_POST[\'postalCode\'])) {
        if (preg_match($postalPattern, $_POST[\'postalCode\'])) {
            $postalCode = $_POST[\'postalCode\'];
        } else {
            $formError[\'postalCode\'] = \'Saisie incorrect!!\';
        }
    } else {
        $formError[\'postalCode\'] = \'Veuillez renseigner le champs "Code postal"\';
    }
    // cérification du champs ville
    if (!empty($_POST[\'city\'])) {
        if (preg_match($textPattern, $_POST[\'city\'])) {
            $city = $_POST[\'city\'];
        } else {
            $formError[\'city\'] = \'Saisie incorrect!!\';
        }
    } else {
        $formError[\'city\'] = \'Veuillez renseigner le champs "Ville"\';
    }
    // vérification du champs email
    if (!empty($_POST[\'mail\'])) {
        if (preg_match($mailPattern, $_POST[\'mail\'])) {
            $mail = $_POST[\'mail\'];
        } else {
            $formError[\'mail\'] = \'Saisie incorrect!!\';
        }
    } else {
        $formError[\'mail\'] = \'Veuillez renseigner le champs "Email"\';
    }
    // vérification du champs environnement
    if (!empty($_POST[\'environment\'])) {
        if (preg_match($textPattern, $_POST[\'environment\'])) {
            $environment = $_POST[\'environment\'];
        } else {
            $formError[\'environment\'] = \'Saisie incorrect!!\';
        }
    } else {
        $formError[\'environment\'] = \'Veuillez renseigner le champs "environnement"\';
    }
    // vérification du champs textenvironement
    if (!empty($_POST[\'textEnvironment\'])) {
        if (preg_match($envPattern, $_POST[\'textEnvironment\'])) {
            $textEnvironment = $_POST[\'textEnvironment\'];
        } else {
            $formError[\'textEnvironment\'] = \'Saisie incorrect!!\';
        }
    } else {
        $formError[\'textEnvironment\'] = \'Veuillez renseigner le champs "Environnement"\';
    }
    // vérification du champs phone
    if (!empty($_POST[\'phone\'])) {
        if (preg_match($phonePattern, $_POST[\'phone\'])) {
            $phone = $_POST[\'phone\'];
        } else {
            $formError[\'phone\'] = \'Saisie incorrect!!\';
        }
    } else {
        $formError[\'phone\'] = \'Veuillez renseigner le champs société\';
    }
}
                ') ?>
              </code>
                </pre>
                <a href="../javascript/formulaire/javascript/index.php" title="Lien vers démo validation de formulaire" target="_blank" class="waves-effect waves-light btn"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>