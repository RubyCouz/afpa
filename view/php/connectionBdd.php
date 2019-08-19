
<div class="container">
    <h1>Connexion à la base de données et affichage d'une table</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Affichage d'un produit selon son id</div>
            <div class="collapsible-body">
                <p>
                    Pour l'affichage d'un produit, nous devons d'abord nous connecter à la base de données, puis lancer une requête pour chercher les informations nécessaires/demandées.
                </p>
                <p>
                    Afin de conservé un code propre et organisé, nous allons séparer le HTML du PHP, de la même manière que pour la division de la page web.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Connexion à la base de données</div>
            <div class="collapsible-body">
                <p>
                    Nous allons créer ce qu'on appellera un contrôleur. Pour cela nous allons créer un fichier appelé "productController.php". Ce fichier sera appelé dans notre page affichant le produit à l'aide d'un "include" :
                </p>
                <pre>
                    <code class="html">                
                        <?= htmlspecialchars('
<!-- fichier : product.php -->
<?php
include \'../controller/productController.php\';
?>');
                        ?>
                    </code>
                </pre>
                <p>
                    Ce sera dans notre contrôleur (dans un premier temps) où seront effectuées la connection à la base de données et les requêtes nécessaires au fonctionnement de la page.
                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
 <?php
 try {
    $db = new PDO(\'mysql:host=localhost;charset=utf8;dbname=jarditou\', \'root\', \'\');
} catch (Exception $e) {
    echo \'erreur : \' . $e->getMessage() . \'<br>\';
    echo \'N° : \' . $e->getCode();
    die(\'fin du script\');
}
?>
               '); ?>
                    </code>
                </pre>
                <p>
                    Le "try ... catch" permet de "tenter" une connection à la base (try) et de retourner une erreur si la connection ne se fait pas (catch).
                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
<?php
  $db = new PDO(\'mysql:host=localhost;charset=utf8;dbname=jarditou\', \'root\', \'\');
  ?>
                '); ?>
                    </code>
                </pre>
                <p>
                <ul>
                    <li><code>$db</code> (ou un nom de votre choix) représente une instance de connexion à la base de données.</li>
                    <li><code>mysql:host=localhost</code> : adresse du host (serveur) où se trouve votre base de données.</li>
                    <li><code>charset=utf8</code> : type de caractère utilisé (UTF8 ici).</li>
                    <li><code>root</code> : nom d'utilisateur de base de données (le même que sur Phpmyadmin ou heidiSQL)</li>
                    <li><code>' '</code> : le mot de passe utilisé si vous en utilisé un.</li>
                </ul>

                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
<?php
$e->getMessage()
?>
                '); ?>
                    </code>
                </pre>
                <p>Permet de récupérer le message d'erreur.</p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
<?php
 $e->getCode()
 ?>
                '); ?>
                    </code>
                </pre>
                <p>Récupération du code d'erreur.</p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Affichage d'un produit</div>
            <div class="collapsible-body">
                <p>
                    Une fois la connexion à la base de données établie, nous pouvons alors établir notre requète pour demander l'affichage d'un produit à l'aide d'une requête SQL :
                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
<?php
$query = \'SELECT * FROM `produits` WHERE `pro_id` = 7\';
$result = $db->query($query);
$produit = $result->fetch(PDO::FETCH_OBJ);
$result->closeCursor();            
?>            
            '); ?>
                </code>
                </pre>
                <p>
                    On stocke dans un premier temps la requête SQL dans une variable (ici on sélectionne toutes les colonnes de la table "produits" où la valeur de "pro_id" est égale à 7):
                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
$query = \'SELECT * FROM `produits` WHERE `pro_id` = 7\';
                '); ?>
                    </code>
                </pre>
                <p>
                    On fait ensuite appel à la méthode (ou fonction) <code>query()</code> de l'objet <code>$db</code> (instance de notre connexion à la base de données) en faisant passer en argument notre requête SQL. Noous stockons le résultat dans une variable "$result" :
                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
<?php
$result = $db->query($query);
?>
                ') ?>
                    </code>
                </pre>
                <p>
                    On utilise ensuite la méthode <code>fetch()</code> (littéralement "chercher") pour obtenir le résultat sous forme d'objet avec l'utilisation du paramètre <code>PDO::FETCH_OBJ</code>. Il existe d'autres paramètres permettant le retour du résultat sous une autre forme qu'un objet selon vos besoins.
                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
<?php
$produit = $result->fetch(PDO::FETCH_OBJ);
?>
                ') ?>
                    </code>
                </pre>
                <p>
                    A noter que dans le cadre d'un affichage de plusieurs lignes de votre base de données, on utilisera la méthode <code>fetchAll()</code>
                </p>
                <p>
                    Enfin, on finit notre code avec <a href="http://php.net/manual/fr/pdostatement.closecursor.php" target="_blank">"closeCursor()"</a>. Ceci va clore notre <code>Fetch()</code>. Notons qu'il n'est pas obligatoire de l'utiliser, selon quel gestionnaire de BDD on utilise. Par mesure de sécurité en cas de changement de gestionnaire de BDD, il est préférable de le mettre quand même.
                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
<?php
$produit = $result->fetch(PDO::FETCH_OBJ);
$result->closeCursor(); 
?>
                    '); ?>
                    </code>
                </pre>
                <p>
                    Nous pouvons maintenant passer à l'affichage de notre produit :
                </p>
                <pre>
                    <code class="html">
                        <?= htmlspecialchars('
<p>Id du produit : <?= $produit->pro_id ?></p>
<p>Catégorie du produit : <?= $produit->pro_cat_id ?></p>
<p>Référence du produit : <?= $produit->pro_ref ?></p>
<p>Libellé du produit : <?= $produit->pro_libelle ?></p>
<p>Description du produit : <?= $produit->pro_description ?></p>
<p>Prix du produit : <?= $produit->pro_prix ?></p>
<p>Stock : <?= $produit->pro_stock ?></p>
<p>Photo du produit : <?= $produit->pro_photo ?></p>
<p>Ajout du produit : <?= $produit->pro_d_ajout ?></p>
<p>Modif du produit : <?= $produit->pro_d_modif ?></p>
<p>Bloqué : <?= $produit->pro_bloque ?></p>
                '); ?>
                    </code>
                </pre>
                <p>
                    L'objet "produit" contient l'ensemble des champs de la ligne que l'on veux afficher. Afin d'afficher chaque colonne de notre ligne nous allons utiliser la constrution "objet->nom-propriété".
                </p>
                <p>
                    Ex : "$produit->pro_id" revient à dire que nous voulons afficher la colonne intitulée "pro_id" de l'objet "produit".
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Affichage de tous les produits</div>
            <div class="collapsible-body">
                <p>
                    L'affichage de plusieurs de va vraiment différer au niveau du controlleur, si ce n'est que la requête est légèrement différente :
                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
<?php
$query = \'SELECT * FROM `produits`\';
$result = $db->query($query);
$allProduct = $result->fetchAll(PDO::FETCH_OBJ);
$result->closeCursor();
?>
            ') ?>
                </code>
                </pre>
                <p>
                    L'affichage quant à lui sera légèrement différent : ayant plusieurs lignes à afficher, nous allons devoir parcourir chaque colonne de chaque ligne, d'ou l'utilisation d'une boucle <code>foreach() {}</code> :
                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
<table class="stripped highlight centered responsive-table table">
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
                        <img src="../../assets/img/<?= $element->pro_id . \'.\' . $element->pro_photo ?>" alt="Photo d\'illustration" title="Photo de <?= $element->pro_libelle ?>" class="pic">
                    </td>
                    <td><?= $element->pro_id ?></td>
                    <td><?= $element->cat_nom ?></td>
                    <td><?= $element->pro_ref ?></td>
                    <td><?= $element->pro_libelle ?></td>
                    <td><?= $element->pro_couleur ?></td>
                    <td><?= $element->pro_description ?></td>
                    <td><?= $element->pro_prix ?>€</td>
                    <td><?= $element->pro_stock ?></td>
                    <td><?= $element->pro_d_ajout ?></td>
                    <td><?= $element->pro_d_modif ?></td>
                    <td><?= $element->pro_bloque == 1 ? \'Oui\' : \'Non\' ?></td>
                    <td><a href="produit.php?id=<?= $element->pro_id ?>" title="Lien vers la fiche produit" class="waves-effect waves-light btn">Détail</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>   
            '); ?>
                </code>
                </pre>
                <p>
                    Vous trouverez le visuel du résultat <a href="allProduct.php" target="_blank">ici</a>
                </p>
                <p>
                    ATTENTION : nous affichons notre liste de produit sous forme de tableau, ce qui conviendra pour une interface administrateur. Pour une interface client (où l'utilisateur ne doit pas forcément tout voir) il sera préférable d'opter pour une présentation plus user-friendly.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Affichage d'un produit selon son id</div>
            <div class="collapsible-body">
                <p>
                    Pour afficher un produit selon son "id", nous allons partir de l'affichage de toutes les lignes de la table, sous forme de tableau comme vu précédemment. On y ajoutera un lien vers une page qui nous affichera les details de la ligne selectionnée.
                </p>
                <p>
                    Ce lien sera composé du chemin menant vers notre nouvelle page et de l'id du produit choisi :
                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
<a href="produit.php?id=<?= $element->pro_id ?>" title="Lien vers la fiche produit" class="waves-effect waves-light btn">Détail</a>
'); ?>
                    </code>
                </pre>
                <p>
                    Ils nous a suffit de renseigner le chemin de la page, d'y ajouter <code>?id=</code> et l'objet <code>$element->pro_id</code>.
                </p>
                <p>
                    Au click sur le bouton, l'id du produit sélectionné sera envoyé dans l'url, et la page vers laquelle nous serons redirigé aura une url du type "https://produit.php?id=15".
                </p>
                <p>
                    En ce qui concerne la construction de la requête, nous devrons donc faire avec une inconnue, le contrôleur ne sera pas en mesure de savoir par avance sur quel bouton nous allons cliquer, et il serait trop laborieux et peu productif de faire une requête ppour chaque produit.
                </p>
                <p>
                    Dans notre contrôleur, nous allons commencer par récupérer l'id du produit que nous avons préalablement passé en url à l'aide la méthode $_GET, permettant de récupérer des informations passées dans l'url :
                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
<?php
$id = $_GET[\'id\'];
?>
                    '); ?>
                    </code>
                </pre>
                <p>
                    On utilisera ensuite un marqueur nominatif dans notre requète pour notre inconnue :
                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
<?php
$query = \' SELECT * FROM `produits` WHERE `pro_id` = :id\';
?>
                ') ?>
                    </code>
                </pre>
                <p>
                    <code>:id</code> est notre marqueur nominatif, sa syntaxe sera toujours la même (<code>:nom_marqueur</code>).
                </p>
                <p>
                    Une fois notre requête SQL établie, nous allons utiliser la méthode <code><a href="http://php.net/manual/fr/pdo.prepare.php" title="Liens vers documentation php.net" target="_blank">"prepare()"</a></code> plutôt que <code>query()</code>. On va dire que l'on fait une <a href="http://php.net/manual/fr/pdo.prepared-statements.php" title="Liens vers documentation php.net" target="_blank">requête préparée</a>
                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
<?php
$result = $db->prepare($query);
?>
                ') ?>
                    </code>
                </pre>
                <p>
                    on va ensuite lier une valeur à notre marqueur nominatif, en faisant un <code>bindValue</code> (to bind = lier). Dans ce <code>bindValue</code> nous retrouverons notre marqueur nominatif, la valeur que l'on va lui attribuer, ainsi que le type de donnée (INT, STR...) :
                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
<?php
$result->bindValue(\':id\', $id, PDO::PARAM_INT);
?>
                ') ?>
                    </code>
                </pre>
                <p>
                    Enusuite on exécute la requête à l'aide de la méthode <code><a href="http://php.net/manual/fr/pdostatement.execute.php" title="Liens vers documentation php.net" target="_blank">execute()</a></code> :
                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
<?php
$result->execute(); 
?>
                ') ?>
                    </code>
                </pre>
                <p>
                    Et enfin nous faisons notre <code>fetch()</code> et notre <code>closeCursor</code> comme une requête classique :
                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
<?php
$produit = $result->fetch(PDO::FETCH_OBJ);
$result->closeCursor();
?>
                ') ?>
                    </code>
                </pre>
                <p>
                    Ce qui nous donne donc comme code final, avec la connexion à la base de données :
                </p>
                <pre>
                    <code>
                        <?= htmlspecialchars('
<?php
try {
    $db = new PDO(\'mysql:host=localhost;charset=utf8;dbname=jarditou\', \'root\', \'\');
} catch (Exception $e) {
    echo \'erreur : \' . $e->getMessage() . \'<br>\';
    echo \'N° : \' . $e->getCode();
    die(\'fin du script\');
}
$id = $_GET[\'id\'];
$query = \'SELECT * FROM `produits` WHERE `pro_id` = :id\';
$result = $db->prepare($query);
$result->bindValue(\':id\', $id, PDO::PARAM_INT);
$result->execute(); 
$product = $result->fetch(PDO::FETCH_OBJ);
$result->closeCursor();
                ?>
                ') ?>
                    </code>
                </pre>
                <p>
                    Pour voir le résultat en action <a href="allProduct.php" title="Lien vers la démo" target="_blank">cliquez ici</a> puis cliquez sur un des boutons "détail"
                </p>
                <p>
                    De même que l'affichage de la liste des produits, il convient d'utiliser une façon adéquat pour afficher le détail d'un produit pour une interface client.
                </p>
            </div>
        </li>
    </ul>
</div>