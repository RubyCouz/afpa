
<div class="container">
    <h1>Participation</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Analyse des besoins</div>
            <div class="collapsible-body">
                <p>
                    Nous avons besoin de savoir si l'utilisateur est marié ou non, le nombre d'enfant(s) à sa charge et
                    son salaire. Chacune de ces informations vont permettre d'établir une participation selon
                    certaines conditions. Cette participation ne pourra pas excéder les 50%.
                </p>
                <p>
                    Nous définirons 4 variables :
                </p>
                <ul>
                    <li>1 pour le statut marital du salarié</li>
                    <li>1 pour le nombre d'enfants à sa charge</li>
                    <li>1 pour le montant de son salaire</li>
                    <li>1 pour le montant de la participation patronale</li>
                </ul>
                <pre>
                    <code class="js">
var celib = window.confirm('Êtes-vous célibataire?');
var salary = parseFloat(window.prompt('Indiquez votre salaire :'));
var children = window.prompt('Combien avez-vous d\'enfant?');
var tot = 0;
                    </code>
                </pre>
                <p>
                    Nous utilisons ici un
                    <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/parseFloat" class="ui-link-muted" target="_blank">
                        <code>parseFloat()</code>
                    </a>
                    afin de convertir les données saisies par l'utilisateur au format décimal.
                    <a href="https://developer.mozilla.org/fr/docs/Web/API/Window/confirm" class="ui-link-muted" target="_blank">
                        <code>window.confirm()</code></a> est utilisé ici pour faciliter la réponse de
                    l'utilisateur, et son
                    traitement dans le programme en javascript. La fonction retourne <code>true</code> au clic sur
                    "ok" et <code>false</code> au click sur "annuler".
                </p>

                <p>Nous utiliserons la condition
                    <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Instructions/switch" title="Lien vers la définition MDN" class="uk-link-muted" target="_blank">
                        <code>switch</code>
                    </a>
                    , afin de simplifier l'écriture de la condition.
                </p>
                <p>
                    L'algorithme :
                </p>
                <ul>
                    <li>On se base sur la condition du status marital</li>
                    <li>On etudie le cas où le salarié est marié</li>
                    <ul>
                        <li>Il aura donc une participation de 25%</li>
                        <li>Il aura une participation de 10% par enfant</li>
                        <li><b>Si</b> son salaire est supérieur à 1200€, alors il aura un majoration de 10%</li>
                        <li><b>Si</b> la participation totale est supérieure à 50%, alors elle sera de 50%
                            maximum</li>
                    </ul>
                    <li>On étudie le cas où le salarié est célibataire</li>
                    <ul>
                        <li>Il aura donc une participation de 20%</li>
                        <li>Il aura une participation de 10% par enfant</li>
                        <li><b>Si</b> son salaire est supérieur à 1200€, alors il aura un majoration de 10%</li>
                        <li><b>Si</b> la participation totale est supérieure à 50%, alors elle sera de 50%
                            maximum</li>
                    </ul>
                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Vérification des données saisies par l'utilisateur</div>
            <div class="collapsible-body">
                <p>
                    Comme vu précédemment, les données saisies par l'utilisateur sont controllées. Nous attendons
                    des valeurs numériques, nous utiliserons la fonction <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/isNaN" target="_blank" class="ui-link-muted">
                        <code>isNaN()</code>
                    </a> et afficherons un message d'erreur en cas de mauvaises saisies:
                </p>
                <pre>
                       <code class="js">
if (isNaN(salary)) {
    alert('Veuillez saisir un nombre valide svp!'); // information de l'erreur
}
if (isNaN(children)) {
    alert('Veuillez saisir un nombre valide svp!'); // information de l'erreur
}
                       </code>
                </pre>
                <p>
                    Il ne sera pas nécessaire de vérifier pour le status marital,
                    <a href="https://developer.mozilla.org/fr/docs/Web/API/Window/confirm" class="ui-link-muted" target="_blank">
                        <code>window.confirm()</code></a> retournant systématiquement <code>true</code> ou
                    <code>false</code> selon le choix de l'utilisateur.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Mise en place de la condition</div>
            <div class="collapsible-body">
                <p>
                    On sélectionne l'expression à comparer :
                </p>
                <pre>
                        <code class="js">
