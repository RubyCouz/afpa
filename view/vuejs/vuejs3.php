<?php
include '../header.php';
?>
<div class="container">
    <h1>Exercice 3 : Calculatrice</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Présentation</div>
            <div class="collapsible-body">
                <p>
                    Nous devons programmer une calculatrice en utilisant Vue.js. Ici, elle sera généré par notre objet Vue.js, ce uqi simplifiera notre code au niveau de la vue. Nous devons tenir compte de la division par 0. Nous prévoirons par la même occasion un historique, ainsi qu'une fonction reset.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le script</div>
            <div class="collapsible-body">
                <p>
                    Nous définissons pour commencer notre objet qui va générer et faire tourner la calculatrice, ainsi que la partie html ciblée :
                </p>
                <pre>
    <code class="js">
                        <?= htmlspecialchars('var app = new Vue({
    // identifie la partie html cibléé
    el: \'#cal\',') ?>       
    </code>
                </pre>
                <p>
                    Puis nous définissons les variables qui seront utilisées par le programme :
                </p>
                <pre>
    <code class="js">
                        <?= htmlspecialchars(' 
        data: {
        // définition du nombre en cour
        current: 0,
        // défnition du total
        total: 0,
        // défintion de l\'opérateur
        operator: false,
        // création d\'un tableau pour les différents boutons (tableau contenant 4  tableaux, 1 pour chaque ligne de boutons)
        buttons: [
            [\'7\', \'8\', \'9\', \'+\'],
            [\'4\', \'5\', \'6\', \'-\'],
            [\'1\', \'2\', \'3\', \'*\'],
            [\'0\', \'C\', \'=\', \'/\']
        ],
        // création d\'un tableau qui contiendra l\'historique des opérations
        history: []
    },') ?>
    </code>
                </pre>
                <p>
                    Pour la création de notre calculatrice, nous avons créé un tableau où sont stockés les boutons.
                </p>
                <p>
                    Nous pouvons créer ensuite les méthodes qui seront appelées selon les actions de l'utilisateur :
                </p>
                <ul>
                    <li>Définition de la méthode "reset" : elle servira à remettre à 0 la calculatrice</li>
                    <pre>
    <code class="js">
                            <?= htmlspecialchars(' // déclaration de la méthode reset, permettant la réinitialisation de la calculatrice
        reset: function () {
            // on définit toutes les propriétés à leurs valeurs d\'origine
            this.total = 0;
            this.operator = false;
            this.current = 0;
        },') ?>
    </code>
                    </pre>
                    <li>
                        Définition de la métthode qui changera la valeur de l'input lors de la saisie de l'utilisateur : à chaque saisie, la valeur de l'input changera, ce qui évitera une concaténation des caractères et un mauvais calcul
                    </li>
                    <pre>
    <code class="js">
                            <?= htmlspecialchars('
// déclaration de la méthode changeCurrent, permettra de change la valeur de l\'input par celle saisie par l\'utilisateur
        changeCurrent: function (input) {
            // si la valeur de l\'input = 0
            if (this.current == 0) {
                // la valeur de l\'input sera remplacée par celle de l\'utilisateur
                this.current = input;
            } else {
                // sinon on concatène la valeur de l\'input avec celle saisie par l\'utilisateur
                this.current += \'\' + input
            };
        },') ?>
    </code>
                    </pre>
                    <li>Définition de la méthode gérant l'historique des calcules :</li>
                    <pre>
    <code class="js">
                            <?= htmlspecialchars('
           addHistory: function (text) {
            // on insere les opearations et les resultats dans le tableau history
            this.history.unshift(text);
        }') ?>
    </code>
                    </pre>
                    <li>Définition de la méthode opérant les calcules : étudie tous les cas d'opérations, les effectue en tenant compte de la divison par 0, la vérification de l'opérateur</li>
                    <pre>
    <code class="js">
                            <?= htmlspecialchars('
// déclaration de la méthode calc, effectuant les calculs
        calc: function (operator) {
            // si aucun opérateur n\'est présent
            if (!this.operator) {
                // si le nombre courant est différent de 0
                if (this.current != 0) {
                    // alors total = le nombre courant
                    this.total = parseFloat(this.current);
                }
            } else {
                // sinon appel de la méthode addHistory pour garder un historique des calculs
                this.addHistory(this.total + " " + this.operator + " " + this.current);
                //si un opérateur est présent
                switch (this.operator) {
                    case "+":
                        // total = total + nombre courant
                        this.total += parseFloat(this.current);
                        break;
                    case "-":
                        // total = total - nombre courant
                        this.total -= parseFloat(this.current);
                        break;
                    case "*":
                        // total = total * nombre courant
                        this.total *= parseFloat(this.current);
                        break;
                    case "/":
                        // on vérifie que le nombre courant est différent de 0
                        if (this.current == 0) {
                            // message d\'erreur en cas de division par 0
                            this.total = \'division par 0 impossible\'
                        } else {
                            // sinon total = total / nombre courant
                            this.total /= parseFloat(this.current);
                            break;
                        }
                }
            }
            // le nombre courant est remis à 0
            this.current = 0;
            // s\'il y a présence d\'un opérateur
            if (this.operator) {
                // appel de la méthode addHistory pour affichage de l\'historique
                this.addHistory("= " + this.total);
            }
            // vérification de la validité de l\'opérateur
            if (["+", "-", "*", "/"].indexOf(operator) > -1) {
                this.operator = operator;
            } else {
                this.operator = false;
            }
        },') ?>
    </code>
                    </pre>
                    <li>Définition de la méthode qui lancera les calcules à chaque opération demandée par l'utilpisateur : elle est axée autour d'une condtion <code>switch</code> indiquant l'appel d'une des méthodes ci-dessus selon l'action de l'utilisateur. Si un signe opératoire est cliqué, on appelle la méthode de calcule. Si le bouton "C" est cliqué, on appelle la méthode "reset", sinon on appelle la méthode de remise à 0 de l'<code>input</code>.</li>
                    <pre>
    <code class="js">
                            <?= htmlspecialchars('select: function (input) {
            switch (input) {
                // si un signe opératoir est selectionné
                case "+":
                case "-":
                case "*":
                case "/":
                case "=":
                    // on se refère à la méthode calc
                    this.calc(input);
                    break;
                    // si on click sur "C"
                case "C":
                    // appel de la méthode reset
                    this.reset();
                    break;
                default:
                    // appel de la méthode changeCurrent
                    this.changeCurrent(input);
            }
        },') ?>
    </code>
                    </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">La vue</div>
            <div class="collapsible-body">
                <p>
                    Maintenant que le script est établie, nous pouvons nous occupé de la vue :
                </p>
                <pre>
    <code class="html">
                        <?= htmlspecialchars('<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Calculatrice</title>
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
                    <a class="nav-link" href="clickedator.html">clickedatrice</a>
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
                <h1>Calculatrice</h1>
                <hr />
            </div>
        </div>
        <div class="row" id="cal">
            <div class="calc col-md-6">
                <div class="row">
                    <!-- div contenant une liaison vers la propriété total ( {{ total }} )-->
                    <div class="col-md-9 cell">{{ total }}</div>
                    <!-- div contenant une liaison vers la propriété operator ( {{ operator }} )-->
                    <div class="col-md-3 cell">{{ operator }}</div>
                    <div class="col-md-12 cell">
                        <!-- input contenant une liaison vers la propriété current ( v-model="current" ) -->
                        <input v-model="current" type="number" />
                    </div>
                </div>
                <!-- v-for -> boucle permettant l\'affichage du tableau buttons[] -->
                <div v-for="row in buttons" class="row">
                    <!-- affichage des tableaux contenus dans le tableau buttons[] -->
                    <!-- v-for : item in items. item est un alias représentant l\'élément du tableau, item -> tableau à afficher-->
                    <!-- @click -> lors d\'un click sur un bouton, appel de la méthode select prennant en paramêtre button (valeur de button) -->
                    <div v-for="button in row" class="col-md-3 btn btn-primary" @click="select(button)">{{ button }}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <p v-for="log in history">{{ log }}</p> <!-- log fait référence à une ligne du tableau history -->
            </div>
        </div>
        <script src="assets/js/jquery-3.3.1.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="assets/js/script3.js"></script>
</body>

</html>') ?>
    </code>
                </pre>
                <p>Petites explications :</p>
                <ul>
                    <li>Les <code>div</code> des lignes 53 et 55 serviront à l'affichage des opérations et du résultat (à l'aide de <code>{{ totalt }}</code> et <code>{{ operator }}</code></li>
                    <li>L'<code>input</code> servira de champs d'affichage : l'attribut <code>v-model</code> le lie à la variable du même nom en javascript. Nul besoin de <code>name</code> ou de <code>placeholder</code></li>
                    <li>L'attribut <code>v-for="row in buttons"</code> permet la génération des différentes lignes de boutons, ainsi que le <code>v-for</code> de la ligne 66.  v-for : item in items. item est un alias représentant l'élément du tableau, item -> tableau à afficher</li>
                    <li>Enfin nous affichons l'historique à la ligne 70, en utilisant également l'attribut <code>v-for</code>, qui qui nous permettra de parcourir le tableau <code>history</code> et d'en afficher une ligne grâce à <code>{{ log }}</code> (représente une ligne du tableau).</li>
                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Code complet et démo</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3 offset-s3"><a class="active" href="#vueCalc">Vue</a></li>
                            <li class="tab col s3"><a href="#jsCalc">JS</a></li>
                        </ul>
                    </div>
                    <div id="vueCalc" class="col s12">
                        <pre>
    <code class="html">
                                <?= htmlspecialchars('
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Calculatrice</title>
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
                    <a class="nav-link" href="clickedator.html">clickedatrice</a>
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
                <h1>Calculatrice</h1>
                <hr />
            </div>
        </div>
        <div class="row" id="cal">
            <div class="calc col-md-6">
                <div class="row">
                    <!-- div contenant une liaison vers la propriété total ( {{ total }} )-->
                    <div class="col-md-9 cell">{{ total }}</div>
                    <!-- div contenant une liaison vers la propriété operator ( {{ operator }} )-->
                    <div class="col-md-3 cell">{{ operator }}</div>
                    <div class="col-md-12 cell">
                        <!-- input contenant une liaison vers la propriété current ( v-model="current" ) -->
                        <input v-model="current" type="number" />
                    </div>
                </div>
                <!-- v-for -> boucle permettant l\'affichage du tableau buttons[] -->
                <div v-for="row in buttons" class="row">
                    <!-- affichage des tableaux contenus dans le tableau buttons[] -->
                    <!-- v-for : item in items. item est un alias représentant l\'élément du tableau, item -> tableau à afficher-->
                    <!-- @click -> lors d\'un click sur un bouton, appel de la méthode select prennant en paramêtre button (valeur de button) -->
                    <div v-for="button in row" class="col-md-3 btn btn-primary" @click="select(button)">{{ button }}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <p v-for="log in history">{{ log }}</p> <!-- log fait référence à une ligne du tableau history -->
            </div>
        </div>
        <script src="assets/js/jquery-3.3.1.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="assets/js/script3.js"></script>
</body>

</html>') ?>
    </code>
                        </pre>
                    </div>
                    <div id="jsCalc" class="col s12">
                        <pre>
    <code class="js">
                                <?= htmlspecialchars('
 /**
 * calculatrice
 */
// initialisation de l\'objet Vue
var app = new Vue({
    // identifie la partie html cibléé
    el: \'#cal\',
    // définition des propriétés nécessaires à l\'objet
    data: {
        // définition du nombre en cour
        current: 0,
        // défnition du total
        total: 0,
        // défintion de l\'opérateur
        operator: false,
        // création d\'un tableau pour les différents boutons (tableau contenant 4  tableaux, 1 pour chaque ligne de boutons)
        buttons: [
            [\'7\', \'8\', \'9\', \'+\'],
            [\'4\', \'5\', \'6\', \'-\'],
            [\'1\', \'2\', \'3\', \'*\'],
            [\'0\', \'C\', \'=\', \'/\']
        ],
        // création d\'un tableau qui contiendra l\'historique des opérations
        history: []
    },
    methods: {
        // définition de la méthode select, appelé au click d\'un bouton de la calculatrice
        select: function (input) {
            switch (input) {
                // si un signe opératoir est selectionné
                case "+":
                case "-":
                case "*":
                case "/":
                case "=":
                    // on se refère à la méthode calc
                    this.calc(input);
                    break;
                    // si on click sur "C"
                case "C":
                    // appel de la méthode reset
                    this.reset();
                    break;
                default:
                    // appel de la méthode changeCurrent
                    this.changeCurrent(input);
            }
        },
        // déclaration de la méthode changeCurrent, permettra de change la valeur de l\'input par celle saisie par l\'utilisateur
        changeCurrent: function (input) {
            // si la valeur de l\'input = 0
            if (this.current == 0) {
                // la valeur de l\'input sera remplacée par celle de l\'utilisateur
                this.current = input;
            } else {
                // sinon on concatène la valeur de l\'input avec celle saisie par l\'utilisateur
                this.current += \'\' + input
            }
            ;
        },
        // déclaration de la méthode reset, permettant la réinitialisation de la calculatrice
        reset: function () {
            // on définit toutes les propriétés à leurs valeurs d\'origine
            this.total = 0;
            this.operator = false;
            this.current = 0;
        },
        // déclaration de la méthode calc, effectuant les calculs
        calc: function (operator) {
            // si aucun opérateur n\'est présent
            if (!this.operator) {
                // si le nombre courant est différent de 0
                if (this.current != 0) {
                    // alors total = le nombre courant
                    this.total = parseFloat(this.current);
                }
            } else {
                // sinon appel de la méthode addHistory pour garder un historique des calculs
                this.addHistory(this.total + " " + this.operator + " " + this.current);
                //si un opérateur est présent
                switch (this.operator) {
                    case "+":
                        // total = total + nombre courant
                        this.total += parseFloat(this.current);
                        break;
                    case "-":
                        // total = total - nombre courant
                        this.total -= parseFloat(this.current);
                        break;
                    case "*":
                        // total = total * nombre courant
                        this.total *= parseFloat(this.current);
                        break;
                    case "/":
                        // on vérifie que le nombre courant est différent de 0
                        if (this.current == 0) {
                            // message d\'erreur en cas de division par 0
                            this.total = \'division par 0 impossible\'
                        } else {
                            // sinon total = total / nombre courant
                            this.total /= parseFloat(this.current);
                            break;
                        }
                }
            }
            // le nombre courant est remis à 0
            this.current = 0;
            // s\'il y a présence d\'un opérateur
            if (this.operator) {
                // appel de la méthode addHistory pour affichage de l\'historique
                this.addHistory("= " + this.total);
            }
            // vérification de la validité de l\'opérateur
            if (["+", "-", "*", "/"].indexOf(operator) > -1) {
                this.operator = operator;
            } else {
                this.operator = false;
            }
        },
        // déclaration de la méthode addHistory permattant l\'affichage de l\'historique de calcul
        addHistory: function (text) {
            // on insere les opearations et les resultats dans le tableau history
            this.history.unshift(text);
        }
    }
});
') ?>
    </code>
                        </pre>
                    </div>
                </div>

                <a href="exo_vuejs/calculator.html" class="waves-effect waves-light btn" title="Lien vers demo" target="_blank">RUN CODE</a>
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>