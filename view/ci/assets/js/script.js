$(document).ready(function () {
    /**
     * Afficher texte
     */
    $('#runFirstExo').click(function () {
        // déclaration des variables 
        var lastName = window.prompt('Entrez votre nom :'); // prompt (ou window.prompt) demande une saisie à l'utilisateur
        var firstname = window.prompt('Entrez votre prénom :'); // prompt (ou window.prompt) demande une saisie à l'utilisateur
        var gender = window.confirm('Êtes-vous un homme?'); // confirm => demande une confirmation à l'utilisateur
        // début de la condition
        if (gender == true) {
            // Nouvelle attribution de valeur à la variable gender
            gender = 'Monsieur';
        } else {
            // Nouvelle attribution de valeur à la variable gender
            gender = 'Madame';
        }
        // alert -> affiche un message à l'utilisateur
        window.alert('Bonjour ' + gender + ' ' + lastName + ' ' + firstname + '.' + '\n' + 'Bienvenue sur notre site!');
    });
    /**
     * Pair ou impair
     */
    $('#runPairExo').click(function () {
        // déclaration des variables utiles
        var divisor = 2;
        var number = parseInt(window.prompt('Saisissez un nombre :'));
        var result = number % divisor;
        // vérification de la saisie de l'utilisateur à l'aide de la fonction isNan (on controle que number est bien un nombre)
        if (isNaN(number)) {
            alert('Aucun nombre saisi!'); // information de l'erreur
            // sinon si le reste de la division de number par 2 est égale à 0
        } else if (result == 0) {
            alert('Le nombre saisi est pair.');
            // sinon ...
        } else {
            alert('Le nombre saisi est impair.');
        }
    });
    $('#runPairExoBis').click(function () {
        var number = parseInt(window.prompt('Saisissez un nombre :'));
        var result = number % 2;
        // vérification de la saisie de l'utilisateur à l'aide de la fonction isNan (on controle que number est bien un nombre)
        if (isNaN(number)) {
            alert('Aucun nombre saisi!'); // information de l'erreur
            // sinon si le reste de la division de number par 2 est égale à 0
        } else if (result == 0) {
            alert('Le nombre saisi est pair.');
            // sinon ...
        } else {
            alert('Le nombre saisi est impair.');
        }
    });
    /**
     * Age
     */
    $('#runAgeExo').click(function () {
        /**
         * déclarer les variables dont on aura besoin
         */
        // demande la saisie de l'année de naissance de l'utilisateur
        var birthYear = parseInt(window.prompt('Veuillez saisir votre année de naissance :'));
        // on récupère l'année courante:
        // création de l'objet date -> récupère la date courrante 
        var date = new Date();
        // on utilise la methode getFullYear() afin d'extraire l'année de la date courante
        var currentYear = date.getFullYear();
        // calcul de l'âge de l'utilisateur
        var age = currentYear - birthYear;
        // vérification de la saisie de l'utilisateur à l'aide de la fonction isNan (on contrque number est bien un nombre)
        if (isNaN(birthYear)) {
            alert('Veuillez saisir une année valide svp!'); // information de l'erreur
        } else {
            // condition determinant si l'utilisateur est  majeur ou mineur
            if (age >= 18) {
                alert('Vous avez ' + age + ' ans.');
                alert('Vous êtes donc majeur.');
            } else {
                alert('Vous avez ' + age + ' ans, vous êtes donc mineur');
            }
        }

    });
    $('#runCalculExo').click(function () {
        // déclaration des variables
        var firstNumber = parseFloat(window.prompt('Saisisez un nombre'));
        var operator = window.prompt('Saisisez un opérateur');
        var secondNumber = parseFloat(window.prompt('Saisisez un nombre'));
        // conditions vérifant la validité du premier nombre
        if (isNaN(firstNumber)) {
            alert('Veuillez saisir un nombre valide svp!'); // information de l'erreur
        }
        // conditions vérifant la validité du second nombre
        if (isNaN(secondNumber)) {
            alert('Veuillez saisir un nombre valide svp!'); // information de l'erreur
        }
        // début des conditions vérifiant les opérateurs
        if (operator == '+') {
            alert(firstNumber + secondNumber);
        } else if (operator == '-') {
            alert(firstNumber - secondNumber);
        } else if (operator == '*') {
            alert(firstNumber * secondNumber);
        } else if (operator == '/') {
            // on vérifie que le second nombre n'est pas égale à 0
            if (secondNumber == 0) {
                alert('Impossible d\'effectuer une division par 0');
            } else {
                alert(firstNumber / secondNumber);
            }
        } else {
            /* en cas d'opérateur non valide */
            alert('Opérateur incorrect!!');
        }
    });
    $('#runCalculExoBis').click(function () {
        // décalration des variables utiles

        var firstNumber = parseFloat(window.prompt('Saisisez un nombre'));
        if (isNaN(firstNumber)) {
            alert('Veuillez saisir un nombre valide svp!'); // information de l'erreur
        }
        var operator = window.prompt('Saisisez un opérateur');
        var secondNumber = parseFloat(window.prompt('Saisisez un nombre'));
        if (isNaN(secondNumber)) {
            alert('Veuillez saisir un nombre valide svp!'); // information de l'erreur
        }
        // condition vérifiant le signe opératoire
        // conditions vérifant la validité du second nombre
        switch (operator) {
            // cas ou le signe opératoire est -
            case '-':
                alert(firstNumber + '-' + secondNumber + ' = ' + (firstNumber - secondNumber));
                break;
            // cas ou le signe opératoire est +
            case '+':
                alert(firstNumber + '+' + secondNumber + ' = ' + (firstNumber + secondNumber));
                break;
            // cas ou le signe opératoire est *
            case '*':
                alert(firstNumber + '*' + secondNumber + ' = ' + (firstNumber * secondNumber));
                break;
            // cas ou le signe opératoire est /
            case '/':
                // on vérifie le second nombre pour éviter la division par 0
                if (secondNumber == 0) {
                    alert('division par 0 impossible');
                } else {
                    alert(firstNumber + '/' + secondNumber + ' = ' + (firstNumber / secondNumber));
                }
                break;
            // sinon par défaut :
            default:
                alert('Veuillez saisir un opérateur valide !!!!');
        }

    });
    $('#runParticipationExo').click(function () {
        var celib = window.confirm('Êtes-vous célibataire?');
        var salary = parseFloat(window.prompt('Indiquez votre salaire :'));
        if (isNaN(salary)) {
            alert('Veuillez saisir un nombre valide svp!'); // information de l'erreur
        }
        var children = window.prompt('Combien avez-vous d\'enfant?');
        if (isNaN(children)) {
            alert('Veuillez saisir un nombre valide svp!'); // information de l'erreur
        }
        console.log(celib);
        console.log(salary);
        console.log(children);
        var tot = 0;
        switch (celib) {
            case false:
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
                console.log(tot);
                break;
            case true:
                tot = tot + 20; // tot += 25;
                tot = (tot + (children * 10));
                // condition vérifiant le salaire
                if (salary < 1200) {
                    tot = tot + 10;
                }
                // si la participation est supérieur à 50, on la plafonne à 50 
                if (tot > 50) {
                    tot = 50;
                }
                console.log(tot);
                break;
        }
        alert('La participation patronnale sera de ' + tot + '%');
    });
    $('#runSaisieExo').click(function () {
        // déclration des variables
        var firstname = '';
        var count = 1;
        do {
            // on demande à l'utilisateur de saisir un prénom
            firstname = window.prompt('Saisissez le prénom N° ' + count + '\n ou click sur Annuler pour arréter la saisie.');
            // on vérifie la saisie, si le prénom n'est pas null ou absent
            if (firstname !== null && firstname !== '') {
                // on affiche le prénom ainsi que son numéro
                console.log('Prénom N° ' + count + ': ' + firstname);
                // on incrémente la variable count
                count++;
            }
            // tant que firstname est différent de null et n'est pas une chaine de caratères vide 
        } while (firstname !== null && firstname !== '');
    });
    $('#runIntegerExo').click(function () {
        // déclaration des variables
        var number;
        var i = 0;
        // on vérifie la saisie de l'utilisateur
        // tant que la saisie n'est pas un nombre
        while (isNaN(number)) {
            // on renouvèle la saisie
            number = parseInt(window.prompt('Saisissez un nombre :'));
        }
        /**
         * 1ere methode
         */

        // début de la boucle for affichant les entiers inférieurs à number
        for (i = 0; i < number; i++) {
            console.log(i);
        }
    });
    $('#runSumExo').click(function () {
        // déclaration des variables
        var n1 = parseInt(window.prompt('Saisissez un premier nombre :'));
        var sum = 0;
        // on vérifie la saisie de l'utilisateur
        // tant que la saisie n'est pas un nombre
        if (isNaN(n1)) {
            // on renouvèle la saisie
            while (isNaN(n1)) {
                // on renouvèle la saisie
                n1 = parseInt(window.prompt('Saisissez un premier nombre :'));
            }
        }
        var n2 = parseInt(window.prompt('Saisissez un second nombre :'));
        if (isNaN(n2)) {
            // on renouvèle la saisie
            while (isNaN(n2)) {
                // on renouvèle la saisie
                n2 = parseInt(window.prompt('Saisissez un second nombre :'));
            }

        }
        var sum = 0;
        // conditions vérifiant les valeurs saisies 
        // si n2 (2eme saisie) est supérieur n1 (première saisie)
        if (n2 > n1) {
            // boucle permettant de parcourir les valeurs entre n1 et n2
            for (i = n1; i <= n2; i++) {
                //ajout de la valeur i à sum
                sum += i;
            }
            // si n2 (2eme saisie) est inférieur n1 (première saisie)
        } else {
            // boucle permettant de parcourir les valeurs entre n2 et n1
            for (i = n2; i <= n1; i++) {
                //ajout de la valeur i à sum
                sum += i;
            }
        }
        console.log(sum);
    });
    $('#runAverageExo').click(function () {
        var number = parseInt(window.prompt('Saisir un entier :'));
        var total = 0;
        var average = 0;
        var i = 0;
        // on vérifie la saisie de l'utilisateur
        // tant que la saisie n'est pas un nombre
        while (isNaN(number)) {
            // on renouvèle la saisie
            number = parseInt(window.prompt('Saisissez un premier nombre :'));
        }
        while (number != 0) {
            total += number;
            i++
            average = total / i
            console.log('somme : ' + total);
            console.log('moyenne : ' + average);
            number = parseInt(window.prompt('Saisir un entier :'))
        }
    });
    $('#runMultipleExo').click(function () {
        // définition des variables
        var X = parseInt(window.prompt('Saisissez un entier :'));
        while (isNaN(X)) {
            // on renouvèle la saisie
            X = parseInt(window.prompt('Saisissez un premier nombre :'));
        }
        var N = parseInt(window.prompt('Saisissez le nombre de multiple :'));
        // on vérifie la saisie de l'utilisateur
        // tant que la saisie n'est pas un nombre
        while (isNaN(N)) {
            // on renouvèle la saisie
            N = parseInt(window.prompt('Saisissez un multiiple valide :'));
        }
        var total = 0;
        // début de la boucle
        for (i = 0; i <= N; i++) {
            // calcul, et assignation du resultat à la variable total
            total = i * X;
            // affichage
            console.log(X + ' x ' + i + ' = ' + total);

        }
    });
    $('#runVoyelleExo').click(function () {
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

    });
    $('#runPrimaryExo').click(function () {
        // déclaration des variables
        var n = 2;
        var number = parseInt(window.prompt('Saisir un nombre :'));
        // on vérifie la saisie de l'utilisateur
        // tant que la saisie n'est pas un nombre
        while (isNaN(number)) {
            // on renouvèle la saisie
            number = parseInt(window.prompt('Saisissez un premier nombre :'));
        }
        var divide = 0;
        var bool = true;
        // boucle parcourant les entiers entre n et racine carré du nombre saisi
        while (n <= Math.sqrt(number)) {
            // on divise notre nombre par n
            divide = number / n;
            console.log('resultat: ' + divide);
            // si le resultat est différent de 0 et que le reste est égale à 0
            if ((divide != 0) && (number % n == 0)) {
                // on definit la variable bool à false
                bool = false;
                // et arrêt de la boucle
                break;
            }
            // incrémentation de n
            n++;
        }
        // si le resultat est différent de 0 et que le reste est égale à 0
        if (bool == false) {
            // information
            alert('Ce nombre n\'est pas premier');
        } else {
            // information
            alert('Ce nombre est premier');
        }
    });
    $('#runMagicExo').click(function () {
        // définition des variables utiles pour l'exécution du code
        var magic = 0;
        var userNumber = 0;
        var question = true;
        var count = 0;
        // début de la boucle permettant de rejouer
        while (question == true) {
            //definition d'un nombre aléatoire
            magic = parseInt(Math.random() * 100);
            //début de la boucle comprenant les conditions de comparaison du nbre choisi avec l'utilisateur
            while (userNumber != magic) {
                //demande de saisie
                userNumber = window.prompt('Saisissez un nombre :');
                // on vérifie la saisie de l'utilisateur
                // tant que la saisie n'est pas un nombre
                while (isNaN(userNumber)) {
                    // on renouvèle la saisie
                    userNumber = parseInt(window.prompt('Saisissez un nombre :'));
                }
                // si les 2 nombres sont identiques
                if (userNumber == magic) {
                    // affichage d'un message, plus le nombre d'essais
                    alert('Félicitation!! Vous avez trouvé la bonne réponse : ' + magic + ' \nNombre de coup nécessaire : ' + (parseInt(count) + 1));
                }
                // si le nombre random est plus grand
                if (userNumber < magic) {
                    // on informe l'utilisateur du résultat
                    alert('Plus grand');
                    count++;
                }
                // si le nombre random est plus petit
                if (userNumber > magic) {
                    // on informe l'utilisateur du résultat
                    alert('Plus petit');
                    count++;
                }
            }
            // demande pour rejouer
            question = window.confirm('Voulez-vous rejouer?');
            // si l'utilisateur refuse
            if (question == false) {
                alert('Merci d\'avoir participer');
            }
        }
    });
    $('#runSortExo').click(function () {

        // fonction demandant à l'utilisateur la saisie d'un entier
        function getInteger() {
            integer = parseInt(window.prompt('Saisissez une taille de tableau :')); //définition de la taille du tableau
        }
        // fonction initialisant le tableau
        function initTab(integer) {
            // déclaration des variables
            array = new Array(integer); // création du tableau
            array.splice(0, integer);
        }
        // fonction permettant le remplissage du tableau
        function saisieTab(integer, array) {
            var content = '';
            var count = 0;
            //boucle permettant le remplissage du tableau
            for (count = 0; count < integer; count++) {
                content = parseInt(window.prompt('indiquer une valeur à entrer dans le tableau :'));
                var arrayPush = array.push(content);
            }
        }
        getInteger();
        initTab(integer);
        saisieTab(integer, array);
        alert('tableau avant tri : ' + array.join());
        var index1 = 0;
        var index2 = 0;
        var temp = 0;
        for (index1 = array.length; index1 >= 0; index1--) {
            for (index2 = array.length; index2 >= 0; index2--) {
                if (array[index2] < array[index1]) {
                    temp = array[index2];
                    array[index2] = array[index1];
                    array[index1] = temp;
                }
            }
        }
        alert('tableau après tri : ' + array.join());
    });
    $('#runCreateExo').click(function () {
        //taille du tableau renseigné par l'utilisateur
        var arrayLength = parseInt(window.prompt('Définissez la taille de votre tableau :'));
        // construciton du tableau selon la taille renseignéé
        var array = new Array(arrayLength);
        // variable stockant le contenu donné par l'utilisateur
        var content = '';
        //on "vide" le tableau
        array.splice(0, arrayLength);
        // boucle permettant l'insertion de contenu dans le tableau
        for (i = 0; i < arrayLength; i++) {
            content = window.prompt('Indiquer une valeur à entrer dans le tableau :');
            array.push(content);
        }
        // affichage du tableau
        alert('votre tableau :' + array.join(', '));
    });
    $('#runArrayExo').click(function () {
        // fonction demandant à l'utilisateur la saisie d'un entier
        function getInteger() {
            integer = parseInt(window.prompt('Saisissez une taille de tableau :')); //définition de la taille du tableau
        }
        // fonction initialisant le tableau
        function initTab(integer) {
            // déclaration des variables
            array = new Array(integer); // création du tableau
            array.splice(0, integer);
        }
        // fonction permettant le remplissage du tableau
        function saisieTab(integer, array) {
            var content = '';
            var count = 0;
            //boucle permettant le remplissage du tableau
            for (count = 0; count < integer; count++) {
                content = window.prompt('indiquer une valeur à entrer dans le tableau :');
                var arrayPush = array.push(content);
            }
        }

        // fontion affichant le tableau
        function afficheTab(array) {
            //affichage du tableau
            alert(array.join(', '));
        }
        // fonction permettant la recherche de la valeur d'un index dans le tableau
        function rechercheTab(array) {
            var index = parseInt(window.prompt('Saisissez un index :'))
            var search = array[index];
            alert(search);
        }
        // fonction affichant la valeur maximale et la moyenne de l'ensemble des valeurs du tableau
        function infoTab(array) {
            var max = Math.max(...array);
            var sum = 0;
            for (i = 0; i < array.length; i++) {
                sum += parseInt(array[i]);
            }
            console.log(sum);
            var average = 0;
            average = parseInt(sum / array.length);
            alert('Moyenne des postes : ' + average);
            alert('Valeurs max : ' + max);
        }

        // appel des fonctions
        getInteger();
        initTab(integer);
        saisieTab(integer, array);
        var choice = parseInt(window.prompt('choisissez une option :\n 1-Afficher le contenu du tableau \n 2-Afficher un index choisi \n 3-Afficher le maximum et la moyenne des postes saisis'));
        while (choice == 1 || choice == 2 || choice == 3) {
            switch (choice) {
                case 1:
                    afficheTab(array);
                    break;
                case 2:
                    rechercheTab(array);
                    break;
                case 3:
                    infoTab(array);
                    break;
                default:
                    alert('Je n\'ai pas compris votre choix');
                    choice = parseInt(window.prompt('choisissez une option :\n 1-Afficher le contenu du tableau \n 2-Afficher un index choisi \n 3-Afficher le maximum et la moyenne des postes saisis'));
            }
            choice = parseInt(window.prompt('choisissez une option :\n 1-Afficher le contenu du tableau \n 2-Afficher un index choisi \n 3-Afficher le maximum et la moyenne des postes saisis'));
        }
    });

    $('#runEvent1').click(function () {
        // ciblage des élements 
        var text = document.getElementById('text');
        var submit = document.getElementById('runEvent1');
        // déclenchement de l'évènement
        submit.onclick = formCheck;
        // déclaration de la fonction qui faire l'action 

        function formCheck() {
            console.log(text.value);
            alert('Vous avez saisi ' + text.value);
        }
    });
    $('#generate').click(function () {
        label.textContent = '';
        count = 1;
        magic = parseInt(Math.random() * 100);
        console.log(magic);
        return magic;
    });
    $('#checkMagicNumber').click(function () {
        var generate = document.getElementById('generate');
        var userNumber = document.getElementById('number');
        var label = document.getElementById('label');
        var submit = document.getElementById('submit');
        // si le champs est vide
        if (userNumber.validity.valueMissing) {
            // on bloque l'nvoie du formulaire
            event.preventDefault();
            // affichage message d'erreur
            label.textContent = 'Veuillez saisir un nombre';
            label.style.color = 'red';
            // incrémentation du compte de coups
            count++;
        } else {
            // si le nombre saisi par l'utilisateur est égal au nombre magic
            if (parseInt(userNumber.value) == magic) {
                label.textContent = 'Bravo, vous avez trouvé le nombre magic ' + magic + ' en ' + count + ' coup(s)!!!';
                label.style.color = 'green';
                // si le nombre saisi par l'utilisateur est inférieur au nombre magic
            } else if (parseInt(userNumber.value) < magic) {
                label.textContent = 'Plus grand';
                label.style.color = 'red';
                count++;
                // si le nombre saisi par l'utilisateur est supérieur au nombre magic
            } else {
                label.textContent = 'Plus petit';
                label.style.color = 'red';
                count++;
            }
        }

    });
});