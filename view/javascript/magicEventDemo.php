<?php
include '../header.php'
?>

<body>
    <div class="uk-container">
        <form action="#" method="get">
            <div class="uk-margin">
                <label for="number">Trouver le nombre magic</label>
                <input class="uk-input uk-form-width-medium" type="text" id="number" name="number" required>
                <span id="label"></span>
                <input type="reset" name="submit" id="checkMagicNumber" class="uk-button uk-button-secondary" value="Vérifier">
                <input type="reset" name="generate" id="generate" class="uk-button uk-button-danger" value="Générer un nombre">
            </div>
        </form>
    </div>
    <?php
    include '../footer.php';
    ?>

    <!-- <script>
        //déclaration des variables utilisées
        var magic = 0;
        var count = 1;
        // ciblage des éléments nécessaires et stokage dans une variable
        var generate = document.getElementById('generate');
        var userNumber = document.getElementById('number');
        var label = document.getElementById('label');
        var submit = document.getElementById('submit');


        // déclaration des fonctions
        function magicNumber() {
            label.textContent = '';
            count = 1;
            magic = parseInt(Math.random() * 100);
            console.log(magic);
            return magic;
        };

        function verif() {
            // si le champs est vide
            if (userNumber.validity.valueMissing) {
                // on bloque l'nvoie du formulaire
                event.preventDefault();
                // affichage message d'erreur
                label.textContent = 'Veuillez saisir un nombre';
                label.style.color = 'red';
                // incrémentation du compte de coups
                count++;
            } else {
                // si le nombre saisi par l'utilisateur est égal au nombre magic
                if (parseInt(userNumber.value) == magic) {
                    label.textContent = 'Bravo, vous avez trouvé le nombre magic ' + magic + ' en ' + count + ' coup(s)!!!';
                    label.style.color = 'green';
                    // si le nombre saisi par l'utilisateur est inférieur au nombre magic
                } else if (parseInt(userNumber.value) < magic) {
                    label.textContent = 'Plus grand';
                    label.style.color = 'red';
                    count++;
                    // si le nombre saisi par l'utilisateur est supérieur au nombre magic
                } else {
                    label.textContent = 'Plus petit';
                    label.style.color = 'red';
                    count++;
                }
            }
        };
        // déclarations des événements
        generate.onclick = magicNumber;
        submit.onclick = verif;
    </script> -->
</body>

</html>