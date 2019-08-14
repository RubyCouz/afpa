$(document).ready(function () {
    $('#runFirstExo').click(function () {
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
    $('#runFirstExoBis').click(function () {
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
    $('#runSecondExo').click(function () {
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
    $('#runThirdExo').click(function () {
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
    $('#runThirdExoBis').click(function () {
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
    $('#runFourthExo').click(function () {
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
});