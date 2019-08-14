//validation du formulaire en récupérant l'id du bouton de validation
var formValid = document.getElementById('submit');
//stockage de la saisie de l'input dans une variable
var text = document.getElementById('text');
//récupération de l'endroit ou sera afficher le message d'erreur
var missText = document.getElementById('missText');
//verification de la saisie au click sur le bouton
formValid.addEventListener('click', verif);
//fonction permettant la vérification du champ de saisie, et affichage d'une erreur en cas d'absence de données
function verif(event) { // fonction qui prend en paramêtre le déclenchement de l'event

    if (text.validity.valueMissing) { 
        //text désigne l'input, validity vérifie la présence de donnée dans le champ, valueMissing renvoie true si un champs required est vide
        event.preventDefault();
        //preventDefault() bloque l'envoie du formulaire -> méthode de l'objet event annulant le déclenchement d'un event si celui ci est annulable
       
       //définition et affichage du message d'erreur
        missText.textContent = 'Saisie manquante';
        missText.style.color = 'red';
    } else {
        // affichage de la saisie dans une boite de dialogue
        alert('Vous avez saisi \'' + text.value + '\'.');
    }
};
verif(event);