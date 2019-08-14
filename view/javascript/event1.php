
<div class="container">
    <h1>Evènement sur un bouton</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Besoin</div>
            <div class="collapsible-body">
                <p>
                    L'utilisateur doit pouvoir saisir une chaine de caractère dans un champs. En cliquant sur le bouton "Contrôle", la chaine de caractère doit pouvoir s'afficher dans une <code>alert</code>.
                </p>
                <p>
                    Nous commençons par établir un formulaire composé d'un <code><?= htmlspecialchars('<input type="text">') ?></code> pour la saisie et d'un <code><?= htmlspecialchars('<input type="submit">') ?></code> pour déclencherl'évènement.
                </p>
                <pre>
                <code class="html">
                        <?= htmlspecialchars('
 <form action="#" method="GET">
    <label for="text">Saissisez un teste et appuyer sur le bouton "contôle" :</label>
    <input type="text" id="text" name="text" placeholder="Insérer du texte" required>
    <input type="submit" name="submit" id="submit" value="Contrôle">
</form>
') ?>
                </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Mise en place du script</div>
            <div class="collapsible-body">
                <p>
                    Côté Javascript, nous devons cibler nos 2 élements de notre formulaire (le champs de saisie et le bouton) et les stocker chacun dans une variable :
                </p>
                <pre>
                <code class="js">
                // ciblage des élements 
 var text = document.getElementById('text');
 var submit = document.getElementById('submit');
                </code>
                </pre>
                <p>
                    Puis nous définissons une fonction qui déclenchera une <code>alert</code> lors de son appel :
                </p>
                <pre>
                <code class="js">
function formCheck() {
    alert('Vous avez saisi ' + text.value);
 }
                </code>
                </pre>
                <p>
                    Enfin nous pouvons définir notre évènement qui déclenchera l'appel de la fonction <code>formCheck()</code> :
                </p>
                <pre>
                <code class="js">
submit.onclick = formCheck;
                </code>
                </pre>
                <p>
                    On utilise ici la méthode <code>onclick</code> qui nous permettra de déclencher un évènement au clique sur un élément défini (ici notre bouton "Contrôle").
                </p>
                <p>
                    On indique donc qu'au click sur le bouton, on fait référence à <code>formCheck</code>.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Code final</div>
            <div class="collapsible-body">
                <p>
                    De cette manière nous obtenons :
                </p>
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3 offset-s3"><a class="active" href="#html">HTML</a></li>
                            <li class="tab col s3"><a href="#js">JS</a></li>
                        </ul>
                    </div>
                    <div id="html" class="col s12">
                        <pre>
            <code class="html">
                                <?= htmlspecialchars('
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
</head>

<body>
    <form action="#" method="GET">
        <label for="text">Saissisez un teste et appuyer sur le bouton "contôle" :</label>
        <input type="text" id="text" name="text" placeholder="Insérer du texte" required>
        <input type="submit" name="submit" id="submit" value="Contrôle">
    </form>
    </body>

</html>
') ?>
            </code>
                        </pre>

                    </div>
                    <div id="js" class="col s12">
                        <pre>
            <code class="js">
// ciblage des élements 
 var text = document.getElementById('text');
 var submit = document.getElementById('submit');
// déclaration de la fonction qui faire l'action 
 function formCheck() {
alert('Vous avez saisi ' + text.value);
 }
// déclenchement de l'évènement
 submit.onclick = formCheck;                
            </code>
                        </pre>
                    </div>
                </div>

                <a href="event1demo.php" title="Lien vers la démo" target="_blank" class="waves-effect waves-light btn"><i class="material-icons right">play_arrow</i>RUN CODE</a>
                <p>
                    Il est tout à fait possible d'ajouter des restrictions et des vérifications en Javascript sur le champs de saisie afin de sécuriser le formulaire ou de filtrer les données comme vu précédemment.
                </p>
            </div>
        </li>
    </ul>
</div>