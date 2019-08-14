// var array = new Array(5); // 1ere méthode
// var array2 = ['fdgsdf', 'fgds']; // 2eme méthode
// console.log('taille du tableau : ' + array.length);
// console.log('contenu du tableau : ' + array);
// array.splice(0, 5, 'fdsfoksdpof'); // .splice(index de départ, nombre de colonne à supprimer, valeur à ajouter)
// var pushContent = array.push('ear', 'gzret', 'rtzetrz');
// console.log('contenu du tableau : ' + array);
// array.splice(1, 1, 'fzgfer');
// console.log(array);
// array[0] = '564'; // changement de valeur d'un index
// array[5] = '544654'; // ajout de valeur dans le tableau
// array.push('fdghsdf', 'fdspl');
// console.log(array);
// var size = parseInt(array.length);
// // parcourrir un tableau 1ere methode
// for (i = 0; i < size; i++) {
//     console.log('index ' + i + ' : ' + array[i]);
// }
// // parcourir un tableau 2eme methode
// for (var index in array) {
//     console.log('index ' + index + ' : ' + array[index]);
// }
// // tri croissant
// console.log('tri croissant :');
// array.sort();
// for (i = 0; i < size; i++) {
//     console.log('index ' + i + ' : ' + array[i]);
// }
// // tri décroissant
// console.log('tri décroissant :');
// array.sort();
// array.reverse();
// for (i = 0; i < size; i++) {
//     console.log('index ' + i + ' : ' + array[i]);
// }

$(document).ready(function () {

    $('#runFirstExo').click(function () {
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
    $('#runSecondExo').click(function () {
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
    $('#runThirdExo').click(function () {

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
        alert('tableau avant tri : ' + array.join(', '));
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
        alert('tableau après tri : ' + array.join(', '))
    })
});