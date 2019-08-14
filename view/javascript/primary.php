
<div class="container">
    <h1>Nombre premier</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Besoin</div>
            <div class="collapsible-body">
                <p>
                    Un nombre premier est un entier divisible uniquement par 1 et par lui-même. Nous devrons donc
                    vérifier que pour un nombre donné, il n'y à qu'en le divisant par 1 ou lui-même que nous obtenons
                    un reste de division étant égale à 0. La manière la plus simple consiste à faire un test de
                    <b>primalité</b> : nous allons simplement testé les nombres strictement inférieurs à &radic;N (N
                    étant le nombre testé). Puisque tout nombre est divisible par un et par lui-même, nous nous
                    intéresserons aux restes des divisions de notre saisie par des nombre compris entre 2 et N-1.
                </p>
                <p>
                    Nous allons définir 4 variables :
                </p>
                <ul>
                    <li>Une qui sera le point de départ de notre vérification et notre diviseur :</li>
                    <pre>
                        <code class="js">
var n = 2;
                        </code>
                    </pre>
                    <li>Une qui servira à demander un nombre à l'utilisateur et à stocker sa valeur à l'intérieur :
                    </li>
                    <pre>
                        <code class="js">
var number = parseInt(window.prompt('Saisir un nombre :'));
                        </code>
                    </pre>
                    <li>Une variable dans laquelle sera stocké le résultat de <code>number / n</code> :</li>
                    <pre>
                        <code class="js">
var divide = 0;
                        </code>
                    </pre>
                    <li>
                        Et enfin une variable de "confirmation", qui nous permettra d'afficher un message pour
                        informer l'utilisateur :
                    </li>
                    <pre>
                        <code class="js">
var bool = true;
                        </code>
                    </pre>
                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Vérification des données saisies par l'utilisateur</div>
            <div class="collapsible-body">
                <p>
                    Nous devons établir une vérification de la saisie, en vérifiant que la saisie est bien un nombre
                    à l' aide de la fonction <code>isNaN()</code>. Si <code>number</code> n'est pas un nombre, alors
                    on affichera un message d'erreur.
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
                    Nous allons tester les valeurs entre 2 et number - 1 à l'aide d'une boucle <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Guide/Boucles_et_it%C3%A9ration#L'instruction_while" title="Lien vers défintion MDN" target="_blank">
                        <code>while( condition ) { instruction }</code>
                    </a> où nous testons la variable <code>number</code> tant que n sera strictement inférieur à
                    &radic;<code>number :</code>
                </p>
                <pre>
                    <code>
while (n <= Math.sqrt(number)) {
    instruction
}
                    </code>
                </pre>
                <p>
                    Nous commençons par calculer le résultat de <code>number / n</code> :
                </p>
                <pre>
                    <code class="js">
divide = number / n;
                    </code>
                </pre>
                <p>
                    Puis nous établissons une condition permettant de déterminer si <code>number</code> est
                    premier. Pour cela nous vérifions la valeur de <code>divide</code> ( =
                    <code>number / n</code>) ainsi que le reste de <code>number / n</code>. Si
                    <code>divide</code> est différent de 0 et que le reste de <code>number / n</code> est égale
                    à 0, nous assignons <code>false</code> à notre variable <code>bool</code> (qui nous sert de
                    confirmation) et nous arrêtons la boucle :
                </p>
                <pre>
                    <code class="js">
divide = number / n;
console.log('resultat: ' + divide);
// si le resultat est différent de 0 et que le reste est égale à 0
if ((divide != 0) && (number % n == 0)) {
    // on definit la variable bool à false
    bool = false;
    // et arrêt de la boucle
    break;
}
                    </code>
                </pre>

                <p>
                    Sinon, nous incrémentons <code>n</code> et la boucle continue.
                </p>
                <pre>
                    <code>
n++;
                    </code>
                </pre>
                <p>
                    Enfin nous établissons une conditions, en dehors de la boucle pour permettre un affichage
                    correct en fonction du résultat :
                </p>
                <pre>
                    <code class="">
if (bool == false) {
    // information
    alert('le nombre n\'est pas premier');
} else {
    // information
    alert('Ce nombre est premier');
}
                    </code>
                </pre>
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
// déclaration des variables
var n = 2;
var number = number = parseInt(window.prompt('Saisir un nombre :'));;
// on vérifie la saisie de l'utilisateur
// tant que la saisie n'est pas un nombre
while (isNaN(number)) {
    // on renouvèle la saisie
    number = parseInt(window.prompt('Saisissez un premier nombre :'));
}
    var divide = 0;
    var bool = true;
    // boucle parcourant les entiers entre n et racine carré du nombre saisi
    while (n <= Math.sqrt(number)) {
        // on divise notre nombre par n
        divide = number / n;
        console.log('resultat: ' + divide);
        // si le resultat est différent de 0 et que le reste est égale à 0
        if ((divide != 0) && (number % n == 0)) {
            // on definit la variable bool à false
            bool = false;
            // et arrêt de la boucle
            break;
        }
        // incrémentation de n
        n++;
    }
    // si le resultat est différent de 0 et que le reste est égale à 0
    if (bool == false) {
        // information
        alert('Ce nombre n\'est pas premier');
    } else {
        // information
        alert('Ce nombre est premier');
    }
                     </code>
                </pre>
                <button class="waves-effect waves-light btn" id="runPrimaryExo"><i class="material-icons right">play_arrow</i>Run code</button>
            </div>
        </li>
    </ul>
</div>