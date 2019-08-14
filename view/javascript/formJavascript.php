<?php
include '../header.php';
?>
<div class="container">
    <h1>Vérification d'un formulaire en Javascript</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Présentation du formulaire</div>
            <div class="collapsible-body">
                <p>
                    Nous devons faire la vérfication côté client du formulaire, c'est à dire afficher des message
                    d'erreurs en temps réel, afin d'avertir l'utilisateur lorsqu'il a fait une mauvaise saisie, ou
                    lorsqu'il a oublié de remplir un champs.
                </p>
                <p>
                    Voici notre formulaire :
                </p>
                <pre>
                        <code class="html">
                        <?= htmlspecialchars('
<form class="col s12" action="#" method="POST">
<div class="row">
  <div class="input-field col s6">
    <input id="compagny" type="text" class="validate" name="compagny" required>
    <label for="compagny">Société :</label>
    <span class="missCompagny" id="missCompagny"></span>
  </div>
  <div class="input-field col s6">
    <input id="contact" type="text" class="validate" name="contact" required>
    <label for="contact">Personne à contacter :</label>
    <span class="missContact" id="missContact"></span>
  </div>
</div>
<div class="row">
  <div class="input-field col s12">
    <textarea id="address" type="text" class="materialize-textarea validate" name="address" required></textarea>
    <label for="address">Adresse de l\'entreprise :</label>
    <span class="missAddress" id="missAddress"></span>
  </div>
</div>
<div class="row">
  <div class="input-field col s6">
    <input id="postalCode" type="text" class="validate" name="postalCode" required>
    <label for="postalCode">Code postal :</label>
    <span class="misspostalCode" id="missPostalCode"></span>
  </div>
  <div class="input-field col s6">
    <input id="city" type="text" class="validate" name="city" required>
    <label for="city">Ville :</label>
    <span class="missCity" id="missCity"></span>
  </div>
</div>
<div class="row">
  <div class="input-field col s12">
    <input id="mail" type="email" class="validate" name="mail" required>
    <label for="mail">Email :</label>
    <span class="missMail" id="missMail"></span>
  </div>
</div>
<div class="row">
  <div class="input-field col s12">
    <input id="phone" type="text" class="validate" name="phone" required>
    <label for="phone">Téléphone :</label>
    <span class="missPhone" id="missPhone"></span>
  </div>
</div>
<div class="row">
  <div class="input-field col s6">
    <select name="environment" id="environment" required>
      <option value="" disabled selected>Choississez</option>
      <option value="1">Access</option>
      <option value="2">Java</option>
      <option value="3">Delphi</option>
      <option value="4">Windev</option>
      <option value="5">Visual Basic</option>
      <option value="6">Power Builder</option>
      <option value="7">Internet</option>
      <option value="8">Intranet</option>
      <option value="9">Windows NT</option>
      <option value="10">Unix</option>
      <option value="11">SQL Server</option>
      <option value="12">Oracle</option>
      <option value="13">Autres...</option>
    </select>
    <label for="environment">Sélectionnez l\'environnement technique du projet :</label>
   
  </div>
  <div class="input-field col s6">
    <textarea id="textEnvironment" type="text" class="materialize-textarea validate"></textarea>
    <span class="missTextEnvironment" id="missTextEnvironment"></span>
  </div>
</div>
<div class="row">
  <div class="col s6 center-align">
    <input type="submit" id="submit" name="submit" value="Envoyer" class="btn waves-effect waves-light green darken-2">
  </div>
  <div class="col s6 center-align">
    <input type="reset" name="reset" value="Effacer" class="btn waves-effect waves-dark red darken-4">
  </div>
</div>
</form>                           
                            ') ?>
                        </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Ciblage des éléments à contrôler</div>
            <div class="collapsible-body">
                <p>
                    Pour cibler un <code>input</code> à contrôler, nous allons utiliser la méthode <a href="https://developer.mozilla.org/fr/docs/Web/API/Document/getElementById" title="Lien vers la définition MDN" target="_blank">
                        <code>getElementById()</code>
                    </a>. Elle va nous permettre de cibler un élement de notre page selon son id. Nous stockerons
                    cet élément dans une variable. Exemple pour le champs "Société" :
                </p>
                <pre>
                    <code class="js">
var compagny = document.getElementById('compagny');
                    </code>
                </pre>
                <p>
                    Nous répétons cette action autant de fois que nous avons d'élément à cibler :
                </p>
                <pre>
                    <code class="js">
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
                    </code>
                </pre>
                <p>
                    De la même façon nous allons cibler les éléments nous permettant d'afficher un message d'erreur
                    :
                </p>
                <pre>
                    <code>
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
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Définition des regexs</div>
            <div class="collapsible-body">
                <p>
                    Pour controller correctement un formulaire, nous devons vérifier
                    ce que l'utilsateur a pu saisir : il faut que les données entrées correspondent à un schéma que
                    nous définissons. De cette manière, les données saisies sont correct, et le formulaire est un
                    peu plus sécurisé.
                </p>
                <p>
                    Il est possible d'utilisé une seule regex pour plusieurs <code>input</code>.
                </p>
                <p>
                    Lorsque vous établissez une regex, il important de la tester. De nombreux sites sur la toile
                    propose ce service, notamment <a href="https://regex101.com/" title="Lien vers regex101"  target="_blank">Regex101</a>.
                </p>
                <p>
                    Les regexs utilisées ici :
                </p>
                <pre>
                    <code class="js">
// définition des conditons de validation des champs de saisie
var textValid = /^[a-zA-Z\-\déèàçùëüïôäâêûîô#&]+$/;
var postalCodeValid = /^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/;
var mailValid = /[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}/;
var phoneValid = /^0[1-9]([-. ]?[0-9]{2}){4}$/;
                    </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Définition des fonctions permettant les vérifications</div>
            <div class="collapsible-body">
                <p>
                    Nous commencerons par faire une vérification lors de la perte de focus d'un champs de saisie.
                    Pour cela nous devons faire une fonction qui se déclanchera lors de l'évènemment :
                </p>
                <pre>
                    <code class="js">
function compagnyCheck() {
    // si le champ est vide
    if (compagny.validity.valueMissing) {
        event.preventDefault()
        missCompagny.textContent = 'Champ non renseigné';
  
        compagny.className('uk-form-danger');
        // test de la validité du champs de saisie
    } else if (textValid.test(compagny.value) == false) {
        event.preventDefault();
        missCompagny.textContent = 'Format incorrect';
    
        // si la saisie est correct
    } else {
        
        missCompagny.textContent = 'Ok';
      
    }
};
                    </code>
                </pre>
                <p>
                    Nous commençons par vérifier si le champs est vide :
                </p>
                <pre>
                    <code class="js">
if (compagny.validity.valueMissing) {
    instruction
}
                    </code>
                </pre>
                <p>
                    Alors nous empéchons l'envoie du formulaire à l'aide de <a href="https://developer.mozilla.org/en-US/docs/Web/API/Event/preventDefault" title="Lien vers définition MDN"  target="_blank"><code>event.preventDefault()</code></a>, et nous affichons un message
                    d'erreur :
                </p>
                <pre>
                    <code class="js">
event.preventDefault()
missCompagny.textContent = 'Champ non renseigné';
missCompagny.style.color = 'red';
                    </code>
                </pre>
                <p>
                    Sinon si le champs est rempli, on test la valeur saisie avec la regex adaptée. Si la valeur ne
                    passe pas, on affiche un message d'erreur :
                </p>
                <pre>
                    <code class="js">
else if (textValid.test(compagny.value) == false) {
    event.preventDefault();
    missCompagny.textContent = 'Format incorrect';
    missCompagny.style.color = 'red';
    // si la saisie est correct
}
                    </code>
                </pre>
                <p>
                    Sinon si tout va bien, on peut afficher un message de confirmation :
                </p>
                <pre>
                    <code class="js">
missCompagny.textContent = 'Ok';
missCompagny.style.color = 'green';
                    </code>
                </pre>
                <p>
                    Il nous reste plus qu'à répéter la même opération pour chaque champs à vérifier.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Déclaration de l'évènemment</div>
            <div class="collapsible-body">
                <p>
                    Nous voulons faire une vérification quand il y a perte de focus. Nous définirons notre
                    évènemment de cette façon :
                </p>
                <pre>
                    <code class="js">
compagny.onblur = compagnyCheck;
                    </code>
                </pre>
                <p>
                    La méthode <a href="https://developer.mozilla.org/fr/docs/Web/API/GlobalEventHandlers/onblur" title="Lien vers définition MDN"  target="_blank"><code>onblur</code></a> désigne la perte de focus. Ici, nous indiquons donc
                    que lorsque nous perdons le focus du champs "société", le script doit se référer à la fonction
                    compagnyCheck.
                    ATTENTION!! Ceci ne constitue pas un appel de fonction (pour rappel, on appelle une fonction de cette manière : <code>nomFonction();</code>).
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Vérification sur le bouton d'envoi du formulaire</div>
            <div class="collapsible-body">
                <p>
                    Nous allons reprendre la même méthode, seul le déclencheur d'évènemment change. au lieu
                    d'utiliser <code>unblur()</code>, nous utiliserons <code>onclick()</code>.
                </p>
                <p>
                    En outre, nous auront une seul fonction, qui regroupera les fonctions déclancher à la perte de
                    focus.
                </p>
                <p>
                    Le déclencher :
                </p>
                <pre>
                    <code class="js">
submit.onclick() = checkForm;
                    </code>
                </pre>
                <p>
                    La fonction :
                </p>
                <pre>
                    <code class="js">
function checkForm() {
    // si le champ société est vide
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
    // champs personne à contacter
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
    // champs adresse
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
    // champs code postal
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
    // champs ville
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
    // champs mail
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
    //champs telephone
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
   // textarea environnement
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
}
                </code>
                </pre>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Code final et démo</div>
            <div class="collapsible-body">
                <pre>
                    <code class="js">
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
submit.onclick = checkForm;
function checkForm() {
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
}
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
                       </code>
                </pre>
                <a href="formulaire/javascript/index.php" title="lien vers demo formulaire" class="waves-effect waves-light btn" target="_blank"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>