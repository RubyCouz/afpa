
<div class="container">
    <h1>Afficher du texte et une image</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Besoin</div>
            <div class="collapsible-body">
                <p>
                    Nous devons créer 2 fonctions. Une permettant l'affichage d'un texte, l'autre permetant
                    l'affichage d'une image.
                </p>
                <p>
                    Pour chacune des fonctions, nous prendrons respectivement en paramêtre x et y (2 nombres
                    entiers), et img (représentant le chemin ou url de l'image).
                </p>
                <p>Pour déclarer une fonction, il suffit juste de taper :</p>
                <pre>
                    <code class="js">
function nomDeLaFonction() {
}
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Affichage du texte</div>
            <div class="collapsible-body">
                <p>
                    Commençons par déclarer nos 2 variables :
                </p>
                <pre>
                    <code class="js">
var x = 3;
var y = 5;
                    </code>
                </pre>
                <p>
                    Notez qu'il aurait été possible de remplacer les valeurs des variables par un
                    <code>window.prompt()</code> afin de demander une saisie à l'utilisateur. Sa saisie aurait été
                    stocké dans les variables et reprise dans la fonction, puisqu'elles sont passées en paramêtre de
                    celle-ci.
                </p>
                <p>
                    Nous pouvons ensuite déclarer notre fonction :
                </p>
                <pre>
                    <code class="js">
function produit() {
}
                    </code>
                </pre>
                <p>
                    Nous y mettrons à l'intérieur nos calculs (produit et puissance), ainsi que notre affichage, le
                    tout stocké dans des variables :
                </p>
                <pre>
                    <code class="js">
var result = Math.pow(x, 3);
var secondResult = x * y;
var text = 'Le cube de ' + x + ' est égale à ' + result;
var text2 = 'le produit de ' + x +' * ' + y + ' est égale à ' + secondResult;
                    </code>
                </pre>
                <p>
                    Pour calculer le cube, nous utilisons ici la fonction
                    <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/Math/pow" class="uk-link-muted" title="Lien vers définition MDN" target="_blank">
                        <code>
                            Math.pow()
                        </code>
                    </a>.
                </p>
                <p>
                    Nous allons ensuite cibler dans notre html les endroits où nous voudrions afficher nos calculs :
                </p>
                <pre>
                    <code class="js">
document.getElementById('calcul1').innerHTML = text;
document.getElementById('calcul2').innerHTML = text2;
                    </code>
                </pre>
                <p>
                    Ici, nous ciblons donc 2 élements qui auront un <code>id="calcul1"</code> et
                    <code>id="calcul2"</code>.
                </p>
                <p>
                    Puis l'affichage dans le document se fait grâce à la propriété
                    <a href="https://developer.mozilla.org/fr/docs/Web/API/Element/innertHTML" class="uk-link-muted" target="_blank" title="Lien vers définition MDN">
                        <code>innerHTML</code>
                    </a>.
                </p>
                <p>ATTENTION : la propriété
                    <a href="https://developer.mozilla.org/fr/docs/Web/API/Element/innertHTML" class="uk-link-muted" target="_blank" title="Lien vers définition MDN">
                        <code>innerHTML</code>
                    </a> est à manipuler avec précaution : s'il y en plusieurs au sein d'un seul élément, les textes
                    précédants seront effacer pour afficher les suivants!!
                </p>
                <p>
                    Notre fonction ressemble donc à ceci maintenant :
                </p>
                <pre>
                    <code class="js">
function produit(x, y) {
    var result = Math.pow(x, 3);
    var secondResult = x * y;
    var text = 'Le cube de ' + x + ' est égale à ' + result;
    var text2 = 'le produit de ' + x +' * ' + y + ' est égale à ' + secondResult;
    
    // on cible un élement dans le document html afin  de pouvoir faire un affichage d'une variable
    document.getElementById('calcul1').innerHTML = text;
    document.getElementById('calcul2').innerHTML = text2;
    }
                    </code>
                </pre>
                <p>
                    Pour appeler notre fonction (pour l'exécuter), nous avons juste à ajouter à la suite :
                </p>
                <pre>
                    <code class="js">
produit(x, y);
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Affichage de l'image</div>
            <div class="collapsible-body">
                <p>
                    Nous déclarons une variable contenant le chemin de notre image :
                </p>
                <pre>
                    <code class="js">
var img = 'assets/img/papillon.jpg';
                    </code>
                </pre>
                <p>
                    Puis nous pouvons construire notre fonction. nous allons cibler un élément de notre page pour y afficher l'image, nous allons créer une balise <code><?= htmlspecialchars('<img src="" alt="" title="">') ?></code> et renseigner comment l'affichage va se faire :
                </p>
                <pre>
                    <code class="js">
function affichImg(img) {
    var container = document.getElementById('picture');
    var picture = document.createElement('img');
    picture.src = img;
    container.appendChild(picture);
}
                    </code>
                </pre>
                <p>
                    Création de la balise <code><img></code> :
                </p>
                <pre>
                    <code class="js">
var picture = document.createElement('img');
                    </code>
                </pre>
                <p>
                    Renseignement de la source :
                </p>
                <pre>
                    <code class="js">
picture.src = img;
                    </code>
                </pre>
                <p>
                    Localisation de l'affichage :
                </p>
                <pre>
                    <code class="js">
container.appendChild(picture);
                    </code>
                </pre>
                <p>
                    A l'aide de la méthode <a href="https://developer.mozilla.org/fr/docs/Web/API/Node/appendChild" class="uk-link-muted" target="_blank" title="Lien vers définition MDN">
                        <code>appendChild()</code>
                    </a>, nous disons que nous voulons que notre image soit afficher à l'intérieur de notre élément
                    ciblé.
                </p>
                <p>
                    Avec l'appel de notre fonction, nous obtenons :
                </p>
                <pre>
                    <code class="js">
function affichImg(img) {
    // récupération de l'emplacement pour afficher l'image
    var container = document.getElementById('picture');
    // création d'une balise pour permettre l'affichage de l'image
    var picture = document.createElement('img');
    // on récupère la source de l'image
    picture.src = img;
    // on affiche l'immage (ajout d'un 'enfant' dans notre div)
    container.appendChild(picture);
}
affichImg(img);
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat final</div>
            <div class="collapsible-body">
                <p>
                    L'ensemble de nos 2 fonctions, ainsi que leur appel et la déclaration des variables donnera :
                </p>
                <pre>
                    <code class="js">
var x = 3;
var y = 5;
var img = 'assets/img/papillon.jpg';
// déclaration de fonction

function produit(x, y) {
var result = Math.pow(x, 3);
var secondResult = x * y;
var text = 'Le cube de ' + x + ' est égale à ' + result;
var text2 = 'le produit de ' + x +' * ' + y + ' est égale à ' + secondResult;

// on cible un élement dans le document html afin  de pouvoir faire un affichage d'une variable
document.getElementById('calcul1').innerHTML = text;
document.getElementById('calcul2').innerHTML = text2;
}
// appel de la fonction
produit(x, y);
function affichImg(img) {
    // récupération de l'emplacement pour afficher l'image
    var container = document.getElementById('picture');
    // création d'une balise pour permettre l'affichage de l'image
    var picture = document.createElement('img');
    // on récupère la source de l'image
    picture.src = img;
    // on affiche l'immage (ajout d'un 'enfant' dans notre div)
    container.appendChild(picture);
}
affichImg(img);
                    </code>
                </pre>
                <a href="fonction/exemple1.html" class="waves-effect waves-light btn" target="_blank"><i class="material-icons right">play_arrow</i>Run code</a>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Affichage alernatif</div>
            <div class="collapsible-body">
                <p>
                    Un autre moyen pour afficher l'image consiste à inscrire directement une balise <code><?= htmlspecialchars('<img>') ?></code> dans
                    notre code html de cette façon :
                </p>
                <pre>
                    <code class="html">                          
                        <?= htmlspecialchars('
<img src="img" alt="papillon" title="papillon" id="pap">
                               ') ?>                          
                    </code>
                </pre>
                <p>
                    Puis nous construisons notre fonction de cette manière :
                </p>
                <pre>
                    <code class="js">
function butterfly(img) {
    document.getElementById('pap').src = img;
     }
     butterfly(img);
                    </code>
                </pre>
            </div>
        </li>
    </ul>
</div>