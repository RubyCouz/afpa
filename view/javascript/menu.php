
<div class="container">
    <h1>Menu</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Besoin</div>
            <div class="collapsible-body">
                <p>
                    Nous devons créer plusieurs fontions permettant la navigation dans un menu. Ayant à notre
                    disposition 4 choix, nous aurons donc 4 fonctions.
                </p>
                <p>
                    Nous proposerons nos choix à l'utilisateur via une fenêtre lancée avec la fonction
                    <code>prompt()</code>
                </p>
                <p>
                    Les choix possibles portant sur des exercices vus précedemment, nous avons juste à reprendre le
                    code déjà établi et à l'inclure dans nos fonctions.
                </p>
                <p>
                    Les appels des fonctions seront articulés à l'aide de conditions, en utilisant
                    <code>switch</code>.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Création des fonctions</div>
            <div class="collapsible-body">

                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3"><a class="active" href="#test1">Fonction multiple</a></li>
                            <li class="tab col s3"><a href="#test2">Fonction somme et moyenne</a></li>
                            <li class="tab col s3"><a href="#test3">Fonction recherche du nombre de voyelle</a></li>
                            <li class="tab col s3"><a href="#test4">Fonction recherche du nombre de caractère suivant</a></li>
                        </ul>
                    </div>
                    <div id="test1" class="col s12">
                        <pre>
            <code class="js">
function multiple() {
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
}
                </code>
                        </pre>
                    </div>
                    <div id="test2" class="col s12">
                        <pre>
            <code class="js">
