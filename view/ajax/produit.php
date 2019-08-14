<?php
include '../model/config.php';
include '../controller/produit.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les boucles</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="" />
        <link rel="stylesheet" href="" />
    </head>

    <body>
        <!-- tableau liste de produits -->
        <table class="uk-table uk-table-hover uk-table-divider uk-table-middle">
            <caption>Liste des produits</caption>
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Id</th>
                    <th>Catégorie</th>
                    <th>Référence</th>
                    <th>Libellé</th>
                    <th>Couleur</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Ajout</th>
                    <th>Modif</th>
                    <th>Bloqué</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($allproduct as $element)
                {
                    ?>
                    <tr>
                        <td><img src="../assets/img/<?= $element->pro_id . '.' . $element->pro_photo ?>" /></td>
                        <td><?= $element->pro_id ?></td>
                        <td><?= $element->pro_cat_id ?></td>
                        <td><?= $element->pro_ref ?></td>
                        <td><?= $element->pro_libelle ?></td>
                        <td><?= $element->pro_couleur ?></td>
                        <td><?= $element->pro_description ?></td>
                        <td><?= $element->pro_prix ?></td>
                        <td><?= $element->pro_stock ?></td>
                        <td><?= $element->pro_d_ajout ?></td>
                        <td><?= $element->pro_d_modif ?></td>
                        <td><?= $element->pro_bloque ?></td>
                        <td><a href="productDetail.php?id=<?= $element->pro_id ?>" title="lien vers detail" target="_blank" class="uk-button uk-button-secondary uk-width-1-1 uk-margin-small-bottom">Voir detail</a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

        <script src=""></script>
        <script src=""></script>
        <script src="../assets/js/script.js"></script>
    </body>
</html>



/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

