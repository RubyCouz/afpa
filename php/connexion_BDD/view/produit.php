<?php
include 'header.php';
include '../controler/productControler.php';
?>
<div class="uk-container">
    <form method="POST" action="#">
        <fieldset class="uk-fieldset">
            <legend class="uk-legend">Legend</legend>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Id</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" placeholder="Some text..." value="<?= $product->pro_id ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Catégorie</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" placeholder="Some text..." value="<?= $product->pro_cat_id ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Référence</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" placeholder="Some text..." value="<?= $product->pro_ref ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Libellé</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" placeholder="Some text..." value="<?= $product->pro_libelle ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Prix</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" placeholder="Some text..." value="<?= $product->pro_prix ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Stock</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" placeholder="Some text..." value="<?= $product->pro_stock ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Description</label>
                <textarea class="uk-textarea" rows="5" placeholder="Textarea" value=""><?= $product->pro_description ?></textarea>
            </div>
            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                <span>Produit bloqué :</span>
                <label><input class="uk-radio" type="radio" name="radio2" checked> Oui</label>
                <label><input class="uk-radio" type="radio" name="radio2"> Non</label>
            </div>
            <div class="uk-margin">
                <p>Date d'ajout : <?= $product->pro_d_ajout ?></p>
            </div>
            <div class="uk-margin">
                <p>Date de modification : <?= $product->pro_d_modif ?></p>
            </div>
        </fieldset>
        <input type="submit" name="submit" value="Enregistrer" class="uk-button uk-button-secondary">
    </form>
</div>



<?php
include 'footer.php';
?> 