<?php
include 'header.php';
include '../controler/allProductControler.php';

?>
<div class="uk-container">
    <table class="uk-table uk-table-striped">
        <thead>
            <th>Photo</th>
            <th>Id</th>
            <th>Catégorie</th>
            <th>Référence</th>
            <th>Libellé</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Ajout</th>
            <th>Modif</th>
            <th>Bloqué</th>
        </thead>
        <tbody>
            <?php
            foreach ($allProduct as $element) {
                ?>
            <tr>
                <td>
                    <img src="../assets/img/<?= $element->pro_id . '.' . $element->pro_photo ?>" alt="Photo d'illustration" title="Photo de <?= $element->pro_libelle ?>">
                </td>
                <td><?= $element->pro_id ?></td>
                <td><?= $element->pro_cat_id ?></td>
                <td><?= $element->pro_ref ?></td>
                <td><?= $element->pro_libelle ?></td>
                <td><?= $element->pro_description ?></td>
                <td><?= $element->pro_prix ?></td>
                <td><?= $element->pro_stock ?></td>
                <td><?= $element->pro_d_ajout ?></td>
                <td><?= $element->pro_d_modif ?></td>
                <td><?= $element->pro_bloque ?></td>
                <td><a href="produit.php?id=<?= $element->pro_id ?>" title="Lien vers la fiche produit" class="uk-button uk-button-secondary uk-button-small">Fiche Produit</a>
                </td>
            </tr>
            <?php

        }
        ?>
        </tbody>
    </table>
</div> 
<?php
include 'footer.php';
?>