<?php
include '../header.php';
?>
<div class="container">
    <h1>Affichage de la liste des produits Jarditou </h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Le modèle</div>
            <div class="collapsible-body">
                <p>
                    Pour afficher notre liste de produits Jarditou, nous utiliserons le modèle M.V.C de CodeIgniter.
                </p>
                <p>
                    Pour commencer, nous allons paramétrer CodeIgniter pour permettre l'accès à la base de données. Pour cela, nous devons nous rendre dans le fichier "application/config/database.php" et changer les valeurs de <code>hostname</code>, <code>database</code>, <code>username</code>, <code>password</code> comme ci-dessous :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
    $db[\'default\'] = array(
	
    \'dsn\'    => \'\',
	
    \'hostname\' => \'localhost\',
	
    \'username\' => \'root\',
	
    \'password\' => \'\',
	
    \'database\' => \'jarditou\',
	
    \'dbdriver\' => \'mysqli\',
	
    \'dbprefix\' => \'\',
	
    \'pconnect\' => FALSE,
	
    \'db_debug\' => (ENVIRONMENT !== \'production\'),
	
    \'cache_on\' => FALSE,
	
    \'cachedir\' => \'\',
	
    \'char_set\' => \'utf8\',
	
    \'dbcollat\' => \'utf8_general_ci\',
	
    \'swap_pre\' => \'\',
	
    \'encrypt\' => FALSE,
	
    \'compress\' => FALSE,
	
    \'stricton\' => FALSE,
	
    \'failover\' => array(),
	
    \'save_queries\' => TRUE
	
);') ?>
    </code>
                </pre>
                <p>
                    Nous pouvons à présent construire notre modèle :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('<?php

if (!defined(\'BASEPATH\')) exit(\'no direct scriptp access allowed\');

/**
 * Description of produitModel
 * Model concernant la table produits de la base jarditou
 * Affichage de la liste des produits
 * @author ced27
 */
class produitModel extends CI_model {

    /**
     * Affichage de la liste des produits
     */
    public function list() {
        //appel de la methode database -> permet la connexion à la base de données.
        $this->load->database();
        // stockage de la requète dans une variable
        $query = \'SELECT * from `produits`\';
        // exécution de la requète
        $result = $this->db->query($query);
        // récupération des résultats
        $productList = $result->result();
        return $productList;
        }
    }') ?>
    </code>
                </pre>
                <p>
                    Nous commençons par appeler la méthode de connexion à la base de données avec <code>$this->load->databas()</code>. Nous pouvons alors stocker notre requète dans une variable, puis l'exécuter :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
        // stockage de la requète dans une variable
        $query = \'SELECT * from `produits`\';
        // exécution de la requète
        $result = $this->db->query($query);') ?>
    </code>
                </pre>
                <p>
                    Et enfin récupérer le résultat de notre requète et le retourner :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars(' 
        // récupération des résultats
        $productList = $result->result();
        return $productList;') ?>
    </code>
                </pre>
                <p>
                    Attention : pour des soucis de clareté et d'organisation, nous utiliserons <b>un</b> modèle qui correspondra à <b>une</b> table !
                </p>F
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le contrôleur</div>
            <div class="collapsible-body">
                <p>
                    Le contrôleur se nommera systématiquement avec une majuscule au début, et la classe qu'il contiendra sera nommée de la même façon : ainsi nous allons nommer notre contrôleur "Product.php" et il contiendra le code suivant :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
<?php

// application/controllers/Produits.php	
//instruction de sécurité empéchant l\'accès direct au fichier
defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');

// création de la classe Product héritant des propriétés de la classe CI_Controller (important : nom de la classe avec première lettre en majuscule, tout comme le fichier)
class Product extends CI_Controller {

}') ?>
    </code>
                </pre>
                <p>
                    A l'intérieur de notre classe, nous allons déclarer une méthode permettant d'afficher notre liste de produits :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
<?php

// application/controllers/Produits.php	
//instruction de sécurité empéchant l\'accès direct au fichier
defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');

// création de la classe Product héritant des propriétés de la classe CI_Controller (important : nom de la classe avec première lettre en majuscule, tout comme le fichier)
class Product extends CI_Controller {

 // chargement du model "produitModel"
        $this->load->model(\'produitModel\');
        // appel de la méthode "list()" du model précédemment chargé
        $productList = $this->produitModel->list();
        $listView[\'productList\'] = $productList;
        /**
         *  chargement des fichiers vue
         */
        $this->load->view(\'header\');
        $this->load->view(\'liste\', $listView);
        $this->load->view(\'footer\');
            
}') ?>
    </code>
                </pre>
                <p>
                    Nous commençons par appeler le modèle, puis la méthode utilisée pour l'affichage de notre liste :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
        // chargement du model "produitModel"
        $this->load->model(\'produitModel\');
        // appel de la méthode "liste()" du model précédemment chargé
        $productList = $this->produitModel->liste();
        ') ?>
    </code>
                </pre>
                <p>
                    Puis nous stockons le résultat de la requète dans un tableau associatif :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
$listView[\'productList\'] = $productList;
') ?>
    </code>
                </pre>
                <p>
                    Enfin nous pouvons charger nos vues, avec <code>$listView</code> en second paramètre de l'affichage du corps de la page (liste.php) :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('   
         /**
         *  chargement des fichiers vue
         */
        $this->load->view(\'header\');
        $this->load->view(\'liste\', $listView);
        $this->load->view(\'footer\');
        ') ?>
    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">La vue</div>
            <div class="collapsible-body">
                <p>
                    Pas de grand changement concernant la vue, l'affichage se fait de la même façon :
                </p>
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s2 offset-s3"><a class="active" href="#ciModel">Model</a></li>
                            <li class="tab col s2"><a href="#ciController">Contrôleur</a></li>
                            <li class="tab col s2"><a href="#ciView">Vue</a></li>
                        </ul>
                    </div>
                    <div id="ciModel" class="col s12">
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('
<?php

if (!defined(\'BASEPATH\')) exit(\'no direct scriptp access allowed\');

/**
 * Description of produitModel
 * Model concernant la table produits de la base jarditou
 * Affichage de la liste des produits
 * @author ced27
 */
class produitModel extends CI_model {

    /**
     * Affichage de la liste des produits
     */
    public function list() {
        //appel de la methode database -> permet la connexion à la base de données.
        $this->load->database();
        // stockage de la requète dans une variable
        $query = \'SELECT * from `produits`\';
        // exécution de la requète
        $result = $this->db->query($query);
        // récupération des résultats
        $productList = $result->result();
        return $productList;
        }
    }') ?>
    </code>
                        </pre>
                    </div>
                    <div id="ciController" class="col s12">
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('
<?php

// application/controllers/Produits.php	
//instruction de sécurité empéchant l\'accès direct au fichier
defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');

// création de la classe Product héritant des propriétés de la classe CI_Controller (important : nom de la classe avec première lettre en majuscule, tout comme le fichier)
class Product extends CI_Controller {

 // chargement du model "produitModel"
        $this->load->model(\'produitModel\');
        // appel de la méthode "list()" du model précédemment chargé
        $productList = $this->produitModel->list();
        $listView[\'productList\'] = $productList;
        /**
         *  chargement des fichiers vue
         */
        $this->load->view(\'header\');
        $this->load->view(\'liste\', $listView);
        $this->load->view(\'footer\');
            
}') ?>
    </code>
                        </pre>
                    </div>
                    <div id="ciView" class="col s12">
                        <pre>
    <code class="html">
                                <?= htmlspecialchars('

<!-- application/views/liste.php -->

<!DOCTYPE html>

<h1>Liste des produits</h1>
<div class="uk-container">
    <a href="<?= site_url(\'Produits/addProduct\') ?>" class="waves-effect waves-light btn" title="Lien vers ajout d\'un produit" target="_blank">Ajouter un produit</a>
    <table class="uk-table uk-table-striped">
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
            foreach ($productList as $row) {
                ?>
                <tr>
                    <td>
                        <img src="<?= base_url(\'assets/img/\' . $row->pro_id . \'.\' . $row->pro_photo) ?>" alt="Photo d\'illustration" title="Photo de <?= $row->pro_libelle ?>" />
                    </td>
                    <td><?= $row->pro_id ?></td>
                    <td><?= $row->pro_cat_id ?></td>
                    <td><?= $row->pro_ref ?></td>
                    <td><?= $row->pro_libelle ?></td>
                    <td><?= $row->pro_couleur ?></td>
                    <td><?= $row->pro_description ?></td>
                    <td><?= $row->pro_prix ?></td>
                    <td><?= $row->pro_stock ?></td>
                    <td><?= $row->pro_d_ajout ?></td>
                    <td><?= $row->pro_d_modif ?></td>
                    <td><?= $row->pro_bloque == 1 ? \'Oui\' : \'Non\' ?></td>
                    <td><a href="<?= site_url(\'Produits/update\') . \'?pro_id=\' . $row->pro_id ?>" title="Lien vers la fiche produit" class="waves-effect waves-light btn uk-button-small">Fiche Produit</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>    
    <a href="<?= site_url(\'Produits/addProduct\') ?>" class="waves-effect waves-light btn" title="Lien vers ajout d\'un produit" target="_blank">Ajouter un produit</a>
</div> ') ?> 
    </code>
                        </pre>
                    </div>
                </div>
                <a href="../ci/index.php/produits/liste" class="waves-effect waves-light btn" title="Lien vers démo" target="_blank">RUN CODE</a>
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>