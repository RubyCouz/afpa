/**
 * Additionneur
 */

// définition des variables et stockages des valeurs récupérées dans les inputs

// declarations d'une nouvelle appli
var sum = new Vue({
    el: '#app',
    data: {
        firstNumber: '',
        secondNumber: '',
        result: ''
    },
    methods: {
        addition: function (evt) {
            console.log(firstNumber.value);
            console.log(secondNumber.value);
            this.result = parseInt(firstNumber.value) + parseInt(secondNumber.value);
        }
    }
});


