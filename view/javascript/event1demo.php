<?php
include '../header.php';
?>
<div class="uk-container">
    <form action="#" method="GET">
        <label for="text">Saissisez un texte et appuyer sur le bouton "contôle" :</label>
        <div class="uk-margin">
            <div class="uk-inline">
                <a class="uk-form-icon" href="#" uk-icon="icon: pencil"></a>
                <input class="uk-input" type="text" placeholder="Insérer du texte" id="text" name="text" required>
            </div>
            <input type="button" name="submit" id="runEvent1" value="Contrôle" class="uk-button uk-button-secondary " value="Contrôle">
        </div>
    </form>
</div>

<?php
include '../footer.php';
?>