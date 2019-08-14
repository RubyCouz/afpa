
<div class="container">
    <h1>Moyenne des saisies</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Besoin</div>
            <div class="collapsible-body">
                <p>
                Nous devons créer un programme qui saisie des entiers, et afficher leur somme et la moyenne. Nous auront besoin d'une variable pour stocker la saisie à l'intérieur, une variable pour le total de la somme, une variable pour la moyenne, et une variable "compteur", qui comptera le nombre de saisies effectuées :
                </p>
                <pre>
                    <code>
var number = parseInt(window.prompt('Saisir un entier :'));
var total = 0;
var average = 0;
var i = 0;
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Vérification des données saisies par l'utilisateur</div>
            <div class="collapsible-body">
                <p>
                    Nous devons établir une vérification de la saisie, en observant si la saisie est bien un nombre à l' aide de la fonction <code>isNaN()</code>. Si <code>number</code> n'est pas un nombre, alors on affichera un message d'erreur. Nous pouvons aller plus loin maintenant en installant un boucle qui demandera une saisie tant que celle-ci n'est pas correct:
                </p>
                <pre>
                    <code class="js">
// on vérifie la saisie de l'utilisateur
 // tant que la saisie n'est pas un nombre
 while (isNaN(number)) {
     // on renouvèle la saisie
     number = parseInt(window.prompt('Saisissez un premier nombre :'));
 }
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Construction de la boucle</div>
            <div class="collapsible-body">
                <p>
                    Vu que le programme doit demander une saisie tant que celle-ci est différente de 0, utilisons une boucle <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Guide/Boucles_et_it%C3%A9ration#L'instruction_while" class="uk-link-muted" title="Lien vers défintion MDN" target="_blank">
                        <code>while( condition ) { instruction }</code>
                    </a> :
                </p>
                <pre>
                    <code class="js">
 while(number != 0) {
instruction ...
}
                    </code>
                </pre>
                <p>
                    Tant que la saisie est diférente de 0, nous allons additionner chaque valeur avec la précédente :
                </p>
                <pre>
                    <code>
while(number != 0) {
total += number;
 }
                    </code>
                </pre>
                <p>
                    On incrémente <code>i</code> :
                </p>
                <pre>
                    <code class="js">
while(number != 0) {
    total += number;
    i++
     }
                    </code>
                </pre>
                <p>
                    Et on calcule la moyenne :
                </p>
                <pre>
                    <code>
while(number != 0) {
    total += number;
    i++
    average = total / i
    number = parseInt(window.prompt('Saisir un entier :'))
     }
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat final</div>
            <div class="collapsible-body">
                <p>
                    Avec l'affichage, nous obtenons :
                </p>
                <pre>
                    <code class="js">
var number = parseInt(window.prompt('Saisir un entier :'));
var total = 0;
var average = 0;
var i = 0;
// on vérifie la saisie de l'utilisateur
// tant que la saisie n'est pas un nombre
while (isNaN(number)) {
    // on renouvèle la saisie
    number = parseInt(window.prompt('Saisissez un premier nombre :'));
}
while(number != 0) {
    total += number;
    i++
    average = total / i
    console/log('somme : ' + total);
    console/log('moyenne : ' + average);
    number = parseInt(window.prompt('Saisir un entier :'))
     }
                     </code>
                </pre>
                <button class="waves-effect waves-light btn" id="runAverageExo"><i class="material-icons right">play_arrow</i>Run code</button>
            </div>
        </li>
    </ul>
</div>