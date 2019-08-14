
<div class="container">
    <h1>Nombre magique avec évènement</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Besoin</div>
            <div class="collapsible-body">
                <p>
                    Nous reprenons l'exercice du nombre magique en y ajoutant la vérification de la saisie de l'utilisateur quand il clique sur un bouton d'envoir d'envoie d'un formulaire. Nous en profiterons pour ajouter un bouton qui va générer un nombre aléatoire à la demande, permettant ainsi au joueur de participer autant qu'il le désire.
                </p>
                <p>
                    Nous commençons par construire notre formulaire :
                </p>
                <pre>
                <code class="html">
                        <?= htmlspecialchars('
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nombre magic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div>
        <form action="#" method="get">
            <label for="number">Trouver le nombre magic</label>
            <input type="text" id="number" name="number" required>
            <span id="label"></span>
            <input type="reset" name="submit" id="submit" value="Vérifier">
            <input type="reset" name="generate" id="generate" value="Générer un nombre">
        </form>
    </div>
</body>
</html>
') ?>
                </code>
                </pre>
                <p>
                    Nous choisissons un <code>type="reset"</code> pour le boutons de vérification et de génération de nombre aléatoire pour effacer l'éventuelle saisie de l'utilisateur.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Code Javascript</div>
            <div class="collapsible-body">
                <p>
                    Nous commençons par définir les variables qui contiendront respectivement le nombre aléatoire et le nombre de coups mis par l'utilisateur pour trouver la bonne réponse :
                </p>
                <pre>
                <code class="js">
//déclaration des variables utilisées
var magic = 0;
var count = 1;
                </code>
                </pre>
                <p>
                    Ensuite nous ciblons les divers éléments du formulaire pour récupérer ce que l'utilisateur aura saisi, pour afficher un message d'information et pour pouvoir déclencher un évènement spécifique :
                </p>
                <pre>
                <code class="js">
// ciblage des éléments nécessaires et stokage dans une variable
var generate = document.getElementById('generate');
var userNumber = document.getElementById('number');
var label = document.getElementById('label');
var submit = document.getElementById('submit');
                </code>
                </pre>
                <p>
                    Rappel : le fait de définir ces variables en dehors de fonctions leur donne un porté globale, ce qui veut dire qu'elles seront utilisables sur tout notre script.
                </p>
                <p>
                    Nous pouvons définir une première fonction qui sera déclenchée au click sur le bouton "Générer". Cette fonction générera un nombre aléatoire et initialisera une nouvelle partie :
                </p>
                <pre>
                <code class="js">
// déclaration des fonctions
function magicNumber() {
    label.textContent = '';
    count = 1;
    magic = parseInt(Math.random() * 100);
    return magic;
};
                </code>
                </pre>
                <p>
                    Cette fonction va d'abord "vider" l'élément qui affiche le message d'information. Ensuite la variable de compte est initialisé à 1 (nombre de coups minimum pour trouver le bon nombre), puis on génère un nouveau nombre aléatoire. <code>return magic</code> permet de réutiliser cette variable ailleur que dans la fonction.
                </p>
                <p>
                    Puis nous établissons une fonction qui permet de contrôler la saisie de l'utilisateur et de la comparer avec le nombre magique. Cette fonction reprendra le même shéma de vérification que la vérification de formulaire en Javascript. On vérifie d'abord que le champs de saisie est rempli :
                </p>
                <pre>
                    <code class="js">
        function verif() {
// si le champs est vide
if (userNumber.validity.valueMissing) {
    // on bloque l'nvoie du formulaire
    event.preventDefault();
    // affichage message d'erreur
    label.textContent = 'Veuillez saisir un nombre';
    label.style.color = 'red';
    // incrémentation du compte de coups
    count++;
                    </code>
                </pre>
                <p>
                    Nous pourrions également vérifier si l'utilisateur à bien rentrer une valeur numérique en ajoutant une autre condition et en utilisant la fonction <code>isNaN()</code>
                </p>
                <p>
                    Puis nous comparons la saisie de l'utilisateur avec le nombre généré de manière aléatoire :
                </p>
                <pre>
                        <code class="js">
                        else {
    // si le nombre saisi par l'utilisateur est égal au nombre magic
    if (parseInt(userNumber.value) == magic) {
        label.textContent = 'Bravo, vous avez trouvé le nombre magic ' + magic + ' en ' + count + ' coup(s)!!!';
        label.style.color = 'green';
        // si le nombre saisi par l'utilisateur est inférieur au nombre magic
    } else if (parseInt(userNumber.value) < magic) {
        label.textContent = 'Plus grand';
        label.style.color = 'red';
        count++;
        // si le nombre saisi par l'utilisateur est supérieur au nombre magic
    } else {
        label.textContent = 'Plus petit';
        label.style.color = 'red';
        count++;
    }
}
                        </code>
                </pre>
                <p>
                    Puis nous pouvons établir nos évènements selon le bouton sur lequel clique l'utilisateur :
                </p>
                <pre>
                        <code class="js">
// déclarations des événements
generate.onclick = magicNumber;
submit.onclick = verif;
                        </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat final</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3 offset-s3"><a class="active" href="#test1">HTML</a></li>
                            <li class="tab col s3"><a href="#test2">JS</a></li>
                        </ul>
                    </div>
                    <div id="test1" class="col s12">
                        <pre>
                            <code class="html">
                                <?= htmlspecialchars('
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nombre magic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div>
        <form action="#" method="get">
            <label for="number">Trouver le nombre magic</label>
            <input type="text" id="number" name="number" required>
            <span id="label"></span>
            <input type="reset" name="submit" id="submit" value="Vérifier">
            <input type="reset" name="generate" id="generate" value="Générer un nombre">
        </form>
    </div>
</body>
</html>
') ?>         
                            </code>
                        </pre>       
                    </div>
                    <div id="test2" class="col s12">
                        <pre>
                            <code class="js">
//déclaration des variables utilisées
var magic = 0;
var count = 1;
// ciblage des éléments nécessaires et stokage dans une variable
var generate = document.getElementById('generate');
var userNumber = document.getElementById('number');
var label = document.getElementById('label');
var submit = document.getElementById('submit');

// déclaration des fonctions
function magicNumber() {
    label.textContent = '';
    count = 1;
    magic = parseInt(Math.random() * 100);
    console.log(magic);
    return magic;
};

function verif() {
    // si le champs est vide
    if (userNumber.validity.valueMissing) {
        // on bloque l'nvoie du formulaire
        event.preventDefault();
        // affichage message d'erreur
        label.textContent = 'Veuillez saisir un nombre';
        label.style.color = 'red';
        // incrémentation du compte de coups
        count++;
    } else {
        // si le nombre saisi par l'utilisateur est égal au nombre magic
        if (parseInt(userNumber.value) == magic) {
            label.textContent = 'Bravo, vous avez trouvé le nombre magic ' + magic + ' en ' + count + ' coup(s)!!!';
            label.style.color = 'green';
            // si le nombre saisi par l'utilisateur est inférieur au nombre magic
        } else if (parseInt(userNumber.value) < magic) {
            label.textContent = 'Plus grand';
            label.style.color = 'red';
            count++;
            // si le nombre saisi par l'utilisateur est supérieur au nombre magic
        } else {
            label.textContent = 'Plus petit';
            label.style.color = 'red';
            count++;
        }
    }
};
// déclarations des événements
generate.onclick = magicNumber;
submit.onclick = verif;
                            </code>
                        </pre>
                    </div>
                </div>
                <a href="magicEventDemo.php" target="_blank" title="Lien vers démo nombre magic" class="waves-effect waves-light btn"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>