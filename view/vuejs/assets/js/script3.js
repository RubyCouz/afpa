/**
 * calculatrice
 */
// initialisation de l'objet Vue
var app = new Vue({
    // identifie la partie html cibléé
    el: '#cal',
    // définition des propriétés nécessaires à l'objet
    data: {
        // définition du nombre en cour
        current: 0,
        // défnition du total
        total: 0,
        // défintion de l'opérateur
        operator: false,
        // création d'un tableau pour les différents boutons (tableau contenant 4  tableaux, 1 pour chaque ligne de boutons)
        buttons: [
            ['7', '8', '9', '+'],
            ['4', '5', '6', '-'],
            ['1', '2', '3', '*'],
            ['0', 'C', '=', '/']
        ],
        // création d'un tableau qui contiendra l'historique des opérations
        history: []
    },
    methods: {
        // définition de la méthode select, appelé au click d'un bouton de la calculatrice
        select: function (input) {
            switch (input) {
                // si un signe opératoir est selectionné
                case "+":
                case "-":
                case "*":
                case "/":
                case "=":
                    // on se refère à la méthode calc
                    this.calc(input);
                    break;
                    // si on click sur "C"
                case "C":
                    // appel de la méthode reset
                    this.reset();
                    break;
                default:
                    // appel de la méthode changeCurrent
                    this.changeCurrent(input);
            }
        },
        // déclaration de la méthode changeCurrent, permettra de change la valeur de l'input par celle saisie par l'utilisateur
        changeCurrent: function (input) {
            // si la valeur de l'input = 0
            if (this.current == 0) {
                // la valeur de l'input sera remplacée par celle de l'utilisateur
                this.current = input;
            } else {
                // sinon on concatène la valeur de l'input avec celle saisie par l'utilisateur
                this.current += '' + input
            }
            ;
        },
        // déclaration de la méthode reset, permettant la réinitialisation de la calculatrice
        reset: function () {
            // on définit toutes les propriétés à leurs valeurs d'origine
            this.total = 0;
            this.operator = false;
            this.current = 0;
        },
        // déclaration de la méthode calc, effectuant les calculs
        calc: function (operator) {
            // si aucun opérateur n'est présent
            if (!this.operator) {
                // si le nombre courant est différent de 0
                if (this.current != 0) {
                    // alors total = le nombre courant
                    this.total = parseFloat(this.current);
                }
            } else {
                // sinon appel de la méthode addHistory pour garder un historique des calculs
                this.addHistory(this.total + " " + this.operator + " " + this.current);
                //si un opérateur est présent
                switch (this.operator) {
                    case "+":
                        // total = total + nombre courant
                        this.total += parseFloat(this.current);
                        break;
                    case "-":
                        // total = total - nombre courant
                        this.total -= parseFloat(this.current);
                        break;
                    case "*":
                        // total = total * nombre courant
                        this.total *= parseFloat(this.current);
                        break;
                    case "/":
                        // on vérifie que le nombre courant est différent de 0
                        if (this.current == 0) {
                            // message d'erreur en cas de division par 0
                            this.total = 'division par 0 impossible'
                        } else {
                            // sinon total = total / nombre courant
                            this.total /= parseFloat(this.current);
                            break;
                        }
                }
            }
            // le nombre courant est remis à 0
            this.current = 0;
            // s'il y a présence d'un opérateur
            if (this.operator) {
                // appel de la méthode addHistory pour affichage de l'historique
                this.addHistory("= " + this.total);
            }
            // vérification de la validité de l'opérateur
            if (["+", "-", "*", "/"].indexOf(operator) > -1) {
                this.operator = operator;
            } else {
                this.operator = false;
            }
        },
        // déclaration de la méthode addHistory permattant l'affichage de l'historique de calcul
        addHistory: function (text) {
            // on insere les opearations et les resultats dans le tableau history
            this.history.unshift(text);
        }
    }
});
