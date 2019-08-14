
<div class="container">
    <h1>Nombre de voyelles</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Besoin</div>
            <div class="collapsible-body">
                <p>
                    Nous voulons savoir combien de voyelles contient un mot. Pour cela nous allons créer un
                    programme qui va parcourir et identifier chaque lettre de notre mot pour savoir si c'est une
                    voyelle. Si c'est une voyelle, nous incrémenterons une variable qui nous servira de compteur.
                    Nous aurons besoin de 3 variables:
                </p>
                <ul>
                    <li>Une dans laquelle sera stockée la saisie du mot</li>
                    <li>Une variable dans laquelle nous stockerons le nombre de caractères (la taille) du mot</li>
                    <li>Et une varialbe qui nous servira de compteur</li>
                </ul>
                <pre>
                    <code class="js">
var word = window.prompt('Saisir un mot :').toLowerCase();
var wordLength = word.length;
var count = 0;
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Vérification des données saisies par l'utilisateur</div>
            <div class="collapsible-body">
                <p>
                    Nous devons établir une vérification de la saisie, en vérifiant que la saisie est bien un nombre
                    à l' aide de la fonction <code>isNaN()</code>. Si <code>word</code> n'est pas une chaine de caractères, alors on affichera un
                    message d'erreur.
                </p>
                <pre>
                    <code class="js">
// on vérifie la saisie de l'utilisateur
 // tant que la saisie n'est pas un nombre
 while (!isNaN(word)) {
     // on renouvèle la saisie
     word = parseInt(window.prompt('Saisissez un mot :'));
 }
                    </code>
                </pre>
                <p>L'utilisation de <code>while(!isNaN()...</code> revient à dire que "tant que la saisie est un
                    nombre ..."</p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Construction de la boucle</div>
            <div class="collapsible-body">
                <p>
                    Pour parcourir toutes les lettres de notre mot, nous utiliserons une boucle <code>for()</code>
                </p>
                <pre>
                    <code class="js">
 for (i = 0; i <= wordLength; i++) {
instruction
 }
                    </code>
                </pre>
                <p>
                    Nous créons ensuite une condition comparant les différentes lettres du mot avec chaque voyelle.
                    Plutôt que d'utiliser un <code>if...else</code> qui sera assez lourd au vue du nombre de
                    comparaisons que nous avons à faire, nous allons utiliser un <code>swith()</code> :
                </p>
                <pre>
                    <code class="js">
switch (word[i]) {
    case 'a':
    case 'e':
    case 'i':
    case 'o':
    case 'u':
    case 'y':
        // incrémentation de notre compte
        count++;
        break;
    default: ' ';
}
                    </code>
                </pre>
                <p>
                    Nous vérifions le cas de chaque voyelle : si la comparaison est correct, nous incrémentons nour
                    variable <code>count</code>, sinon nous ne faisons rien.
                </p>
                <p>
                    En implémentant notre conditions dans notre boucle nous obtenons :
                </p>
                <pre>
                    <code class="js">
// début de la boucle qui parcourir le mot
for (i = 0; i < wordLength; i++) {
    // utilisation d'un switch pour vérifier le cas de chaque voyelle
    switch (word[i]) {
        case 'a':
        case 'e':
        case 'i':
        case 'o':
        case 'u':
        case 'y':
            // incrémentation de notre compte
            count++;
            break;
        default: ' ';
    }
}  
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat final</div>
            <div class="collapsible-body">
                <p>
                    Nous obtenons finalement :
                </p>
                <pre>
                    <code class="js">
// définition des variables
var word = window.prompt('Saisir un mot :').toLowerCase();
// on vérifie la saisie de l'utilisateur
// tant que la saisie n'est pas un nombre
while (!isNaN(word)) {
    // on renouvèle la saisie
    word = parseInt(window.prompt('Saisissez un mot :'));
}
    var wordLength = word.length;
    var count = 0;
    // début de la boucle qui parcourir le mot
    for (i = 0; i < wordLength; i++) {
        // utilisation d'un switch pour vérifier le cas de chaque voyelle
        switch (word[i]) {
            case 'a':
            case 'e':
            case 'i':
            case 'o':
            case 'u':
            case 'y':
                // incrémentation de notre compte
                count++;
                break;
            default: ' ';
        }
    }
    // affichage
    console.log('nombre de voyelle dans ' + word + ' : ' + count);
                     </code>
                </pre>
                <button class="waves-effect waves-light btn" id="runVoyelleExo"><i class="material-icons right">play_arrow</i>Run code</button>
            </div>
        </li>
    </ul>
</div>