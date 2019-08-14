// var salary = parseInt(window.prompt('Indiquez votre salaire :'));
// var married = window.confirm('Êtes-vous marrié(e)?');
// var children = window.prompt('Combien avez-vous d\'enfant?');
// var marriedPart = 0;
// var childrenPart = children * 10;
// var salaryPart = 0;
// /**
//  * méthode if
//  */

// if (married == true) {
//     marriedPart = 25;
// } else {
//     marriedPart = 20;
// }

// var bossPart = salaryPart + childrenPart + marriedPart;
// if (salary < 1200) {
//     var bossPartTot = bossPart + 10;
//     if (bossPartTot > 50) {
//         bossPartTot = 50;
//     }
//     alert('Participation : ' + bossPartTot + '%');
// } else {
//     bossPartTot = bossPart;
//     if (bossPartTot > 50) {
//         bossPartTot = 50;
//     }
//     alert('Participation : ' + bossPartTot + '%');
// }

/**
 * version switch
 */
// déclaration des variables
var celib = '';
var salary = parseInt(window.prompt('Indiquez votre salaire :'));
var children = window.prompt('Combien avez-vous d\'enfant?');
var tot = 0;
// boucle permettant de controller la bonne saisie du status marital 
do {
    celib = window.prompt('Êtes-vous célibataire? (O/N)');
} while (celib.toLowerCase() != 'o' && celib.toLowerCase() != 'n');

// début de la condition vérifiant le status marital
switch (celib.toLowerCase()) {
    // si l'utilisateur répond oui (o)
    case 'o':
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
    // si l'utilisateur répond non (n)
    case 'n':
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
}
alert('La participation patronnale sera de ' + tot + '%');
