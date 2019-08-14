<div class="uk-container">

    <?php //echo validation_errors(); ?>
    <form action="" method="POST" enctype="multipart/form-data">

        <div class="uk-alert-danger">
            <!-- <?= $error ?> -->
        </div>
        <fieldset class="uk-fieldset">
            <legend class="uk-legend">Modifier un produit</legend>

            <div class="uk-child-width-1-2 uk-text-center" uk-grid>
                <div>
                    <div class="uk-card uk-card-default uk-card-body">
                        <img src="<?= base_url('assets/img/' . $produits->pro_id . '.' . $produits->pro_photo) ?>" alt="Photo d'illustration" title="Photo de <?= $produits->pro_libelle ?>" />
                    </div>
                </div>

                <div>
                    <div class="uk-margin">
                        <div class="uk-form-controls">
                            <input class="uk-input" id="id" type="hidden" name="pro_id" value="<?= $produits->pro_id ?>" />
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label for="categories"></label>
                        <select class="uk-select" id="categories" name="pro_cat_id">
                            <option disabled selected>Choisissez une catégorie</option>
                            <?php
                            foreach ($categoriesList as $row)
                            {
                                ?>
                                <option value="<?= $row->cat_id ?>" <?= $row->cat_id == $produits->pro_cat_id ? 'selected' : '' ?>><?= $row->cat_nom ?></option>
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
                            <input class="uk-input" id="ref" type="text" name="pro_ref" placeholder="Indiquez une référence" value="<?= set_value('pro_ref') != NULL ? set_value('pro_ref') : $produits->pro_ref ?>" />
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
                            <input class="uk-input" id="color" type="text" name="pro_couleur" placeholder="Indiquez une couleur"  value="<?= set_value('pro_couleur') != NULL ? set_value('pro_couleur') : $produits->pro_couleur ?>" />
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
                        <label class="uk-form-label" for="label">Libellé</label> /
                        <div class="uk-form-controls">
                            <input class="uk-input" id="label" type="text" name="pro_libelle" placeholder="Libellé" value="<?= set_value('pro_libelle') != NULL ? set_value('pro_libelle') : $produits->pro_libelle ?>" />
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
                            <input class="uk-input" id="price" type="text" name="pro_prix" placeholder="Prix"  value="<?= set_value('pro_prix') != NULL ? set_value('pro_prix') : $produits->pro_prix ?>" />
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
                            <input class="uk-input" id="stock" type="text" name="pro_stock" placeholder="Quantité en stock"  value="<?= set_value('pro_stock') != NULL ? set_value('pro_stock') : $produits->pro_stock ?>" />
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
                <textarea class="uk-textarea" rows="5" id="description" placeholder="Description" name="pro_description" ><?= set_value('pro_description') != NULL ? set_value('pro_description') : $produits->pro_description ?></textarea>
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
                <label><input class="uk-radio" type="radio" name="pro_bloque" value="1" <?= $produits->pro_bloque == 1 ? 'checked' : '' ?>> Oui</label>
                <label><input class="uk-radio" type="radio" name="pro_bloque" value="2" <?= $produits->pro_bloque == 1 ? '' : 'checked' ?>> Non</label>
            </div>
        </fieldset>
        <input type="submit" value="Modifier le produit" class="uk-button uk-button-secondary" />
        <button class="uk-button uk-button-danger" type="button" uk-toggle="target: #modal-example">Supprimer le produit</button>
    </form>

    <!-- This is the modal -->
    <div id="modal-example" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <h2 class="uk-modal-title">ATTENTION :</h2>
            <p>Voulez-vous vraiment supprimer ce produit?</p>
            <p>Cette suppression sera irreversible.</p>
            <div class="uk-text-right">
                <form action="<?= site_url('Produits/delete') ?>" method="POST">
                    <input type="hidden" name="pro_id" id="pro_id" value="<?= $produits->pro_id ?>" />
                    <input type="submit" name="delete" id="delete" class="uk-button uk-button-danger" value="Oui" />
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Non</button>
                </form>
            </div>
        </div>
    </div>


    <hr class="uk-divider-icon" />
</div> 