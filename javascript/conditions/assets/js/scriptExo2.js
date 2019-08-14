/**
 * déclarer les variables dont on aura besoin
 */
// demande la saisie de l'année de naissance de l'utilisateur
var year = parseInt(window.prompt('Veuillez saisir votre année de naissance :'));
// on récupère l'année courante:
// création de l'objet date -> récupère la date courrante 
var date = new Date();
// on utilise la methode getFullYear() afin d'extraire l'année de la date courante
var currentYear = date.getFullYear();
// calcul de l'âge de l'utilisateur
var age = currentYear - year;
// condition determinant si l'utilisateur est  majeur ou mineur
if (age >= 18) {
    alert('Vous avez ' + age + ' ans.');
    alert('Vous êtes donc majeur.');
} else {
    alert('Vous avez ' + age + ' ans, vous êtes donc mineur');
}

/**
 * condition ternaire 
 */
age >= 18 ? alert('majeur') : alert('mineur');