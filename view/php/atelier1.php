
<div class="container">
    <h1>Séparation du code</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Introduction</div>
            <div class="collapsible-body">
                <p>
                    Le but de cet exercice est de séparer les différents éléménts d'une page: on identifie les éléments récurants (qui ne changent pas, ici le header et le footer), et ceux qui changeront lors de la navigation sur le site par l'utilisateur.
                </p>
                <p>
                    Cela permettra un gain de temps lors du codage de votre page web (un seul header et un seul footer à coder) et lors de la modification de ces 2 éléments si besoin.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Présentation</div>
            <div class="collapsible-body">
                <p>
                    Pour la réalisation de cet atelier, prenons un page web se construisant de cette façon :
                </p>
                <pre>
                    <code class="html">
                        <?=
                        htmlspecialchars(
                                '<!-- début de la page html -->
<!DOCTYPE html>
<html lang=fr>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Connexion aux bases de données</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/uikit.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/styles/monokai.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<!-- début du corps de la page -->
<body>
<!-- en-tête de la page (header) -->
    <header>
<!-- barre de navigation -->
        <nav class="uk-navbar-container uk-margin" uk-navbar>
            <div class="uk-navbar-center">
                <div class="uk-navbar-center-left">
                    <div>
                        <ul class="uk-navbar-nav">
                            <li>
                                <a href="atelier1.php">Atelier 1</a>
                            </li>
                            <li>
                                <a href="atelier2.php">Atelier 2</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a class="uk-navbar-item uk-logo" href="#">Connexion au Base de Données</a>
                <div class="uk-navbar-center-right">
                    <div>
                        <ul class="uk-navbar-nav">
                            <li>
                                <a href="atelier3.php">Atelier 3</a>
                            </li>
                            <li>
                                <a href="atelier4.php">Atelier 4</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav> 
    </header>
    <!-- contenu de la page -->
    <h1>Un titre</h1>
        <section>
            <h2>Un titre d\'article</h2>
                <article>
            <!-- textes, images, etc... -->
                </article>
            <h2>Un autre titre d\'article</h2>
                <article>
                <!-- textes, images, etc... -->
                </article>
        </section>
        
        <!-- footer -->
    <footer>
 
    <!-- liens utiles, mentions légales, plan du site, FAQ, ... -->


    <footer

    <script src="../assets/js/jquery-3.3.1.js"></script>
    <script src="../assets/js/uikit.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <script src="../assets/js/script.js"></script>
</body>

</html> 
'
                        )
                        ?>   
                    </code>
                </pre>
                <p>
                    Si nous devions faire un autre page, par exemple "atelier 2", nous devrions garder la même barre de navigation, ainsi que le même footer que la première page.
                </p>
                <p>Seul ce contenu serait modifié :</p>
                <pre>
                    <code class="html">
                        <?= htmlspecialchars('
     <!-- contenu de la page -->
     <h1>Un titre</h1>
         <section>
             <h2>Un titre d\'article</h2>
                 <article>
             <!-- textes, images, etc... -->
                 </article>
             <h2>Un autre titre d\'article</h2>
                 <article>
                 <!-- textes, images, etc... -->
                 </article>
         </section>
    ') ?>
                </code>
                </pre>
                <p>
                    Nous allons donc isoler la barre navigation dans un premier fichier que nous appellerons "header.php", puis nous isolerons le footer dans un second fichier, appelé footer.php.
                </p>
                <p>
                    Attention!! il est important, lors de cette séparation, de prendre tous les élément nécessaires au bon fonctionnement de la page Web.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le header</div>
            <div class="collapsible-body">
                <p>
                    Dans le fichier "header.php", nous trouverons toute la partie supérieur de notre document, c'est à dire:
                <ul>
                    <li>Le doctype :
                        <pre><code class="html"><?= htmlspecialchars('<!DOCTYPE html>') ?></code></pre>
                        </li>
                        <li>Les balises ouvrantes html :
                            <pre><code class="html"><?= htmlspecialchars('<html lang=fr></html>') ?></code></pre>
                        </li>
                        <li>La balise head et son contenu :
                            <pre><code class="html"><?= htmlspecialchars('
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Connexion aux bases de données</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/uikit.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/styles/monokai.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>') ?></code></pre>
                        </li>
                        <li>La balise ouvrante body :
                            <pre><code><?= htmlspecialchars('<body>') ?></code></pre>
                    </li>
                    <li>La barre de navigation :
                        <pre>
                                <code><?= htmlspecialchars('
<nav class="uk-navbar-container uk-margin" uk-navbar>
    <div class="uk-navbar-center">
        <div class="uk-navbar-center-left">
            <div>
                <ul class="uk-navbar-nav">
                    <li>
                        <a href="atelier1.php">Atelier 1</a>
                    </li>
                    <li>
                        <a href="atelier2.php">Atelier 2</a>
                    </li>
                </ul>
            </div>
        </div>
        <a class="uk-navbar-item uk-logo" href="#">Connexion au Base de Données</a>
        <div class="uk-navbar-center-right">
            <div>
                <ul class="uk-navbar-nav">
                    <li>
                        <a href="atelier3.php">Atelier 3</a>
                    </li>
                    <li>
                        <a href="atelier4.php">Atelier 4</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav> ') ?>
                            </code> 
                        </pre>
                    </li>
                </ul>
                </p>
                <p>Le fichier "header.php" se présentera alors de la façon suivante :</p>
                <pre>
                    <code>   
                        <?= htmlspecialchars('
<!-- début de la page html -->
<!DOCTYPE html>
<html lang=fr>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Connexion aux bases de données</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/uikit.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/styles/monokai.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<!-- début du corps de la page -->
<body>
<!-- en-tête de la page (header) -->
    <header>
<!-- barre de navigation -->
        <nav class="uk-navbar-container uk-margin" uk-navbar>
            <div class="uk-navbar-center">
                <div class="uk-navbar-center-left">
                    <div>
                        <ul class="uk-navbar-nav">
                            <li>
                                <a href="atelier1.php">Atelier 1</a>
                            </li>
                            <li>
                                <a href="atelier2.php">Atelier 2</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a class="uk-navbar-item uk-logo" href="#">Connexion au Base de Données</a>
                <div class="uk-navbar-center-right">
                    <div>
                        <ul class="uk-navbar-nav">
                            <li>
                                <a href="atelier3.php">Atelier 3</a>
                            </li>
                            <li>
                                <a href="atelier4.php">Atelier 4</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav> 
    </header>
') ?>
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le footer</div>
            <div class="collapsible-body">
                <p>En procédant de la même façon pour le footer ("footer.php"), nous obtiendrons :</p>
                <div>

                    <pre>
                    <code>
                            <?= htmlspecialchars('
  
    <!-- footer -->
    <footer>

    <!-- liens utiles, mentions légales, plan du site, FAQ, ... -->


    <footer

    <script src="../assets/js/jquery-3.3.1.js"></script>
    <script src="../assets/js/uikit.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <script src="../assets/js/script.js"></script>
</body>

</html>
') ?>
                    </code>
                    </pre>
                    <p>
                        Vous pouvez remarquer que les balises fermantes
                    <pre><code class="html"><?= htmlspecialchars('</body>') ?></code></pre> et
                        <pre><code class="html"><?= htmlspecialchars('</html>') ?></code></pre> doivent se trouver dans le fichier "footer.php", et à la fin de se dernier.
                    </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Réunion des fichiers "header.php" et "footer.php" dans le fichier "index.php"</div>
            <div class="collapsible-body">
                <p>
                    Nous avons alors 3 fichiers ".php" à réunir : 2 fichiers au contenu constant ("header.php" et "footer.php") et un fichier au contenu changeant, que l'on nommera ici "index.php".
                </p>
                <p>
                    Pour réunir les réunir, nous allons commencer par inclure le header au début du fichier "index.php" de la manière suivante :
                </p>
                <pre>
                    <code class="html">
                        <?= htmlspecialchars('
<?php
include \'header.php\';
?>');
                        ?>
                    </code>
                </pre>
                <p>
                    Il est possible de vérifier la présence du fichier de cette façon :
                </p>
                <pre>
                    <code class="html">
                        <?= htmlspecialchars('
<?php
if (file_exists(\'header.php\')) {
    include \'header.php\';
} else {
    // affichage erreur
}
?>
');
                        ?>

                    </code>
                </pre>
                <p>
                    On répète la même manipulation pour le footer, mais cette fois-ci nous l'incluerons à la fin du fichier "index.html". En faisant la vérification de la présence du fichier "footer.php", nous obtenons :
                </p>
                <pre>
                    <code class="html">
                        <?= htmlspecialchars('
<?php
if (file_exists(\'footer.php\')) {
    include \'footer.php\';
} else {
    // affichage erreur
}
?>
');
                        ?>

                    </code>
                </pre>
                <p>
                    Ce qui nous donnera donc sur notre fichier "index.php" cette présentation :
                </p>
                <pre>
                    <code class="html">
                        <?= htmlspecialchars('
<?php
if (file_exists(\'header.php\')) {
    include \'header.php\';
} else {
    // affichage erreur
}
?>

<!-- contenu de la page -->
<h1>Un titre</h1>
    <section>
        <h2>Un titre d\'article</h2>
            <article>
        <!-- textes, images, etc... -->
            </article>
        <h2>Un autre titre d\'article</h2>
            <article>
            <!-- textes, images, etc... -->
            </article>
    </section>

<?php
if (file_exists(\'footer.php\')) {
    include \'footer.php\';
} else {
    // affichage erreur
}
?>

');
                        ?>

                    </code>
                </pre>
            </div>
        </li>
    </ul>
</div>