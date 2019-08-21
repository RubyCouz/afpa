<?php
include '../header.php';
include '../../controler/allProductControler.php';
?>
<div class="container">
    <h1>Vue Admin</h1>
    <div class="row">
        <div class="col s4">
            <a href="productForm.php" class="waves-effect waves-light btn" title="Lien vers ajout d'un produit"><i class="material-icons right">add</i>Ajouter un produit</a>
        </div>
        <div class="col s4 offset-s4 right-align">
            <a href="allProductClient.php" class="waves-effect waves-light btn" title="Lien vers l'affichage des produits sur une vue client">Voir la vue client</a>
        </div>
    </div>

    <!-- tableau contenant les produits  du catalogue -->

    <table class="stripped highlight centered responsive-table table">
        <thead>
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
        </thead>
        <tbody>
            <?php
            foreach ($allProduct as $element)
            {
                ?>
                <tr>
                    <td>
                        <img src="../../assets/img/<?= $element->pro_id . '.' . $element->pro_photo ?>" alt="Photo d'illustration" title="Photo de <?= $element->pro_libelle ?>" class="pic">
                    </td>
                    <td><?= $element->pro_id ?></td>
                    <td><?= $element->cat_nom ?></td>
                    <td><?= $element->pro_ref ?></td>
                    <td><?= $element->pro_libelle ?></td>
                    <td><?= $element->pro_couleur ?></td>
                    <td><?= $element->pro_description ?></td>
                    <td><?= $element->pro_prix ?>€</td>
                    <td><?= $element->pro_stock ?></td>
                    <td><?= $element->pro_d_ajout ?></td>
                    <td><?= $element->pro_d_modif ?></td>
                    <td><?= $element->pro_bloque == 1 ? 'Oui' : 'Non' ?></td>
                    <td><a href="produit.php?id=<?= $element->pro_id ?>" title="Lien vers la fiche produit" class="waves-effect waves-light btn">Détail</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>    
    <div class="row">
        <div class="col s12">
            <a href="productForm.php" class="waves-effect waves-light btn" title="Lien vers ajout d'un produit" target="_blank"><i class="material-icons right">add</i>Ajouter un produit</a>
        </div>
    </div>
</div> 
<?php
include '../footer.php';
?>