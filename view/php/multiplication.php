
<div class="container">
    <h1>Table de multiplication</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Besoin</div>
            <div class="collapsible-body">
                <p>
                    Il nous faut faire un programme nous affichant le resultat des multiplications de tous les nombres entre 0 et 12. L'affichage doit se faire dans un tableau HTML.
                </p>
                <p>
                    Nous avons besoin de 2 variables designant 2 nombres compris entre 0 et 12. Elles nous serviront pour faire tourner des boucles <code>for()</code> qui s'occuperont quant à elles de l'affichage des différentes lignes et cellules du tableau.
                </p>
                <pre>
                <code class="php">
                        <?= htmlspecialchars('
$firstNumber = 0;
$secondNumber = 0;       
                    ') ?>
                </code>
                </pre>
                <p>
                    Une première boucle <code>for()</code> sera utilisée pour afficher l'en-tête du tableau (<code><?= htmlspecialchars('<thead>') ?></code>). Une seconde sera utilisée pour afficher les lignes du corps du tableau. A l'intérieur de cette dernière, nous utiliserons une autre boucle <code>for()</code> pour afficher chaque cellule. Nous pourrons y insérer le resultat de la pultiplication de nos 2 nombres.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Construction du tableau en HTML</div>
            <div class="collapsible-body">
                <p>
                    Un petit rappel ne fait jamais de mal, un tableau en HTML se construit de la manière suivante :
                </p>
                <pre>
                <code class="html">
                        <?= htmlspecialchars('
<table>
    <caption></caption>
    <thead>
        <tr>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table> 
') ?>
                </code>
                </pre>
                <p>
                    Le <code><?= htmlspecialchars('<tfoot>') ?></code> n'est pas nécessaire ici puisque nous ne faisons pas de calcul à la fin du tableau.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Remplissage de l'en-tête</div>
            <div class="collapsible-body">
                <p>
                    Il nous faut une première boucle pour parcourir les nombres de 0 à 12 et les afficher dans l'en-tête :
                </p>
                <pre>
                <code class="php">
                        <?= htmlspecialchars('
<?php
for ($firstNumber = 0; $firstNumber <= 12; $firstNumber++) {
   
}
?>
') ?>
                </code>
                </pre>
                <p>
                    A l'intérieur de cette boucle, nous allons insérer les cellules de l'en-tête de notre tableau :
                </p>
                <pre>
                <code class="php">
                        <?= htmlspecialchars('
<?php
for ($firstNumber = 0; $firstNumber <= 12; $firstNumber++) {
    ?>
    <th>
        <?= $firstNumber ?>
    </th>
    <?php
}
?>
') ?>
                </code>
                </pre>
                <p>
                    A chaque tour, la boucle créera des balises <code>
                        <th></th>
                    </code> avec la valeur de <code>$firstNumber</code> à l'intérieur.
                </p>
                <a href="firstMultDemo.php" class="waves-effect waves-light btn" target="_blank"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Remplissage du corps du tableau</div>
            <div class="collapsible-body">
                <p>
                    De la même manière que la première boucle, nous allons définir une boucle qui s'occupera de générer les ligne de notre tableau, avec une première cellule contenant la valuer de <code><?= htmlspecialchars('$secondNumber') ?></code> à chaque tour.
                </p>
                <pre>
                <code class="php">
                        <?= htmlspecialchars('
<?php
for ($secondNumber = 0; $secondNumber <= 12; $secondNumber++) {
    ?>
        <tr>
            <td>
                <?= $secondNumber ?>
            </td>   
            <td></td>     
        </tr>
}
?>
') ?>
                </code>
                </pre>
                <a href="secondMultDemo.php" class="waves-effect waves-light btn" target="_blank"><i class="material-icons right">play_arrow</i>RUN CODE</a>
                <p>
                    A l'intérieur de cette boucle, nous allons insérer les cellules du corps de notre tableau :
                </p>
                <pre>
                <code class="php">
                        <?= htmlspecialchars('
<?php
for ($firstNumber = 0; $firstNumber <= 12; $firstNumber++) {
    ?>
    <td>
        <?= $secondNumber * $firstNumber ?>
    </td>
        <?php
}
?>
') ?>
                </code>
                </pre>
                <a href="multiplicationDemo.php" class="waves-effect waves-light btn" target="_blank"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat final</div>
            <div class="collapsible-body">
                <p>
                    Une fois tout assemblé, nous obtiendrons :
                </p>
                <pre>
                    <code class="html">
                        <?= htmlspecialchars('
<?php
$firstNumber = 0;
$secondNumber = 0;

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Correction AFPA</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
<div>
    <table>
        <caption>Tableau de multiplication</caption>
        <thead>
            <tr>
                <th></th>
                <?php
                for ($firstNumber = 0; $firstNumber <= 12; $firstNumber++) {
                    ?>
                    <th>
                        <?= $firstNumber ?>
                    </th>
                    <?php
                }
                ?>

            </tr>
        </thead>

        <tbody>
            <?php
                for ($secondNumber = 0; $secondNumber <= 12; $secondNumber++) {
                    ?>
                    <tr>
                        <td>
                            <?= $secondNumber ?>
                    </td>
                    <?php
                    for ($firstNumber = 0; $firstNumber <= 12; $firstNumber++) {
                        ?>
                        <td>
                            <?= $secondNumber * $firstNumber ?>
                        </td>
                            <?php
                    }
                    ?>
                    </tr>
                        <?php
                }
                ?>
        </tbody>
    </table>
</div>
</body>
</html>

') ?>
                </code>
                </pre>
                <a href="multiplicationDemo.php" class="waves-effect waves-light btn" target="_blank"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>