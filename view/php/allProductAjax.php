<?php
include '../../controler/allProductControler.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les boucles</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../assets/css/style.css">

    <body>
        <div class="container">
            <table class="ajax">
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
        </div> 

    </body>
</html>


<!-- tableau contenant les produits  du catalogue -->


<?php
?>