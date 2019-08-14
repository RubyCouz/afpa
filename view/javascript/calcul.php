
<div class="container">
    <h1>Calculatrice</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Analyse des besoins</div>
            <div class="collapsible-body">
                <p>
                    Pour la réalisation de cet exercice, nous devons demander à l'utilisateur de saisir 2 nombres,
                    ainsi qu'un opérateur. Nous devrons vérifier que l'utilisateur a bien rentré des valeurs
                    numériques et un opérateur valide. Enfin nous devrons tenir compte de la division par 0.
                </p>
                <p>
                    Nous définirons donc 3 variables :
                <ul>
                    <li>2 pour les nombres saisis par l'utilisateur</li>
                    <li>1 pour l'opérateur</li>
                </ul>
                </p>
                <pre>
                    <code class="js">
var firstNumber = parseFloat(window.prompt('Saisisez un nombre'));
var operator = window.prompt('Saisisez un opérateur');
var secondNumber = parseFloat(window.prompt('Saisisez un nombre'));
                    </code>
                </pre>
                <p>
                    Nous utilisons ici un <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/parseFloat" class="ui-link-muted" target="_blank">
                        <code>parseFloat()</code>
                    </a> afin de convertir les données saisies par l'utilisateur au format décimal.
                </p>
                <p>
                    L'algorithme :
                <ul>
                    <li><b>Si</b> <code>firstNumber</code> n'est pas un nombre</li>
                    <li>On affiche un message d'erreur</li>
                    <li><b>Si</b> <code>secondNumber</code> n'est pas un nombre</li>
                    <li>On affiche un message d'erreur</li>
                    <li><b>Si</b> <code>opérateur</code> est égale à "+"</li>
                    <li>On effectue l'opération <code>firstNumber + secondNumber</code></li>
                    <li><b>Sinon si</b> <code>opérateur</code> est égale à "-"</li>
                    <li>On effectue l'opération <code>firstNumber - secondNumber</code></li>
                    <li><b>Sinon si</b> <code>opérateur</code> est égale à "*"</li>
                    <li>On effectue l'opération <code>firstNumber * secondNumber</code></li>
                    <li><b>Sinon si</b> <code>opérateur</code> est égale à "/"</li>
                    <ul>
                        <li><b>Si</b> <code>secondNumber</code> est égale à 0</li>
                        <li>
                            On affiche un message d'erreur pour avertir l'utilisateur qu'on ne peut effectuer
                            une division par 0
                        </li>
                        <li><b>Sinon</b> on effectue l'opération <code>firstNumber / secondNumber</code></li>
                    </ul>
                    <li>
                        <b>Sinon</b> on affiche un message d'erreur pour avertir l'utilisateur que l'opérateur
                        n'est pas valide
                    </li>
                </ul>
                </p>
                <p>Notons que 2 manières de procéder sont possibles ici</p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">              
                Utilisation de la condition <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Instructions/if...else" target="_blank" class="ui-link-muted"> 
                    <code> if...else</code></a>                
            </div>
            <div class="collapsible-body">
                <p>
                    On commence par vérifie la saisie des 2 nombres à l'aide de la fonction
                    <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/isNaN" target="_blank" class="ui-link-muted">
                        <code>isNaN()</code>
                    </a>:
                </p>
                <pre>
                        <code class="js">
if (isNaN(firstNumber)) {
alert('Veuillez saisir un nombre valide svp!'); // information de l'erreur
}
if (isNaN(secondNumber)) {
alert('Veuillez saisir un nombre valide svp!'); // information de l'erreur
}
                        </code>
                </pre>
                <p>
                    Puis les conditions vérifiants l'operateur :
                </p>
                <ul>
                    <li>Si l'opérateur est égale à "+"</li>
                    <pre>
                            <code class="js">
if (operator == '+') {
  alert(firstNumber + secondNumber);
}
                            </code>
                    </pre>
                    <li>Sinon si l'opérateur est égale à "-"</li>
                    <pre>
                            <code class="js">
else if (operator == '-') {
    alert(firstNumber - secondNumber);
}
                            </code>
                    </pre>
                    <li>Sinon si l'opérateur est égale à "*"</li>
                    <pre>
                            <code class="js">
else if (operator == '*') {
    alert(firstNumber * secondNumber);
}
                            </code>
                    </pre>
                    <li>Sinon si l'opérateur est égale à "/", nous devrons prendre en compte la division par 0
                    </li>
                    <pre>
                            <code class="js">
