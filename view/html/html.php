<?php
include '../header.php';
?>
<div class="container">
    <h1>Le HTML</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Introduction</div>
            <div class="collapsible-body"> 
                <p>
                    Le langage HTML (Hyper Text Markup Language) permet au développeur de construire la base d'un site web. Ce langage est supporté par tous les ordinateurs.
                </p>
                <p>
                    Il permet ainsi de communiquer avec l'utilisateur qui pourra alors utiliser des formulaires, visualiser des photos, des vidéos, du texte, etc ...
                </p>
                <p>
                    Le HTML se construit avec des balises, permettant au navigateur de savoir comment est structurée une page web, et d'afficher les divers éléments qu'elle contient.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Contenu d'une page HTML</div>
            <div class="collapsible-body">
                <p>
                    Toutes pages HTML possèdent ce modèle au minimum :
                </p>
                <pre>
                    <code class="html">
                        <?=
                        htmlspecialchars('
<!DOCTYPE html>
    <html lang="fr">
    
    <head>
        <title>Ma page HTML</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">       
        <link rel="stylesheet" href="lien/vers/une/feuilleDeStyle.css">
    </head>
    
    <body>
    
    

    <script src="lien/vers/unScript.js"></script>
</body>

</html>'
                        );
                        ?>
                    </code>
                </pre>
                <h2>Le <code><?= htmlspecialchars('<!DOCTYPE>') ?></code></h2>
                <p>
                    Le <code><?= htmlspecialchars('<!DOCTYPE>') ?></code> permet de définir le type de document que le navigateur va interpréter. On y mentionne le language utilisé (en général <code>html</code>). Il en existe bien d'autres, selon le type de document. Le <code><?= htmlspecialchars('<!DOCTYPE>') ?></code> se trouvera sur la <b>première ligne</b> du code.
                </p>
                <h2>La balise <code><?= htmlspecialchars('<html></html>') ?></code></h2>
                <p>
                    La balise <code><?= htmlspecialchars('<html></html>') ?></code> est la première balise du document, et la dernière à être fermée. On y trouvera l'attribut <code><?= htmlspecialchars('lang') ?></code> qui permettra au programme de référencement et au logiciel de synthèse vocal (pour malvoyant) de savoir en quelle langue se trouve la page.
                </p>
                <h2>La balise <code><?= htmlspecialchars('<head></head>') ?></code></h2>
                <p>
                    Cette balise contient des éléments concernant la page. Parmis ceux-ci, on peut trouver :
                </p>
                <ul>
                    <li>
                        <code><?= htmlspecialchars('<title></title>') ?></code> : correspond au titre le page (qui se trouvera sur l'onglet de la page dans le navigateur)
                    </li>
                    <li>
                        <code><?= htmlspecialchars('<meta charset="UTF-8">') ?></code> : balise très importante, puisqu'elle renseigne quel type d'encodage est utilisé pour afficher la page
                    </li>
                    <li>
                        <code><?= htmlspecialchars('<meta name="viewport" content="width=device-width, initial-scale=1.0">') ?></code> : pas obligatoire, mais utile pour mettre en place le responsive (adaptation du site sur différent format d'écran)
                    </li>
                    <li>
                        <code><?= htmlspecialchars('<link rel="stylesheet" href="lien/vers/une/feuilleDeStyle.css">') ?></code> : appel d'une feuille de style, qui servira à rendre votre site plus agréable à visiter
                    </li>
                    <li>
                        on peut également trouver d'autres balises <code><?= htmlspecialchars('<meta>') ?></code> qui permettront de donner plus de renseignements sur le site en général (l'auteur : <code><?= htmlspecialchars('<meta name="author" content="Nom Auteur">') ?></code>, une decription : <code><?= htmlspecialchars('<meta name="description" content="description du site">') ?></code>, des mots-cles : <code><?= htmlspecialchars('<meta name="keywords" content="mot-clé 1, mot-clé 2, mot-clé 3, etc...">') ?></code>)
                    </li>
                </ul>
                <p>
                    Le contenu de la balise <code><?= htmlspecialchars('<head></head>') ?></code> ne sera pas afficher par le navigateur, il ne se servira de ces informations uniquement pour l'affichage de la page web.
                </p>
                <h2>La balise <code><?= htmlspecialchars('<body></body>') ?></code></h2>
                <p>
                    C'est le corps du document : tout ce qui est inscrit ici sera affiché par le navigateur. C'est ici que nous pourrons mettre en forme à l'aide de balise le document HTML.
                </p>
                <p>
                    Avant la fermeture de la balise <code><?= htmlspecialchars('<body>') ?></code>, on peut trouver la balise <code><?= htmlspecialchars('<script></script>') ?></code>. Elle fera appel à un fichier javascript qui peut être nécessaire au bon fonctionnement du site.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Exemple de page web : exercice Jarditou</div>
            <div class="collapsible-body">
                <p>
                    Nous devons réaliser une page contenant une en-tête, un corps et un pied-de-page. Les liens présents devront être actif et redirigé vers les page concernées. Nous auront au total 3 pages à créer.
                </p>
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3"><a class="active" href="#home">Accueil</a></li>
                            <li class="tab col s3"><a href="#array">Tableau</a></li>
                            <li class="tab col s3"><a href="#contact">Contact</a></li>
                            <li class="tab col s3"><a href="#css">Fichier .css</a></li>
                        </ul>
                    </div>
                    <div id="home" class="col s12">
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
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<!-- header -->
    <header>
    <!-- logo -->
        <p>
            <img src="assets/img/jarditou_logo.jpg" alt="image du logo de jarditou" title="Logo jarditou"
                class="logo">
        </p>
        <p>
            La qualité depuis 70 ans
        </p>
        <!-- navbar -->
        <nav>
            <ul>
                <li><a href="accueil.html" title="Lien vers l\'accueil">Accueil</a></li>
                <li><a href="tableau.html" title="Lien vers un tableau">Tableau</a></li>
                <li><a href="contact.html" title="Lien vers un formulaire de contact">Contact</a></li>
            </ul>
            <!-- image promo -->
            <p>
                <img src="assets/img/promotion.jpg" alt="bannière de promotion jarditou" title="Promo" class="promo">
            </p>
        </nav>
    </header>
<!-- corps de la page -->
    <section>
        <h1>Accueil</h1>
        <hr>
        <!-- article 1 -->
        <h2>L\'entreprise</h2>
        <article>
            <p>
                Notre entreprise familiale met tout son savoir-faire à votre disposition dans le domaine du jardin et
                du paysagisme.
            </p>
            <p>Créée il y a 70 ans, notre entreprise vend fleurs, arbustes, matériel à main et motorisés.</p>
            <p>
                Implantés à Amiens, nous intervenons dans tout le département de la Somme : Albert, Doullens,
                Péronne, Abbeville, Corbie
            </p>
        </article>
    </section>
    <section>
    <!-- article 2 -->
        <h2>Qualité</h2>
        <article>
            <p>
                Nous mettons à votre disposition un service personnalisé, avec 1 seul interlocuteur durant tout votre
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
    </section>
    <hr>
    <!-- footer -->
    <footer>
        <nav>
            <ul>
                <li><a href="#" title="Lien vers les mentions légales">Mentions légales</a></li>
                <li><a href="#" title="Lien vers les horaires d\'ouverture">Horaires</a></li>
                <li><a href="#" title="Lien vers le plan du site">Plan du site</a></li>
            </ul>
        </nav>
    </footer>
</body>

</html>
                       ') ?>
                           </code>
                        </pre>
                        <a href="jarditou/accueil.html" title="Lien vers démo Jarditou" alt="Line vers démo Jarditou" class="waves-effect waves-light btn" target="_blank">RUN CODE</a>
                    </div>
                    <div id="array" class="col s12">
                        <pre>
                           <code>
                                <?= htmlspecialchars(' 
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jarditou</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<!-- header -->
    <header>
        <p>
            <img src="assets/img/jarditou_logo.jpg" alt="image du logo de jarditou" title="Logo jarditou"
                class="logo">
        </p>
        <p>
            La qualité depuis 70 ans
        </p>
        <!-- navbar -->
        <nav>
            <ul>
                <li><a href="accueil.html" title="Lien vers l\'accueil">Accueil</a></li>
                <li><a href="tableau.html" title="Lien vers un tableau">Tableau</a></li>
                <li><a href="contact.html" title="Lien vers un formulaire de contact">Contact</a></li>
            </ul>
            <p>
                <img src="assets/img/promotion.jpg" alt="bannière de promotion jarditou" title="Promo" class="promo">
            </p>
        </nav>
    </header>
    <!-- début tableau -->
    <table>
    <!-- déclaration en-tête du tableau -->
        <thead>
        <!-- déclaration d\'une ligne (<tr></tr>) -->
            <tr>
            <!-- déclaration des cellules d\'en-tête (<th></th>) -->
                <th> -</th>
                <th>Janvier</th>
                <th>Février</th>
                <th>Mars</th>
            </tr>
        </thead>
        <!-- déclaration corps du tableau -->
        <tbody>
            <tr>
            <!-- déclaration des cellules du corps (<td></td>) -->
                <td rowspan="2">Jacques</td>
                <td>74 400</td>
                <td>64 200</td>
                <td>78 900</td>
            </tr>
            <tr>
                <td>68 100</td>
                <td>76 700</td>
                <td>99 500</td>
            </tr>
        </tbody>
        <!-- décalaration du pied du tableau -->
        <tfoot>
            <tr>
                <td>Total</td>
                <td>228 200</td>
                <td>168 900</td>
                <td>187 600</td>
            </tr>
        </tfoot>
    </table>
    <hr>
    <!-- footer -->
    <footer>
        <nav>
            <ul>
                <li><a href="#" title="Lien vers les mentions légales">Mentions légales</a></li>
                <li><a href="#" title="Lien vers les horaires d\'ouverture">Horaires</a></li>
                <li><a href="#" title="Lien vers le plan du site">Plan du site</a></li>
            </ul>
        </nav>
    </footer>
</body>


</html>
                       ') ?>
                           </code>
                        </pre>
                        <a href="jarditou/tableau.html" title="Lien vers démo Jarditou" alt="Lien vers démo Jarditou" class="waves-effect waves-light btn" target="_blank"><i class="material-icons right">play_arrow</i>RUN CODE</a>
                    </div>
                    <div id="contact" class="col s12">
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
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<!-- header -->
    <header>
        <p>
            <img src="assets/img/jarditou_logo.jpg" alt="image du logo de jarditou" title="Logo jarditou"
                class="logo">
        </p>
        <p>
            La qualité depuis 70 ans
        </p>
        <!-- navbar -->
        <nav>
            <ul>
                <li><a href="accueil.html" title="Lien vers l\'accueil">Accueil</a></li>
                <li><a href="tableau.html" title="Lien vers un tableau">Tableau</a></li>
                <li><a href="contact.html" title="Lien vers un formulaire de contact">Contact</a></li>
            </ul>
            <p>
                <img src="assets/img/promotion.jpg" alt="bannière de promotion jarditou" title="Promo" class="promo">
            </p>
        </nav>
    </header>
    <!-- début du formulaire -->
    <form action="#" method="POST">
    <!-- fieldset -> groupe de chamsp de saisie -->
        <fieldset>
        <!-- titre du fieldset -->
            <legend>Vos Coordonnées</legend>
            <!-- champs nom -->
            <div>
            <!-- intitulé du champs -->
                <label for="lastname">Votre nom :</label>
                <!-- champs de saisie -->
                <input type="text" name="lastname" id="lastname" placeholder="Nom de famille">
            </div>
            <div>
                <label for="firstname">Votre prénom :</label>
                <input type="text" name="firstname" id="firstname" placeholder="Prénom">
            </div>
            <div>
                <label for="birthdate">Votre date de naissance :</label>
                <input type="date" name="birthdate" id="birthdate" placeholder="xx/xx/xxxx">
            </div>
            <div>
                <label for="address">Votre adresse</label>
                <input type="text" name="address" id="address" placeholder="Adresse">
            </div>
            <div>
                <label for="city">Votre ville :</label>
                <input type="text" name="city" id="city" placeholder="Ville">
            </div>
            <div>
                <label for="postalCode">Votre code potal</label>
                <input type="text" name="postalCode" id="postalCode" placeholder="Code postal">
            </div>
            <div>
                <div>
                    <label for="mail">Votre e-mail :</label>
                    <input type="email" name="mail" id="mail" placeholder="name@example.com">
                </div>
            </div>
        </fieldset>
        <!-- autre fieldset -->
        <fieldset>
        <!-- boutons radio -->
            <div>
                <div>
                    <input type="radio" name="gender" id="man" value="homme">
                    <label for="man">Vous êtes un homme</label>
                </div>
                <div>
                    <input type="radio" name="gender" id="woman" value="femme">
                    <label for="woman">Vous êtes une femme</label>
                </div>
            </div>
        </fieldset>

        <div>
        <!-- liste déroulante -->
            <label for="job"></label>
            <select name="job">
                <option dissabled selected value="0">Choisissez la formation suivi</option>
                <option value="1">Développeur web, web mobile</option>
                <option value="2">Concepteur développeur d\'application</option>
                <option value="3">Autre ...</option>
            </select>
        </div>
        <div>
            <label for="other">Si vous avez répondu autre, précisez :</label>
            <input type="text" name="other" id="other" placeholder="Précisez">
        </div>
        <div>
            <label for="money"></label>
            <select id="money" name="money">
                <option dissabled selected value="0">Subvention mensuelle</option>
                <option value="1">&lt300</option>
                <option value="2">&lt750</option>
                <option value="3">&lt1000</option>
            </select>
        </div>
        <div>
            <label for="year">En quelle année avez-vous suivi les stage AFPA?</label>
            <input type="date" name="year" id="year" placeholder="xx/xx/xxxx">
        </div>
        <!-- textarea -->
        <div>
            <label for="comments"></label>
            <textarea id="comments" name="comments" rows="3">Vos commentaires</textarea>
        </div>
        <div>
        <!-- bouton validation -->
            <div>
                <input type="buttton" value="Envoyer" id="submit">
            </div>
            <!-- bouton reset du formulaire -->
            <div>
                <input type="reset" name="reset" value="Effacer">
            </div>
        </div>
    </form>
    <hr>
    <!-- footer -->
    <footer>
        <nav>
            <ul>
                <li><a href="#" title="Lien vers les mentions légales">Mentions légales</a></li>
                <li><a href="#" title="Lien vers les horaires d\'ouverture">Horaires</a></li>
                <li><a href="#" title="Lien vers le plan du site">Plan du site</a></li>
            </ul>
        </nav>
    </footer>
</body>

</html>
                       ') ?>
                           </code>
                        </pre>
                        <a href="jarditou/contact.html" title="Lien vers démo Jarditou" alt="Lien vers démo Jarditou" class="waves-effect waves-light btn" target="_blank"><i class="material-icons right">play_arrow</i>RUN CODE</a>
                    </div>
                    <div id="css" class="col s12">
                        <pre>
                            <code class="css">
                                <?= htmlspecialchars('
/* ajustement du logo */
.logo {
    width: 200px;
    height: auto;
    }
/* ajustment de la promo */
.promo {
width: 100%;
height: auto;
}
/* style du tableau */
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  }
                        ') ?>
                            </code>
                        </pre>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Explication</div>
            <div class="collapsible-body">
                <p>
                    Nous avons fractionné notre document en 3 parties que nous appellerons "header", "body" et "footer".
                </p>
                <p>
                    Le header et le footer seront des parties constantes dans notre exemple.
                </p>
                <h3>Header</h3>
                <pre>
                    <code class="html">
                        <?= htmlspecialchars('
<header>
    <p>
        <img src="assets/img/jarditou_logo.jpg" alt="image du logo de jarditou" title="Logo jarditou" class="logo">
    </p>
    <p>
        La qualité depuis 70 ans
    </p>
    <nav>
        <ul>
        <li><a href="accueil.html" title="Lien vers l\'accueil">Accueil</a></li>
        <li><a href="tableau.html" title="Lien vers un tableau">Tableau</a></li>
        <li><a href="contact.html" title="Lien vers un formulaire de contact">Contact</a></li>
        </ul>
    <p>
        <img src="assets/img/promotion.jpg" alt="bannière de promotion jarditou" title="Promo" class="promo">
    </p>
    </nav>
</header>
')
                        ?>
                    </code>
                </pre>
                <p>
                    On peut considérer que : ce qu'il se trouve dans les balises <code><?= htmlspecialChars('<header></header>') ?></code> est l'en-tête de notre page web, tout comme on pourrait trouver une en-tête sur un document papier.
                </p>
                <p>
                    Quelques points à retenir :
                </p>
                <ul>
                    <li>
                        une balise <code><?= htmlspecialchars('<img>') ?></code> est une balise auto fermante (pas besoin d'une balise fermante), tous comme la balise <code><?= htmlspecialchars('<link>') ?></code>. Elle doit se trouver à l'intérieur de <code><?= htmlspecialchars('<p></p>') ?></code>, <code><?= htmlspecialchars('<div></div>') ?></code> ou autres. La balise <code><?= htmlspecialchars('<img>') ?></code> ne doit pas se trouver toute seul dans le "body" sans rien autour. Elle est <b>systématiquement</b> composée d'attributs : <code>src</code> qui indique le chemin de l'image, <code>alt</code> qui donne un text alternatif en cas de non chargement de l'image, et donne une description pour les logiciels vocaux, enfin <code>title</code> qui donne un titre à l'image, visible lorsque le curseur se trouve dessus.
                    </li>
                    <li>
                        les balises <code><?= htmlspecialchars('<nav></nav>') ?></code> indique une barre de navigation, ou une liste de liens permettant de changer de pages aisément.
                    </li>
                    <li>
                        les balises <code><?= htmlspecialchars('<a></a>') ?></code> sont composées d'attributs <code>href</code> (url de la page cible) et <code>title</code> (donne un titre au lien, visible au survol du pointeur)
                    </li>
                </ul>
                <h3>Footer</h3>
                <pre>
                    <code class="html">
                        <?= htmlspecialchars('
<footer>
    <nav>
        <ul>
        <li><a href="#" title="Lien vers les mentions légales">Mentions légales</a></li>
        <li><a href="#" title="Lien vers les horaires d\'ouverture">Horaires</a></li>
        <li><a href="#" title="Lien vers le plan du site">Plan du site</a></li>
        </ul>
    </nav>
</footer>
');
                        ?>
                    </code>
                </pre>
                <p>
                    Le footer est le pied de page, il se déclare avec les balises <code><?= htmlspecialchars('<footer></footer>') ?></code> et contient de manière générale des liens dirigeant vers des sites partenaires, diverses informations, mentions légales, etc ... Etant une liste de liens, il est possible comme ici d'y inclure des balises <code><?= htmlspecialchars('<nav></nav>') ?></code>.
                </p>
                <h3>Le corps de la page</h3>
                <p>
                    C'est le contenu qui aura le plus tendance à changer. Il peut se structurer de différentes manières selon les besoins du développeur et/ou de l'utilisateur.
                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
<section>
    <h1>Accueil</h1>
    <hr>
    <h2>L\'entreprise</h2>
    <article>
        <p>
            Notre entreprise familiale met tout son savoir-faire à votre disposition dans le domaine du jardin et
            du paysagisme.
        </p>
        <p>Créée il y a 70 ans, notre entreprise vend fleurs, arbustes, matériel à main et motorisés.</p>
        <p>
            Implantés à Amiens, nous intervenons dans tout le département de la Somme : Albert, Doullens,
            Péronne, Abbeville, Corbie
        </p>
    </article>
</section>
<section>
    <h2>Qualité</h2>
    <article>
        <p>
            Nous mettons à votre disposition un service personnalisé, avec 1 seul interlocuteur durant tout votre
            projet.
        </p>
        <p>Vous serez séduit par notre expertise, nos compétences et notre sérieux.</p>
    </article>
    <h2>Devis gratuit</h2>
    <article>
        <p>
            Vous pouvez bien sûr contacter pour de plus amples informations ou pour une demande d’intervention.
            Vous souhaitez un devis ? Nous vous le réalisons gratuitement.
        </p>
    </article>
</section>
    ') ?>
                    </code>
                </pre>
                <p>
                    Nous trouverons parmis les balises les plus fréquentes :
                </p>
                <ul>
                    <li>
                        la balise <code><?= htmlspecialChars('<div></div>') ?></code> : balise universelle, un peu fourre-tout, elle désigne simplement un bloc contenant le même type/genre de contenu. Depuis HTML5, d'autres balises ayant la même fonction ont été ajoutées, afin d'éviter la surcharge de <code><?= htmlspecialChars('<div></div>') ?></code> dans le code, et ainsi permettre au développeur de mieux s'y retrouver.
                    </li>
                    <li>
                        la balise <code><?= htmlspecialChars('<section></section>') ?></code> : créée pour remplacer la <code><?= htmlspecialChars('<div></div>') ?></code>, elle va délimiter une section entière de la page web.
                    </li>
                    <li>
                        la balise <code><?= htmlspecialChars('<article></article>') ?></code> : elle va se concentrer sur un article uniquement, contenu plus restreint que les balises précédemment citées.
                    </li>
                    <li>
                        la balise <code><?= htmlspecialChars('<h1 --> h6></h1 --> h6>') ?></code> : ce sont des balises de titre, <code>h1</code> se référant au titre le plus important (en génral le titre de la page). ATTENTION : il ne faut pas utiliser ces balises pour ajuster une taille de police. Elles permettent de situer des parties plus ou moins importantes dans le document html. Pour regler la taille de la police, il faut absolument passer par une feuille de style.
                    </li>
                    <li>
                        la balise <code><?= htmlspecialChars('<p></p>') ?></code> : balise désignant simplement un paragraphe.
                    </li>
                    <li>
                        la balise <code><?= htmlspecialChars('<form></form>') ?></code> : indique la présence d'un formulaire.
                    </li>
                    <li>
                        la balise <code><?= htmlspecialChars('<table></table>') ?></code> : sert à construire un tableau.
                    </li>
                    <li>
                        la balise <code><?= htmlspecialChars('<aside></aside>') ?></code> : indique qu'un contenu devra être afficher sur le coté.
                    </li>
                </ul>
                <p>
                    Il existe bien sûr bien d'autres balises...
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Construction d'un tableau</div>
            <div class="collapsible-body">
                <p>
                    Un tableau se déclare en html à l'aides des balises <code><?= htmlspecialChars('<table></table>') ?></code>.
                </p>
                <pre>
                    <code class="html">
                        <?= htmlspecialchars('
<table>
<!-- notre tableau -->
</table>

') ?>
                    </code>
                </pre>
                <p>
                    Le tableau est lui-même composé de 3 parties:
                </p>
                <ul>
                    <li>
                        l'en-tête <code><?= htmlspecialChars('<thead></thead>') ?></code>, où l'on aura le libellé des colonnes
                    </li>
                    <li>le corps<code><?= htmlspecialChars('<tbody></tbody>') ?></code>, composé d'une ou plusieurs lignes</li>
                    <li>le pied<code><?= htmlspecialChars('<tfoot></tfoot>') ?></code>, le plus souvent utilisé dans le cas de tableaux où l'on doit faire des calculs. Il servira pour afficher les résultats</li>
                </ul>
                <p>
                    Les lignes d'un tableau sont déclarés à l'aide des balises <code><?= htmlspecialChars('<tr></tr>') ?></code>, à l'intérieur desquelles nous pourront y déclarer les cellules du tableau avec <code><?= htmlspecialChars('<th></th>') ?></code> pour l'en-tête, et <code><?= htmlspecialChars('<td></td>') ?></code> pour le body et pied du tableau.
                </p>
                <p>
                    Au final notre tableau aura une structure de ce type :
                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
 <!-- début tableau -->
 <table>
 <!-- déclaration en-tête du tableau -->
     <thead>
     <!-- déclaration d\'une ligne (<tr></tr>) -->
         <tr>
         <!-- déclaration des cellules d\'en-tête (<th></th>) -->
             <th> -</th>
             <th>Janvier</th>
             <th>Février</th>
             <th>Mars</th>
         </tr>
     </thead>
     <!-- déclaration corps du tableau -->
     <tbody>
         <tr>
         <!-- déclaration des cellules du corps (<td></td>) -->
             <td rowspan="2">Jacques</td>
             <td>74 400</td>
             <td>64 200</td>
             <td>78 900</td>
         </tr>
         <tr>
             <td>68 100</td>
             <td>76 700</td>
             <td>99 500</td>
         </tr>
     </tbody>
     <!-- décalaration du pied du tableau -->
     <tfoot>
         <tr>
             <td>Total</td>
             <td>228 200</td>
             <td>168 900</td>
             <td>187 600</td>
         </tr>
     </tfoot>
 </table>
                        ')
                        ?>
                    </code>
                </pre>
                <p>
                    L'attribut <code>rowspan</code> permet la fusion de plusieurs lignes. A l'identique, nous utiliserons <code>colspan</code> pour la fusion de plusieurs cellules.
                </p>
                <p>
                    Il suffit d'ajouter ensuite un peu de CSS pour faire les bordures :
                </p>
                <pre>
                    <code class="css">
                        <?= htmlspecialchars('
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  }
') ?>
                    </code>
                </pre>
                <p>
                    Nous sélectionnons chaque balise de notre tableau, et nous leur appliquons une bordure, ici continue, noire et d'un pixel d'épaisseur.
                </p>
                <a href="jarditou/tableau.html" title="Lien vers démo Jarditou" alt="Line vers démo Jarditou" class="waves-effect waves-light btn" target="_blank"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Construction d'un formulaire</div>
            <div class="collapsible-body">
                <p>
                    La déclaration d'un formulaire se fait à l'aide des balises <code><?= htmlspecialChars('<form></form>') ?></code>. Nous y trouverons en attributs
                    <code>action="page.html"</code> qui désigne la page vers laquelle seront redirigés l'utilisateur et les données transmises par le formulaire lors de sa validation, et <code>method="GET"</code> qui indique la méthode de transmition des données (<code>GET</code> permet de passer les données d'une page à une autre en les passant dans l'URL, avec <code>POST</code> les données sont transmises sans passer dans l'URL).
                </p>
                <p>
                    ATTENTION : le fait de transmettre les données d'un formulaire dans l'URL est risqué : L'URL est visible de tous, il n'est peut-être pas opportun pour la santé de votre site que l'utilisateur puisse avoir accès à certaines données directement dans l'URL.
                </p>
                <p>
                    A l'intérieur des balises <code><?= htmlspecialChars('<form></form>') ?></code>, nous trouverons 2 types de balises:
                </p>
                <ul>
                    <li>
                        <code><?= htmlspecialchars('<label></label>') ?></code> : affiche le nom d'un champs de saisie
                    </li>
                    <li>
                        <code><?= htmlspecialchars('<input>') ?></code> : champs de saisie
                    </li>
                </ul>
                <p>
                    <b>Il est important de respecter quelques règles :</b>
                </p>
                <ul>
                    <li>
                        il y a obligatoirement un attribut <code>for=""</code> sur la balise <code><?= htmlspecialchars('<label>') ?></code>. Cet attribut est relié à l'attribut <code>id</code> de <code><?= htmlspecialchars('<input>') ?></code>
                    </li>
                </ul>
                <p>
                    Pour la balise <code><?= htmlspecialchars('<input>') ?></code> :
                </p>
                <ul>
                    <li>
                        Sur <code><?= htmlspecialchars('<input>') ?></code> on trouve donc un attribut <code>id=""</code>, qui relie <code><?= htmlspecialchars('<input>') ?></code> à <code><?= htmlspecialchars('<label>') ?></code> en faisant la liaison avec le <code>for=""</code>
                    </li>
                    <li>
                        On doit trouver aussi l'attribut <code>name=""</code>. C'est à l'aide de cet attribut que plus tard nous pourrons récupérer les données saisies dans les champs du formulaire
                    </li>
                    <li>
                        Il y a également l'attribut <code>type=""</code> : il renseigne sur le type de champs que nous avons, et sur la nature des données qui doivent être saisies. Il permet aussi selon le type de cacher la saisie, de n'autoriser que des chiffres, etc ...
                        Il existe d'autres types d'attributs qui influencient sur le fonctionnement des <code><?= htmlspecialchars('<input>') ?></code> :
                        <ul>
                            <li>
                                <code>submit</code> : crée un bouton de validation et recharge la page
                            </li>
                            <li>
                                <code>checkbox</code> : crée une case à cocher
                            </li>
                            <li>
                                <code>reset</code> : efface le formulaire
                            </li>
                            <li>
                                <code>radio</code> : affiche un bouton radio
                            </li>
                        </ul>
                    </li>
                    <li>
                        L'attribut <code>placeholder</code> : il pré-rempli le champs en donnant un indication à l'utilisateur de ce que nous attendons comme format de saisie. Il est aussi utilisé pour donner des indications aux logiciels de synthèses afin d'aider les malvoyants.
                    </li>
                </ul>
                <p>
                    Il existe beaucoup d'autres types d'attributs qui influencient sur la fonction et le fonctionnement des <code><?= htmlspecialchars('<input>') ?></code>.
                </p>
                <p>
                    Au final, notre formulaire ressemblera à ceci :
                </p>
                <pre>
                    <code class="html">
                        <?= htmlspecialchars('
    <!-- début du formulaire -->
    <form action="#" method="POST">
    <!-- fieldset -> groupe de chamsp de saisie -->
        <fieldset>
        <!-- titre du fieldset -->
            <legend>Vos Coordonnées</legend>
            <!-- champs nom -->
            <div>
            <!-- intitulé du champs -->
                <label for="lastname">Votre nom :</label>
                <!-- champs de saisie -->
                <input type="text" name="lastname" id="lastname" placeholder="Nom de famille">
            </div>
            <div>
                <label for="firstname">Votre prénom :</label>
                <input type="text" name="firstname" id="firstname" placeholder="Prénom">
            </div>
            <div>
                <label for="birthdate">Votre date de naissance :</label>
                <input type="date" name="birthdate" id="birthdate" placeholder="xx/xx/xxxx">
            </div>
            <div>
                <label for="address">Votre adresse</label>
                <input type="text" name="address" id="address" placeholder="Adresse">
            </div>
            <div>
                <label for="city">Votre ville :</label>
                <input type="text" name="city" id="city" placeholder="Ville">
            </div>
            <div>
                <label for="postalCode">Votre code potal</label>
                <input type="text" name="postalCode" id="postalCode" placeholder="Code postal">
            </div>
            <div>
                <div>
                    <label for="mail">Votre e-mail :</label>
                    <input type="email" name="mail" id="mail" placeholder="name@example.com">
                </div>
            </div>
        </fieldset>
        <!-- autre fieldset -->
        <fieldset>
        <!-- boutons radio -->
            <div>
                <div>
                    <input type="radio" name="gender" id="man" value="homme">
                    <label for="man">Vous êtes un homme</label>
                </div>
                <div>
                    <input type="radio" name="gender" id="woman" value="femme">
                    <label for="woman">Vous êtes une femme</label>
                </div>
            </div>
        </fieldset>

        <div>
        <!-- liste déroulante -->
            <label for="job"></label>
            <select name="job">
                <option dissabled selected value="0">Choisissez la formation suivi</option>
                <option value="1">Développeur web, web mobile</option>
                <option value="2">Concepteur développeur d\'application</option>
                <option value="3">Autre ...</option>
            </select>
        </div>
        <div>
            <label for="other">Si vous avez répondu autre, précisez :</label>
            <input type="text" name="other" id="other" placeholder="Précisez">
        </div>
        <div>
            <label for="money"></label>
            <select id="money" name="money">
                <option dissabled selected value="0">Subvention mensuelle</option>
                <option value="1">&lt300</option>
                <option value="2">&lt750</option>
                <option value="3">&lt1000</option>
            </select>
        </div>
        <div>
            <label for="year">En quelle année avez-vous suivi les stage AFPA?</label>
            <input type="date" name="year" id="year" placeholder="xx/xx/xxxx">
        </div>
        <!-- textarea -->
        <div>
            <label for="comments"></label>
            <textarea id="comments" name="comments" rows="3">Vos commentaires</textarea>
        </div>
        <div>
        <!-- bouton validation -->
            <div>
                <input type="buttton" value="Envoyer" id="submit">
            </div>
            <!-- bouton reset du formulaire -->
            <div>
                <input type="reset" name="reset" value="Effacer">
            </div>
        </div>
    </form>
') ?>
                    </code>
                </pre>

                <a href="jarditou/contact.html" title="Lien vers démo Jarditou" alt="Line vers démo Jarditou" class="waves-effect waves-light btn" target="_blank"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>