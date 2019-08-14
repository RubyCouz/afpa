
<div class="container">
    <h1>Upload d'un fichier</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Introduction</div>
            <div class="collapsible-body">
                <p>
                    L'upload de fichier est l'action qui permet à l'utilisateur d'envoyer un fichier de son poste vers le serveur où est hébergé le site. Pour permettre cette action le formulaire sera légèrement changé. Nous devrons récupérer les données envoyées par l'utilisateur, les contrôler, et les modifier selon les besoin de notre base de données.
                </p>
                <p>
                    Pour récupérer un fichier, nous utiliserons la superglobale <code>$_FILES</code>, plutôt que <code>$_POST</code>. <code>$_FILES</code> retournera un tableau contenant les informations du fichiers (le nom, le type MIME, la taille ...). Ces informations pourront être utilisées pour vérifier si le fichier est valide ou non.
                </p>
                <p>
                    Lors de l'upload, le fichier est placé et nommé de façon temporaire dans le dossier tmp de votre server. Il nous faudra donc le deplacer et le renommer (facultatif, si ce n'est pas fait, le fichier conservera son nom lors de l'upload par l'utilisateur) vers le dossier de notre choix.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le formulaire</div>
            <div class="collapsible-body">
                <p>
                    Pour l'upload de fichier, le formulaire sera un peu différent :
                </p>
                <ul>
                    <li>
                        Nous devons ajouter l'attribut <code>enctype</code> et lui attribuer la valeur <code>multipart/form-data</code>
                        <pre>
                        <code class="html">
                                <?= htmlspecialchars('
 <form action="#" method="POST" enctype="multipart/form-data">

 </form>
') ?>
                        </code>
                        </pre>
                        Cet attribut ne peut être utilisé qui si la <code>method</code> du formulaire est en <code>post</code>. Il permet d'indiquer de quel manière les données envoyées seront encodées. Par défaut l'encodage utilisé est <code>enctype="multipart/form-data"</code>, c'est a dire que toutes les données sont encodées, et les espaces remplacer par des "+". L'utilisation de <code>enctype="multipart/form-data"</code> permet de ne pas avoir d'encodage (le nom du fichier rester tel quel), et donc l'envoie de fichier.
                    </li>
                    <li>
                        Nous changerons le type de l'input par <code>file</code>. Cela permettra l'apparition d'un bouton "parcourir", et l'ouverture d'une fenêtre de chargement de fichier de manière automatique.
                        <pre>
                        <code class="html">
                                <?= htmlspecialchars('
<input type="file" class="uk-input" name="file" id="file" placeholder="Sélectionnez ...">
                            ') ?>
                        </code>
                        </pre>
                    </li>
                </ul>
                <p>
                    Notre formulaire sera donc de cette forme :
                </p>
                <pre>
                <code class="html">
                        <?= htmlspecialchars('
<form action="#" method="POST" enctype="multipart/form-data">
<fieldset class="uk-fieldset">
    <legend class="uk-legend">Upload de fichier</legend>
    <div class="uk-margin">
        <label for="file">Sélectionnez un ficher</label>
        <input type="file" class="uk-input" name="file" id="file" placeholder="Sélectionnez ...">
    </div>
    <div class="uk-margin">
        <input type="submit" class="waves-effect waves-light btn" name="submit" id="submit" value="Envoyer">
    </div>
</fieldset>
</form>
') ?>
                </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Mise en place du code</div>
            <div class="collapsible-body">
                <p>
                    Nous commençons par déclarer un tableau dans lequel nous stockerons les types de fichiers que nous acceptons (dans le caas présent une image) :
                </p>
                <pre>
                <code class="php">
                        <?= htmlspecialchars('
$aMimeTypes = array(\'image/gif\', \'image/jpg\', \'image/jpeg\', \'image/pjpeg\', \'image/png\', \'image/x-png\', \'image/tiff\');
                    ') ?>           
                </code>
                </pre>
                <p>
                    Puis nous utiliserons l'extension de PHP <a href="https://www.php.net/manual/fr/book.fileinfo.php" target="_blank" title="Lien vers définition php.net"><code>FILE_INFO</code></a>, qui nous permettra de recueillir diverses informations sur le fichier que l'utilisateur veut uploader.
                </p>
                <p>
                    Nous commencerons par créer une nouvelle ressource <code>FILE_INFO</code> à l'aide de la fonction <a href="https://www.php.net/manual/fr/function.finfo-open.php" title="Lien vers définition php.net" target="_blank"><code>finfo_open()</code></a> :
                </p>
                <pre>
                     <code class="php">
                        <?= htmlspecialchars('    
$finfo = finfo_open(FILEINFO_MIME_TYPE);
') ?>
                    </code>
                </pre>
                <p>
                    En paramêtre de cette focntion, nous indiquons le type d'information recherché, ici le typee MIME du fichier à uploader.
                </p>
                <p>
                    Ensuite, nous pourrons aller chercher les informations du fichier avec la fonction <a href="https://www.php.net/manual/fr/function.finfo-file.php" title="Lien vers définition php.net" target="_blank"><code>finfo_file()</code></a> :
                </p>

                <pre>
                <code class="php">
                        <?= htmlspecialchars('    
$mimetype = finfo_file($finfo, $_FILES[\'file\'][\'tmp_name\']);
') ?>
                </code>
                </pre>
                <p>
                    Cette fonction prend en paramêtre la ressource <code>FILE_INFO</code>, et le nom temporaire du fichier.
                </p>
                <p>
                    Nous pouvons enfin fermer la ressource <code>FILE_INFO</code> en utilisant la fonction <a href="https://www.php.net/manual/fr/function.finfo-close.php" title="Lien vers définition php.net" target="_blank"><code>finfo_close()</code></a>, prenant en paramêtre l'ouverture de cette même ressource :
                </p>
                <pre>
                <code class="php">
                        <?= htmlspecialchars('
finfo_close($finfo);
') ?>
                </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Condition de vérification du type de fichier</div>
            <div class="collapsible-body">
                <p>
                    Une fois que le type MIME du fichier à uploader est récupérer, nous pouvons le comparer avec ceux que nous acceptons et agir en conséquence.
                </p>
                <p>
                    Pour cela, nous uitliserons la fonction <a href="https://www.php.net/manual/fr/function.in-array.php" title="Lien vers définition php.net" target="_blank"><code>in_array()</code></a> :
                </p>
                <pre>
                    <code class="php">
                        <?= htmlspecialchars('
  if (in_array($mimetype, $aMimeTypes)) {
// si les types de fichier concordent
  } else {
// si les type de fichier sont différents
  }
') ?>
                    </code>
                </pre>
                <p>
                    Cette fonction permettra de savoir si la première valeur passée en paramêtre se trouve dans le tableau passé en second paramêtre.
                </p>
                <p>
                    Si les types MIME concordent, nous allons pouvoir manipuler le fichier à uploader et lui indiquer une destination. Pour les besoins de l'exercice, nous devons extraire son extension, mais cette étape n'est pas nécessaire. Pour extraire cette extension, nous utiliserons la fonction <a href="https://www.php.net/manual/fr/function.pathinfo.php" target="_blank" title="Lien vers définition php.net"><code>pathinfo()</code></a> : 
                </p>
                <pre>
                    <code class="php">
                        <?= htmlspecialchars('
 $extension = pathinfo($_FILES[\'file\'][\'name\'], PATHINFO_EXTENSION);
') ?>
                    </code>
                </pre>
                <p>
                    Cette fonction retourne une information sur le chemin de notre fichier.
                </p>
                <p>
                    Puis nous stockons dans une variable le chemin du dossier vers lequel nous désirons stocker le fichier uploader :
                </p>
                <pre>
                    <code class="php">
                        <?= htmlspecialchars('
 $upload_dir = \'../assets/img/\';
') ?>
                    </code>
                </pre>
                <p>
                    Nous renommons notre fichier en attribuant une nouvelle valeur à <code>$_FILES['file']['name']</code>
                </p>
                <pre>
                    <code class="php">
                        <?= htmlspecialchars('
  $_FILES[\'file\'][\'name\'] = 1;
') ?>
                    </code>
                </pre>
                <p>
                    Nous indiquons le chemin définitif et total du fichier que l'on souhaite après son upload :
                </p>
                <pre>
                    <code class="php">
                        <?= htmlspecialchars('
$upload_file = $upload_dir . $_FILES[\'file\'][\'name\'] . \'.\' . $extension;
') ?>
                    </code>
                </pre>
                <p>
                    Il nous faut également définir les droits d'écritures pour le fichier à l'aide de la fonction <a href="https://www.php.net/manual/fr/function.chmod.php" title="Lien vers définition php.net" target="_blank"><code>chmod()</code></a> : 
                </p>
                <pre>
                    <code class="php">
                        <?= htmlspecialchars('
chmod($_FILES[\'file\'][\'tmp_name\'], 0750);
') ?>
                    </code>
                </pre>
                <p>
                    Enfin nous pouvons rediriger le fichier uploader vers son enplacement définitif en utilisant la fonction <a href="https://www.php.net/manual/fr/function.move-uploaded-file.php" title="Lien vers définition php.net" target="_blank"><code>move_uploaded_file()</code></a> prenant en paramêtre le nom temporaire du fichier et son futur emplacement :
                </p>
                <pre>
                    <code class="php">
                        <?= htmlspecialchars('
 move_uploaded_file($_FILES[\'file\'][\'tmp_name\'], $upload_file);
') ?>
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Code final</div>
            <div class="collapsible-body">
                <pre>
                   <code class="html">
                        <?= htmlspecialchars('
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<div class="uk-container">
    <?php
    // si on a cliquer sur le bouton envoyer (si on a la valeur du bouton envoyé en post)
    if (isset($_POST[\'submit\'])) {
        // on définis les type de fichiers acceptés
        $aMimeTypes = array(\'image/gif\', \'image/jpg\', \'image/jpeg\', \'image/pjpeg\', \'image/png\', \'image/x-png\', \'image/tiff\');
        /**
         *  On extrait le type du fichier via l\'extension FILE_INFO  
         */
           // création d\'une nouvelle ressource fileinfo dans laquelle nous indiquons l\'info recherchée  
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
// on récupère le type MIME du fichier et on le stock dans une variable
        $mimetype = finfo_file($finfo, $_FILES[\'file\'][\'tmp_name\']);
     
        finfo_close($finfo);
        //si le type de fichier est correct
        if (in_array($mimetype, $aMimeTypes)) {
            // récupération de l\'extension du fichier et stockage dans une variable
            $extension = pathinfo($_FILES[\'file\'][\'name\'], PATHINFO_EXTENSION);
       // stockage du chemein de destintaion dans une variable
            $upload_dir = \'../assets/img/\';
            // renommage du fichier, facultatif, selon le besoin
            $_FILES[\'file\'][\'name\'] = 1;
            // indication du chemin + nom de fichier pour le déplacement
            $upload_file = $upload_dir . $_FILES[\'file\'][\'name\'] . \'.\' . $extension;
               // autaorisation pour l\'écriture
               chmod($_FILES[\'file\'][\'tmp_name\'], 0750);
               //déplacement du fichier
               move_uploaded_file($_FILES[\'file\'][\'tmp_name\'], $upload_file);
               // message de confirmation
?>
<p>Upload correct</p>
<?php
            } else {
            // Le type n\'est pas autorisé, donc ERREUR
            ?>
            <p>Type de fichier non autorisé</p>
                <?php
        }
    } else {
        ?>
        <form action="#" method="POST" enctype="multipart/form-data">
            <fieldset class="uk-fieldset">
                <legend class="uk-legend">Upload de fichier</legend>
                <div class="uk-margin">
                    <label for="file">Sélectionnez un ficher</label>
                    <input type="file" class="uk-input" name="file" id="file" placeholder="Sélectionnez ...">
                </div>
                <div class="uk-margin">
                    <input type="submit" class="waves-effect waves-light btn" name="submit" id="submit" value="Envoyer">
                </div>
            </fieldset>
        </form>
        <?php
    }
    ?>
</div>
</body>
</html>
') ?>
                   </code>
                </pre>
                <a href="uploadDemo.php" title="Lien vers démo upload" target="_blank" class="waves-effect waves-light btn"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>