<?php
include '../header.php';
?>
<div class="container">
    <h1>Le CSS</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Introduction</div>
            <div class="collapsible-body">
                <p>
                    Le CSS (Cascading Style Sheets) ou feuille de style en cascade est un langage qui permet d'appliquer du style à une page web. C'est dans ce fichier que l'on va pouvoir modifier la taille, le positionnement, le style, la couleur de la police (ou n'importe quel élément), et bien d'autres choses encore!
                </p>
                <p>
                    Le CSS s'occupe du côté visuel du site web et fait qu'il soit agréable à visiter.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Intégration dans une page web</div>
            <div class="collapsible-body">
                <p>
                    Pour faire du CSS sur une page web, il est nécessaire de créer un fichier dont l'extension sera ".css".
                </p>
                <p>
                    Pour l'appliquer à une page HTML, le fichier sera appelé dans le fichier HTML, entre les balises <code><?= htmlspecialchars('<head></head>') ?></code>, à l'aide d'une balise <code><?= htmlspecialchars('<link>') ?></code> :
                </p>
                <pre>
                    <code class="html">
                        <?= htmlspecialchars('
<link rel="stylesheet" href="chemin/vers/feuilleDeStyle.css">
                        ') ?>
                    </code>
                </pre>
                <p>
                    Décomposons cette balise :
                </p>
                <ul>
                    <li>
                        <code>rel="stylesheet"</code> : permet d'indiquer une relation entre 2 fichiers, peut également se trouver sur des balises <code><?= htmlspecialchars('<a>') ?></code> et <code><?= htmlspecialchars('<area>') ?></code>. Sa valeur <code>stylesheet</code>, quant à elle, fait référence à une feuille de style.
                    </li>
                    <li>
                        L'attribut <code>href</code> indique le chemin vers la feuille de style à utiliser.
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Déclaration et appel</div>
            <div class="collapsible-body">
                <p>
                    Pour appliquer du CSS sur un élément, il existe plusieurs méthodes :
                </p>
                <ul>
                    <li>
                        En appliquant une classe à l'élément. La classe sera définie de cette manière :
                        <pre>
                            <code class="html">
                                <?= htmlspecialchars('
<div class="nomDeLaClasse"></div>') ?>
                            </code>
                        </pre>
                        Elle sera appelée dans le fichier style.css :
                        <pre>
                            <code class="css">
                                <?= htmlspecialchars('
.nomDeLaClasse {

} ') ?>
                            </code>
                        </pre>
                    </li>
                    <li>
                        En ciblant à l'aide d'un id. On appellera l'id de cette manière dans notre fichier .css :
                        <pre>
                            <code class="css">
                                <?= htmlspecialchars('
#id {

} ') ?>
                            </code>
                        </pre>
                    </li>
                    <li>
                        En utilisant directement une balise. Son ciblage se fera alors de cette façon :
                        <pre>
                            <code class="css">
                                <?= htmlspecialchars('
div {
    
}') ?>
                            </code>
                        </pre>
                        Attention!!! Appliquer une classe de cette manière revient à l'appliquer sur toutes les balises identiques dans le document HTML.
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Application</div>
            <div class="collapsible-body">
                <p>
                    En guise d'exemple, reprenons la page Jarditou. Nous allons ajouter une colonne à droite du texte, colorer la barre de navigation et le footer, et mettre les listes en ligne.
                </p>
                <p>
                    Pour cela nous utiliserons le code suivant :
                </p>
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3 offset-s3"><a class="active" href="#html">HTML</a></li>
                            <li class="tab col s3"><a href="#css">CSS</a></li>
                        </ul>
                    </div>
                    <div id="html" class="col s12">
                        <pre>
                            <code class="html">
                                <?= htmlspecialchars(' 
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jarditou</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<!-- header -->
    <header>
        <p>
            <img src="img/jarditou_logo.jpg" alt="image du logo de jarditou" title="Logo jarditou" class="logo">
        </p>
        <p>
            La qualité depuis 70 ans
        </p>
        <nav class="nav">
            <ul>
                <li class="li1""><a href="accueil.html">Accueil</a></li>
                <li class="li1""><a href="tableau.html">Tableau</a></li>
                <li class="li1""><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
        <div>
            <img src="img/promotion.jpg" alt="bannière de promotion jarditou" title="Promo" class="promo">
        </div>
    </header>
    <!-- corps de la page -->
    <div class="flex">
        <section>
            <h1>Accueil</h1>
            <hr>
            <!-- article 1 -->
            <h2>\'entreprise</h2>
            <article>
                <p>
                    Notre entreprise familiale met tout son savoir-faire à votre disposition dans le domaine du jardin
                    et
                    du paysagisme.
                </p>
                <p>Créée il y a 70 ans, notre entreprise vend fleurs, arbustes, matériel à main et motorisés.</p>
                <p>
                    Implantés à Amiens, nous intervenons dans tout le département de la Somme : Albert, Doullens,
                    Péronne, Abbeville, Corbie
                </p>
            </article>
            <!-- article 2 -->
            <h2>Qualité</h2>
            <article>
                <p>
                    Nous mettons à votre disposition un service personnalisé, avec 1 seul interlocuteur durant tout
                    votre
                    projet.
                </p>
                <p>Vous serez séduit par notre expertise, nos compétences et notre sérieux.</p>
            </article>
            <!-- article 3 -->
            <h2>Devis gratuit</h2>
            <article>
                <p>
                    Vous pouvez bien sûr contacter pour de plus amples informations ou pour une demande d’intervention.
                    Vous souhaitez un devis ? Nous vous le réalisons gratuitement.
                </p>
            </article>
            <hr>
        </section>  
        <!-- colonne placée à droite -->     
        <aside>
            <p>
                Colonne de droite
            </p>
        </aside>
    </div>  
    <!-- footer -->
    <footer>
        <nav class="nav">
            <ul>
                <li class="li1"><a href="">Mentions légales</a></li>
                <li class="li1"><a href="">Horaires</a></li>
                <li class="li1"><a href="">Plan du site</a></li>
            </ul>
        </nav>
    </footer>
</body>

</html>
                       ') ?>
                            </code>
                        </pre>
                    </div>
                    <div id="css" class="col s12">
                        <pre>
                            <code>
                                <?= htmlspecialchars(' 
/* ajustement du logo */
.logo {
width: 200px;
height: auto;
}
/* ajustement de l\'image promo */
.promo {
width: 100%;
height: auto;
}
/* style du tableau */
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
/* navbar (fond, couleur police, postionnement contenus */
.nav {
    background: black;
    padding: 20px;  
}
nav a {
    color: white;
}

ul li a {
    color: white;    
}
ul {
    display: flex;
}
.li1 {
    margin-left: 1em;
}
/* style de la colonne de droite */
aside {
    min-width: 30%;
    background: grey;
}
/* class permettant l\'alignement des div contenant le texte et la colonne de droite */
.flex {
    display: flex;
}
    ') ?>
                            </code>
                        </pre>
                    </div>
                    <a href="jarditou_css/accueil.html" title="Lien vers demon" target="_blank" class="waves-effect waves-light btn"><i class="material-icons right">play_arrow</i>RUN CODE</a>
                </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Explication</div>
            <div class="collapsible-body">
                <p>
                    Nous avons ajouté des classes CSS sur certains éléments afin d'en changer les propriétés :
                </p>
                <ul>
                    <li>
                        la classe <code>.nav</code> permet de changer le fond de la barre de navigation et du footer (<code> background: black;</code>), ainsi que de mettre une marge intérieur (<code>padding</code>) pour éviter que les liens ne soient coller sur la bordure gauche
                    </li>
                    <li>
                        en appliquant la propriété <code>display: flex;</code> sur les balises <code><?= htmlspecialchars('<ul></ul>') ?></code>, on permet l'alignement des liens
                    </li>
                    <li>
                        ce même <code>display: flex;</code> est utilisé dans la classe <code>.flex</code>, appliquée sur la <code><?= htmlspecialchars('<div>') ?></code> englobant notre texte et la colonne de droite: nous un bloc contenant 2 autres blocs, plus petits. Sans cette propriété, les blocs auraient été superposés. Cette propriété nous a permis de les mettre sur la même ligne. On a défini une largeur maximal sur la balise <code>aside</code>, le texte prend le reste de la place.
                    </li>
                    <li>
                        nous avons redimensionné nos images à l'aide des propriétés définies dans les classes <code>.logo</code> et <code>.promo</code>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>