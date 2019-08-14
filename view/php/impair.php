
<div class="container">
    <h1>Affichage des nombres impairs entre 0 et 150</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Besoins</div>
            <div class="collapsible-body">
                <p>
                    Nous devons faire un programme permettant l'affichage des nombres impairs compris entre 0 et 150. Nous utiliserons une condition avec laquelle nous n'afficheront que les nombres dont le reste de leur division par 2 est différent de 0. Et afin d'afficher tous ses nombres, nous engloberons cette condition dans une boucle qui parcourera tous les nombres compris entre 0 et 150. Nous aurons également besoin d'une variable, qui contiendra chacun de ces nombres à chaque tour de la boucle.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Construction du programme</div>
            <div class="collapsible-body">
                <p>
                    Nous commençons par définir une variable qui contiendra chacun des nombres entre 0 et 150, et nous l'initialsons à 0 :
                </p>
                <pre>
                <code class="php">
                        <?= htmlspecialchars('
$number = 0;
') ?>
                </code>
                </pre>
                <p>
                    Pour la condition, si le reste de la division de <code>$number</code> est différent de 0, alors nous affichons <code>$number</code> :
                </p>
                <pre>
                <code class="php">
                        <?= htmlspecialchars('
    if ($number % 2 !== 0) {
        ?>
        <p>
            <?= $number ?>
        </p>
            <?php
    }
') ?>
                </code>
                </pre>
                <p>
                    Nous pouvons enfin englober notre condition dans une boucle (pour <code>$number</code> égale à 0, <code>$number</code> strictement inférieur à 150, on incrémente <code>$number</code>) :
                </p>
                <pre>
                <code class="php">
                        <?= htmlspecialchars('
for ($number = 0; $number < 150; $number++) {
    if ($number % 2 !== 0) {
        ?>
        <p>
            <?= $number ?>
        </p>
            <?php
    }
}
') ?>
                </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Affichage</div>
            <div class="collapsible-body">
                <p>
                    Pour afficher notre résultat au sein d'une page web, nous procédons de la sorte :
                </p>
                <pre>
                <code class="html">
                        <?= htmlspecialchars('
<?php
$number = 0;
?>
<!DOCTYPE html>
<html lang=fr>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>PHP phase 1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
    <div class="uk-container">
        <?php
        for ($number = 0; $number < 150; $number++) {
            if ($number % 2 !== 0) {
                ?>
                <p>
                    <?= $number ?>
                </p>
                    <?php
            }
        }
        ?>
    </div>
</body>
</html>
') ?>
                </code>
                </pre>
                <a href="impairDemo.php" class="waves-effect waves-light btn" target="_blank"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>