function sum() {
    var number = parseInt(window.prompt(un entier :'));
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
    }
            </code>
                        </pre>
                    </div>
                    <div id="test3" class="col s12">
                        <pre>
            <code class="js">
function() voyelle{
    // définition des variables
    var word = window.prompt('Saisir un mot :').toLowerCase();
    // on vérifie la saisie de l'utilisateur
     // tant que la saisie n'est pas un nombre
     while (!isNaN(word)) {
         // on renouvèle la saisie
         word = parseInt(window.prompt('Saisissez un mot :'));
     }
         var wordLength = word.length;
         var count = 0;
         // début de la boucle qui parcourir le mot
         for (i = 0; i < wordLength; i++) {
             // utilisation d'un switch pour vérifier le cas de chaque voyelle
             switch (word[i]) {
                 case 'a':
                 case 'e':
                 case 'i':
                 case 'o':
                 case 'u':
                 case 'y':
                     // incrémentation de notre compte
                     count++;
                     break;
                 default: ' ';        
                 }     
                }
         // affichage
         console.log('nombre de voyelle dans ' + word + ' : ' + count);
}

            </code>
                        </pre>
                    </div>
                    <div id="test4" class="col s12">

                    </div>
                </div>
                <pre>
            <code class="js">
 //déclaration de la fonction calculant le nombre d'une lettre saisie dans un mot donnée par l'utilisateur
 function countLetter() {
     var phrase = window.prompt('Saisissez une phrase :');
     var lettre = window.prompt('Saisissez une lettre :');
     //déclaration des variables
     var count = 0;
     // variable définissant la position de la lettre dans le mot
     var posLetter = phrase.indexOf(lettre);
     // boucle permettant de compter le nombre de lettre demandée dans le mot
     while (posLetter != -1) {
         count++;
         posLetter = phrase.indexOf(lettre, posLetter + 1);
     }
     // variable définissant l'affichage dans le html
     var table = document.getElementById('table').insertAdjacentHTML('beforeend', '<p>Cette phrase contient ' + count + ' lettre(s) "' + lettre + '"</p > ');
     }
            </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Mise en place de la fenetre <code>prompt()</code></div>
            <div class="collapsible-body">
                <p>
                    Une fenêtre <code>prompt()</code>, sans difficulté particulière :
                </p>
                <pre>
                    <code class="js">
var choice = parseInt(window.prompt(
    '1-Multiples \n
     2-Somme et moyenne \n
     3-Recherche du nombre de voyelle \n
     4-Recherche du nombre des caractères suivants \n
     Entrez votre option :'
));
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Mise en place de nos conditions</div>
            <div class="collapsible-body">
                <p>
                    Puisque que nous devons appeler une fonction selon la valeur de <code>choice</code>, nous
                    utiliserons ici un <code>switch</code> pour notre condition :
                </p>
                <pre>
                                <code class="js">
switch(choice) {
    case 1:
      multiple();
      break;
    case 2:
      sum();
      beak;
    case 3:
      voyelle();
      break;
    case 4:
      countLetter();
      break;
    default:
    alert('Choix non valide, veuillez recommencer svp ...')
    var choice = parseInt(window.prompt(
      '1-Multiples \n
       2-Somme et moyenne \n
       3-Recherche du nombre de voyelle \n
       4-Recherche du nombre des caractères suivants \n
       Entrez votre option :'
  ));
}
                                </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat final</div>
            <div class="collapsible-body">
                <p>
                    Nous obtenons alors :
                </p>
                <pre>
                        <code class="js">
/*
*proposition de choix
*/
 var choice = parseInt(window.prompt(
    '1-Multiples \n2 - Somme et moyenne \n3 - Recherche du nombre de voyelle \n4 - Recherche du nombre des caractères suivants \nEntrez votre option : '
));
/**
* fonction multiple :
*/
function multiple() {
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
        /**
        * fonction somme
        */
    }
}
function sum() {
    var number = parseInt(window.prompt('Saisissez un entier : '));
    var total = 0;
    var average = 0;
    var i = 0;
    // on vérifie la saisie de l'utilisateur
    // tant que la saisie n'est pas un nombre
    while (isNaN(number)) {
        // on renouvèle la saisie
        number = parseInt(window.prompt('Saisissez un premier nombre :'));
    }
    while (number != 0) {
        total += number;
        i++
        average = total / i
        console.log('somme : ' + total);
        console.log('moyenne : ' + average);
        number = parseInt(window.prompt('Saisir un entier :'))
    }
}
/**
*fonction voyelle
*/
function voyelle() {
    // définition des variables
    var word = window.prompt('Saisir un mot :').toLowerCase();
    // on vérifie la saisie de l'utilisateur
    // tant que la saisie n'est pas un nombre
    while (!isNaN(word)) {
        // on renouvèle la saisie
        word = parseInt(window.prompt('Saisissez un mot :'));
    }
    var wordLength = word.length;
    var count = 0;
    // début de la boucle qui parcourir le mot
    for (i = 0; i < wordLength; i++) {
        // utilisation d'un switch pour vérifier le cas de chaque voyelle
        switch (word[i]) {
            case 'a':
            case 'e':
            case 'i':
            case 'o':
            case 'u':
            case 'y':
                // incrémentation de notre compte
                count++;
                break;
            default: ' ';
        }
    }
    // affichage
    console.log('nombre de voyelle dans ' + word + ' : ' + count);
}
/**
* fonction comptage de lettre
*/
function countLetter() {
    //déclaration des variables
    var phrase = window.prompt('Saisissez une phrase :');
    var lettre = window.prompt('Saisissez une lettre :');
                    
    var count = 0;
    // variable définissant la position de la lettre dans le mot
    var posLetter = phrase.indexOf(lettre);
    // boucle permettant de compter le nombre de lettre demandée dans le mot
    while (posLetter != -1) {
        count++;
        posLetter = phrase.indexOf(lettre, posLetter + 1);
    }
    // variable définissant l'affichage dans le html
    var table = document.getElementById('table').insertAdjacentHTML('beforeend', '<p>Cette phrase contient ' + count + ' lettre(s) "' + lettre + '"</p > ');
}
 
/**
* condition
*/
switch (choice) {
    case 1:
        multiple();
        break;
    case 2:
        sum();
        break;
    case 3:
        voyelle();
        break;
    case 4:
        countLetter();
        break;
    default:
        alert('Choix non valide, veuillez recommencer svp ...')
        var choice = parseInt(window.prompt(
            '1-Multiples \n2 - Somme et moyenne \n3 - Recherche du nombre de voyelle \n4 - Recherche du nombre des caractères suivants \nEntrez votre option : '
        ));
}
                  
                   
                        </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Pour aller plus loin</div>
            <div class="collapsible-body">
                <p>
                    Nous pouvons mettre notre code dans une boucle, ce qui nous permettra de répéter la demande de
                    choix. Ceci évitera le rechargement de la page pour redémarrer le programme :
                </p>
                <pre>
                    <code class="js">
var choice = parseInt(window.prompt('1-Multiples \n2 - Somme et moyenne \n3 - Recherche du nombre de voyelle \n4 - Recherche du nombre des caractères suivants \nEntrez votre option : '
));
console.log(choice);
while (choice == 1 || choice == 2 || choice == 3 || choice == 4) {
                            
    /**
    * fonction multiple :
    */
    function multiple() {
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
            /**
            * fonction somme
            */
        }
    }
    function sum() {
        var number = parseInt(window.prompt('Saisissez un entier : '));
        var total = 0;
        var average = 0;
        var i = 0;
        // on vérifie la saisie de l'utilisateur
        // tant que la saisie n'est pas un nombre
        while (isNaN(number)) {
            // on renouvèle la saisie
            number = parseInt(window.prompt('Saisissez un premier nombre :'));
        }
        while (number != 0) {
            total += number;
            i++
            average = total / i
            console.log('somme : ' + total);
            console.log('moyenne : ' + average);
            number = parseInt(window.prompt('Saisir un entier :'))
        }
    }
    /**
    *fonction voyelle
    */
    function voyelle() {
        // définition des variables
        var word = window.prompt('Saisir un mot :').toLowerCase();
        // on vérifie la saisie de l'utilisateur
        // tant que la saisie n'est pas un nombre
        while (!isNaN(word)) {
            // on renouvèle la saisie
            word = parseInt(window.prompt('Saisissez un mot :'));
        }
        var wordLength = word.length;
        var count = 0;
        // début de la boucle qui parcourir le mot
        for (i = 0; i < wordLength; i++) {
            // utilisation d'un switch pour vérifier le cas de chaque voyelle
            switch (word[i]) {
                case 'a':
                case 'e':
                case 'i':
                case 'o':
                case 'u':
                case 'y':
                    // incrémentation de notre compte
                    count++;
                    break;
                default: ' ';
            }
        }
        // affichage
        console.log('nombre de voyelle dans ' + word + ' : ' + count);
    }
    /**
    * fonction comptage de lettre
    */
    function countLetter() {
        //déclaration des variables
        var phrase = window.prompt('Saisissez une phrase :');
        var lettre = window.prompt('Saisissez une lettre :');
                            
        var count = 0;
        // variable définissant la position de la lettre dans le mot
        var posLetter = phrase.indexOf(lettre);
        // boucle permettant de compter le nombre de lettre demandée dans le mot
        while (posLetter != -1) {
            count++;
            posLetter = phrase.indexOf(lettre, posLetter + 1);
        }
        // variable définissant l'affichage dans le html
        var table = document.getElementById('table').insertAdjacentHTML('beforeend', '<p>Cette phrase contient ' + count + ' lettre(s) "' + lettre + '"</p > ');
    }
    switch (choice) {
        case 1:
            multiple();
            break;
        case 2:
            sum();
            break;
        case 3:
            voyelle();
            break;
        case 4:
            countLetter();
            break;
        default:
            alert('Choix non valide, veuillez recommencer svp ...')
            var choice = parseInt(window.prompt(
                '1-Multiples \n2 - Somme et moyenne \n3 - Recherche du nombre de voyelle \n4 - Recherche du nombre des caractères suivants \nEntrez votre option : '
            ));
    }
    /*
    *proposition de choix
    */
                            
    choice = parseInt(window.prompt(
        '1-Multiples \n2 - Somme et moyenne \n3 - Recherche du nombre de voyelle \n4 - Recherche du nombre des caractères suivants \nEntrez votre option : '
    ));
    /**
    * condition
    */
                            
}
                    </code>
                </pre>
                <a href="fonction/exemple3.html" class="waves-effect waves-light btn" target="_blank"><i class="material-icons right">play_arrow</i>Run
                    code</a>
            </div>
        </li>
    </ul>
</div>