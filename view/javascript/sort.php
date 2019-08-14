
<div class="container">
    <h1>Tri à bulles</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Besoin</div>
            <div class="collapsible-body">
                <p>
                    Le principe d'un tri à bulles est de parcourir un tableau à l'aide d'une boucle. A chaque tour de boucle et en partant de la fin du tableau, on compare 2 valeurs cote à cote. Si la deuxième est supérieur à la première, on intervertit les valeurs. On effectue cette action pour toutes les valeurs, la boucle tourne tant que le tableau n'est pas trié par ordre croissant.
                </p>
                <p>
                    Hormis les différentes fonctions de mise en place du tableau, nous devrons nous servir d'une variable pour localiser le premier index, une autre pour le second index, et enfin un variable pour stocker un des indexs de manière temporaire :
                </p>
                <pre>
                    <code class="js">
var index1 = 0;
var index2 = 0;
var temp = 0;
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Construction du programme</div>
            <div class="collapsible-body">
                <p>
                    Nous devons commencer par faire une boucle <code>for()</code> afin de parcourir le tableau et prendre l'index n°1 :
                </p>
                <pre>
                    <code class="js">
for(index1 = array.length; index1 >= 0; index1--) {

}
                    </code>
                </pre>
                <p>
                    Puis nous intégrons à l'intérieur une autre boucle pour prendre l'index n°2 :
                </p>
                <pre>
                    <code class="js">
for(index1 = array.length; index1 >= 0; index1--) {
    for(index2 = array.length; index2 >= 0; index2--) {

    }
}
                    </code>
                </pre>
                <p>
                    A l'intérieur de cette seconde boucle, nous incluons notre condition comparant les 2 indexs; si la valeur de l'index 2 est inférieur à la valeur de l'index 1, alors nous intervertissons les deux valeurs en stockant l'une des 2 dans la variable de stockage :
                </p>
                <pre>
                    <code class="js">
for(index1 = array.length; index1 >= 0; index1--) {
    for(index2 = array.length; index2 >= 0; index2--) {
        if(array[index2] < array[index1]) {
            temp = array[index2];
            array[index2] = array[index1];
            array[index1] = temp;
        }              
    }
}                  
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat final</div>
            <div class="collapsible-body">
                <p>
                    En assemblant notre code, nous obtiendrons :
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
        content = parseInt(window.prompt('indiquer une valeur à entrer dans le tableau :'));
        var arrayPush = array.push(content);
    }
}   
getInteger();
initTab(integer);
saisieTab(integer, array);
alert('tableau avant tri : ' + array.join(, ));
var index1 = 0;
var index2 = 0;
var temp = 0;
for(index1 = array.length; index1 >= 0; index1--) {
    for(index2 = array.length; index2 >= 0; index2--) {
        if(array[index2] < array[index1]) {
            temp = array[index2];
            array[index2] = array[index1];
            array[index1] = temp;
        }              
    }
} 
alert('tableau après tri : ' + array.join(, ));      
                        </code>
                </pre>
                <button class="waves-effect waves-light btn" id="runSortExo"><i class="material-icons right">play_arrow</i>Run code</button>
            </div>
        </li>
    </ul>
</div>