else if (operator == '/') {
                            </code>
                    </pre>
                    <ul>
                        <li>Vérification de la valeur de <code>secondNumber</code></li>
                        <pre>
                                <code class="js">
if (secondNumber == 0) {
    alert('Impossible d\'effectuer une division par 0');
} else {
alert(firstNumber / secondNumber);
}
                                </code>
                        </pre>
                    </ul>
                    <li>Sinon on avertie l'utilisateur que l'opérateur saisi est incorrect</li>
                    <pre>
                            <code class="js">
else {
    /* en cas d'opérateur non valide */
    alert('Opérateur incorrect!!');
}
                            </code>
                    </pre>
                </ul>
                <p>Nous obtiendrons donc :</p>

                <pre>
                        <code class="js">
// déclaration des variables
    var firstNumber = parseFloat(window.prompt('Saisisez un nombre'));
    var operator = window.prompt('Saisisez un opérateur');
    var secondNumber = parseFloat(window.prompt('Saisisez un nombre'));
    // conditions vérifant la validité du premier nombre
    if (isNaN(firstNumber)) {
        alert('Veuillez saisir un nombre valide svp!'); // information de l'erreur
    }
    // conditions vérifant la validité du second nombre
    if (isNaN(secondNumber)) {
    alert('Veuillez saisir un nombre valide svp!'); // information de l'erreur
    }
    // début des conditions vérifiant les opérateurs
    if (operator == '+') {
        alert(firstNumber + secondNumber);
      }  else if (operator == '-') {
        alert(firstNumber - secondNumber);
    } else if (operator == '*') {
        alert(firstNumber * secondNumber);
    } else if (operator == '/') {
        // on vérifie que le second nombre n'est pas égale à 0
        if (secondNumber == 0) {
            alert('Impossible d\'effectuer une division par 0');
        } else {
        alert(firstNumber / secondNumber);
        }
    } else {
        /* en cas d'opérateur non valide */
        alert('Opérateur incorrect!!');
    }
                        </code>
                </pre>
                <button class="waves-effect waves-light btn" id="runCalculExo"><i class="material-icons right">play_arrow</i>Run code</button>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                Utilisation de la condition <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Instructions/switch" title="Lien vers la définition MDN" class="uk-link-muted" target="_blank">
                    <code> switch</code>
                </a>
            </div>
            <div class="collapsible-body">
                <p>
                    Une autre méthode plus rapide et plus efficace peut être utilisé, le <code>switch</code>.
                </p>
                <p>
                    Nous aurons toujours les mêmes vérifications avec un <code>if..else</code> pour la saisie des
                    nombres, le <code>switch</code> sera utilisé pour gérer les signes opératoire.
                </p>
                <p>
                    Nous selectionnons d'abord une expression à comparer (<code>operator</code> dans notre cas):
                </p>
                <pre>
                        <code class="js">
switch (operator) {
                        </code>
                </pre>
                <p>
                    Puis nous le comparons avec les différentes valeurs qui nous intéresse :
                </p>
                <ul>
                    <li>Cas du signe "+"</li>
                    <pre>
                            <code class="js">
case '+':
alert(firstNumber + '+' + secondNumber + ' = ' + (firstNumber + secondNumber));
break;
                            </code>
                    </pre>
                    <li>Cas du signe "-"</li>
                    <pre>
                            <code class="js">
case '-':
alert(firstNumber + '-' + secondNumber + ' = ' + (firstNumber - secondNumber));
break;
                            </code>
                    </pre>
                    <li>Cas du signe "*"</li>
                    <pre>
                            <code class="js">
case '*':
alert(firstNumber + '*' + secondNumber + ' = ' + (firstNumber * secondNumber));
break;
                            </code>
                    </pre>
                    <li>Cas du signe "/"</li>
                    <pre>
                            <code class="js">
case '/':
// on vérifie le second nombre pour éviter la division par 0
if (secondNumber == 0) {
    alert('division par 0 impossible');
} else {
    alert(firstNumber + '/' + secondNumber + ' = ' + (firstNumber / secondNumber));
}
break;
                            </code>
                    </pre>
                    <li>Si aucun des cas n'est vérifié :</li>
                    <pre>
                            <code class="js">
default:
alert('Veuillez saisir un opérateur valide !!!!');
                            </code>
                    </pre>
                </ul>
                <p>
                    Notons que nous utilisons tout de même un <code>if...else</code> pour gérer le cas de la
                    division par 0.
                </p>
                <p>
                    L'instruction <code>break;</code> permet d'informer que si la condition est vérifiée, il ne sera
                    pas nécessaire de poursuivre le reste du <code>switch</code>.
                </p>
                <p>L'instruction <code>default:</code> permet de gérer les autres cas qui n'entreraient pas dans
                    notre condition.</p>
                <p>
                    Nous obtiendrons donc au final :
                </p>
                <pre>
                    <code class="js">
var firstNumber = parseFloat(window.prompt('Saisisez un nombre'));
if (isNaN(firstNumber)) {
    alert('Veuillez saisir un nombre valide svp!'); // information de l'erreur
}
var operator = window.prompt('Saisisez un opérateur');
var secondNumber = parseFloat(window.prompt('Saisisez un nombre'));
if (isNaN(secondNumber)) {
alert('Veuillez saisir un nombre valide svp!'); // information de l'erreur
}
// condition vérifiant le signe opératoire
switch (operator) {
    // cas ou le signe opératoire est -
    case '-':
        alert(firstNumber + '-' + secondNumber + ' = ' + (firstNumber - secondNumber));
        break;
    // cas ou le signe opératoire est +
    case '+':
        alert(firstNumber + '+' + secondNumber + ' = ' + (firstNumber + secondNumber));
        break;
    // cas ou le signe opératoire est *
    case '*':
        alert(firstNumber + '*' + secondNumber + ' = ' + (firstNumber * secondNumber));
        break;
    // cas ou le signe opératoire est /
    case '/':
        // on vérifie le second nombre pour éviter la division par 0
        if (secondNumber == 0) {
            alert('division par 0 impossible');
        } else {
            alert(firstNumber + '/' + secondNumber + ' = ' + (firstNumber / secondNumber));
        }
        break;
    // sinon par défaut :
    default:
        alert('Veuillez saisir un opérateur valide !!!!');
}
                        </code>
                </pre>
                <button class="waves-effect waves-light btn" id="runCalculExoBis"><i class="material-icons right">play_arrow</i>Run code</button>
            </div>
        </li>
    </ul>
</div>