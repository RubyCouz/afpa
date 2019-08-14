//validation du formulaire en récupérant l'id du bouton de validation
var formValid = document.getElementById('submit');
// définition de l'endroit où l'utilisateur sera informé
var label1 = document.getElementById('label1');
// définition des variables utiles pour l'exécution du code
var magic = 0;
var userNumber = document.getElementById('number');
var userNumber = number.value;
var question = true;
var count = 0;
//récupération de l'endroit ou sera afficher le message d'erreur
var missNumber = document.getElementById('missNumber');
//definition d'un nombre aléatoire
magic = parseInt(Math.random() * 100);
//verification de la saisie au click sur le bouton
// formValid.addEventListener('click', verif);
function verif() {
    if (number.validity.valueMissing) {
        //number désigne l'input, validity vérifie la présence de donnée dans le champ, valueMissing renvoie true si un champs required est vide
        event.preventDefault();
        //preventDefault() bloque l'envoie du formulaire -> méthode de l'objet event annulant le déclenchement d'un event si celui ci est annulable

        //définition et affichage du message d'erreur
        missNumber.textContent = 'Saisie manquante';
        missNumber.style.color = 'red';
    } else {
        // si les 2 nombres sont identiques
        if (userNumber == magic) {
            // affichage d'un message, plus le nombre d'essais
            label1.textContent = 'Félicitation!! Vous avez trouvé la bonne réponse : ' + magic + ' \nNombre de coup nécessaire : ' + (parseInt(count) + 1);
            label1.style.color = 'green';
        }
        // si le nombre random est plus grand
        if (userNumber < magic) {
            // on informe l'utilisateur du résultat
            label1.textContent = 'Plus grand!';
            label1.style.color = 'red';
            count++;
        }
        // si le nombre random est plus petit
        if (userNumber > magic) {
            // on informe l'utilisateur du résultat
            label1.textContent = 'Plus petit!';
            label1.style.color = 'red';
            count++;
        }
    }
};




// demande pour rejouer
// question = window.confirm('Voulez-vous rejouer?');

// si l'utilisateur refuse
// label1.textContent = 'Merci d\'avoir participer';
console.log(label1);
console.log(magic);
console.log(number.value);
