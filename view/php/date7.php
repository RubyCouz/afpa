
<div class="container">
    <h1>Formatage de l'heure</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Présentation</div>
            <div class="collapsible-body">
                <p>Nous devons formater l'heure actuelle au format <em>11h25</em></p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Le code</div>
            <div class="collapsible-body">
                <p>
                    Nous devons d'abord définir quel fuseau nous utilisons :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('date_default_timezone_set(\'Europe/Paris\'); // => défini la localisation du fuseau utilisé') ?>
    </code>
                </pre>
                <p>
                    Puis nous formatons notre date :
                </p>
                <pre>
    <code class="php">
                        <?= htmlspecialchars('
<div class="uk-container">
    <p><?= date(\'H\hi e\') ?></p>
</div>') ?>
    </code>
                </pre>
                <p>
                    Le "h" doit être échappé sinon il ne sera pas interprété correctement.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résumé et démo</div>
            <div class="collapsible-body">
                <pre>
    <code class="HTMLBars">
                        <?= htmlspecialchars('
<?php
/* --------------------------------------------------------
* PHP Phase 6 Dates et heures
*
* Exercice 7  
*
* Affichez l\'heure courante sous cette forme : _11h25_.
* ---------------------------------------------------------- */
date_default_timezone_set(\'Europe/Paris\'); // => défini la localisation du fuseau utilisé

include \'../header.php\';
?>
<div class="uk-container">
    <p><?= date(\'H\hi e\') ?></p>
</div>
<?php
include \'../footer.php\';
') ?>
    </code>
                </pre>
                <a href="date7Demo.php" class="waves-effect waves-light btn" title="Lien vers démo" target="_blanked"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>