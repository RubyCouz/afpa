
<div class="container">
    <h1>Création d'un tableau</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Besoin</div>
            <div class="collapsible-body">
                <p>
                    Nous devons créer un tableau dont la taille est saisie au clavier par l'utilisateur. Ce
                    dernier sera en mesure de le remplir et d'en afficher le contenu. L'affichage se fera via une
                    <code>alert()</code>.
                </p>
                <p>
                    Nous allons donc définir la taille du tableau, renseignée par l'utilisateur :
                </p>
                <pre>
                        <code class="js">
var arrayLength = parseInt(window.prompt('Définissez la taille de votre tableau :'));
                        </code>
                </pre>
                <p>
                    Puis nous allons créer le tableau en fonction de la taille donnée :
                </p>
                <pre>
                           <code class="js">
var array = new Array(arrayLength);
                        </code>
                </pre>
                <p>
                    Nous définissons également une variable qui nous servira à demander à l'utilisateur les données
                    qui rempliront le tableau :
                </p>
                <pre>
                        <code class="js">
var content = '':
                        </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Construction et remplissage du tableau</div>
            <div class="collapsible-body">
                <p>
                    <code>array</code> construit le tableau, selon la variable <code>arrayLength</code>passé en
                    paramêtre de la méthode <code>new Array()</code>.
                    Cependant si nous voulons le remplir, nous devons le "vider" (ici enlever les espaces vides,
                    sinon les données ajoutées par l'utilisateur se retrouveront après ces espaces vides).
                    Nous utiliserons pour cela la méthode
                    <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/Array/splice"
                       target="_blank" class="uk_link_muted" title="Lien vers définition MDN">
                        <code>splice()</code>
                    </a> :
                </p>
                <pre>
                        <code class="js">
array.splice(0, arrayLength);
                        </code>
                </pre>
                <p>
                    Une autre solution consiste a remplacer directement les valeurs vides par celles saisies par
                    l'utilisateur. Dans ce cas <code>splice</code> n'est plus nécessaire, et il nous suffit d'écrire
                    notre insertion de cette manière :
                </p>
                <pre>
                        <code class="js">
array[i] = content;
                        </code>
                </pre>
                <p>
                    Une fois vidé, nous pouvons mettre en place la boucle qui demandera à l'utilisateur de remplir
                    son tableau et d'envoyer les donnnées à l'intérieur. Nous utiliserons dans le même temps la
                    méthode
                    <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/Array/push"
                       target="_blank" title="Lien vers définition MDN">
                        <code>push()</code>
                    </a>
                </p>

                <pre>
                        <code class="js">
for(i = 0; i < arrayLength; i++) {
    content = window.prompt('Indiquer une valeur à entrer dan sle tableau :');
    array.push(content);
}
                        </code>
                </pre>

                <p>
                    Pour l'affichage, nous aurons simplement :
                </p>
                <pre>
                    <code class="js">
alert('votre tableau :' + array.join(', '));
                    </code>
                </pre>
                <p>
                    La méthode <a
                        href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/Array/join"
                        title="Lien vers défnition MDN" target="_blank">
                        <code>join()</code>
                    </a> permet de créer une chaine de caractère en concaténant les éléments d'un tableau et en
                    ajoutant
                    un séparateur indiqué en paramêtre de la méthode.
                </p>
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
//taille du tableau renseigné par l'utilisateur
    var arrayLength = parseInt(window.prompt('Définissez la taille de votre tableau :'));
    // construciton du tableau selon la taille renseignée
    var array = new Array(arrayLength);
    // variable stockant le contenu donné par l'utilisateur
    var content = '':
    // boucle permettant l'insertion de contenu dans le tableau
    //on "vide" le tableau
    array.splice(0, arrayLength);
    for(i = 0; i < arrayLength; i++) {
        content = window.prompt('Indiquer une valeur à entrer dans le tableau :');
        array.push(content);
    }
    // affichage du tableau
    alert('votre tableau :' + array.join(', '));
    /**
    *autre solution sans splice(), à la place de push()
    */
    // array[i] = content;
                        </code>
                </pre>
                <button class="waves-effect waves-light btn" id="runCreateExo"><i class="material-icons right">play_arrow</i>Run code</button>
            </div>
        </li>
    </ul>
</div>