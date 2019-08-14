
<div class="container">
    <h1>String Token</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Besoin</div>
            <div class="collapsible-body">
                <p>
                    Nous devons créer un programme permettant l'extraction d'un n-ième mot parmis plusieurs mots saisis par l'utilisateur.
                </p>
                <p>
                    Une variable pour stocker tous les mots sera créée :
                </p>
                <pre>
                    <code class="js">
var str1 = window.prompt('Veuillez entrer une liste de mots séparés par ", ; . : / ou -" :');   
                    </code>
                </pre>
                <p>
                    Nous créons également un variable pour stocker un séparateur, qui sera definis et indiqué à l'utilisateur :
                </p>
                <pre>
                    <code class="js">
var str2 = window.prompt('Saisissez le séparateur utilisé (, ; . : / ou -)');
                    </code>
                </pre>
                <p>
                    Une variable d'affichage sera définie :
                </p>
                <pre>
                    <code class="js">
var display = document.getElementById('table').insertAdjacentHTML('beforeend', '<p>Le ' + n + 'ème mot de la chaine de caractère est ' + nWord + '</p>');
                    </code>
                </pre>
                <p>
                    Il nous faudra aussi séparer chaque de notre chaine de caractère. Ce procédé se fera à l'aide de la méthode
                    <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/String/split" title="Lien vers la défintion MDN" class="uk-link-muted" target="_blank">
                        <code>split()</code>
                    </a>.
                    Le résultat sera retourné sous la forme d'un tableau, plus facilement expoitable.
                </p>
                <p>
                    Enfin, nous déterminerons la position du n-ième mot à l'aide de la variable <code>nWord</code> :
                </p>
                <pre>
                    <code class="js">
var nWord = word[n - 1];
                    </code>
                </pre>
                <p>
                    <code>n - 1</code> indique l'index du n-ième mot. Un tableau javascript commence à l'index 0. Pour simplifier la saisi de l'utilisateur, nous effectuons le calcul à sa place.
                </p>
                <p>
                    Exemple : L'utilisateur veut le 4ème mot saisi. Il saisira donc le chiffre 4 pour le trouver. Puisque notre tableau commence à l'index 0, le premier mot se trouvera à l'index 0, le deuxième sur l'index 1, ... , le quatrième se trouvera sur l'index 3 (4 - 1 ; 4 étant la saisie de l'utilisateur, soit <code>n</code> ).
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Définition de la fonction</div>
            <div class="collapsible-body">
                <p>
                    Une fois nos variables définies, nous pouvons établir notrre fonction de cette manière :
                </p>
                <pre>
                    <code class="js">
// déclaration des variables
var str1 = window.prompt('Veuillez entrer une liste de mots séparés par ", ; . : / ou -" :');
var str2 = window.prompt('Saisissez le séparateur utilisé (, ; . : / ou -)');
var n = window.prompt('Saisissez le nième mot de la chaine à extraire :');
//déclaration de la fonction retournant la position d'un mot donné dans une chaine de caractère
function strtok(str1, str2, n) {
  var word = str1.split(str2);
  var nWord = word[n - 1];
  var display = document.getElementById('table').insertAdjacentHTML('beforeend', '<p>Le ' + n + 'ème mot de la chaine de caractère est ' + nWord + '</p>');
  console.log(display);
} 
                    </code>
                </pre>
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
// déclaration des variables
var str1 = window.prompt('Veuillez entrer une liste de mots séparés par ", ; . : / ou -" :');
var str2 = window.prompt('Saisissez le séparateur utilisé (, ; . : / ou -)');
 var n = window.prompt('Saisissez le nième mot de la chaine à extraire :');
 //déclaration de la fonction retournant la position d'un mot donné dans une chaine de caractère
 function strtok(str1, str2, n) {
  var word = str1.split(str2);
  var nWord = word[n - 1];
  var display = document.getElementById('table').insertAdjacentHTML('beforeend', '<p>Le ' + n + 'ème mot de la chaine de caractère est ' + nWord + '</p>');
  console.log(display);
} 
strtok();
                    </code>
                </pre>
                <a href="fonction/exemple4.html" class="waves-effect waves-light btn" target="_blank"><i class="material-icons right">play_arrow</i>Run code</a>
            </div>
        </li>
    </ul>
</div>
