
// déclaration de variable qui serviront à la récupération de la valeur des champs de saisie
var compagny = document.getElementById('compagny');
var contact = document.getElementById('contact');
var address = document.getElementById('address');
var postalCode = document.getElementById('postalCode');
var city = document.getElementById('city');
var mail = document.getElementById('mail');
var phone = document.getElementById('phone');
var submit = document.getElementById('submit');
var textEnvironment = document.getElementById('textEnvironment');
// pour récupérer la valeur de la liste déroulante
var environment = document.getElementById('environment');

// définition du ciblage pour l'affichage du message d'erreur
var missCompagny = document.getElementById('missCompagny');
var missContact = document.getElementById('missContact');
var missAddress = document.getElementById('missAddress');
var missPostalCode = document.getElementById('missPostalCode');
var missCity = document.getElementById('missCity');
var missMail = document.getElementById('missMail');
var missPhone = document.getElementById('missPhone');
var missTextEnvironment = document.getElementById('missTextEnvironment');
// définition des conditons de validation des champs de saisie
var textValid = /^[a-zA-Z\-\déèàçùëüïôäâêûîô#&]+$/;
var postalCodeValid = /^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/;
var mailValid = /[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}/;
var phoneValid = /^0[1-9]([-. ]?[0-9]{2}){4}$/;
// check de l'évènement sur le bouton 'valider'
// submit.addEventListener('click', checkForm);
// quand il y perte de focus sur un champ
compagny.onblur = compagnyCheck;
contact.onblur = contactCheck;
address.onblur = addressCheck;
city.onblur = cityCheck;
postalCode.onblur = postalCodeCheck;
textEnvironment.onblur = textEnvironmentCheck;
mail.onblur = mailCheck;
phone.onblur = phoneCheck;
environment.onchange = getSelect;

// déclaration des fonctions vérifiant les champs de saisie du formulaire
// vérification du champ société
function compagnyCheck() {
    // si le champ est vide
    if (compagny.validity.valueMissing) {
        event.preventDefault()
        missCompagny.textContent = 'Champ non renseigné';
        missCompagny.style.color = 'red';
        // test de la validité du champs de saisie
    } else if (textValid.test(compagny.value) == false) {
        event.preventDefault();
        missCompagny.textContent = 'Format incorrect';
        missCompagny.style.color = 'red';
        // si la saisie est correct
    } else {
        
        missCompagny.textContent = 'Ok';
        missCompagny.style.color = 'green';
    }
};
// vérification du champ contact
function contactCheck() {
    if (contact.validity.valueMissing) {
        event.preventDefault()
        missContact.textContent = 'Champ non renseigné';
        missContact.style.color = 'red';
    } else if (textValid.test(contact.value) == false) {
        event.preventDefault();
        missContact.textContent = 'Format incorrect';
        missContact.style.color = 'red';
    } else {
        missContact.textContent = 'Ok';
        missContact.style.color = 'green';
    }
};
//vérification du champ adresse
function addressCheck() {
    if (address.validity.valueMissing) {
        event.preventDefault()
        missAddress.textContent = 'Champ non renseigné';
        missAddress.style.color = 'red';
    } else if (textValid.test(address.value) == false) {
        event.preventDefault();
        missAddress.textContent = 'Format incorrect';
        missAddress.style.color = 'red';
    } else {
        missAddress.textContent = 'Ok';
        missAddress.style.color = 'green';
    }
};
// vérification du champ code postal
function postalCodeCheck() {
    if (postalCode.validity.valueMissing) {
        event.preventDefault()
        missPostalCode.textContent = 'Champ non renseigné';
        missPostalCode.style.color = 'red';
    } else if (postalCodeValid.test(postalCode.value) == false) {
        event.preventDefault();
        missPostalCode.textContent = 'Format incorrect';
        missPostalCode.style.color = 'red';
    } else {
        missPostalCode.textContent = 'Ok';
        missPostalCode.style.color = 'green';
    }
};
// vérification du champ ville
function cityCheck() {
    if (city.validity.valueMissing) {
        event.preventDefault()
        missCity.textContent = 'Champ non renseigné';
        missCity.style.color = 'red';
    } else if (textValid.test(city.value) == false) {
        event.preventDefault();
        missCity.textContent = 'Format incorrect';
        missCity.style.color = 'red';
    } else {
        missCity.textContent = 'Ok';
        missCity.style.color = 'green';
    }
};
// vérification du champ email
function mailCheck() {
    if (mail.validity.valueMissing) {
        event.preventDefault()
        missMail.textContent = 'Champ non renseigné';
        missMail.style.color = 'red';
    } else if (mailValid.test(mail.value) == false) {
        event.preventDefault();
        missMail.textContent = 'Format incorrect';
        missMail.style.color = 'red';
    } else {
        missMail.textContent = 'Ok';
        missMail.style.color = 'green';
    }
};
// vérification du champ téléphone
function phoneCheck() {
    if (phone.validity.valueMissing) {
        event.preventDefault()
        missPhone.textContent = 'Champ non renseigné';
        missPhone.style.color = 'red';
    } else if (phoneValid.test(phone.value) == false) {
        event.preventDefault();
        missPhone.textContent = 'Format incorrect';
        missPhone.style.color = 'red';
    } else {
        missPhone.textContent = 'Ok';
        missPhone.style.color = 'green';
    }
};
//vérification du champ environnement
function textEnvironmentCheck() {
    if (textEnvironment.validity.valueMissing) {
        event.preventDefault()
        missTextEnvironment.textContent = 'Champ non renseigné';
        missTextEnvironment.style.color = 'red';
    } else if (textValid.test(environment.value) == false) {
        event.preventDefault();
        missTextEnvironment.textContent = 'Format incorrect';
        missTextEnvironment.style.color = 'red';
    } else {
        missTextEnvironment.textContent = 'Ok';
        missTextEnvironment.style.color = 'green';
    }
};
function getSelect() {
    // récupération de l'index de l'option choisi dans la liste déroulante
var choice = environment.selectedIndex;
var value = environment.options[choice].text;
textEnvironment.append(value + ', ');
};
