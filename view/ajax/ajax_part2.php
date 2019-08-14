<?php
include '../header.php';
?>
<div class="container">
    <h1>Ajax : exercice 2</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Présentation</div>
            <div class="collapsible-body">
                <p>
                    Nous devons afficher une liste de régions et de département dans une liste déroulante à partir d'une base de données. L'affichage des départements doit se faire en fonction du choix de la région. Nous verrons ici 2 manières d'employer la méthode Ajax. La première sera identique à celles vu précédemment (chargement d'un fichier), la seconde fera directement appel à la base de données.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Méthode 1 : chargement d'un fichier</div>
            <div class="collapsible-body">
                <p>Etant identique aux exemple vu précédemment, voici le code final :</p>
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s2 offset-s3"><a class="active" href="#vue">Vue</a></li>
                            <li class="tab col s2"><a href="#file">Fichier à charger</a></li>
                            <li class="tab col s2"><a href="#js">JS</a></li>
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
        <button id="btn2">Afficher la liste de produits jarditou</button>
        <button id="btn3">Afficher la liste des régions</button>
        <select id="select1"></select>
        <div id="div1"></div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>') ?>
    </code>
                        </pre> 
                    </div>
                    <div id="file" class="col s12">
                        <pre>
    <code class="html">
                                <?= htmlspecialchars('
<?php
include \'model/configRegion.php\';
include \'controller/option1Controller.php\';
foreach ($listRegionResult as $row) {
    ?>
<option value="<?= $row->reg_id ?>"><?= $row->reg_v_nom ?></option>
<?php
}
?>') ?> 
    </code>
                        </pre>
                    </div>
                    <div id="js" class="col s12">
                        <pre>
    <code class=" ">
                                <?= htmlspecialchars('
$(document).ready(function () {
 /**
 * Atelier 2
 */
    $("#btn3").click(function () {
        $("#select1").load("option1.php");
    });
}); ') ?>
    </code>
                        </pre>
                    </div>
                </div>
                <a href="ajaxDemo.php" class="waves-effect waves-light btn" title="Lien vers démo ajax" target="_blank">RUN CODE</a>
                <p>
                    Ici, l'appel à la base de données se fait directement dans le fichier <code>option.php</code>. En cliquant sur le bouton "Afficher ..." la page se charge, ainsi que les options de la liste déroulante.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Méthode 2 : appel direct de la base de données</div>
            <div class="collapsible-body">
                <p>
                    Une seconde méthode Ajax permet "d'interroger directement la base de données". C'est a dire que les données seront envoyées avec Ajax dans le contrôleur qui les vérifiera et seront ensuite envoyées vers le model qui renverra une réponse vers le contrôleur, qui transmettra le résultat vers la vue. Il n'y a donc pas de chargement de fichier, donc un fichier de moins à créer.
                </p>
                <p>
                    Nous devons créer une seconde liste déroulante pour y afficher la liste des départements.
                </p>
                <p>
                    Pour afficher la liste des départements, nous allons nous baser selon le choix de la région. Pour cela, nous allons récupérer la valeur de notre <code>select</code> lors du choix de l'utilisateur à l'aide de la méthode Jquery <a href="https://api.jquery.com/change/#change-handler" class="uk-link-muted" title="Lien vers la documentation Jquery" target="_blank"><code>.change()</code></a> :
                </p>
                <pre>
    <code class="js">
                        <?= htmlspecialchars('
$("#select1").change(function () {
// méthode Ajax.
}') ?> 
    </code>
                </pre>
                <p>
                    La méthode Ajax :
                </p>
                <pre>
    <code class="js">
                        <?= htmlspecialchars('
    $("#select1").change(function () {
        $.post(\'controller/option2controller.php\', {
            reg_id: $(this).val()
        }, function (data) {
            if (data) {
                $(\'#select2\').html(data);
            } else {
                alert(\'Erreur\');
            }

        },
                \'HTML\');
    });') ?>
    </code>
                </pre>
                <p>Le Model :</p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
public function getRegionById()
    {
        $query = \'SELECT * FROM departements WHERE dep_reg_id=:reg_id\';
        $result = $this->pdo->prepare($query);
        $result->bindValue(\':reg_id\', $this->reg_id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_OBJ);
    }') ?>
    </code>
                </pre>
                <p>
                    Et le contrôleur :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('if (isset($_POST[\'reg_id\']))
{
    include\'../model/configRegion.php\';

    $getRegionById = new departements();
    $getRegionById->reg_id = $_POST[\'reg_id\'];
    $getRedionByIdRresult = $getRegionById->getRegionById();
    foreach ($getRedionByIdRresult as $row)
    {
        ?>
        <option value="<?= $row->dep_id ?>"><?= $row->dep_nom ?></option>
        <?php
    }
}') ?>
    </code>
                </pre>
                <p>
                    Petite explication :
                </p>
                <ul>
                    <li>On selectionne notre premier <code>select</code>, et nous appliquons la méthode change. En clair, lorsque la valeur du <code>select</code> change, la fonction qui suit sera appliquée</li>
                    <pre>
    <code class="js">
                            <?= htmlspecialchars('
$("#select1").change(function () {') ?>
    </code>
                    </pre>
                    <li>nous envoyons ensuite avec la méthode <code>$.post</code> des données vers le fichier spécifé par la suite (ici notre contrôleur)</li>
                    <pre>
    <code class="js">
                            <?= htmlspecialchars('
$.post(\'controller/option2controller.php\', {') ?>
    </code>
                    </pre>
                    <li>Puis nous indiquons la valeur à envoyé, ainsi que son nom, au contrôleur</li>
                    <pre>
    <code class="js">
                            <?= htmlspecialchars('
reg_id: $(this).val()') ?>
    </code>
                    </pre>
                    <li>Ensuite nous déclenchons une fonction permettant l'affichage de la réponse du contrôleur à la vue (s'il y a réponse)</li>
                    <pre>
    <code class="js">
                            <?= htmlspecialchars('
        function (data) {
            if (data) {
                $(\'#select2\').html(data);
            } else {
                alert(\'Erreur\');
            }') ?>
    </code>
                    </pre>
                </ul>
                <p>
                    Lorsque la (les) donnée(s) est (sont) envoyée(s) au contrôleur :
                </p>
                <ul>
                    <li>On instancie la classe correspondante à la table sur laquelle nous voulons agir</li>
                    <pre>
<code class="js">
                            <?= htmlspecialchars('
$getRegionById = new departements();') ?>
    </code>
                    </pre>
                    <li>
                        On récupère la valeur envoyée par la méthode Ajax avec la superglobale <code>$_POST['']</code>. Si l'envoie aurait été fait avec la méthode <code>get</code>, nous aurions utillisé <code>$$_GET['']</code>
                    </li>
                    <pre>
<code class="js">
                            <?= htmlspecialchars('
$getRegionById->reg_id = $_POST[\'reg_id\'];') ?>
    </code>
                    </pre>
                    <li>On instancie la méthode que nous utiliserons pour intéragir avec la base de données</li>
                    <pre>
<code class="js">
                            <?= htmlspecialchars('
$getRedionByIdRresult = $getRegionById->getRegionById();') ?>
    </code>
                    </pre>
                    <li>Enfin, Nous utilisons une boucle <code>foreach()</code> pour parcourir le tableau retourné</li>
                    <pre>
    <code class="php">
                            <?= htmlspecialchars('foreach ($getRedionByIdRresult as $row)
    {
        ?>
        <option value="<?= $row->dep_id ?>"><?= $row->dep_nom ?></option>
        <?php
    }') ?>
    </code>
                    </pre>
                </ul>
                <p>
                    Bien que nous ayons vu qu'il n'est pas conseillé de faire du 'HTML' dans du 'PHP', il existe quelques cas où il n'est pas possible de faire autrement. Ce cas en est un parfait exemple.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Code complet</div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3"><a class="active" href="#view">Vue</a></li>
                            <li class="tab col s3"><a href="#javascript">JS</a></li>
                            <li class="tab col s3"><a href="#controler">Contrôleur</a></li>
                            <li class="tab col s3"><a href="#model">Model</a></li>
                        </ul>
                    </div>
                    <div id="view" class="col s12">
                        <pre>
    <code class="html">
                                <?= htmlspecialchars('
<?php
include \'model/configRegion.php\';
include \'controller/option2Controller.php\';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Ajax</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <body>
        <button id="btn1">Afficher une page</button>
        <button id="btn2">Afficher la liste de produits jarditou</button>
        <button id="btn3">Afficher la liste des régions</button>
        <select id="select1"></select>
        <select id="select2">
           
        </select>
        <div id="div1"></div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>') ?>
    </code>
                        </pre>     
                    </div>
                    <div id="javascript" class="col s12">
                        <pre>
    <code class="js">
                                <?= htmlspecialchars('
$(\'#select1\').change(function () {
        $.post(\'controller/option2controller.php\', {
            reg_id: $(this).val()
        }, function (data) {
            if (data) {
                $(\'#select2\').html(data);
            } else {
                alert(\'Erreur\');
            }

        },
                \'HTML\');
    });') ?>
    </code>
                        </pre>     
                    </div>
                    <div id="controler" class="col s12">
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('
<?php
if (isset($_POST[\'reg_id\']))
{
    include\'../model/configRegion.php\';

    $getRegionById = new departements();
    $getRegionById->reg_id = $_POST[\'reg_id\'];
    $getRedionByIdRresult = $getRegionById->getRegionById();
    foreach ($getRedionByIdRresult as $row)
    {
        ?>
        <option value="<?= $row->dep_id ?>"><?= $row->dep_nom ?></option>
        <?php
    }
}
?>') ?>
    </code>
                        </pre>       
                    </div>
                    <div id="model" class="col s12">
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('
<?php

/**
 * Description of regions
 *
 * @author ced27
 */
class departements extends connectionRegion {

    public $dep_reg_id = \'\';
    public $dep_nom = \'\';
    public $dep_id = \'\';
    public $reg_id = \'\';

    /**
     * Construction de la connexion à la BDD
     */
    public function __construct()
    {
        parent::__construct();
        $this->dbConnect();
    }

    /**
     * Affichage de toutes les régions
     */
    public function getRegionById()
    {
        
        $query = \'SELECT * FROM departements WHERE dep_reg_id=:reg_id\';
        $result = $this->pdo->prepare($query);
        $result->bindValue(\':reg_id\', $this->reg_id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public function __destruct()
    {
        $this->pdo = NULL;
    }

}
') ?>
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