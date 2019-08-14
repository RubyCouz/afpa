<?php
include '../header.php';
?>
<div class="container">
    <h1>Afficher du texte en Javascript</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Introduction</div>
            <div class="collapsible-body">
                <p>
                    Nous devons créer une page HTML demandant à l'utilisateur son nom et son prénom. On demande ensuite si c'est une femme ou un homme, et enfin on affiche un résumé des informations.
                </p>
                <p>
                    Pour cela nous utiliserons la méthode <a href="https://developer.mozilla.org/fr/docs/Web/API/Window/prompt" title="Lien vers définition MDN" target="_blank"><code>window.prompt()</code></a>, qui nous permettra de demander quelque chose à l'utilisateur et de stocker sa réponse dans une variable pour pouvoir l'exploiter par la suite.
                </p>
                <p>
                    Nous utiliserons ensuite la méthode <a href="https://developer.mozilla.org/fr/docs/Web/API/Window/alert" title="Lien vers définition MDN" target="_blank"><code>window.alert()</code></a> afin d'afficher un résumé des informations saisies par l'utilisateur.
                </p>
                <p>
                    La méthode <a href="https://developer.mozilla.org/fr/docs/Web/API/Window/confirm" title="Lien vers définition MDN" target="_blank"> <code>window.confirm()</code></a> sera utilisée pour demander à l'utilisateur son genre.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Définitions des variables</div>
            <div class="collapsible-body">
                <p>
                    Il nous faut définir des variables contenant respectivement le nom, le prénom et le genre de l'utilisateur :
                </p>
                <pre>
                    <code class="js">
var lastName = window.prompt('Entrez votre nom :');
var firstname = window.prompt('Entrez votre prénom :');
var gender = window.confirm('Etes-vous un homme?');
                    </code>
                </pre>
                <p>
                    La méthode <a href="https://developer.mozilla.org/fr/docs/Web/API/Window/prompt" title="Lien vers définition MDN" target="_blank"><code>window.prompt()</code></a> permet de récupérer la saisie de l'utilisateur et de la stocker dans une variable.
                </p>
                <p>
                    La méthode <a href="https://developer.mozilla.org/fr/docs/Web/API/Window/confirm" title="Lien vers définition MDN" target="_blank"><code>window.confirm()</code></a>
                    permet d'afficher une fenêtre de confirmation. Elle retroune "true" au clique sur le bouton "Ok" et "false" au clique sur bouton "Annuler";
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Détermination du genre de l'utilisateur et affichage de ses informations</div>
            <div class="collapsible-body">
                <p>
                    Pour définir son genre et générer un affichage correct, nous allons utiliser la valeur retournée par <a href="https://developer.mozilla.org/fr/docs/Web/API/Window/confirm" title="Lien vers définition MDN" target="_blank"><code>window.confirm()</code></a>. Si on récupère <code>true</code>, l'utilisateur est un homme, si false est retourné, alors l'utilisateur est une femme.
                </p>
                <pre>
                    <code class="js">
if (gender == true) {
// Nouvelle attribution de valeur à la variable gender
    gender = 'Monsieur';
} else {
 // Nouvelle attribution de valeur à la variable gender
    gender = 'Madame';
}
                    </code>
                </pre>
                <p>
                    Utilisons la méthode <a href="https://developer.mozilla.org/fr/docs/Web/API/Window/alert" title="Lien vers définition MDN" target="_blank"><code>window.alert()</code></a> pour afficher notre résumé :
                </p>
                <pre>
                    <code class="js">
window.alert('Bonjour ' + gender + ' ' + name + '.' + '\n' + 'Bienvenue sur notre site!');
                    </code>
                </pre>
                <p>
                    Le <code>+</code> permet de faire (en Javascript) ce qu'on appelle une <a href="https://www.techno-science.net/definition/5297.html" title="Lien vers définition concanténation" target="_blank" class="uk-link-muted">concaténation</a>. C'est à dire mettre bout à bout plusieurs chaine de caractère et le contenu de variables.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat final</div>
            <div class="collapsible-body">
<p>
                    Nous obtenons alors :
                </p>
                <pre>
                    <code class="js">
                        <?=                        htmlspecialchars(' 
                    // déclaration des variables 
        var lastName = prompt(\'Entrez votre nom :\'); // prompt (ou window.prompt) demande une saisie à l\'utilisateur
        var firstname = prompt(\'Entrez votre prénom :\'); // prompt (ou window.prompt) demande une saisie à l\'utilisateur
        var gender = window.confirm(\'Êtes-vous un homme?\'); // confirm => demande une confirmation à l\'utilisateur
       // début de la condition
        if (gender == true) {
            // Nouvelle attribution de valeur à la variable gender
            gender = \'Monsieur\';
        } else {
             // Nouvelle attribution de valeur à la variable gender
            gender = \'Madame\';
        }
// alert -> affiche un message à l\'utilisateur
        alert(\'Bonjour \' + gender + \' \' + lastName + \' \' + firstname + \'.\' + \'\n\' + \'Bienvenue sur notre site!\');
        ') ?>
                    </code>
                </pre>
                <button id="runFirstExo" class="waves-effect waves-light btn"><i class="material-icons right">play_arrow</i>RUN CODE</button>
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>