switch (celib) { 
                        </code>
                </pre>
                <p>
                    Puis nous la comparons avec les valeurs attendues :
                </p>
                <ul>
                    <li>Dans le cas où <code>true </code>est retourné : (le salarié est marié)</li>
                </ul>
                <pre>
                    <code class="js">
case true:
tot = tot + 25; // tot += 25;
tot = (tot + (children * 10));
// condition vérifiant le salaire
if (salary < 1200) {
    tot = tot + 10;
}
// si la participation est supérieur à 50, on la plafonne à 50 
if (tot > 50) {
    tot = 50;
}
break;
                    </code>
                </pre>
                <p>
                    Le salarié a donc une participation de base de 25%. Nous lui ajoutons ensuite 10%
                    supplémentaires par enfant à sa charge:
                </p>
                <pre>
                        <code class="js">
tot = (tot + (children * 10));
                        </code>
                </pre>
                <p>
                    Nous vérifions son salaire, s'il est inférieur à 1200€, il recevra 10% supplémentaire :
                </p>
                <pre>
                    <code class="js">
if (salary < 1200) {
    tot = tot + 10;
}
                    </code>
                </pre>
                <p>
                    Et enfin nous contrôlons la participation finale, si elle est supérieure à 50%, alors elle sera
                    de 50% maximum :
                </p>
                <pre>
                    <code class="js">
// si la participation est supérieur à 50, on la plafonne à 50 
if (tot > 50) {
    tot = 50;
}
                    </code>
                </pre>
                <p>
                    L'instruction <code>break;</code> permet d'informer que si la condition est vérifiée, il ne sera
                    as nécessaire de poursuivre le reste du <code>switch</code>.
                </p>
                <p>
                    Il ne reste plus qu'à faire de même pour la cas où le salarié est célibataire et donc changer la
                    participation à 20% au lieu de 25%:
                </p>
                <pre>
                    <code class="js">
case false:
tot = tot + 20; // tot += 20;
tot = (tot + (children * 10));
// condition vérifiant le salaire
if (salary < 1200) {
    tot = tot + 10;
}
// si la participation est supérieur à 50, on la plafonne à 50 
if (tot > 50) {
    tot = 50;
}
break;
                    </code>
                </pre>
                <p>
                    Enfin nous affichons la participation totale dont le salarié pour prétendre :
                </p>
                <pre>
                    <code class="js">
alert('La participation patronnale sera de ' + tot + '%');
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Résultat final</div>
            <div class="collapsible-body">
                <p>
                    Nous obtenons donc :
                </p>
                <pre>
                    <code class="js">
var celib = window.confirm('Êtes-vous célibataire?');
var salary = parseFloat(window.prompt('Indiquez votre salaire :'));
if (isNaN(salary)) {
    alert('Veuillez saisir un nombre valide svp!'); // information de l'erreur
}
var children = window.prompt('Combien avez-vous d\'enfant?');
if (isNaN(children)) {
    alert('Veuillez saisir un nombre valide svp!'); // information de l'erreur
}
var tot = 0;
switch (celib) {
    // si le salarié est marié 
    case true:
    tot = tot + 25; // tot += 25;
    tot = (tot + (children * 10));
    // condition vérifiant le salaire
    if (salary < 1200) {
        tot = tot + 10;
    }
    // si la participation est supérieur à 50, on la plafonne à 50 
    if (tot > 50) {
        tot = 50;
    }
    break;
    // si le salarié est célibataire
    case false:
    tot = tot + 20; // tot += 20;
    tot = (tot + (children * 10));
    // condition vérifiant le salaire
    if (salary < 1200) {
        tot = tot + 10;
    }
    // si la participation est supérieur à 50, on la plafonne à 50 
    if (tot > 50) {
        tot = 50;
    }
    break;
}
// affichage de la participation
alert('La participation patronnale sera de ' + tot + '%');
                    </code>
                </pre>
                <button class="waves-effect waves-light btn" id="runParticipationExo"><i class="material-icons right">play_arrow</i>Run code</button>

                <p>
                    Il était bien entendu possible d'utiliser la condition <code>if..else</code>, mais le code aurait été un peu plus long. Aussi, il existe d'autres façons de raisonner et d'écrire le programme, celle-ci étant l'une d'entre elles.
                </p>
            </div>
        </li>
    </ul>
</div>