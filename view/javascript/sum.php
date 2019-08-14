
<div class="container">
    <h1>Somme d'un intervalle</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Besoin</div>
            <div class="collapsible-body">
                <p>
                    Pour ce programme, nous devons définir 2 variables où nous stockerons 2 valeurs demandées à l'utilisateur, et une permettant de faire la somme des entiers dans l'intervalle des valeurs. Nous devrons contrôler ces données, prendre en compte quelle valeur est la plus élevé et enfin nous pourront calculer la somme des entiers entre ses 2 valeurs
                </p>
                <p>
                    Déclaration des variables :
                </p>
                <pre>
                    <code class="js">                                
var n1 = parseInt(window.prompt('Saisissez un premier nombre :'));
var n2 = parseInt(window.prompt('Saisissez un second nombre :'));
var sum = 0;   
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Vérification des données saisies par l'utilisateur</div>
            <div class="collapsible-body">
                <p>
                    Nous devons établir une vérification de la saisie, en vérifiant que la saisie est bien un nombre à l' aide de la fonction <code>isNaN()</code>. Si <code>n1</code> ou <code>n2</code> ne sont pas un nombre, alors on affichera un message d'erreur. Nous pouvons aller plus loin maintenant en installant un boucle qui demandera une saisie tant que celle n'est pas correct:
                </p>
                <pre>
                    <code class="js">
// on vérifie la saisie de l'utilisateur
 // tant que la saisie n'est pas un nombre
 while (isNaN(n1)) {
     // on renouvèle la saisie
     n1 = parseInt(window.prompt('Saisissez un premier nombre :'));
 }
  while (isNaN(n2)) {
     // on renouvèle la saisie
     n2 = parseInt(window.prompt('Saisissez un second nombre :'));
 }
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Construction de la boucle</div>
            <div class="collapsible-body">
                <p>
                    Dans un premier temps, nous vérifions quelle valeur est la plus élevée. Ceci nous permettra dans quel sens nous pourrons construire notre boucle :
                </p>
                <pre>
                    <code class="js">
if (n2 > n1) {
    // boucle permettant de parcourir les valeurs entre n1 et n2
  

    // si n2 (2eme saisie) est inférieur n1 (première saisie)
} else {
    // boucle permettant de parcourir les valeurs entre n2 et n1
   
}
                    </code>
                </pre>
                <p>
                    Puis nous allons définir une boucle dans le cas où <code>n2</code> est supérieur à <code>n2</code> :
                </p>
                <pre>
                    <code>
 for (i = n1; i <= n2; i++) {
//ajout de la valeur i à sum
sum += i;
 }
                    </code>
                </pre>
                <p>
                    La boucle parcourt les valeurs comprises entre <code>n1</code> et <code>n2</code>. A chaque tour de boucle, nous ajoutons chacune des valeurs à la variable <code>sum</code>.
                </p>
                <p>
                    On intègre cette boucle dans la première instruction de notre condition. Une fois la boucle terminée, nous affichons le résultat dans la console, hors de la condition initialement établie:
                </p>
                <pre>
                    <code>
if (n2 > n1) {
// boucle permettant de parcourir les valeurs entre n1 et n2
    for (i = n1; i <= n2; i++) {
    //ajout de la valeur i à sum
    sum += i;
    }
    // si n2 (2eme saisie) est inférieur n1 (première saisie)
} else {
    // boucle permettant de parcourir les valeurs entre n2 et n1
    
}
console.log(sum);
                    </code>
                </pre>
                <p>
                    On construit ensuite notre deuxième boucle, si n1 est supérieur à n2 :
                </p>
                <pre>
                    <code>
for (i = n2; i <= n1; i++) {
        //ajout de la valeur i à sum
        sum += i;
    }
                    </code>
                </pre>
                <p>Ce qui nous donne :</p>
                <pre>
                    <code>
if (n2 > n1) {
// boucle permettant de parcourir les valeurs entre n1 et n2
    for (i = n1; i <= n2; i++) {
        //ajout de la valeur i à sum
        sum += i;
    }
    // si n2 (2eme saisie) est inférieur n1 (première saisie)
} else {
    // boucle permettant de parcourir les valeurs entre n2 et n1
    for (i = n2; i <= n1; i++) {
        //ajout de la valeur i à sum
        sum += i;
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
                    Après avoir intégré notre seconde boucle dans la deuxième instruction de notre condition, nous obtiendrons :
                </p>
                <pre>
                    <code class="js">
// déclaration des variables
var n1 = parseInt(window.prompt('Saisissez un premier nombre :'));
var sum = 0;
// on vérifie la saisie de l'utilisateur
// si la saisie n'est pas un nombre
if (isNaN(n1)) {
    while (isNaN(n1)) {
        // on renouvèle la saisie
        n1 = parseInt(window.prompt('Saisissez un premier nombre :'));
    }
}
var n2 = parseInt(window.prompt('Saisissez un second nombre :'));
if (isNaN(n2)) {
    while (isNaN(n2)) {
        // on renouvèle la saisie
        n2 = parseInt(window.prompt('Saisissez un second nombre :'));
    }
}
// conditions vérifiant les valeurs saisies 
// si n2 (2eme saisie) est supérieur n1 (première saisie)
        if (n2 > n1) {
// boucle permettant de parcourir les valeurs entre n1 et n2
            for (i = n1; i <= n2; i++) {
//ajout de la valeur i à sum
                sum += i;
            }
// si n2 (2eme saisie) est inférieur n1 (première saisie)
        } else {
// boucle permettant de parcourir les valeurs entre n2 et n1
            for (i = n2; i <= n1; i++) {
//ajout de la valeur i à sum
                sum += i;
            }
        }
        console.log(sum);

                     </code>
                </pre>
                <button class="waves-effect waves-light btn" id="runSumExo"><i class="material-icons right">play_arrow</i>Run code</button>
            </div>
        </li>
    </ul>
</div>
