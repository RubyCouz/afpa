<?php
include '../header.php';
?>
<div class="container">
    <h1>CodeIgniter part I </h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Initialisation</div>
            <div class="collapsible-body">
                <p>
                    Pour utiliser CodeIgniter, nous devons télécharger un dossier <a href="https://codeigniter.com/download" title="Lien vers téléchargement CodeIgniter" target="_blank">ici</a>.
                </p>
                <p>
                    Une fois le dossier téléchargé, il faut le décomprésser et placer le dossier dans le répertoire du serveur local. On le renommera afin de faciliter les tests et l'exécution du site. On peut garder (facultatif) uniquement les dossier "applications", "system" et le fichier "index.php".  
                </p>
                <div class="row">
                    <div class="col s6 offset-s3">
                        <img src="../../assets/img/picture1.png" title="Affichage du contenu du dossier CodeIgniter" alt="Dossier CodeIgniter" class="pic materialboxed hoverable"/>
                    </div>                   
                </div>
                <p>
                    <strong>Il est important de ne pas (ou correctement, selon les indications de la <a href="https://codeigniter.com/user_guide/" title="Lien vers la documentation CodeIgniter" target="_blank">documentation de CodeIgniter</a>) modifier les fichiers déjà présents dans ces dossiers.</strong> Le fonctionnement de CodeIgniter pourrait se retrouver altérer.
                </p>
                <p>
                    Une fois ces étapes efffectuées, on peut commencer un nouveau projet, en sauvegardant les vues dans le dossier "views", les contrôleurs dans le dossier "controllers" et les modèles dans le dossier "models", tous 3 contenus dans le dossier "application". Le dossier "assets" quant à lui devra se trouver à la même racine que les dossier "application" et "system".
                </p>
                <p>
                    <strong>IMPORTANT : gardez à l'esprit que tous les liens qui seront faits le seront à partir du fichier "index.php" se trouvant à la racine du dossier de CodeIgniter</strong>
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Afficher une première vue</div>
            <div class="collapsible-body">
                <p>
                    Une fois que le dossier de CodeIgniter est prêt, on peut vérifier que tout est fonctionnel en tapant dans la barre de recherche du navigateur l'adresse suivante : "http://localhost/lastnameDossierCodeigniter/index.php". S'il n'y pas de problème, la page d'accueil de CodeIgniter doit s'afficher :
                </p>
                <div class="row">
                    <div class="col s6 offset-s3">
                        <img src="../../assets/img/picture2.png" title="Vue du fichier index.php" alt="Vue index.php" class="pic materialboxed hoverable"/>
                    </div>
                </div>
                <p>
                    Pour créer notre première vue, nous allons utiliser le contrôleur dans un premier temps, ainsi qu'un fichier <code>.php</code> contenant le HTML qui affichera notre vue.
                </p>
                <p>
                    En guise d'exemple, nous allons afficher le contenu d'un tableau associatif :
                </p>
                <p>
                    Nous commençons par définir notre tableau dans le contrôleur de la manière suivante :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
<?php


//instruction de sécurité empéchant l\'accès direct au fichier
defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');

// création de la classe Produits héritant des propriétés de la classe CI_Controller (important : lastname de la classe avec première lettre en majuscule, tout comme le fichier)
class ExoController extends CI_Controller {

