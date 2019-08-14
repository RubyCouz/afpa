<?php
include '../header.php';
?>
<div class="container">
    <h1>Les expressions régulières (regexs)</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Définition</div>
            <div class="collapsible-body">
                <p>
                    Une regex, ou expression régulère est une suite de caractère qui va permettre de contrôler les champs d'un formulaire, de faire des recherches dans une chaine de caractères ou bien d'effectuer des remplacements de caractères dans une chaine.
                </p>
                <p>
                    Elle agit comme un filtre, qu el'on va retrouver dans différents langages. Sa construction sera identiques d'un langage à l'autre, seules les fonctions qui vont l'exécuter seront différentes.
                </p>
                <p>
                    Elles sont très efficaces dans le contrôle de données, cependant elles peuvent être difficiles à mettre en place pour être performantes.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Exemple</div>
            <div class="collapsible-body">
                <p>
                    Exemple de Regex :
                </p>
                <pre>
                    <code class="js">
var regex = /^0[1-9]([-. ]?[0-9]{2}){4}$/;
                    </code>
                </pre>
                <p>
                    c'est une regex permettant le contrôle de saisie sur un champs demandant un numéro de téléphone.
                </p>
                <p>
                    Décortiquons-la :
                </p>
                <ul>
                    <li><code>/</code> : permet de délimiter une regex, peut être remplacer par <code>"</code>.</li>
                    <li><code>^</code>: indique que la regex doit faire le contrôle dès le premier caractère de la saisie.</li>
                    <li><code>$</code> : indique que la regex doit faire le contrôle jusqu'au dernier caractère de la saisie.</li>
                    <li><code>[0-9]</code> : indique un chiffre compris entre 0 et 9. on peut renseigner dans les crochets tout caractère accepté. on indique généralement un quantifieur derrière pour indiquer combien de fois le(s) caractères doi(ven)t se trouver. </li>
                    <li>
                        <code>?</code> : quantifieur. Il précise que le caractère ne peut être présent qu'au maximum une fois (0 ou 1). on peut trouver parmis les quantifieurs :
                        <ul>
                            <li><code>+</code> : 1 ou plusieurs fois</li>
                            <li><code>*</code> : 0 ou plusieurs fois</li>
                            <li><code>{x}</code> : exactement x fois</li>
                            <li><code>{x, y} :</code> entre x et y fois</li>
                            <li><code>{x, }</code> : au moins x fois</li>
                        </ul>
                    </li>
                    <li><code>( )</code> : permet d'englober plusieurs groupe (<code>[ ]</code>) que l'on voudrait un certain nombre de fois</li>
                </ul>
                <p>
                    Plus clairement, le numéro que nous voulons doit forcément commencer par 0, le 2ème chiffre doit être compris entre 0 et 9 (une seule fois), puis on doit avoir soit un <code>.</code> ou <code>-</code> suivis de 2 chiffres compris entre 0 et 9. Le <code>.</code>(ou <code>-</code>) ainsi que les 2 chiffres doivent être répétés 4 fois.
                </p>
                <p>
                    Avant d'appliquer une regex, il faut absolument la tester, et vérifier qu'elle accepte toutes les possibilités envisageables. Il existe des sites pour cela, comme <a href="https://regex101.com/" title="Lien vers regex101" target="_blank">regex101.com</a>. vous y trouverez un zone pour y entrer votre regex, une pour y saisir des exemples à tester. Le site vous explique aussi la construction de votre regex et vous propose également des exemples de modules pour aider à construire un regex. 
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Correction exercice</div>
            <div class="collapsible-body">
                <div class="uk-accordion-content">
                    <p>Voir <a href="formJavascript.php" title="Lien vers correction du formulaire javascript" target="_blank">la correction sur les formulaires</a> pour observer leur action.</p>
                </div>
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>