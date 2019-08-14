
<div class="container">
    <h1>Liste des entiers inférieurs à N</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Besoin</div>
            <div class="collapsible-body">
                <p>
                    Pour créer un programme nous affichant le liste des entiers inférieurs à N, nous devons définir une variable nous permettant de demander une saisie d'un nombre, puis une autre qui nous permettra de parcourir les entiers inférieurs à N:
                </p>
                <pre>
                    <code class="js">
var number;
var i = 0;     
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Vérification des données saisies par l'utilisateur</div>
            <div class="collapsible-body">
                <p>
                    Nous devons établir une vérification de la saisie, en vérifiant que la saisie est bien un nombre à l'aide de la fonction <code>isNaN()</code>. Si N (<code>number</code>) n'est pas un nombre, alors on affichera un message d'erreur. Nous pouvons aller plus loin maintenant en installant un boucle qui demandera une saisie tant que celle n'est pas correct:
                </p>
                <pre>
                    <code class="js">
// on vérifie la saisie de l'utilisateur
 // tant que la saisie n'est pas un nombre
 while (isNaN(number)) {
     // on renouvèle la saisie
     number = parseInt(window.prompt('Saisissez un nombre :'));
 }
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Construction de la boucle</div>
            <div class="collapsible-body">
                <p>
                    Pour parcourir et afficher tous les entiers inférieurs à N (<code>number</code>), nous utiliserons une boucle <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Guide/Boucles_et_it%C3%A9ration#L'instruction_for" class="uk-link-muted" title="Lien vers la définotion MDN" target="_blank">
                        <code class="js">
                            for()
                        </code>
                    </a>:
                </p>
                <pre>
                    <code class="js">
for( instruction ) {
résultat, affichage...
}
                    </code>
                </pre>
                <p>
                    Ce qui donnera dans ce cas :
                </p>
                <pre>
                    <code>
for (i = 0; i < number; i++) {
    console.log(i);
}
                    </code>
                </pre>
                <p>
                    Explication : ici <code>i</code> symbolise notre "compteur de tour de boucle" (nombre de fois où l'action sera répété). On initialise <code>i</code> à 0 (vu que nous cherchons à afficher les entiers de 0 à N), on définit que <code>i</code> reste strictement inférieur à N (saisie de l'utilisateur), et enfin on incrémente <code>i</code> pour effectuer un autre tour de boucle.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat final</div>
            <div class="collapsible-body">
                <p>
                    Au final nous obtenons :
                </p>
                <pre>
                    <code class="js">
// déclaration des variables
var number;
var i = 0;
// on vérifie la saisie de l'utilisateur
// tant que la saisie n'est pas un nombre
while (isNaN(number)) {
    // on renouvèle la saisie
    number = parseInt(window.prompt('Saisissez un nombre :'));
}


// début de la boucle for affichant les entiers inférieurs à number
for (i = 0; i < number; i++) {
    console.log(i);
}
                    </code>
                </pre>
                <button class="waves-effect waves-light btn" id="runIntegerExo"><i class="material-icons right">play_arrow</i>Run code</button>
            </div>
        </li>

    </ul>
</div>
