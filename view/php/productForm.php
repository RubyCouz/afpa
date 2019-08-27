<?php
include '../header.php';
include '../../controler/productFormController.php';
?>
<div class="container">
    <?php
    if (isset($_POST['submit']) && count($formError) == 0)
    {
        ?>
        <p>Produit ajouté au catalogue avec succès !!</p>
        <a href="allProduct.php" title="Retour à la liste de produit" class="waves-effect waves-light btn">Retour à la liste de produit</a>
        <?php
    } else {
        ?>
        <div class="row">
            <div class="col s12">
                <div class="card light-green lighten-5">
                    <div class="card-content">
                        <span class="card-title">Insertion d'un produit :</span>
                        <form method="POST" action="#" enctype="multipart/form-data" id="form">   
                            <div class="row">
                                <div class="col s6" id="prev">
                                    
                                    
                                    
                                </div>
                                <div class="col s6">

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
                                            <input id="ref" type="text" name="ref" class="" value="<?= isset($_POST['ref']) ? $_POST['ref'] : '' ?>">
                                            <label for="ref">Référence</label>
                                            <span class="error" id="errorRef"><?= isset($formError['ref']) ? $formError['ref'] : '' ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="label" type="text" name="label" class="" value="<?= isset($_POST['label']) ? $_POST['label'] : '' ?>">
                                            <label for="label">Libellé</label>
                                            <span class="error" id="errorLabel"><?= isset($formError['label']) ? $formError['label'] : '' ?></span>
                                        </div>
                                    </div>                                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="color" type="text" name="color" class="" value="<?= isset($_POST['color']) ? $_POST['color'] : '' ?>">
                                    <label for="color">Couleur</label>
                                    <span class="error" id="errorColor"><?= isset($formError['color']) ? $formError['color'] : '' ?></span>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="stock" type="text" name="stock" class="" value="<?= isset($_POST['stock']) ? $_POST['stock'] : '' ?>">
                                        <label for="stock">Stock</label>
                                        <span class="error" id="errorStock"><?= isset($formError['stock']) ? $formError['stock'] : '' ?></span>
                                    </div>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="price" type="text" name="price" class="" value="<?= isset($_POST['price']) ? $_POST['price'] : '' ?>">
                                        <label for="price">Prix</label>
                                        <span class="error" id="errorPrice"><?= isset($formError['price']) ? $formError['price'] : '' ?></span>
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Insérer une photo</span>
                                            <input type="file" name="file" id="upload">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" id="file">
                                        </div>
                                        <span class="info">Au format .gif, .jpg, .jpeg ou .png</span>
                                        <span class="error" id="errorFile"><?= isset($formError['file']) ? $formError['file'] : '' ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="input-field">
                                        <textarea id="description" class="materialize-textarea" name="description"><?= isset($_POST['decription']) ? $_POST['description'] : '' ?></textarea>
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
                                        <input name="radio2" type="radio" value="1">
                                        <span>Oui</span>
                                    </label>
                                </div>
                                <div class="col s1 radio">
                                    <label>
                                        <input name="radio2" type="radio" value="2">
                                        <span>Non</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s5 center-align">
                                    <input type="submit" name="submit" value="Enregistrer" class="waves-effect waves-light btn">
                                </div>
                                <div class="col s5 center-align">
                                    <a href="allProduct.php" title="Lien vers le catalogue" class="waves-effect waves-light btn cyan accent-4">Retour au catalogue</a>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <?php
    include '../footer.php';
}
?>
