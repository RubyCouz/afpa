
<div class="container">
    <h1>Saisie de prénoms</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Besoin</div>
            <div class="collapsible-body">
                <p>
                    Nous devons créer un programme permettant à l'utilisateur de saisir une liste de prénoms. Le programme doit demander à l'utilisateur de saisir un prénom tant que ce dernier ne laisse pas le champ vide. Enfin nous devons afficher le nombre de prénoms et les prénoms saisis.
                </p>
                <p>
                    Pour cet exercice, nous devons donc utiliser 2 variables :
                </p>
                <ul>
                    <li>Une pour stocker le(s) prénom(s) saisi(s)</li>
                    <li>Une qui nous servira de compteur</li>
                </ul>
                <pre>
                    <code class="js">
var count = 1;
var firstname = '';
                    </code>
                </pre>
                <p>
                    Nous ferons ensuite une boucle permettant la répétition de la saisie du prénom, on incrémente à chaque tour la valeur de la variable <code>count</code> et enfin nous affichons nos résultats dans la console.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Construction de la boucle</div>
            <div class="collapsible-body">
<p>
                    Faire une boucle ici revient à dire au programme : "<b>fais</b> une demande de saisie <b>tant que </b> l'utilisateur remplie le champ de saisie".
                </p>
                <p>
                    Nous utiliserons donc ici une boucle
                    <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Guide/Boucles_et_it%C3%A9ration#L'instruction_do...while" class="uk-link-muted" title="Lien vers défintion MDN" target="_blank">
                        <code>do{}..while()</code>
                    </a>.
                </p>
                <pre>
                    <code class="js">
do{ 
instruction 
} while(condition)
                    </code>
                </pre>
                <p>
                    L'instruction sera la demande de saisie, à laquelle nous ajouterons une condition contrôlant la saisie (ou non) de l'utilisateur afin de procéder à un affichage :
                </p>
                <pre>
                    <code class="js">
firstname = window.prompt('Saisissez le prénom N° ' + count + '\n ou click sur Annuler pour arréter la saisie.');
// on vérifie la saisie, si le prénom n'est pas null ou absent
if (firstname != null && firstname != '') {
    // on affiche le prénom ainsi que son numéro
    console.log('Prénom N° ' + count + ': ' + firstname);
    // on incrémente la variable count
    count++;
}
                    </code>
                </pre>
                <p>
                    L'affichage se fait dans la console (activée sur la navigateur en appuyant sur f12) grâce à <code>console.log</code>.
                </p>
                <p>
                    On insère ensuite notre condition :
                </p>
                <pre>
                    <code class="js">
while (firstname != null && firstname != '');
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat final</div>
            <div class="collapsible-body">
 <p>
                    En assemblant nos morceaux de codes, nous obtenons :
                </p>
                <pre>
                    <code>
// déclaration des variables
var firstname = '';
var count = 1;
do {
    // on demande à l'utilisateur de saisir un prénom
    firstname = window.prompt('Saisissez le prénom N° ' + count + '\n ou click sur Annuler pour arréter la saisie.');
    // on vérifie la saisie, si le prénom n'est pas null ou absent
 if (firstname != null && firstname != '') {
        // on affiche le prénom ainsi que son numéro
        console.log('Prénom N° ' + count + ': ' + firstname);
        // on incrémente la variable count
        count++;
    }
 // tant que firstname est différent de null et n'est pas une chaine de caratères vide 
} while (firstname != null && firstname != '');
                    </code>
                </pre>
                <button class="waves-effect waves-light btn" id="runSaisieExo"><i class="material-icons right">play_arrow</i>Run code</button>
            </div>
        </li>
    </ul>
</div>