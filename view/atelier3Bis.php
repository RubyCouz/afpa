<?php
include 'header.php';
?>
<div class="uk-container">
    <h1>Atelier 3, suite</h1>
<ul uk-accordion>
    <li class="uk-open">
        <a class="uk-accordion-title" href="#">Mis en place de l'upload de fichier</a>
        <div class="uk-accordion-content">
            <p>
                Pour ajouter un produit, ou le modifier, nous devrons pouvoir télécharger un photo, la renommer et la stocker sur notre serveur. Pour cela, nous allons rajouter à notre formulaire affiché pour le détail d'un produit un <code><?= htmlspecialchars('<input type="file" />') ?></code>.
            </p>
            <p>
                Cet <code>input</code> affichera automatiquement un bouton "Parcourir", qui permettra la recherche d'un fichier à télécharger.
            </p>
            <pre>
                <code class="html">
                    <?= htmlspecialchars('
<label for="file">Télécharger un fichier</label>
<input type="file" name="file" id="file" />
') ?>
                </code>
            </pre>
        <p>
            Remarque : pour la démonstration, le frameworks ne met pas à disposition de bouton "Parcourir", juste un <code>input</code> sur lequel il suffit de cliquer pour pouvoir télécharger un fichier.
        </p>
        <p>
            Une fois l'<code>input</code> en place dans le HTML, il suffit de rajouter une vérification du champs de saisie, comme un <code>input</code> classique, avec en plus un contrôle de l'extension du fichier (voir <a href="">exercice sur l'upload</a> de fichier pour plus de précision).
        </p>
        <p>
            Pour la vérification du téléchargement de fichier, nous auront donc :
        </p>
        </div>
        <hr class="uk-divider-icon"/>
    </li>
    <li>
        <a class="uk-accordion-title" href="#">Item 2</a>
        <div class="uk-accordion-content">
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor reprehenderit.</p>
        </div>
        <hr class="uk-divider-icon"/>
    </li>
    <li>
        <a class="uk-accordion-title" href="#">Item 3</a>
        <div class="uk-accordion-content">
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat proident.</p>
        </div>
        <hr class="uk-divider-icon"/>
    </li>
</ul>
</div>

<?php
include 'footer.php';
?>