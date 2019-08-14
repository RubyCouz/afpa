
<div class="container">
    <h1>Trouver la prochaine année bissextile</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Présentation</div>
            <div class="collapsible-body">
                <p>
                    Nous devons créer un programme pouvant nous indiquer quelle sera la prochaine année bissextile. Pour cela, nous devons récupérer la date courante, parcourir les 4 années suivantes et les tester afin de voir laquelle sera bissextile.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le code</div>
            <div class="collapsible-body">
                <p>
                    Nous commençons par instancier un nouvel objet <code>DateTime()</code> :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('$date = new DateTime();') ?>
    </code>
                </pre>
                <p>
                    Nous construisons notre boucle :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars(' 
for ($i=0; $i<4; $i++) 
{    

}') ?>
    </code>
                </pre>
                <p>
                    Nous commençons par ajouter un an à l'année en cours (peu importe que l'année en cours soit bissextile ou non, nous cherchons à savoir qu'elle sera la prochaine), puis nous la testons avec la méthode <code>format('L')</code>. Cette méthode retourne un booléen (1 l'année est bissextile, 0 elle ne l'est pas). Puis nous formations notre affichage dans notre condition :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
 <?php
// début de la boucle parcourant les 4 prochaines années
for ($i = 0; $i < 4; $i++)
{
// on ajout un an à chaque tour
$date->modify(\'+1 years\');
if ($date->format(\'L\') == 1) // si la fonction retourne 1
    {
    ?>
        <p>L\'année <?= $date->format(\'Y\') ?>." sera bissextile.</p>
    <?php
    }
}
    ?>') ?>
    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résumé et démo</div>
            <div class="collapsible-body">
                <pre>
    <code class="HTMLBars">
                        <?= htmlspecialchars('<?php
/* --------------------------------------------------------
 * PHP Phase 6 Dates et heures
 *
 * Exercice 5  
 *
 * Quelle sera la prochaine année bissextile ?
 * ---------------------------------------------------------- */
$date = new DateTime();
include \'../header.php\';
?>
<div class="uk-container">
    <?php
    // début de la boucle parcourant les 4 prochaines années
    for ($i = 0; $i < 4; $i++)
    {
        // on ajout un an à chaque tour
        $date->modify(\'+1 years\');

        if ($date->format(\'L\') == 1) // si la fonction retourne 1
        {
            ?>

            <p>
               L\'année <?= $date->format(\'Y\') ?> sera la prochaine année bissextile.
            </p>
            <?php
        }
    }
    ?>
</div>
<?php
include \'../footer.php\';
?>
') ?>
    </code>
                </pre>
                <a href="date5Demo.php" class="waves-effect waves-light btn" title="Lien vers démo" target="_blanked"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>