var app = new Vue({
        //association de l'application à un élément html <div id="app"

    el: '#app', 
        // définition des variable qui seront reliées dans le html
    data: {
        message: 'Hello World!!',
        label_visible: false
    },
    methods :{
        // au clique sur le bouton, on déclanche une fonction faisant apparaitre un message et un bloc
        btn1_click: function(evt) {
            // définition du message
            this.message = 'le label est visible'; // this renvoie à la méthode btn1_click
            // affichage du bloc
            this.label_visible = true;
        }
    }
});