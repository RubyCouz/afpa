
<div class="uk-container">

    <?php echo validation_errors(); ?>

    <?php // echo form_open_multipart();   ?>

    <form action="" method="POST" enctype="multipart/form-data">

        <div class="uk-alert-danger">
            <!-- <?= $error ?> -->
        </div>
        <fieldset class="uk-fieldset">
            <legend class="uk-legend">Ajouter un produit</legend>

            <div class="uk-child-width-1-2 uk-text-center" uk-grid>
                <div>
                    <div class="uk-card uk-card-default uk-card-body">
                        <img src="" />
                    </div>
                </div>
                <div>

                    <div class="uk-margin">
                        <label for="categories"></label>
                        <select class="uk-select" id="categories" name="pro_cat_id">
                            <option disabled selected>Choisissez une catégorie</option>
                            <?php
                            foreach ($categoriesList as $row)
                            {
                                ?>
                                <option value="<?= $row->cat_id ?>" <?= isset($_POST['pro_cat_id']) ? 'selected' : '' ?>><?= $row->cat_nom ?></option>
                                <?php
                            }
                            ?>
                        </select>    
                        <?php
                        if (form_error('pro_cat_id') != NULL)
                        {
                            ?>
                            <div class="uk-alert-danger" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p><?= form_error('pro_cat_id') ?></p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="ref">Référence</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="ref" type="text" name="pro_ref" placeholder="Indiquez une référence" value="<?= set_value('pro_ref') ?>" />
                        </div>
                        <?php
                        if (form_error('pro_ref') != NULL)
                        {
                            ?>
                            <div class="uk-alert-danger" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p><?= form_error('pro_ref') ?></p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="color">Couleur</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="color" type="text" name="pro_couleur" placeholder="Indiquez une couleur" value="<?= set_value('pro_couleur') ?>" />
                        </div>
                        <?php
                        if (form_error('pro_couleur') != NULL)
                        {
                            ?>
                            <div class="uk-alert-danger" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p><?= form_error('pro_couleur') ?></p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="label">Libellé</label> 
                        <div class="uk-form-controls">
                            <input class="uk-input" id="label" type="text" name="pro_libelle" placeholder="Libellé" value="<?= set_value('pro_libelle') ?>" />
                        </div>
                        <?php
                        if (form_error('pro_libelle') != NULL)
                        {
                            ?>
                            <div class="uk-alert-danger" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p><?= form_error('pro_libelle') ?></p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="price">Prix</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="price" type="text" name="pro_prix" placeholder="Prix" value="<?= set_value('pro_prix') ?>" />
                        </div>
                        <?php
                        if (form_error('pro_prix') != NULL)
                        {
                            ?>
                            <div class="uk-alert-danger" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p><?= form_error('pro_prix') ?></p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="stock">Stock</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="stock" type="text" name="pro_stock" placeholder="Quantité en stock" value="<?= set_value('pro_stock') ?>" />
                        </div>
                        <?php
                        if (form_error('pro_stock') != NULL)
                        {
                            ?>
                            <div class="uk-alert-danger" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p><?= form_error('pro_stock') ?></p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="uk-margin">
                        <div uk-form-custom="target: true">
                            <input type="file" name="pro_photo" >
                            <input class="uk-input uk-form-width-medium" type="text" placeholder="Insérez une image" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="description">Description</label>
                <textarea class="uk-textarea" rows="5" id="description" placeholder="Description" name="pro_description" ><?= set_value('pro_description') ?></textarea>
                <?php
                if (form_error('pro_description') != NULL)
                {
                    ?>
                    <div class="uk-alert-danger" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <p><?= form_error('pro_description') ?></p>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                <label>Produit bloqué :</label>
                <label><input class="uk-radio" type="radio" name="pro_bloque" value="1" <?= isset($_POST['pro_ref']) ? 'checked' : '' ?>> Oui</label>
                <label><input class="uk-radio" type="radio" name="pro_bloque" value="2" <?= isset($_POST['pro_ref']) ? 'checked' : '' ?>> Non</label>
            </div>
        </fieldset>
        <input type="submit" value="Ajouter le produit" class="uk-button uk-button-secondary" />
    </form>
    <hr class="uk-divider-icon" />
</div> 