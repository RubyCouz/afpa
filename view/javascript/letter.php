
<div class="container">
    <h1>Compter le nombre de lettres</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Besoin</div>
            <div class="collapsible-body">
                <p>
                    Créons un programme permettant de compter le nombre de fois qu'apparait une lettre donnée dans
                    une chaine de caratères.
                </p>
                <p>
                    Nous devrons créer une fonction, définir une variable pour stocker la chaine de caractères, une
                    pour stocker la lettre demandée et une pour compter le nombre de fois qu'apparait cette lettre.
                    Une dernière variable sera définis pour indiquer la position de la lettre choisie dans la chaine
                    de caratères.
                </p>
                <p>
                    Commençons par construire notre fonction :
                </p>
                <pre>
                    <code class="js">
function countLetter() {
    instruction
}
                    </code>
                </pre>
                <p>
                    Définition de nos variables :
                </p>
                <pre>
                    <code class="js">
//déclaration des variables
var phrase = window.prompt('Saisissez une phrase :');
var lettre = window.prompt('Saisissez une lettre :');
var count = 0;
// variable définissant la position de la lettre dans le mot
var posLetter = phrase.indexOf(lettre);
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Parcours de la chaine de caractères</div>
            <div class="collapsible-body">
                <p>
                    Pour examiner notre chaine de caractère et déterminer la position des lettres, nous utiliserons une boucle
                    <code>while</code> : tant que le curseur trouve cette lettre, on incrémente notre variable de
                    compte (<code>count</code>), nous positionnons notre curseur sur la position suivante et la
                    boucle continue.
                </p>
                <p>
                    Enfin nous procédons à l'affichage :
                </p>
                <pre>
                    <code class="js">
var table = document.getElementById('table').insertAdjacentHTML('beforeend', '<p>Cette phrase contient ' + count + ' lettre(s) ' +lettre + '</p>');  
                    </code>
                </pre>
                <p>
                    Nous ciblons l'endroit où nous voulons afficher notre résultat dans notre document html, puis
                    nous affichons notre résultat à l'aide de la fonction
                    <a href="https://developer.mozilla.org/fr/docs/Web/API/Element/insertAdjacentHTML" title="Lien vers définition MDN" class="uk-link-muted" target="_blank">
                        <code>insertAdjacentHTML()</code>
                    </a>.
                    Cette fonction prend 2 paramêtres : la position de l'affichage par rapport à notre élément ciblé, et le texte à afficher.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat final</div>
            <div class="collapsible-body">
                <p>
                    Avec l'appel de la fonction, voici notre code final :
                </p>
                <pre>
                    <code class="js">
/déclaration de la fonction calculant le nombre d'une lettre saisie dans un mot donnée par l'utilisateur
var phrase = window.prompt('Saisissez une phrase :');
var lettre = window.prompt('Saisissez une lettre :');
// les variables lettre et phrase sont passées en paramêtre de la fonction countLetter pour pouvoir utiliser leur valeur
function countLetter(lettre, phrase) {
  //déclaration des variables
var count = 0;
// variable définissant la position de la lettre dans le mot
var posLetter = phrase.indexOf(lettre);
// boucle permettant de compter le nombre de lettre demandée dans le mot
while (posLetter != -1) {
  count++;
  posLetter = phrase.indexOf(lettre, posLetter + 1);
}
// variable définissant l'affichage dans le html
var table = document.getElementById('table').insertAdjacentHTML('beforeend', '<p>Cette phrase contient ' + count + ' lettre(s) ' + lettre + '</p>');
    }
    //appel de la fonction
countLetter();
                    </code>
                </pre>
                <a href="fonction/exemple2.php" class="waves-effect waves-light btn" target="_blank"><i class="material-icons right">play_arrow</i>Run code</a>
            </div>
        </li>
    </ul>
</div>