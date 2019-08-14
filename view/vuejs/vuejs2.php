<?php
include '../header.php';
?>
<div class="container">
    <h1>Nombre magique</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Présentation</div>
            <div class="collapsible-body">
                <p>
                    Nous devons reprendre le principe de l'exercice fait précédement en Javascript, puis en Jquery, sur le nombre magique. Pour plus de précision, référez-vous à ces exercices.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">La vue</div>
            <div class="collapsible-body">
                <p>
                    La vue pour cet exercice n'est pas très différentes de ses versions précédentes (javascript et jquery) :
                </p>
                <pre>
    <code class="hmtl">
                        <?= htmlspecialchars('
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center" id="verif">
                <p>Nombre Magique - Devinez une valeur entre 0 et 100</p>
                <hr />
                <form action="#" method="GET">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="number"></label>
                            <input type="number" class="form-control" id="number" placeholder="Entrez un nombre" v-model="number" />
                        </div>
                        <div class="col-sm-4 result">
                            <p>{{ info }}</p>
                        </div>
                        <div class="col-sm-2 result">
                            <input type="button" class="btn btn-primary" name="submit" value="Vérifier" @click="check" />
                        </div>
                    </div>
                </form>
            </div>
        </div>') ?>
    </code>
                </pre>
                <p>
                    L'<code>id="verif"</code> lancera l'objet qui fera tourner notre page.
                </p>
                <p>
                    <code>v-model</code> relie l'<code>input</code> à la variable qui lui correspond dans le Javascript, et <code>@click="check"</code> déclenchera la méthode de vérification de la saisie de l'utilisateur.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le script</div>
            <div class="collapsible-body">
                <pre>
    <code class="js">
                        <?= htmlspecialchars('
    var verif = new Vue({
    // ciblage de la localisation où va être effectif verif
    el: \'#verif\',
    //définition des données dont on a besoin
    data: {
        number: \'\',
        magic: parseInt(Math.random() * 100),
        count: 0,
        info: \'\'
    },
    // définition de la méthode analysant les données saisies par l\'utilisateur.
    methods: {
        check: function (evt) {
            console.log(number.value);
            console.log(this.magic);
            // si les 2 nombres sont identiques
            if (parseInt(number.value) == this.magic) {
                // affichage d\'un message, plus le nombre d\'essais
                this.info = \'Félicitation!! Vous avez trouvé la bonne réponse : \' + this.magic + \' \nNombre de coup nécessaire : \' + (parseInt(this.count) + 1);
            }
            // si le nombre random est plus grand
            else if (parseInt(number.value) < this.magic) {
                // on informe l\'utilisateur du résultat
                this.info = \'Plus grand\';
                this.count++;
            }
            // si le nombre random est plus petit
            else if (parseInt(number.value) > this.magic) {
                // on informe l\'utilisateur du résultat
                this.info = \'Plus petit\';
                this.count++;
            }
        }
    }
});') ?>
    </code>
                </pre>
                <p>
                    Explication : 
                </p>
                <ul>
                    <li>Le nombre magique est défini avec les variables, dans la section <code>data</code> de notre objet</li>
                    <li>Dans la méthode, nous récupérons la valeur de l'<code>input</code> avec <code>number.value</code></li>
                    <li>Il nous suffit ensuite de comparer cette valeur avec le nombre magique, et d'afficher un message d'information à l'utilisateur avec la variable <code>info</code></li>
                    <li>Pour plus de challenge, nous avons créé une variable <code>count</code>, qui compte le nombre d'essaies du joueur, cette variable est incrémenté à chaque fois que <code>number.value</code> est différent de <code>magic</code></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résumé et démo</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3 offset-s3"><a class="active" href="#vue">Vue</a></li>
                            <li class="tab col s3"><a href="#test2">JS</a></li>
                        </ul>
                    </div>
                    <div id="vue" class="col s12">
                        <pre>
    <code class="html">
                                <?= htmlspecialchars('
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Nombre magique</title>
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
            <div class="col-sm-12 text-center" id="verif">
                <p>Nombre Magique - Devinez une valeur entre 0 et 100</p>
                <hr />
                <form action="#" method="GET">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="number"></label>
                            <input type="number" class="form-control" id="number" placeholder="Entrez un nombre" v-model="number" />
                        </div>
                        <div class="col-sm-4 result">
                            <p>{{ info }}</p>
                        </div>
                        <div class="col-sm-2 result">
                            <input type="button" class="btn btn-primary" name="submit" value="Vérifier" @click="check" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.3.1.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="assets/js/script2.js"></script>
</body>

</html>') ?>
    </code>
                        </pre>
                    </div>
                    <div id="test2" class="col s12">
                        <pre>
    <code class="js">
                                <?= htmlspecialchars('
/**
 * Nombre magique
 */
//definition d\'un nombre aléatoire

var verif = new Vue({
    // ciblage de la localisation où va être effectif verif
    el: \'#verif\',
    //définition des données dont on a besoin
    data: {
        number: \'\',
        magic: parseInt(Math.random() * 100),
        count: 0,
        info: \'\'
    },
    // définition de la méthode analysant les données saisies par l\'utilisateur.
    methods: {
        check: function (evt) {
            console.log(number.value);
            console.log(this.magic);
            // si les 2 nombres sont identiques
            if (parseInt(number.value) == this.magic) {
                // affichage d\'un message, plus le nombre d\'essais
                this.info = \'Félicitation!! Vous avez trouvé la bonne réponse : \' + this.magic + \' \nNombre de coup nécessaire : \' + (parseInt(this.count) + 1);
            }
            // si le nombre random est plus grand
            else if (parseInt(number.value) < this.magic) {
                // on informe l\'utilisateur du résultat
                this.info = \'Plus grand\';
                this.count++;
            }
            // si le nombre random est plus petit
            else if (parseInt(number.value) > this.magic) {
                // on informe l\'utilisateur du résultat
                this.info = \'Plus petit\';
                this.count++;
            }
        }
    }
});') ?>
    </code>
                        </pre>
                    </div>
                </div>
                <a href="exo_vuejs/magic.html" class="waves-effect waves-light btn" title="Lien vers démo" target="_blank">RUN CODE</a> 
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>