
<div class="container">
    <h1>Table de multiplication</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Besoin</div>
            <div class="collapsible-body">
                <p>
                    Nous devons créer un programme qui saisie des entiers : un premier qui va être le nombre à multiplier, et le second qui sera le nombre de multiples, en partant de 0. Nous aurons besoin donc de 3 variables : une pour chaque nombre et une pour le total.
                </p>
                <pre>
                    <code>
// définition des variables
var X = parseInt(window.prompt('Saisissez un entier :'));
var N = parseInt(window.prompt('Saisissez le nombre de multiple :'));
var total = 0;
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Vérification des données saisies par l'utilisateur</div>
            <div class="collapsible-body">
                <p>
                    Nous devons établir une vérification de la saisie, en vérifiant que la saisie est bien un nombre à l' aide de la fonction <code>isNaN()</code>. Si <code>N</code> ou <code>X</code> ne sont pas un nombre, alors on affichera un message d'erreur. Nous pouvons aller plus loin maintenant en installant un boucle qui demandera une saisie tant que celle n'est pas correct:
                </p>
                <pre>
                    <code class="js">
// on vérifie la saisie de l'utilisateur
 // tant que la saisie n'est pas un nombre
 while (isNaN(X)) {
     // on renouvèle la saisie
     X = parseInt(window.prompt('Saisissez un premier nombre :'));
 }
 while (isNaN(N)) {
     // on renouvèle la saisie
     N = parseInt(window.prompt('Saisissez un multiple valide :'));
 }
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Construction de la boucle</div>
            <div class="collapsible-body">
                <p>
                    Nous devons parcourir toutes les valeurs entre 0 et N. Pour cela, nous utiliserons une boucle <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Guide/Boucles_et_it%C3%A9ration#L'instruction_for" class="uk-link-muted" title="Lien vers la définotion MDN" target="_blank">
                        <code class="js">
                            for()
                        </code>
                    </a>:
                <pre>
                        <code>
 for (i = 0; i <= N; i++) {
instruction
 }
                        </code>
                </pre>
                <p>
                    On prend 0 comme valeur de départ, nous considérons que chaque valeur est inférieur ou égale à N pour chaque tour de boucle, et nous incrémentons <code>i</code> (le multiple).
                </p>
                <p>
                    Puis nous insérons notre opération et notre affichage dans la boucle :
                </p>
                <pre>
                        <code>
or (i = 0; i <= N; i++) {
    // calcul, et assignation du resultat à la variable total
    total = i * X;
    // affichage
    console.log(X + ' x ' + i + ' = ' + total);
    }
                        </code>
                </pre>
                <p>
                    A chaque tour de boucle, nous faisons le calcul du nombre saisi par l'utilisateur multiplié par <code>i</code> (qui correspond à chaque multiple compris entre 0 et le nombre de multiple saisi par l'utimisateur). Enfin nous procédons au formatage et à l'affichage de notre opération et de son résultat avec un <code>console.log()</code>.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat final</div>
            <div class="collapsible-body">
                <p>
                    Nous obtenons finalement :
                </p>
                <pre>
                    <code class="js">
 // définition des variables
var X = parseInt(window.prompt('Saisissez un entier :'));
while (isNaN(X)) {
// on renouvèle la saisie
X = parseInt(window.prompt('Saisissez un premier nombre :'));
}
var N = parseInt(window.prompt('Saisissez le nombre de multiple :'));
  // on vérifie la saisie de l'utilisateur
// tant que la saisie n'est pas un nombre
while (isNaN(N)) {
    // on renouvèle la saisie
    N = parseInt(window.prompt('Saisissez un premier nombre :'));
}
var total = 0;
// début de la boucle
for (i = 0; i <= N; i++) {
    // calcul, et assignation du resultat à la variable total
    total = i * X;
    // affichage
    console.log(X + ' x ' + i + ' = ' + total);

                     </code>
                </pre>

                <button class="waves-effect waves-light btn" id="runMultipleExo"><i class="material-icons right">play_arrow</i>Run code</button>
            </div>
        </li>
    </ul>
</div>