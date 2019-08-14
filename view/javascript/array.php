
<div class="container">
    <h1>Parcours d'un tableau</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Besoin</div>
            <div class="collapsible-body">
                <p>
                    Nous devons créer un programme permettant la création d'un tableau, puis via un menu afficher le
                    contenu du tableau, afficher le contenu d'un index saisi au clavier par l'utilisateur et
                    afficher le maximum et la moyenne des postes.
                </p>
                <p>
                    Pour cela nous utiliserons les fonctions suivantes :
                </p>
                <ul>
                    <li>
                        <code>GetInteger()</code> qui demande la saisie d'un entier par l'utilisateur
                    </li>
                    <li>
                        <code>initTab()</code> qui créera et initialisera le tableau
                    </li>
                    <li>
                        <code>saisieTab()</code> qui permettra de remplir le tableau
                    </li>
                    <li>
                        <code>afficheTab()</code> qui affichera le contenu du tableau
                    </li>
                    <li>
                        <code>rechercheTab()</code> qui permettra à l'utiisateur de sortir la valeur d'un index
                    </li>
                    <li>
                        <code>infoTab()</code> qui donnera la valeur maximum entrée dans le tableau et la moyenne
                        des postes
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header">getInteger()</div>
            <div class="collapsible-body">
                <p>
                    La fonction <code>getInteger()</code> permet la saise d'un entier. Nous insérons simplement un
                    <code>window.prompt()</code> dans la fonction. A chaque appel de la fonction, nous demanderons
                    un entier à l'utilisateur.
                </p>
                <pre>
                        <code class="js">
var integer = 0;
function getInteger() {
    var integer = parseInt(window.prompt('Saisissez une taille de tableau :')); //définition de la taille du tableau
 }
                        </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">initTab()</div>
            <div class="collapsible-body">
                <p>
                    La fonction <code>initTab()</code> va créer le tableau et l'initialiser :
                </p>
                <pre>
                        <code class="js">

// fonction initialisant le tableau
function initTab(integer) {
     // déclaration des variables
    var array = new Array(integer); // création du tableau
    array.splice(0, integer);
                                }
                        </code>
                </pre>
                <p>
                    Afin de récupérer la valeur saisie par l'utilisateur pour l'utiliser dans cette fonction, nous
                    passons la variable <code>integer</code> en paramêtre.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">saisieTab()</div>
            <div class="collapsible-body">
                <p>
                    La fonction <code>saisieTab()</code> va permettre à l'utilisateur de remplir le tableau :
                </p>
                <pre>
                        <code class="js">
// fonction permettant le remplissage du tableau
function saisieTab(integer, array) {
    var content = '';
    //boucle permettant le remplissage du tableau
    for (i = 0; i < integer; i++) {
        content = window.prompt('indiquer une valeur à entrer dans le tableau :');
        var arrayPush = array.push(content);
    }
}
                        </code>
                </pre>
                <p>
                    Comme vu précédemment, nous utilisons une boucle permettant la saisie et l'envoie de valeur dans
                    le tableau.
                </p>
                <p>
                    Comme pour l'entier, le tableau est passé en paramêtre afin de pouvoir le récupérer dans cette
                    fonction.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">afficheTab()</div>
            <div class="collapsible-body">
                <p>
                    La fonction <code>afficheTab()</code> affichera le contenu du tableau à la demande de
                    l'utilisateur :
                </p>
                <pre>
                        <code class="js">
// fonction affichant le tableau
function afficheTab(array) {
    //affichage du tableau
    alert(array.join(', '));
}
                        </code>
                </pre>
                <p>
                    On utilise une simple <code>alert()</code> combinée à la méthode <code>join()</code> pour
                    afficher le contenu du tableau.
                </p>
                <p>
                    Le tableau est passé en paramêtre afin de pouvoir le récupérer dans cette fonction.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">rechercheTab()</div>
            <div class="collapsible-body">
                <p>
                    La fonction <code>rechercheTab()</code> permettra à l'utilisateur de trouver une valeur selon
                    son index. Ce dernier pourra être saisi au clavier :
                </p>
                <pre>
                        <code class="js">
