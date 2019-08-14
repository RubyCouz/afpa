<?php
include 'header.php';
include 'mailController.php';
?>

<div class="uk-container">
    <form action="#" method="POST">
        <form class="uk-form-horizontal uk-margin-large">
            <legend>Envoie d'un mail</legend>
            <div class="uk-margin">
                <label class="uk-form-label" for="for">Destinataire :</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="for" type="text" name="for" placeholder="Destinataire" value="" <?= isset($_POST['for']) ? $_POST['for'] : '' ?> />
                </div>
            </div>
            <span><?= isset($mailError['for']) ? $mailError['for'] : '' ?></span>
            <div class="uk-margin">
                <label class="uk-form-label" for="from">De :</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="from" type="text" name="from" placeholder="De" value="" <?= isset($_POST['from']) ? $_POST['from'] : '' ?> />
                </div>
            </div>
            <span><?= isset($mailError['from']) ? $mailError['from'] : '' ?></span>
            <div class="uk-margin">
                <label class="uk-form-label" for="object">Objet :</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="object" type="text" name="object" placeholder="Objet" value="" <?= isset($_POST['object']) ? $_POST['object'] : '' ?> />
                </div>
            </div>
            <span><?= isset($mailError['object']) ? $mailError['object'] : '' ?></span>
            <div class="uk-margin">
                <label class="uk-form-label" for="content">Message :</label>
                <div class="uk-form-controls">
                    <textarea class="uk-textarea" rows="5" id="content" name="content" placeholder="Textarea"><?= isset($_POST['content']) ? $_POST['content'] : '' ?></textarea>
                </div>
            </div>
            <span><?= isset($mailError['content']) ? $mailError['content'] : '' ?></span>
            <div class="uk-margin">
                <input type="submit" name="send" id="send" class="uk-button uk-button-secondary" />
            </div>
        </form>
    </form>
</div>



<?php
include 'footer.php';
?>