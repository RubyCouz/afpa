    $('document').ready(function () {
    $('#runFirstExo').click(function () {
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
    $('#runSecondExo').click(function () {
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
    $('#runThirdExo').click(function () {
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
    $('#runFourthExo').click(function () {
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
            N = parseInt(window.prompt('Saisissez un premier nombre :'));
        }
        var total = 0;
        // début de la boucle
        for (i = 0; i <= N; i++) {
            // calcul, et assignation du resultat à la variable total
            total = i * X;
            // affichage
            /**
             * 1er solution d'affichage
             */
            console.log(X + ' x ' + i + ' = ' + total);
        }
    });
    $('#runFifthExo').click(function () {
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
            N = parseInt(window.prompt('Saisissez un premier nombre :'));
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
    $('#runSixthExo').click(function () {
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
    $('#runSeventhExo').click(function () {
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
    $('#runEigthExo').click(function () {
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
});


