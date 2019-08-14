
<div class="container">
    <h1>Date erronée</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Présentation</div>
            <div class="collapsible-body">
                <p>
                    Toujours en utilisant la classe <code>DateTime()</code> nous devons créer un programme permettant de déterminer si une date est correct ou non.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le code</div>
            <div class="collapsible-body">
                <p>
                    Nous commençons par stocker une date dans un variable puis nous l'analysons selon le format spécifié :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('// Méthode avec l\'objet DateTime
$testDate = DateTime::createFromFormat(\'d/m/Y\', $date); // => analyse une date au format texte selon le format spécifié') ?>
    </code>
                </pre>
                <p>
                    Nous stockons les erreurs de l'objet <code>DateTime</code> dans un tableau :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
// getLastErrors retourne les erreurs de l\'objet DateTime dans un tableau
$errors = $testDate->getLastErrors();
') ?>
    </code>
                </pre>
                <p>
                    Enfin nous établissons une condition selon le schéma suivant : si le tableau d'erreur contient plus de 1 erreur, alors la date n'est pas valide, sinon elle l'est :
                </p>
                <pre>
    <code class="HTMLBars">
                        <?= htmlspecialchars('<div class="uk-container">
    <?php
    if ($errors[\'warning_count\'] >= 1)
    {
        ?>
        <p>
            La date <?= $date ?> est non valide !!
        </p>
    </div>
    <?php
}
else
{
    ?>
    <p>
        La date <?= $date ?> est valide !!
    </p>
    <?php
} ?>') ?>
    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résumé et démo</div>
            <div class="collapsible-body">
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
<?php
/* --------------------------------------------------------
 * PHP Phase 6 Dates et heures
 *
 * Exercice 6  
 *
 * En utilisant l\'objet DateTime, montrez que la date du 17/17/2019 est erronée. 
 * ---------------------------------------------------------- */
$date = "17/17/2019";

// Méthode avec l\'objet DateTime
$testDate = DateTime::createFromFormat(\'d/m/Y\', $date); // => analyse une date au format texte selon le format spécifié
// getLastErrors retourne les erreurs de l\'objet DateTime dans un tableau
$errors = $testDate->getLastErrors();

var_dump($errors);
include \'../header.php\';
?>
<div class="uk-container">
    <?php
    if ($errors[\'warning_count\'] >= 1)
    {
        ?>
        <p>
            La date <?= $date ?> est non valide !!
        </p>
    </div>
    <?php
}
else
{
    ?>
    <p>
        La date <?= $date ?> est valide !!
    </p>
    <?php
}
include \'../footer.php\';
?>') ?>
    </code>
                </pre>
                <a href="date6Demo.php" class="waves-effect waves-light btn" title="Lien vers démo" target="_blanked"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>