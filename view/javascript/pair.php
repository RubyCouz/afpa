
<div class="container">
    <h1>Pair ou impair ?</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Analyse des besoins</div>
            <div class="collapsible-body">
                <p>
                    On nous demande de créer un programme permettant d'établir si un nombre est pair ou impair. Nous
                    demanderons donc à l'utilisateur de saisir un nombre. Après vérifiaction de la saisie, le
                    programme devra le diviser par 2 et analyser le reste de la division afin de définir si le
                    nombre est pair ou impair.
                </p>
                <p>
                    Ce qui nous donne pour l'algorithme :
                <ul>
                    <li><b>Si</b> la saisie n'est pas un nombre {</li>
                    <li>On affiche un message d'erreur }</li>
                    <li><b>Sinon si</b> le résultat de la division par 2 est égale à 0 {</li>
                    <li>On informe l'utilisateur que le nombre est pair }</li>
                    <li><b>Sinon </b>{</li>
                    <li>On informe l'utilisateur que le nombre est impair }</li>
                </ul>
                </p>
                <p>
                    Nous commencerons donc par définir 3 variables :
                </p>
                <pre>
                    <code class="js">
var divisor = 2;
var number = parseInt(window.prompt('Saisissez un nombre :'));
var result = number % divisor;
                    </code>
                </pre>
                <p>
                    Nous stockons notre diviseur dans un variable :
                </p>
                <pre>
                    <code class="js">
var divisor = 2;
                    </code>
                </pre>
                <p>
                    On demande à l'utilisateur de saisir un nombre :
                </p>
                <pre>
                    <code class="js">
var number = parseInt(window.prompt('Saisissez un nombre :'));
                    </code>
                </pre>
                <p>
                    On "parse" (<a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/parseInt" title="Lien vers définition parseInt MDN" class="uk-link-muted" target="_blank"><code>parseInt(...)</code></a>) la saisie de l'utilisateur afin de changer la chaine de caractères renseignée par l'utilisateur en entier.
                </p>
                <p>
                    On stocke le reste de la division du nombre renseigné par l'utilisateur par le diviseur (ici 2) :
                </p>
                <pre>
                    <code class="js">
var result = number % divisor;
                    </code>
                </pre>
                <p>
                    <code>%</code> nous retourne le reste de la division de <code>number</code> par
                    <code>divisor</code>.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Analyse de la saisie de l'utilisateur</div>
            <div class="collapsible-body">
                <p>
                    Pour des raisons de sécurité, il convient de vérifier systématiquement tout ce que l'utilisateur
                    peut indiquer dans des champs de saisies, peut importe le context.
                </p>
                <p>
                    Nous vérifierons donc ici si l'utilisateur a bien entré un nombre entier. Si nous avons autre
                    chose qu'un entier, alors nous affichons un message d'erreur à l'aide d'une condition :
                </p>
                <pre>
                    <code class="js">
// vérification de la saisie de l'utilisateur à l'aide de la fonction isNan (on controle que number est bien un nombre)
if (isNaN(number)) {
alert('Aucun nombre saisi!'); // information de l'erreur
                }
                    </code>
                </pre>
                <p>
                    Pour avoir un code optimal, il aurait fallu faire une boucle autour de cette condition afin de
                    redemander à l'utilisateur de refaire une saisie, et ce jusqu'à ce qu'il entre un nombre. Mais
                    nous verrons ceci un peu plus tard.
                </p>
                <p>
                    Pour vérifier la saisie de l'utlisateur, nous utilisons ici la fonction <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/isNaN" title="Lien vers la définition MDN" target="_blank">
                        <code>isNaN()</code>
                    </a>. Elle va vérifier que notre programme analysera un nombre et pas autre chose.
                </p>
                <p>
                    Si la fonction retourne NaN, alors nous affichons un message d'erreur à l'aide de la fonction :
                </p>
                <code>
                    <a href="https://developer.mozilla.org/fr/docs/Web/API/Window/alert" title="Lien vers la définition MDN" target="_blank">alert()</a>
                </code> :
                <pre>
                    <code class="js">
alert('Aucun nombre saisi!'); // information de l'erreur
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Analyse du reste de la division par le diviseur (2)</div>
            <div class="collapsible-body">
                <p>
                    Si l'utilisateur a bien saisie un nombre, nous allons vérifier le reste de sa division par 2.
                </p>
                <p>
                    Si le reste de cette division est égale à 0, alors nous informerons l'utilisateur (à l'aide de
                    la fonction
                    <code>
                        <a href="https://developer.mozilla.org/fr/docs/Web/API/Window/alert" title="Lien vers la définition MDN" target="_blank">alert()</a>
                    </code> ) que son nombre est pair :
                </p>
                <pre>
                    <code class="js">
if (result == 0) {
    alert('Le nombre saisi est pair.');
}
                    </code> 
                </pre>
                <p>
                    Sinon, nous lui dirons que son nombre est impair :
                </p>
                <pre>
                    <code class="js">
else {
    alert('Le nombre saisi est impair.');
}
                    </code> 
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat final</div>
            <div class="collapsible-body">
                <p>
                    Si on assemble notre code en respectant notre algorithme, nous obtenons :
                </p>
                <pre>
                    <code class="js">
// déclaration des variables utiles
var divisor = 2;
var number = parseInt(window.prompt('Saisissez un nombre :'));
var result = number % divisor;
// vérification de la saisie de l'utilisateur à l'aide de la fonction isNan (on controle que number est bien un nombre)
if (isNaN(number)) {
    alert('Aucun nombre saisi!'); // information de l'erreur
    // sinon si le reste de la division de number par 2 est égale à 0
} else if (result == 0) {
    alert('Le nombre saisi est pair.');
    // sinon ...
} else {
    alert('Le nombre saisi est impair.');
}
                    </code>
                </pre>
                <button class="waves-effect waves-light btn" id="runPairExo"><i class="material-icons right">play_arrow</i>Run code</button>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Alternative</div>
            <div class="collapsible-body">
                <p>
                    Il était possible de procéder de la même façon sans stocker le diviseur dans un variable :
                </p>
                <pre>
                    <code class="js">
var number = parseInt(window.prompt('Saisissez un nombre :'));
var result = number % 2;
// vérification de la saisie de l'utilisateur à l'aide de la fonction isNan (on controle que number est bien un nombre)
if (isNaN(number)) {
    alert('Aucun nombre saisi!'); // information de l'erreur
    // sinon si le reste de la division de number par 2 est égale à 0
} else if (result == 0) {
    alert('Le nombre saisi est pair.');
    // sinon ...
} else {
    alert('Le nombre saisi est impair.');
}
                    </code>
                </pre>
                <button class="waves-effect waves-light btn" id="runPairExoBis"><i class="material-icons right">play_arrow</i>Run code</button>
            </div>
        </li>
    </ul>
</div>