// décalration des variables utiles

var firstNumber = parseFloat(window.prompt('Saisisez un nombre'));
var operator = window.prompt('Saisisez un opérateur');
var secondNumber = parseFloat(window.prompt('Saisisez un nombre'));
// condition vérifiant le signe opératoire
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
