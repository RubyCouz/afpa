<?php
include '../header.php';
?>
<div class="container">
    <h1>Ajax : exercice 3, API</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Présentation</div>
            <div class="collapsible-body">
                <p>
                    Nous devons afficher la liste des films selon une recherche, le tout sans recherger la page.
                </p>
                <p>
                    Une API (interface de programmation applicative) d'un site (ou logiciel) permet de fournir des fonctionnalités à des sites tiers. Dans le cas de notre exercice, themoviedb nous permet d'avoir accès à sa base de données (lecture) via une API.
                </p>
                <p>
                    Pour faire fonctionner une API, il est nécessaire de demander une clé d'utilisation. Cette clé permettra l'accès aux ressources proposées par le site.
                </p>
                <p>
                    Dans notre cas, pour avoir accès à l'API de themoviedb nous devons utiliser l'url suivante : <code>http://api.themoviedb.org/3/search/movie?api_key=xxx&query=yyy</code>
                </p>
                <p>
                    "xxx" correspond à la clé d'utilisation de l'API, "yyy" correspond à la recherche effectuée.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">La vue</div>
            <div class="collapsible-body">
                <p>
                    Pour rechercher un film dans la base de themoviedb, nous devons construire un formulaire :
                </p>
                <pre>
    <code class="html">
                        <?= htmlspecialchars('
           <form action="#" method="GET">
                <label for="search">Recherche :</label>
                <input type="text" name="search" id="search" placeholder="Recherche" />
                <input type="submit" name="submit" id="submit" value="Rechercher" />
            </form>') ?>
    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Javascript</div>
            <div class="collapsible-body">
                <p>
                    Les données retournées par l'url <code>http://api.themoviedb.org/3/search/movie?api_key=xxx&query=yyy</code> seront aux format JSON. Pour les récupérer, nous utiliserons la méthode AJAX <a href="https://api.jquery.com/jQuery.getJSON/#jQuery-getJSON-url-data-success" class="uk-link-muted" title="Lien vers documentation jquery" target="_blank"><code>.getJSON()</code></a> : 
                </p>
                <pre>
    <code class="js">
                        <?= htmlspecialchars(' $.getJSON(\'http://api.themoviedb.org/3/search/movie?api_key=f33cd318f5135dba306176c13104506a&query=\' + $(\'#search\').val(), function (data) {
               
               }') ?>
    </code>
                </pre>
                <p>
                    <code>data</code> représente toujours le résultat de la requète envoyée par Ajax.
                </p>
                <p>
                    Une fois que nous récupérons le résultat de notre requète, nous allons créer un tableau, dans lequel nous mettrons ce résultat :
                </p>
                <pre>
    <code class="js">
                        <?= htmlspecialchars('
           var items = [];
            $.each(data.results, function(key, val) {
                items.push(key + \' : \' + val.title + \'<br />\');
            });') ?>
    </code>
                </pre>
                <p>
                    Le format JSON contient des tableaeux d'objets, nous devons donc utiliser la méthode <a href="https://api.jquery.com/each/#each-function" class="uk-link-muted" title="Lien vers documentation Jquery" target="_blank"><code>each()</code></a> qui permet de parcourir des tableaux, à la manière d'une boucle <code>foreach()</code>.
                </p>
                <p>
                    <code>results</code> est le nom du tableau, <code>key</code> et <code>val</code> sont respectivement la clé d'un objet (identifiant, id) et la valeur lui correspondant.
                </p>
                <p>
                    Enfin, nous procédons à l'affichage du résultat dans notre vue, dans une div ajoutée auparavant dans notre vue :
                </p>
                <pre>
    <code class="js">
                        <?= htmlspecialchars('
$(\'#result\').html(items.join());') ?>
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
         <div>
            <form action="#" method="GET">
                <label for="search">Recherche :</label>
                <input type="text" name="search" id="search" placeholder="Recherche" />
                <input type="button" name="submit" id="submit" value="Rechercher" />
            </form>
        </div>
        <div id="result">

        </div>') ?>
    </code>
                        </pre>
                    </div>
                    <div id="js" class="col s12">
                        <pre>
    <code class="js">
                                <?= htmlspecialchars('
     $(\'#submit\').click(function () {
        $.getJSON(\'http://api.themoviedb.org/3/search/movie?api_key=f33cd318f5135dba306176c13104506a&query=\' + $(\'#search\').val(), function (data) {
            var items = [];
            $.each(data.results, function(key, val) {
                items.push(key + \' : \' + val.title + \'<br />\');
            });
            $(\'#result\').html(items.join());
        });') ?>
    </code>
                        </pre>
                    </div>
                </div>
                <a href="ajaxDemo.php" class="waves-effect waves-light btn" title="Lien vers démo ajax" target="_blank">RUN CODE</a>
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>