// fonction permettant la recherche de la valeur d'un index dans le tableau
function rechercheTab(array) {
    var index = parseInt(window.prompt('Saisissez un index :'))
    var search = array[index];
    alert(search);
}
                        </code>
                </pre>
                <p>
                    Nous commençons par demander à l'utilisateur de saisir un index, que nous stockerons ensuite
                    dans la variable <code>index</code>. Nous cherchons cette valeur avec <code>array[index]</code>,
                    qui nous retournera la valeur de l'index <code>index</code>. Enfin nous nous servons d'une
                    <code>alert()</code> pour afficher le résultat.
                </p>
                <p>
                    Le tableau est passé en paramêtre afin de pouvoir le récupérer dans cette fonction.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">infoTab()</div>
            <div class="collapsible-body">
                <p>
                    La fonction <code>initTab()</code> va créer le tableau et l'initialiser :
                </p>
                <pre>
                        <code class="js">
// fonction affichant la valeur maximale et la moyenne de l'ensemble des valeurs du tableau
function infoTab(array) {
    var max = Math.max(...array);
    var sum = 0;
    for (i = 0; i < array.length; i++) {
        sum += parseInt(array[i]);
    }
    var average = 0;
    average = sum / array.length;
    alert(average);
    alert(max);
}
                        </code>
                </pre>
                <p>
                    Cette fonction permettra d'afficher le maximum et la moyenne des postes saisis par
                    l'utilisateur.
                </p>
                <p>
                    Nous utilisons la fonction <code>Math.max()</code> pour sortir la valeur maximale du tableau.
                </p>
                <p>
                    Afin de faire la moyenne des postes, nous parcourons le tableau à l'aide d'une boucle pour
                    additionner les différentes valeurs. nous stockons ce résultat dans la variable
                    <code>sum</code>. Puis nous calculons la moyenne en divisant <code>sum</code> par la taille du
                    tableau.
                </p>
                <p>
                    Pour informer l'utilisateur, nous utilisons la fonction <code>alert()</code>.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Organisation des fonctions</div>
            <div class="collapsible-body">
                <p>
                    Il nous reste à faire le menu qui permettra à l'utilisateur de choisir l'affichage qu'il désire
                    :
                </p>
                <pre>
                        <code class="js">
var display = parseInt(window.prompt('choisissez une option :\n 1-Afficher le contenu du tableau \n 2-Afficher un index choisi \n 3-Afficher le maximum et la moyenne des postes saisis'));
                        </code>
                </pre>
                <p>
                    Nous pouvons maintenant organiser nos fonctions :
                </p>
                <ol>
                    <li>
                        On commence par la saisie d'un entier pour définir la taille du tableau
                    </li>
                    <pre>
                            <code class="js">
// fonction demandant à l'utilisateur la saisie d'un entier
function getInteger() {
    integer = parseInt(window.prompt('Saisissez une taille de tableau :')); //définition de la taille du tableau
}
                            </code>
                    </pre>
                    <li>
                        On créer et on initialise le tableau
                    </li>
                    <pre>
                            <code class="js">
// fonction demandant à l'utilisateur la saisie d'un entier
function getInteger() {
    integer = parseInt(window.prompt('Saisissez une taille de tableau :')); //définition de la taille du tableau
} 
// fonction initialisant le tableau
function initTab(integer) {
    // déclaration des variables
    array = new Array(integer); // création du tableau
    array.splice(0, integer);
                                    }  
                            </code>
                    </pre>
                    <li>
                        On demande à l'utilisateur de remplir le tableau
                    </li>
                    <pre>
                            <code class="js">
