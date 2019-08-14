
<div class="container">
    <h1>Nombre magique</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Besoin</div>
            <div class="collapsible-body">
                <p>
                    Un nombre est défini au hasard par la variable suivante :
                    <code> var magic = parseInt(Math.random*100);</code>. Nous devons créer un programme pour
                    permettre à l'utilisateur de deviner ce nombre. En retour, le programme devra lui indiquer si la
                    réponse est juste, ou lui donner des indices (plus grand, plus petit...).
                </p>
                <p>
                    Nous auront donc les variables suivantes :
                </p>
                <pre>
                        <code class="js">
var magic = parseInt(Math.random() * 100);;
var userNumber = 0;
var question = true;
var count = 0;
                        </code>
                </pre>
                <p>
                    <code>magic</code> notre nombre à trouver, <code>userNumber</code> sera la proposition de
                    l'utilisateur, <code>question</code> pour demander si l'utilisateur voudra rejouer, et
                    <code>count</code> servira à indiquer en combien de coups l'utilisateur à trouver la bonne
                    réponse.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Vérification des données saisies par l'utilisateur</div>
            <div class="collapsible-body">
                <p>
                    Nous devons établir une vérification de la saisie, en vérifiant que la saisie est bien un nombre
                    à l' aide de la fonction <code>isNaN()</code>. Si <code>userNumber</code> n'est pas un nombre,
                    alors on affichera un message d'erreur.
                </p>
                <pre>
                        <code class="js">
// on vérifie la saisie de l'utilisateur
 // tant que la saisie n'est pas un nombre
 while (isNaN(userNumber)) {
     // on renouvèle la saisie
     userNumber = parseInt(window.prompt('Saisissez un nombre :'));
 }
                        </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Construction de la boucle</div>
            <div class="collapsible-body">
                <p>
                    Nous allons utiliser la boucle <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Guide/Boucles_et_it%C3%A9ration#L'instruction_while" class="uk-link-muted" title="Lien vers défintion MDN" target="_blank">
                        <code>while( condition ) { instruction }</code>
                    </a> : tant que l'utilisateur n'aura pas trouver la bonne solution, le programme donne des
                    indices.
                </p>
                <pre>
                    <code>
while (userNumber != magic) {
    instruction
}
                    </code>
                </pre>
                <p>
                    Il nous suffit juste de mettre en instruction de cette boucle les différents cas :
                </p>
                <ul>
                    <li>lorsque <code>userNumber = magic</code></li>
                    <pre>
                        <code class="js">
if (userNumber == magic) {
    // affichage d'un message, plus le nombre d'essais
    alert('Félicitation!! Vous avez trouvé la bonne réponse : ' + magic + ' \nNombre de coup nécessaire : ' + (parseInt(count) + 1));
}
                        </code>
                    </pre>
                    <li>lorsque <code>userNumber > magic</code></li>
                    <pre>
                        <code class="js">
if (userNumber > magic) {
    // on informe l'utilisateur du résultat
    alert('Plus petit');
    count++;
}
                        </code>
                    </pre>
                    <li>lorsque <code>userNumber < magic</code> </li> <pre>
                                <code class="js">
if (userNumber < magic) { // on informe l'utilisateur du résultat alert('Plus grand'); count++; } 
                                </code> 
                    </pre> 
                </ul> 
                <p>
                    En dehors de la boucle, nous demandons à l'utilisateur s'il désire rejouer :
                </p>
                <pre>
                            <code class="js">
question = window.confirm('Voulez-vous rejouer?');
                            </code>
                </pre>
                <p>
                    S'il refuse, affichage d'un message :
                </p>
                <pre>
                            <code class="js">
if (question == false) {
    alert('Merci d\'avoir participer');
}
                            </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat final</div>
            <div class="collapsible-body">
                <p>
                    Pour que le tout s'articule correctement, nous allons tout englober dans une boucle : tant que
                    l'utilisateur voudra jouer, le programme déterminera un nombre et renseignera l'utilisateur en
                    lui donnant différent indice.
                </p>
                <p>
                    Ce qui nous donne :
                </p>
                <pre>
                    <code class="js">
 // définition des variables utiles pour l'exécution du code
 var magic = 0;
 var userNumber = 0;
 var question = true;
 var count = 0;
 // début de la boucle permettant de rejouer
 while (question == true) {
     //definition d'un nombre aléatoire
     magic = parseInt(Math.random() * 100);
     
     //début de la boucle comprenant les conditions de comparaison du nbre choisi avec l'utilisateur
     while (userNumber != magic) {
         //demande de saisie
         userNumber = window.prompt('Saisissez un nombre :');
                         // on vérifie la saisie de l'utilisateur
             // tant que la saisie n'est pas un nombre
             while (isNaN(userNumber)) {
                 // on renouvèle la saisie
                 userNumber = parseInt(window.prompt('Saisissez un nombre :'));
             }
         // si les 2 nombres sont identiques
         if (userNumber == magic) {
             // affichage d'un message, plus le nombre d'essais
             alert('Félicitation!! Vous avez trouvé la bonne réponse : ' + magic + ' \nNombre de coup nécessaire : ' + (parseInt(count) + 1));
         }
         // si le nombre random est plus grand
         if (userNumber < magic) {
             // on informe l'utilisateur du résultat
             alert('Plus grand');
             count++;
         }
         // si le nombre random est plus petit
         if (userNumber > magic) {
             // on informe l'utilisateur du résultat
             alert('Plus petit');
             count++;
         }
     }
     // demande pour rejouer
     question = window.confirm('Voulez-vous rejouer?');
     // si l'utilisateur refuse
     if (question == false) {
         alert('Merci d\'avoir participer');
     }
 }   
 
                     </code>
                </pre>
                <button class="waves-effect waves-light btn" id="runMagicExo"><i class="material-icons right">play_arrow</i>Run code</button>
            </div>
        </li>
    </ul>
</div>