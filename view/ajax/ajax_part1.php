<?php
include '../header.php';
?>
<div class="container">
    <h1>Ajax : exercice 1</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Description</div>
            <div class="collapsible-body">
                <p>
                    La méthode <a href="https://api.jquery.com/jquery.ajax/#jQuery-ajax-url-settings" class="uk-link-mute" title="Lien vers documentation ajax" target="_blank"><code>Ajax</code></a> permet d'intéragir avec votre script PHP en temps, et donc aussi avec votre base de données. Par exemple, on peut imaginer qu'il soit possible de charger un fichier PHP pour l'inclure dans une liste déroulante en fonction d'u  choix fait dans une précédente liste déroulante (comme vu dans les exercices suivants), ou bien simplifier le contrôle d'un formulaire en utilisant que le contrôle en PHP.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Chargement d'un fichier</div>
            <div class="collapsible-body">
                <p>
                    Nous devons ici charger un fichier <code>.html</code> (créer au préalable) et l'afficher dans une <code><div id="#id"></div></code>. Voici notre vue :
                </p>
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3 offset-s3"><a class="active" href="#test1">Vue</a></li>
                            <li class="tab col s3"><a  href="#test2">Fichier à charger</a></li>
                        </ul>
                    </div>
                    <div id="test1" class="col s12">
                        <pre>
                            <code class="html">
                                <?= htmlspecialchars('
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Ajax</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <body>
        <button id="btn1">Afficher une page</button>
        <div id="div1"></div>
    </body>
</html>') ?>
                                </code>
                        </pre>
                    </div>
                    <div id="test2" class="col s12">
                        <pre>
    <code class="html">
                                <?= htmlspecialchars('
    <p>Hello World!!</p>') ?>
    </code>
                        </pre>
                    </div>
                </div>
                <p>
                    Pour charger le fichier, nous allons utiliser Ajax de cette façon :
                </p>
                <pre>
    <code class="js">
                        <?= htmlspecialchars('  $(\'#div1\').load(\'fichier.html\');') ?>
    </code>
                </pre>
                <p>Ce qui nous donne pour le script complet :</p>
                <pre>
    <code class="js">
                        <?= htmlspecialchars('
    $(document).ready(function () {
    /**
     * Atelier 1
     */
    $(\'#btn1\').click(function () {
        $(\'#div1\').load(\'fichier.html\');
    });') ?>
    </code>
                </pre>
                <a href="ajaxDemo.php" class="waves-effect waves-light btn" title="Lien vers démo ajax" target="_blank">RUN CODE</a>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Affichage de la liste de produits jarditou</div>
            <div class="collapsible-body">
                <p>Pour afficher cette liste de produit, il suffit d'ajouter un bouton qui déclanchera la méthode Ajax, et aini permettre le chargement du fichier en question :</p>

                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s2 offset-s3"><a class="active" href="#vue">Vue</a></li>
                            <li class="tab col s2"><a href="#file">Fichier à charger</a></li>
                            <li class="tab col s2"><a href="#js">Js
                                </a></li>
                        </ul>
                    </div>
                    <div id="vue" class="col s12">
                        <pre>
                            <code class="html">
                                <?= htmlspecialchars('
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Ajax</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <body>
        <button id="btn1">Afficher une page</button>
        <button id="btn2">Afficher la liste des produits Jarditou</button>
        <div id="div1"></div>
        <div id="div2"></div>
    </body>
</html>') ?>
                                </code>
                        </pre>
                    </div>
                    <div id="file" class="col s12">
                        <pre>
    <code class="html">
                                <?= htmlspecialchars('<?php
include \'../../controler/allProductControler.php\';
?>
<div class="container">
    <a href="productForm.php" title="Lien vers ajout d\'un produit" target="_blank">Ajouter un produit</a>
    <table>
        <thead>
        <th>Photo</th>
        <th>Id</th>
        <th>Catégorie</th>
        <th>Référence</th>
        <th>Libellé</th>
        <th>Couleur</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Stock</th>
        <th>Ajout</th>
        <th>Modif</th>
        <th>Bloqué</th>
        </thead>
        <tbody>
            <?php
            foreach ($allProduct as $element)
            {
                ?>
                <tr>
                    <td>
                        <img src="../../assets/img/<?= $element->pro_id . \'.\' . $element->pro_photo ?>" alt="Photo d\'illustration" title="Photo de <?= $element->pro_libelle ?>">
                    </td>
                    <td><?= $element->pro_id ?></td>
                    <td><?= $element->pro_cat_id ?></td>
                    <td><?= $element->pro_ref ?></td>
                    <td><?= $element->pro_libelle ?></td>
                    <td><?= $element->pro_couleur ?></td>
                    <td><?= $element->pro_description ?></td>
                    <td><?= $element->pro_prix ?></td>
                    <td><?= $element->pro_stock ?></td>
                    <td><?= $element->pro_d_ajout ?></td>
                    <td><?= $element->pro_d_modif ?></td>
                    <td><?= $element->pro_bloque == 1 ? \'Oui\' : \'Non\' ?></td>
                  
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>    
   
</div> ') ?>
    </code>
                        </pre>
                    </div>
                    <div id="js" class="col s12">
                        <pre>
    <code class="js">
                                <?= htmlspecialchars('
    $(document).ready(function () {
    /**
     * Atelier 1
     */
    $(\'#btn1\').click(function () {
        $(\'#div1\').load(\'fichier.html\');
    });
    $(\'#btn2\').click(function () {
        $(\'#div2\').load(\'../php/allProductAjax.php\');
    });') ?>
    </code>
                        </pre>
                    </div>
                </div>
                <a href="ajaxDemo.php" class="waves-effect waves-light btn" title="Lien vers démo ajax" target="_blank"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>