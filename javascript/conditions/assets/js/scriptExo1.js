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


 /**
  * autres façons, sans stocker le diviseur dans une variable
  * 

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
 */
