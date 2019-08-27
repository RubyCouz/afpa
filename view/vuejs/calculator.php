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
                    <a class="nav-link" href="clickedator.html">Calculatrice</a>
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
                <!-- v-for -> boucle permettant l'affichage du tableau buttons[] -->
                <div v-for="row in buttons" class="row">
                    <!-- affichage des tableaux contenus dans le tableau buttons[] -->
                    <!-- v-for : item in items. item est un alias représentant l'élément du tableau, item -> tableau à afficher-->
                    <!-- @click -> lors d'un click sur un bouton, appel de la méthode select prennant en paramêtre button (valeur de button) -->
                    <div v-for="button in row" class="col-md-3 btn btn-primary" @click="select(button)">{{ button }}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <p v-for="log in history">{{ log }}</p> <!-- log fait référence à une ligne du tableau history -->
            </div>
        </div>
        <script src="assets/js/jquery-3.3.1.js"></script>
<script src="../../assets/js/materialize.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="assets/js/script3.js"></script>
</body>

</html>