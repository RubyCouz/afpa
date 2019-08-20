<?php
include '../header.php';
include '../../controler/productControler.php';
?>
<div class="container">
    <?php
    if (isset($_POST['submit']) && (count($formError) == 0))
    {
        ?>
    <p class="white-text">
            Produit modifié !!
        </p>
        <a href="allProduct.php" title="Retour à la liste de produit" class="waves-effect waves-light btn">Retour à la liste de produit</a>
        <?php
    }
    else if (isset($_POST['delete']))
    {
        ?>
        <p class="white-text">
            Produit supprimé !!
        </p>
        <a href="allProduct.php" title="Retour à la liste de produit" class="waves-effect waves-light btn">Retour à la liste de produit</a>
        <?php
    }
    else
    {
        ?>
        <div class="row">
            <div class="col s12">
                <div class="card light-green lighten-5">
                    <div class="card-content">
                        <span class="card-title">Détail du produit <?= $product->pro_libelle ?> :</span>
                        <form method="POST" action="#" enctype="multipart/form-data">   
                            <div class="row">
                                <div class="col s6">
                                    <img src="../../assets/img/<?= $product->pro_id . '.' . $product->pro_photo ?>" alt="" class="materialboxed pic2">
                                </div>
                                <div class="col s6">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="id" type="text" name="id" class="" disabled value="<?= $product->pro_id ?>">
                                            <label for="id">ID</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select name="categories" id="categories">
                                                <option value="" disabled selected>Choisissez une catégorie</option>
                                                <?php
                                                foreach ($isObjectResult as $cat)
                                                {
                                                    ?>
                                                <option value="<?= $cat->cat_id ?>"<?= isset($_POST['categories']) && $_POST['categories'] == $cat->cat_id ? 'selected' : '' ?>><?= $cat->cat_nom ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <label for="categories">Catégorie</label>
                                             <span class="error" id="errorCAt"><?= isset($formError['categories']) ? $formError['categories'] : '' ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="ref" type="text" name="ref" class="" value="<?= isset($_POST['ref']) ? $_POST['ref'] : $product->pro_ref ?>">
                                            <label for="ref">Référence</label>
                                            <span class="error" id="errorRef"><?= isset($formError['ref']) ? $formError['ref'] : '' ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="label" type="text" name="label" class="" value="<?= isset($_POST['label']) ? $_POST['label'] : $product->pro_libelle ?>">
                                            <label for="label">Libellé</label>
                                            <span class="error" id="errorLabel"><?= isset($formError['label']) ? $formError['label'] : '' ?></span>
                                        </div>
                                    </div>                                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="color" type="text" name="color" class="" value="<?= isset($_POST['color']) ? $_POST['color'] : $product->pro_couleur ?>">
                                    <label for="color">Couleur</label>
                                    <span class="error" id="errorColor"><?= isset($formError['color']) ? $formError['color'] : '' ?></span>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="stock" type="text" name="stock" class="" value="<?= isset($_POST['stock']) ? $_POST['stock'] : $product->pro_stock ?>">
                                        <label for="stock">Stock</label>
                                        <span class="error" id="errorStock"><?= isset($formError['stock']) ? $formError['stock'] : '' ?></span>
                                    </div>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="price" type="text" name="price" class="" value="<?= isset($_POST['price']) ? $_POST['price'] : $product->pro_prix ?>">
                                        <label for="price">Prix</label>
                                        <span class="error" id="errorPrice"><?= isset($formError['price']) ? $formError['price'] : '' ?></span>
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Insérer une photo</span>
                                            <input type="file" name="file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                        <span class="info">Au format .gif, .jpg, .jpeg, .pjpeg ou .png</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="input-field">
                                        <textarea id="description" class="materialize-textarea" name="description"><?= isset($_POST['description']) ? $_POST['description'] : $product->pro_description ?></textarea>
                                        <label for="description">Description</label>
                                        <span class="error" id="errorDesc"><?= isset($formError['description']) ? $formError['description'] : '' ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row valign-wrapper left-align">
                                <div class="col s2 radio">
                                    <p>Produit bloqué :</p>
                                </div>
                                <div class="col s1 radio">
                                    <label>
                                        <input name="radio2" type="radio" value="1" <?= $product->pro_bloque == 1 ? 'checked' : '' ?>>
                                        <span>Oui</span>
                                    </label>
                                </div>
                                <div class="col s1 radio">
                                    <label>
                                        <input name="radio2" type="radio" value="2" <?= ($product->pro_bloque == NULL) || ($product->pro_bloque == 2) ? 'checked' : '' ?>>
                                        <span>Non</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6">
                                    <p>Date d'ajout : <?= $product->pro_d_ajout ?></p>
                                </div>
                                <div class="col s6">
                                    <p>Date de modification : <?= $product->pro_d_modif == NULL ? 'Pas de modification enregistrée' : $product->pro_d_modif ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s4 center-align">
                                    <input type="submit" name="submit" value="Modifier le produit" class="waves-effect waves-light btn">
                                </div>
                                <div class="col s4 center-align">
                                    <a type="submit" name="delete" id="delete" href="#modal<?= $product->pro_id ?>" class="waves-effect waves-light btn modal-trigger red accent-4">Effacer le produit</a>
                                </div>
                                <div class="col s4 center-align">
                                    <a href="allProduct.php" title="Lien vers le catalogue" class="waves-effect waves-light btn cyan accent-4">Retour au catalogue</a>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <?php
    include '../footer.php';
    ?>


    <?php
    if (isset($product->pro_id))
    {
        ?>
        <!-- Modal Structure -->
        <div id="modal<?= $product->pro_id ?>" class="modal">
            <div class="modal-content">
                <h4>ATTENTION !!</h4>
                <p>Voulez-vous supprimer ce produit de la base de données?</p>
                <p>Attention : cette action sera irréversible et vous ne pourrez pas récupérer ces données.</p>
            </div>
            <div class="modal-footer">
                <form action="#" method="POST">
                    <input type="hidden" name="id" id="id" value="<?= $product->pro_id ?>">
                    <input type="submit" name="delete" id="delete" class="modal-close waves-effect waves-green btn red accent-4" value="Valider">
                </form>
            </div>
        </div>
        <?php
    }
    ?>