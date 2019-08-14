<?php
include '../header.php';
// On met les types autorisés dans un tableau (ici pour une image)
?>
<div class="container">
    <?php
    // si on a cliquer sur le bouton envoyer (si on a la valeur du bouton envoyé en post)
    if (isset($_POST['submit']))
    {
        // on définis les type de fichiers acceptés
        $aMimeTypes = array('image/gif', 'image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png', 'image/tiff');
        /**
         *  On extrait le type du fichier via l'extension FILE_INFO  
         */
        // création d'une nouvelle ressource fileinfo dans laquelle nous indiquons l'info recherchée  
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
// on récupère le type MIME du fichier et on le stock dans une variable
        $mimetype = finfo_file($finfo, $_FILES['file']['tmp_name']);

        finfo_close($finfo);
        //si le type de fichier est correct
        if (in_array($mimetype, $aMimeTypes))
        {
            // récupération de l'extension du fichier et stockage dans une variable
            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            // stockage du chemein de destintaion dans une variable
            $upload_dir = '../../assets/img/';
            // renommage du fichier
            $_FILES['file']['name'] = 2;
            // indication du chemin + nom de fichier pour le déplacement
            $upload_file = $upload_dir . $_FILES['file']['name'] . '.' . $extension;
            // autaorisation pour l'écriture
            chmod($_FILES['file']['tmp_name'], 0750);
            //déplacement du fichier
            move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);
            // message de confirmation
            ?>
            <p class="exo">Upload correct</p>
            <img class="materialboxed" width="650" src="<?= $upload_file ?>">
            <?php
        }
        else
        {
            // Le type n\'est pas autorisé, donc ERREUR
            ?>
            <p class="exo">Type de fichier non autorisé</p>
            <?php
        }
    }
    else
    {
        ?>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="file-field input-field">
                <div class="btn">
                    <span>Fichier</span>
                    <input type="file"name="file" id="file" placeholder="Sélectionnez ...">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
                <input type="submit" name="submit" id="submit" class="waves-effect waves-light btn">
            </div>
        </form>
        <?php
    }
    ?>
</div>

<?php
include '../footer.php';
?>