    /**
     * exo 1
     */
    public function firstExo() {
        // Déclaration du tableau associatif à transmettre à la vue	
        $array = array();
        // Dans le tableau, on créé une donnée \'firstname\' qui a pour valeur \'Dave\'    
        $array[\'firstname\'] = \'Dave\';
        // Dans le tableau, on créé une donnée \'lastname\' qui a pour valeur \'Grohl\'    
        $array[\'lastname\'] = \'Grohl\';
        }
    }') ?>
    </code>
                </pre>
                <p>
                    Ensuite nous pouvons procéder au chargement de la vue :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
<?php
//instruction de sécurité empéchant l\'accès direct au fichier
defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');

// création de la classe Produits héritant des propriétés de la classe CI_Controller (important : lastname de la classe avec première lettre en majuscule, tout comme le fichier)
class ExoController extends CI_Controller {

    /**
     * exo 1
     */
    public function firstExo() {
        // Déclaration du tableau associatif à transmettre à la vue	
        $array = array();
        // Dans le tableau, on créé une donnée \'firstname\' qui a pour valeur \'Dave\'    
        $array[\'firstname\'] = \'Dave\';
        // Dans le tableau, on créé une donnée \'lastname\' qui a pour valeur \'Grohl\'    
        $array[\'lastname\'] = \'Grohl\';
        // chargement des vues
        $this->load->view(\'header\');
        $this->load->view(\'exo\', $array);
        $this->load->view(\'footer\');
        }
    }') ?>
    </code>
                </pre>
                <p>
                    Pour que les données du contrôleurs passent dans la vue, nous devons passer l'objet <code>$aView</code> en second paramètre de la méthode <a href="https://codeigniter.com/user_guide/general/views.html" title="Lien vers la documentation CodeIgniter" target="_blank"><code>view()</code></a>.
                </p>
                <p>
                    Nous pouvons maintenant créer notre vue qui affichera le contenu de notre tableau :
                </p>
                <pre>
    <code class="html">
                        <?= htmlspecialchars('
<div class="uk-container">
    <p>
        Hello <?= $firstname . \' \' . $lastname?>
    </p>
</div>') ?>
    </code>
                </pre>
                <p>
                    <code>$firstname</code> et <code>$lastname</code> font référence aux clés associatives de notre tableau défini dans le contrôleur.
                </p>
                <p>
                    Maintenant pour procéder à notre affichage, nous devons taper dans la barre d'url l'adresse suivante : "localhost/ci/index.php/exoController/firstExo/" (si le dossier de CodeIgniter a été relastnamemé "ci")
                </p>
                <p>
                    Code complet :
                </p>
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3 offset-s3"><a class="active" href="#ciView">Vue</a></li>
                            <li class="tab col s3"><a href="#ciController">Contrôleur</a></li>
                        </ul>
                    </div>
                    <div id="ciView" class="col s12">
                        <pre>
    <code class="html">
                                <?= htmlspecialchars('
<div class="uk-container">
    <p>
        Hello <?= $firstname . \' \' . $lastname?>
    </p>
</div>') ?>
    </code>
                        </pre>
                    </div>
                    <div id="ciController" class="col s12">
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('
<?php
//instruction de sécurité empéchant l\'accès direct au fichier
defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');

// création de la classe Produits héritant des propriétés de la classe CI_Controller (important : lastname de la classe avec première lettre en majuscule, tout comme le fichier)
class ExoController extends CI_Controller {

    /**
     * exo 1
     */
    public function firstExo() {
        // Déclaration du tableau associatif à transmettre à la vue	
        $array = array();
        // Dans le tableau, on créé une donnée \'firstname\' qui a pour valeur \'Dave\'    
        $array[\'firstname\'] = \'Dave\';
        // Dans le tableau, on créé une donnée \'lastname\' qui a pour valeur \'Grohl\'    
        $array[\'lastname\'] = \'Grohl\';
        // chargement des vues
        $this->load->view(\'header\');
        $this->load->view(\'exo\', $array);
        $this->load->view(\'footer\');
        }
    }') ?>
    </code>
                        </pre>
                    </div>
                </div>
                <a href="../ci/index.php/exoController/firstExo" class="waves-effect waves-light btn" title="Lien vers démo" target="_blank"><i class="material-icons right">play_arrow</i>RUN CODE</a>


            </div>
        </li>
        <li>
            <div class="collapsible-header">Affichage d'un tableau entier</div>
            <div class="collapsible-body">
                <p>
                    Pour afficher un tableau entier, la procédure est sensiblement différente : nous devrons stocker notre tableau dans un autre tableau pour pouvoir le passer dans notre vue. Puis nous pourrons afficher son contenu en utilisant un boucle <code>foreach()</code>, comme à chaque fois que nous voulons afficher le contenu entier d'un tableau.
                </p>
                <p>
                    Pour le contrôleur, nous aurons donc :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
public function secondExo() {
        // chargement du helper url, pour la redirection et le chargement des vues
        $this->load->helper(\'url\');
        // céclaration d\'un tableau "ref"
        $ref = [\'Aramis\', \'Athos\', \'Clatronic\', \'Camping\', \'Green\'];
        //déclaration d\'un tableau "array"
        $array = array();
        // stockage du tableau "ref" dans le tableau "array"
        $array[\'ref\'] = $ref;
        // chargement des vues
        $this->load->view(\'header\');
        $this->load->view(\'exo\', $array);
        $this->load->view(\'footer\');
    }') ?>
    </code>
                </pre>
                <p>
                    Et dans notre vue, la boucle <code>foreach()</code> :
                </p>
                <pre>
    <code class="html">
                        <?= htmlspecialchars('
<div class="uk-container">
    <ul>
        <?php
        foreach($refName as $ref) {
            ?>
        <li><?= $ref ?></li>        
        <?php
        }
        ?>
    </ul>
</div>') ?>
    </code>
                </pre>
                <a href="../ci/index.php/exoController/secondExo" class="waves-effect waves-light btn" title="Lien vers démo" target="_blank"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>