
<div class="container">
    <h1>Age de l'utilisateur</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Analyse des besoins</div>
            <div class="collapsible-body">
                <p>
                    Dans cet exercice, il nous faudra créer un programme permettant de déterminer si
                    l'utilsateur est majeur ou mineur selon son année de naissance.
                </p>
                <p>
                    Nous aurons besoin ici de son année de naissance (<code>var birthYear</code>),
                    nous devrons récupérer l'année de la date courante
                    (<code>var currentYear</code>), soustraire l'année de naissance à l'année en
                    cours (<code>var age</code>) et comparer avec l'age de la majorité (18 ans).
                </p>
                <p>
                    En résumé :
                </p>
                <ul>
                    <li><b>Si</b> <code>age</code> est supérieur ou égale à 18 {</li>
                    <li>on affiche un message notifiant que l'utilisateur est majeur }</li>
                    <li><b>sinon </b> {</li>
                    <li>on affiche un message notifiant que l'utilisateur est mineur }</li>
                </ul>
                <p>
                    Nous commencerons donc par définir nos variables :
                </p>
                <pre>
                    <code class="js">
// demande la saisie de l'année de naissance de l'utilisateur
var birthYear = parseInt(window.prompt('Veuillez saisir votre année de naissance :'));
// on récupère l'année courante:
// création de l'objet date -> récupère la date courrante 
var date = new Date();
// on utilise la methode getFullYear() afin d'extraire l'année de la date courante
var currentYear = date.getFullYear();
// calcul de l'âge de l'utilisateur
var age = currentYear - birthYear;
                    </code>
                </pre>
                <p>
                    Nous stockons l'année de naissance de l'utilisateur dans une variable :
                </p>
                <pre>
                    <code class="js">
var birthYear = parseInt(window.prompt('Veuillez saisir votre année de naissance :'));
                    </code>
                </pre>
                <p>
                    Pour récupérer l'année en cours, nous allons d'abord récupérer la date courante
                    à l'aide de l'objet <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/Date" title="Lien vers la définition MDN" target="_blank">
                        <code>Date()</code>
                    </a>, que nous allons stocker dans une variable :
                </p>
                <pre>
                    <code class="js">
var date = new Date();
                    </code>
                </pre>
                <p>
                    Puis on extrait l'année de la date en cours avec la méthode
                    <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/Date/getFullYear" title="Lien vers la définition MDN" target="_blank">
                        <code>getFullyear()</code>
                    </a>
                    et on la stocke dans une variable :
                </p>
                <pre>
                    <code class="js">
var currentYear = date.getFullYear();
                    </code>
                </pre>
                <p>
                    Enfin nous calculons l'age de l'utilisateur :
                </p>
                <pre>
                    <code>
var age = currentYear - birthYear;
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Analyse de la saisie de l'utilisateur</div>
            <div class="collapsible-body">
                <p>
                    Nous vérifierons ici si l'utilisateur à bien entrer un nombre entier. Si
                    nous avons autre chose qu'un entier, alors nous affichons un message d'erreur à l'aide d'une condition :
                </p>
                <pre>
                    <code class="js">
// vérification de la saisie de l'utilisateur à l'aide de la fonction isNan (on contrque number est bien un nombre)
if (isNaN(birthYear)) {
    alert('Veuillez saisir une année valide svp!'); // information de l'erreur
}
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Récupération de la date courrante</div>
            <div class="collapsible-body">
                <p>
                    Pour récupérer la date courante, nous allons utiliser l'objet <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/Date" title="Lien vers la définition MDN" target="_blank">
                        <code>Date()</code>
                    </a>.
                    Lorsqu'aucun argument n'est passé dans cet objet, il nous retourne la
                    date du jour et l'heure selon l'heure locale du système.
                </p>
                <pre>
                    <code>
var date = new Date();
                    </code>
                </pre>
                <p>
                    Il nous reste à récupérer l'année de cette date. Nous utiliserons la méthode <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/Date/getFullYear" title="Lien vers la définition MDN" target="_blank">
                        <code>getFullyear()</code>
                    </a> qui est une méthode de l'objet <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/Date" title="Lien vers la définition MDN" target="_blank">
                        <code>Date()</code>
                    </a> et qui nous permettra d'extraire l'année d'une date donnée.
                </p>
                <pre>
                    <code class="js">
// on utilise la methode getFullYear() afin d'extraire l'année de la date courante
var currentYear = date.getFullYear();
                    </code> 
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Age de l'utilisateur</div>
            <div class="collapsible-body">
                <p>
                    Pour obtenir l'age de l'utilisateur, il nous suffit simplement de soustraire
                    <code>birthYear</code> à
                    <code>currentYear</code> et de stocker le résultat dans une variable :
                </p>
                <pre>
                    <code class="js">
 // calcul de l'âge de l'utilisateur
var age = currentYear - birthYear;
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Mise en place de la condition</div>
            <div class="collapsible-body">
                <p>
                    Une fois age calculé, nous pouvons le comparer à l'age de la majorité : si l'utilisateur a 18
                    ans ou plus, il est majeur :
                </p>
                <pre>
                    <code class="js">
if (age >= 18) {
    alert('Vous avez ' + age + ' ans.');
    alert('Vous êtes donc majeur.');
}
                    </code>
                </pre>
                <p>
                    Sinon il est mineur :
                </p>
                <pre>
                    <code>
else {
    alert('Vous avez ' + age + ' ans, vous êtes donc mineur');
}
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat final</div>
            <div class="collapsible-body">
                <p>
                    Nous obtenons alors :
                </p>
                <pre>
                    <code class="js">
 /**
 * déclarer les variables dont on aura besoin
 */
// demande la saisie de l'année de naissance de l'utilisateur
var birthYear = parseInt(window.prompt('Veuillez saisir votre année de naissance :'));
// on récupère l'année courante:
// création de l'objet date -> récupère la date courrante 
var date = new Date();
// on utilise la methode getFullYear() afin d'extraire l'année de la date courante
var currentYear = date.getFullYear();
// calcul de l'âge de l'utilisateur
var age = currentYear - birthYear;
// vérification de la saisie de l'utilisateur à l'aide de la fonction isNan (on contrque number est bien un nombre)
if (isNaN(birthYear)) {
    alert('Veuillez saisir une année valide svp!'); // information de l'erreur
} else {
    // condition determinant si l'utilisateur est  majeur ou mineur
    if (age >= 18) {
        alert('Vous avez ' + age + ' ans.');
        alert('Vous êtes donc majeur.');
    } else {
        alert('Vous avez ' + age + ' ans, vous êtes donc mineur');
    }
}
                    </code>
                </pre>
                <button class="waves-effect waves-light btn" id="runAgeExo"><i class="material-icons right">play_arrow</i>Run code</button>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Bonus : condition ternaire</div>
            <div class="collapsible-body">
                <p>
                    Il est possible de faire cette condition de manière plus courte, en utilisant se qu'on appelle
                    <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Op%C3%A9rateurs/L_op%C3%A9rateur_conditionnel" title="Lien vers définition MDN" target="_blank">une condition ternaire
                    </a> :
                </p>
                <pre>
                    <code class="js">
/**
* condition ternaire 
 */
age >= 18 ? alert('majeur') : alert('mineur');
                    </code>
                </pre>
            </div>
        </li>
    </ul>
</div>