// fonction demandant à l'utilisateur la saisie d'un entier
function getInteger() {
    integer = parseInt(window.prompt('Saisissez une taille de tableau :')); //définition de la taille du tableau
} 
// fonction initialisant le tableau
function initTab(integer) {
    // déclaration des variables
    array = new Array(integer); // création du tableau
    array.splice(0, integer);                                                                               }
// fonction permettant le remplissage du tableau
function saisieTab(integer, array) {
    var content = '';
    var count = 0;
    //boucle permettant le remplissage du tableau
    for (count = 0; count < integer; count++) {
        content = window.prompt('indiquer une valeur à entrer dans le tableau :');
        var arrayPush = array.push(content);
    }
}                                
                            </code>
                    </pre>
                    <li>
                        On affiche le menu permettant à l'utilisateur de faire un choix
                    </li>
                    <pre>
                            <code>
while(choice == 1 || choice == 2 || choice == 3) {
    switch(choice) {
        case 1:
            afficheTab();
            break:
        case 2:
            rechercheTab();
            break:
        case 1:
            infoTab();
            break:
        default:
        alert('Je n\'ai pas compris votre choix');
        choice = parseInt(window.prompt('choisissez une option :\n 1-Afficher le contenu du tableau \n 2-Afficher un index choisi \n 3-Afficher le maximum et la moyenne des postes saisis'));
    }
}
                            </code>
                    </pre>
                </ol>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat final</div>
            <div class="collapsible-body">
                <p>
                    Nous obtenons le code suivant :
                </p>
                <pre>
                <code class="js">
// fonction demandant à l'utilisateur la saisie d'un entier
function getInteger() {
    integer = parseInt(window.prompt('Saisissez une taille de tableau :')); //définition de la taille du tableau
} 
// fonction initialisant le tableau
function initTab(integer) {
    // déclaration des variables
    array = new Array(integer); // création du tableau
    array.splice(0, integer);                                                                               }
// fonction permettant le remplissage du tableau
function saisieTab(integer, array) {
    var content = '';
    var count = 0;
    //boucle permettant le remplissage du tableau
    for (count = 0; count < integer; count++) {
        content = window.prompt('indiquer une valeur à entrer dans le tableau :');
        var arrayPush = array.push(content);
    }
}   
                                
// fontion affichant le tableau
function afficheTab(array) {
    //affichage du tableau
    alert(array.join(', '));
    console.log(array);
}
// fonction permettant la recherche de la valeur d'un index dans le tableau
function rechercheTab(array) {
    var index = parseInt(window.prompt('Saisissez un index :'))
    var search = array[index];
    alert(search);
}
// fonction affichant la valeur maximale et la moyenne de l'ensemble des valeurs du tableau
function infoTab(array) {
    var max = Math.max(...array);
    var sum = 0;
    for (i = 0; i < array.length; i++) {
        sum += parseInt(array[i]);
    }
    console.log(sum);
    var average = 0;
    average = parseInt(sum / array.length);
    alert(average);
    alert(max);
}                           
        
// appel des fonctions
getInteger();
initTab(integer);
saisieTab(integer, array);
var choice = parseInt(window.prompt('choisissez une option :\n 1-Afficher le contenu du tableau \n 2-Afficher un index choisi \n 3-Afficher le maximum et la moyenne des postes saisis'));
while(choice == 1 || choice == 2 || choice == 3) {
    switch(choice) {
         case 1:
            afficheTab();
            break:
        case 2:
            rechercheTab();
            break:
         case 1:
            infoTab();
            break:
         default:
         alert('Je n\'ai pas compris votre choix');
         choice = parseInt(window.prompt('choisissez une option :\n 1-Afficher le contenu du tableau \n 2-Afficher un index choisi \n 3-Afficher le maximum et la moyenne des postes saisis'));
    }
}
                </code>
                </pre>
                <button class="waves-effect waves-light btn" id="runArrayExo"><i class="material-icons right">play_arrow</i>Run code</button>
            </div>
        </li>
    </ul>
</div>