<?php
include '../header.php';
?>
<div class="container">
    <h1>Bootstrap</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Introduction</div>
            <div class="collapsible-body">
                <p>
                    Bootstrap est framework CSS créé par l'équipe de Twitter. Un framework permet l'utilisation de modules prédéfinis en appelant uniquement certaines classes définies au préalable dans le fichier .css du framework, et en utilisant des fonctions javascript, elles aussi déjà établies dans un fichier .js .
                </p>
                <p>
                    Cele permet un gain de temps pour la construction d'une page, surtout lorsque certains modules se répètent. On pourrait vulgairement comparer un framework à du "préfabriqué".
                </p>
                <p>
                    Bootstrap apportera un style prédéfinis à votre page web. Cependant, vous avez la possibilité de personnaliser les différents composant en appelant les classes CSS correspondantes dans le fichier style.css.
                </p>
                <p>
                    <b>ATTENTION!!!</b> Ne jamais modifier le fichier CSS ou Javascript de Bootstrap.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Insertion du framework dans une page web et utilisation</div>
            <div class="collapsible-body">
                <p>
                    Tout comme le fichier CSS, il s'intègre dans les balises <code><?= htmlspecialchars('<head></head>') ?></code> pour la partie CSS. La partie script quant à elle s'insère à la fin du document HTML, juste avant la fermeture de la balise <code><?= htmlspecialchars('</body>') ?></code>.
                </p>
                <p>
                    Vous pouvez soit le télécharger <a href="https://getbootstrap.com/docs/4.3/getting-started/download/" title="Lien vers téléchargement de Bootstrap" target="_blank">ici</a>, soit insérer un CDN ( content delivery network).
                </p>
                <p>
                    Avantage du téléchargement :
                </p>
                <ul>
                    <li>Travail en local : vous avez toujours la possibilité de travailler sur votre projet même en cas de coupure de réseau internet.</li>
                    <li>Vous pouvez parcourir les fichiers du framework afin d'en comprendre le fonctionnement et le personnaliser.</li>
                </ul>
                <p>
                    Avantage du CDN :
                </p>
                <ul>
                    <li>Pas de place occupée sur votre serveur.</li>
                    <li>Rapide à mettre en place.</li>
                </ul>
                <p>
                    Avec Bootsrap inséré, notre document sera de ce type :
                </p>
                <pre>
                <code class="html">
                        <?= htmlspecialchars('
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Tartempion, une construction pour la vie !</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    <script src="js/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
                    ') ?>
                </code>
                </pre>
                <p>
                    D'autres fichiers script sont nécessaires à l'utilisation de Bootstrap (Jquery, popper). Leur utilité sera expliquée plus tard.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Utilisation</div>
            <div class="collapsible-body">
                <p>
                    Une fois inséré, vous pouvez utiliser Bootstrap de la même façon que vous appeleriez une classe définie sur un fichier style.css.
                </p>
                <p>
                    Exemple : boutton sans bootstrap vs boutton avec Bootstrap
                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
<!-- boutton sans bootstrap -->
<button>click</button>

<!-- boutton avec Bootstrap -->
<button class="btn btn-primary">click</button>
') ?>
                    </code>
                </pre>
                <a href="button.php" title="Lien vers démo" target="_blank" class="waves-effect waves-light btn"><i class="material-icons right">play_arrow</i>RUN CODE</a>
                <p>
                    Bootstrap propose de nombreux éléments pré-établis sur sa documentation (formulaire, tableau, barre de navigation, pagination, etc...). Il ne reste qu'à copier le code, le coller sur le document HTML et le personnaliser selon les besoins.
                </p>
                <p>
                    <b>IMPORTANT : il faut toujours travailler sur un framework avec la documentation à portée !!!</b>
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Jarditou avec Bootstrap</div>
            <div class="collapsible-body">
                <pre>
                   <code>
                        <?= htmlspecialchars('
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Jarditou</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container-fluid">
    <!-- header, contient la navbar, le logo et une image promo -->
        <header>
            <img src="assets/img/jarditou_logo.jpg" alt="logo Jarditou" title="logo jarditou">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="accueil.html">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tableau.html">Tableau</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="formulaire.html" tabindex="-1">Formulaire</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="row">
                <div class="col-sm-12">
                    <img src="assets/img/promotion.jpg" title="Promotion" alt="photo de promotion" class="img">
                </div>
            </div>
        </header>
        <!-- début du corp de la page -->
        <section class="row">
            <div class="col-sm-8">
                <h1>accueil</h1>
                <!-- article 1 -->
                <h2>L\'entreprise</h2>
                <article>
                    <p>
                        Notre entreprise familiale met tout son savoir-faire à votre disposition dans le domaine
                        de
                        la
                        rénovation
                        immobilière.
                    </p>
                    <p>
                        Crée il y a 70 ans, notre entreprise intervient pour les constructions neuves ou en
                        rénovation, chez
                        les
                        particuliers, les professionnels et les collectivités.</p>
                    <p>
                        Implantés à Amiens, nous intervenons dans tout le département de la Somme : Albert,
                        Doullens,
                        Péronne,
                        Abbeville, Corbie
                    </p>
                </article>
                <!-- article 2 -->
                <h2>Qualité</h2>
                <article>
                    <p>Nous mettons à votre disposition un service personnalisé, avec 1 seul interlocuteur
                        durant
                        tout votre
                        projet.
                    </p>
                    <p>
                        Vous serez séduit par notre expertise, nos compétences et notre sérieux dans les travaux.
                    </p>
                </article>
                <!-- article 3 -->
                <h2>Devis gratuit</h2>
                <article>
                    <div>
                        <p>Vous pouvez bien sûr contacter pour de plus amples informations ou pour une demande
                            d’intervention.
                            Vous
                            souhaitez un devis ? Nous vous le réalisons gratuitement.
                        </p>
                </article>
            </div>
            <!-- colonne grisée à droite -->
            <div class="col-sm-4">
                <aside class="aside">
                    <p>blablabla</p>
                </aside>
            </div>
        </section>
        <!-- footer -->
        <footer class="footer bg-dark">
            <ul>
                <li class="li1"><a href="mentions.html">mentions légales</a></li>
                <li class="li1"><a href="horaires">horaires</a></li>
                <li class="li1"><a href="plan">plan du site</a></li>
            </ul>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
                       ') ?>
                   </code>
                </pre>
                <a href="jarditou_bootstrap/jardiboot.php" target="_blank" title="Lien vers demo" class="waves-effect waves-light btn"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
        <li>
            <div class="collapsible-header">La grille Bootstrap</div>
            <div class="collapsible-body">
                <p>
                    Pour l'exemple de Jarditou avec Bootstrap, nous utilisons son système de <a href="https://getbootstrap.com/docs/4.3/layout/grid/" title="Lien vers documentation Bootstrap" target="_blank" class="uk-link-muted">grille</a>. Bootstrap permet de diviser la page web en 12 colonnes d'égales largeur.
                </p>
                <p>
                    Grâce à ces colonnes, nous pourrons positionner nos éléments de façon plus simple et plus précise.
                </p>
                <p>
                    Pour placer nos éléments dans cette grille, il suffit de déclarer une ligne, puis le nombre de colonnes qu'utilisera notre élément sur la grille, en utilisant des classes prédéfinies par Bootstrap :
                </p>
                <ul>
                    <li>
                        Déclaration d'une ligne :
                        <pre>
                        <code class="html">
                                <?= htmlspecialchars('
<div class="row"></div>
                        ') ?>
                        </code>
                        </pre>
                    </li>

                    <li>
                        Déclaration d'une colonne :
                        <pre>
                        <code class="html">
                                <?= htmlspecialchars('
<div class="col"></div>
                        ') ?>
                        </code>
                        </pre>
                    </li>
                </ul>
                <p>
                    Derrière le "col", vous avez la possibilité d'ajouter le format à partir duquel vous voulez appliquer la grille, et le nombre de colonne qu'occupera votre élément.
                </p>
                <p>
                    Exemple :
                <pre>
                    <code class="html">
                        <?= htmlspecialchars('
<div class="col-sm-6"></div>
                    ') ?>
                    </code>
                </pre>
                Ici notre <code><?= htmlspecialchars('<div>') ?></code> ocuppera 6 colonnes pour tous les formats supérieurs à 576px (plus de précision <a href="https://getbootstrap.com/docs/4.3/layout/grid/#grid-options" title="Lien vers la documentation Bootstrap" target="_blank">ici</a> concernant les différents formats d'écran).
                </p>
                <p>
                    Il est possible d'utiliser plusieurs classes <code>col</code> en même temps si vous souhaitez avoir un affichage différents selon le format de l'écran.
                </p>
                <p>
                    Exemple :
                <pre>
                        <code class="html">
                        <?= htmlspecialchars('
<!-- définition d\'une ligne -->
<div class="row">
<!-- définition d\'une première colonne de taille 6 -->
    <div class="col-12 col-md-6">
        Un élément
    </div>
    <!-- définition d\'une deuxième colonne de taille 6 -->
    <div class="col-12 col-md-6">
        Un autre élément
    </div>
</div>

                        ') ?>
                        </code>
                </pre>
                Ici les 2 éléments seront côte à côte sur un affichage supérieurs à 768px, mais l'un au dessus de l'autre pour un affichage inférieur.
                </p>
                <p>
                    <b>IMPORTANT :</b> gardez toujours en tête que lorsque vous définissez une row, elle sera systématiquement sur 12 colonnes, même si elle est définie à l'intérieur d'une autre row.
                </p>
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>