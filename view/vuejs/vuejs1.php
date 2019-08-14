<?php
include '../header.php';
?>
<div class="container">
    <h1>Additionneur Vue.js</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Présentation</div>
            <div class="collapsible-body">
                <p>Vue.js est un frmaework de javascript. Il permt de faire tourner des sites internet sur une seul page.</p>
                <p>
                    Il existe plusieurs façons de l'utiliser, mais la méthode la plus simplr reste d'utiliser le CDN. Il n'y aura qu'un lien à ajouter en bas de votre page web.
                </p>
                <p>
                    Lien utile : <a href="https://fr.vuejs.org/" class="uk-link-muted" title="Lien vers la documentation fr de Vue.js" target="_blank">https://fr.vuejs.org/</a>
                </p>
                <p>
                    Pour ce premier exercice, nous devons utiliser 2 <code>input</code> afin de saisr 2 nombres, et afficher le résultat de leur somme.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">La vue</div>
            <div class="collapsible-body">
                <p>
                    Nous avons donc notre formulaire de cette façon :
                </p>
                <pre>
    <code class="html">
                        <?= htmlspecialchars('
                <form action="#" method="GET" class="form">
                    <fieldset>
                        <legend>Additionneur</legend>
                        <div class="row" id="app">
                            <div class="form-group col-sm-4">
                                <label for="firstNumber"></label>
                                <input type="number" v-model="firstNumber" class="form-control" name="firstNumber" id="firstNumber"
                                    placeholder="Nombre 1" @keyup="addition" />
                            </div>
                            <div class="form-group col-sm-1 result">
                                <p>+</p>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="secondNumber"></label>
                                <input type="number" v-model="secondNumber" class="form-control" name="secondNumber" id="secondNumber"
                                    placeholder="Nombre 2" @keyup="addition" />
                            </div>
                            <div class="form-group col-sm-1 result">
                                <p>=</p>
                            </div>
                            <div class="form-group col-sm-2 result">
                                <p class="label">{{ result }}</p>
                            </div>
                        </div>
                    </fieldset>
                </form>') ?>       
    </code>
                </pre>
                <p>
                    Notez la présence d'une <code>div</code> qui englobe nos <code>input</code>, sur laquelle nous avons défini un <code>id</code>. Cet <code>id</code> corespondra à notre "application vuejs" qui fera toourner notre page.
                </p>
                <p>
                    <code>v-model</code> va relier l'<code>input</code> à la variable javascript correspondante.
                </p>
                <p>
                    <code> @keyup="addition"</code> fait appel à la méthode addition de notre objet lorsqu'une touche du clavier remonte.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le script</div>
            <div class="collapsible-body">
                <p>
                    Commençons par définir notre "application" :
                </p>
                <pre>
    <code class="js">
                        <?= htmlspecialchars('
var sum = new Vue({
    el: \'#app\',') ?>
    </code>
                </pre>               
                <p>
                    Nous commençons par déclarer un nouvel objet, puis nous indiquons à quelle endroit il aura effet grâce à <code>el: '#app'</code> (l'action se passra ici à l'intérieur de la div ayant l'id "app").   
                </p>
                <p>
                    Puis nous déclarons les variables que nous utiliseront :
                </p>
                <pre>
    <code class="js">
                        <?= htmlspecialchars('
  data: {
        //déclaration des variables utilisées
        firstNumber: \'\',
        secondNumber: \'\',
        result: \'\'
    },') ?>       
    </code>
                </pre>
                <p>
                    Nous définissons ensuite la "méthode" qui va faire notre addition :
                </p>
                <pre>
    <code class="js">
                        <?= htmlspecialchars('
this.result = parseInt(firstNumber.value) + parseInt(secondNumber.value);') ?>
    </code>
                </pre>
                <p>
                    <code>this.result</code> reprend la variable result déclarée plus haut.
                </p>
                <p>
                    Il ne reste plus qu'à procéder à l'affichage du résultat. Pour cela, dans notre html, dans le <code>span</code> ayant la classe <code>lable</code>, nous y inclurons <code>{{ result }}</code>. Cette notation permet l'affichage de variables definies dans notre objet
                </p>        
                <pre>
    <code class="html">
                        <?= htmlspecialchars('<span class="label">{{ result }}</span>') ?>       
    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Code complet</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3 offset-s3"><a class="active" href="#view">Vue</a></li>
                            <li class="tab col s3"><a href="#js">JS</a></li>
                        </ul>
                    </div>
                    <div id="view" class="col s12">
                        <pre>
    <code class="html">
                                <?= htmlspecialchars('
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Additionneur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/sketchy.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Vue.js</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="additionneur.html">Additionneur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="magic.html">Nombre magique</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="calculator.html">Calculatrice</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="#" method="GET" class="form">
                    <fieldset>
                        <legend>Additionneur</legend>
                        <div class="row" id="app">
                            <div class="form-group col-sm-4">
                                <label for="firstNumber"></label>
                                <input type="number" v-model="firstNumber" class="form-control" name="firstNumber" id="firstNumber"
                                    placeholder="Nombre 1" @keyup="addition" />
                            </div>
                            <div class="form-group col-sm-1 result">
                                <p>+</p>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="secondNumber"></label>
                                <input type="number" v-model="secondNumber" class="form-control" name="secondNumber" id="secondNumber"
                                    placeholder="Nombre 2" @keyup="addition" />
                            </div>
                            <div class="form-group col-sm-1 result">
                                <p>=</p>
                            </div>
                            <div class="form-group col-sm-2 result">
                                <p class="label">{{ result }}</p>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.3.1.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>') ?>
    </code>
                        </pre>
                    </div>
                    <div id="js" class="col s12">
                        <pre>
    <code class="js">
                                <?= htmlspecialchars('
// declarations d\'une nouvelle appli
var sum = new Vue({
    el: \'#app\',
    data: {
        //déclaration des variables utilisées
        firstNumber: \'\',
        secondNumber: \'\',
        result: \'\'
    },
    methods: {
        addition: function (evt) {
            console.log(firstNumber.value);
            console.log(secondNumber.value);
            this.result = parseInt(firstNumber.value) + parseInt(secondNumber.value);
        }
    }
});') ?>
    </code>
                        </pre>
                    </div>
                </div>
                <a href="exo_vuejs/additionneur.html" class="waves-effect waves-light btn" title="Lien vers démo" target="_blank">RUN CODE</a>
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>