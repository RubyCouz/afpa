/**
 * Nombre magique
 */
//definition d'un nombre aléatoire

var verif = new Vue({
    // ciblage de la localisation où va être effectif verif
    el: '#verif',
    //définition des données dont on a besoin
    data: {
        number: '',
        magic: parseInt(Math.random() * 100),
        count: 0,
        info: ''
    },
    // définition de la méthode analysant les données saisies par l'utilisateur.
    methods: {
        check: function (evt) {
            console.log(number.value);
            console.log(this.magic);
            // si les 2 nombres sont identiques
            if (parseInt(number.value) == this.magic) {
                // affichage d'un message, plus le nombre d'essais
                this.info = 'Félicitation!! Vous avez trouvé la bonne réponse : ' + this.magic + ' \nNombre de coup nécessaire : ' + (parseInt(this.count) + 1);
            }
            // si le nombre random est plus grand
            else if (parseInt(number.value) < this.magic) {
                // on informe l'utilisateur du résultat
                this.info = 'Plus grand';
                this.count++;
            }
            // si le nombre random est plus petit
            else if (parseInt(number.value) > this.magic) {
                // on informe l'utilisateur du résultat
                this.info = 'Plus petit';
                this.count++;
            }
        }
    }
});