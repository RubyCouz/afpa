<?php
include '../header.php';
?>
<div class="container">
    <h1>Validation d'un formulaire en Jquery</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Définition des regexs</div>
            <div class="collapsible-body">
                <p>
                    Pour contrôler correctement un formulaire, nous devons vérifier
                    ce que l'utilsateur a pu saisir : il faut que les données entrées correspondent à un schéma que
                    nous définissons. De cette manière, les données saisies sont correct, et le formulaire est un
                    peu plus sécurisé.
                </p>
                <p>
                    Il est possible d'utilisé une regex pour plusieurs <code>input</code>.
                </p>
                <p>
                    Lorsque vous établissez une regex, il important de la tester. De nombreux sites sur la toile
                    propose ce service, notamment <a href="https://regex101.com/" title="Lien vers regex101" target="_blank">Regex101</a>.
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
            <div class="collapsible-header">Ciblage des éléments à controlers</div>
            <div class="collapsible-body">
                <p>
                    La vérification en jquery se fait sur le même principe qu'en Javascript, seule la manière de faire change. Nous
                    restons sur un contrôle lors de la perte de focus, puis au click sur le bouton d'envoie. Pour
                    l'affichage des messages d'erreurs, nous allons afficher ou cacher des éléments selon le cas de
                    figures.
                    Le ciblage des élément en Javascript se fait différemment. <code>document.getElementById</code>
                    sera remplacer par <code>$('idElement')</code>. Plutôt que de cibler les élément, puis de leur
                    affecter un évènement, le tout se fait en même temps en jquery :
                </p>
                <pre>
                    <code class="js">
$('#lastname').blur(function () {
    instruction
}
                    </code>
                </pre>
                <p>
                    Nous pouvons alors directement orchestrer notre condition nous servant à vérifier nos champs de
                    saisie :
                </p>
                <pre>
                    <code class="js">
$('#lastname').blur(function () {
    // si le champ est vide
    if ($('#lastname').val() == '') {
        $('#missLastname').show();
        $('#errorLastname').hide();
        $('#okLastname').hide();
        $('#missLastname').addClass('alert alert-danger');
        $('.btn-primary').hide();
        // test de la validité du champs de saisie
    } else if (textValid.test($('#lastname').val()) == false) {
        $('#errorLastname').show();
        $('#missLastname').hide();
        $('#okLastname').hide();
        $('#errorLastname').addClass('alert alert-danger');
        $('.btn-primary').hide();
        // si la saisie est correct
    } else {
        $('#okLastname').show();
        $('#errorLastname').hide();
        $('#missLastname').hide();
        $('#okLastname').addClass('alert alert-success');
        $('.btn-primary').show();
    }
});
                    </code>
                </pre>
                <p>
                    Nous commençons toujours par vérifier si le champs est vide, si c'est le cas nous affichons le
                    message d'erreur correspondant. Les autres messages sont cachés, en prévision d'une répétition
                    de saisie et d'erreurs différentes :
                </p>
                <pre>
                    <code>
// si le champ est vide
if ($('#lastname').val() == '') {
    $('#missLastname').show();
    $('#errorLastname').hide();
    $('#okLastname').hide();
    $('#missLastname').addClass('alert alert-danger');
    $('.btn-primary').hide();
    // test de la validité du champs de saisie
}
                    </code>
                </pre>
                <p>
                    S'il y une saisie, nous la contrôlons :
                </p>
                <pre>
                    <code class="js">
else if (textValid.test($('#lastname').val()) == false) {
    $('#errorLastname').show();
    $('#missLastname').hide();
    $('#okLastname').hide();
    $('#errorLastname').addClass('alert alert-danger');
    $('.btn-primary').hide();
    // si la saisie est correct
}
                    </code>
                </pre>
                <p>
                    et enfin s'il n'y a pas (ou plus d'erreur) :
                </p>
                <pre>
                    <code class="js">
else {
    $('#okLastname').show();
    $('#errorLastname').hide();
    $('#missLastname').hide();
    $('#okLastname').addClass('alert alert-success');
    $('.btn-primary').show();
}
                    </code>
                </pre>
                <p>
                    Nous répétons cette opération autant de fois que nous avons de champs de saisie à vérifier.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Code final et démo</div>
            <div class="collapsible-body">
                <pre>
                    <code class="js">
$(document).ready(function () {
    // déclaration des regexs vérifiant les donnée saisies par l'utilisateur
    var textValid = /^[a-zA-Z\-\déèàçùëüïôäâêûîô#&]+$/;
    var postalCodeValid = /^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/;
    var mailValid = /[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}/;
    var phoneValid = /^0[1-9]([-. ]?[0-9]{2}){4}$/;
    $('.error').hide();
    $('.valid').hide();

    $('#lastname').blur(function () {
        // si le champ est vide
        if ($('#lastname').val() == '') {
            $('#missLastname').show();
            $('#errorLastname').hide();
            $('#okLastname').hide();
            $('#missLastname').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // test de la validité du champs de saisie
        } else if (textValid.test($('#lastname').val()) == false) {
            $('#errorLastname').show();
            $('#missLastname').hide();
            $('#okLastname').hide();
            $('#errorLastname').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okLastname').show();
            $('#errorLastname').hide();
            $('#missLastname').hide();
            $('#okLastname').addClass('alert alert-success');
            $('.btn-primary').show();
        }
    });
    $('#firstname').blur(function () {
        // si le champ est vide
        if ($('#firstname').val() == '') {
            $('#missFirstname').show();
            $('#errorFirstname').hide();
            $('#okFirstname').hide();
            $('#missFirstname').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // test de la validité du champs de saisie
        } else if (textValid.test($('#firstname').val()) == false) {
            $('#errorFirstname').show();
            $('#missFirstname').hide();
            $('#okFirstname').hide();
            $('#errorFirstname').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okFirstname').show();
            $('#errorFirstname').hide();
            $('#missFirstname').hide();
            $('#okFirstname').addClass('alert alert-success');
            $('.btn-primary').show();
        }
    });
    $('#birthdate').blur(function () {
        // si le champ est vide
        if ($('#birthdate').val() == '') {
            $('#missBirthdate').show();
            $('#errorBirthdate').hide();
            $('#okBirthdate').hide();
            $('#missBirthdate').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // test de la validité du champs de saisie
        } else if (textValid.test($('#birthdate').val()) == false) {
            $('#errorBirthdate').show();
            $('#missBirthdate').hide();
            $('#okBirthdate').hide();
            $('#errorBirthdate').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okBirthdate').show();
            $('#errorBirthdate').hide();
            $('#missBirthdate').hide();
            $('#okBirthdate').addClass('alert alert-success');
            $('.btn-primary').show();
        }
    });
    $('#city').blur(function () {
        // si le champ est vide
        if ($('#city').val() == '') {
            $('#missCity').show();
            $('#errorCity').hide();
            $('#okCity').hide();
            $('#missCity').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // test de la validité du champs de saisie
        } else if (textValid.test($('#city').val()) == false) {
            $('#errorCity').show();
            $('#missCity').hide();
            $('#okCity').hide();
            $('#errorCity').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okCity').show();
            $('#errorCity').hide();
            $('#missCity').hide();
            $('#okCity').addClass('alert alert-success');
            $('.btn-primary').show();
        }
    });
    $('#address').blur(function () {
        // si le champ est vide
        if ($('#address').val() == '') {
            $('#missAddress').show();
            $('#errorAddress').hide();
            $('#okAddress').hide();
            $('#missAddress').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // test de la validité du champs de saisie
        } else if (textValid.test($('#address').val()) == false) {
            $('#errorAddress').show();
            $('#misAddressy').hide();
            $('#okAddress').hide();
            $('#errorAddress').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okAddress').show();
            $('#errorAddress').hide();
            $('#missAddress').hide();
            $('#okAddress').addClass('alert alert-success');
            $('.btn-primary').show();
        }
    });
    $('#postalCode').blur(function () {
        // si le champ est vide
        if ($('#postalCode').val() == '') {
            $('#missPostalCode').show();
            $('#errorPostalCode').hide();
            $('#okPostalCode').hide();
            $('#missPostalCode').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // test de la validité du champs de saisie
        } else if (postalCodeValid.test($('#postalCode').val()) == false) {
            $('#errorPostalCode').show();
            $('#missPostalCode').hide();
            $('#okPostalCode').hide();
            $('#errorPostalCode').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okPostalCode').show();
            $('#errorPostalCode').hide();
            $('#missPostalCode').hide();
            $('#okPostalCode').addClass('alert alert-success');
            $('.btn-primary').show();
        }
    });
    $('#mail').blur(function () {
        // si le champ est vide
        if ($('#mail').val() == '') {
            $('#missMail').show();
            $('#errorMail').hide();
            $('#okMail').hide();
            $('#missMail').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // test de la validité du champs de saisie
        } else if (mailValid.test($('#mail').val()) == false) {
            $('#errorMail').show();
            $('#missMail').hide();
            $('#okMail').hide();
            $('#errorMail').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okMail').show();
            $('#errorMail').hide();
            $('#missMail').hide();
            $('#okMail').addClass('alert alert-success');
            $('.btn-primary').show();
        }
    });
    $('#job').blur(function () {
        // si le champ est vide
        if ($('#job').val() === '0') {
            $('#missJob').show();
            $('#okJob').hide();
            $('#missJob').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okJob').show();
            $('#missJob').hide();
            $('#okJob').addClass('alert alert-success');
            $('.btn-primary').show();
        }
    });
    $('#money').blur(function () {
        // si le champ est vide
        if ($('#money').val() === '0') {
            $('#missMoney').show();
            $('#okMoney').hide();
            $('#missMoney').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okMoney').show();
            $('#missMoney').hide();
            $('#okMoney').addClass('alert alert-success');
            $('.btn-primary').show();
        }
    });
    $('#other').blur(function () {
        // test de la validité du champs de saisie
        if (textValid.test($('#other').val()) == false) {
            $('#errorOther').show();
            $('#okOther').hide();
            $('#errorOther').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okOther').show();
            $('#errorOther').hide();
            $('#okOther').addClass('alert alert-success');
            $('.btn-primary').show();
        }
    });
    $('#year').blur(function () {
        // si le champ est vide
        if ($('#year').val() == '') {
            $('#missYear').show();
            $('#errorYear').hide();
            $('#okYear').hide();
            $('#missYear').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // test de la validité du champs de saisie
        } else if (textValid.test($('#year').val()) == false) {
            $('#errorYear').show();
            $('#missYear').hide();
            $('#okYear').hide();
            $('#errorYear').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okYear').show();
            $('#errorYear').hide();
            $('#missYear').hide();
            $('#okYear').addClass('alert alert-success');
            $('.btn-primary').show();
        }
    });
    $('#comments').blur(function () {
        // test de la validité du champs de saisie
        if (textValid.test($('#comments').val()) == false) {
            $('#errorComment').show();
            $('#okComment').hide();
            $('#errorComment').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okComment').show();
            $('#errorComment').hide();
            $('#okComment').addClass('alert alert-success');
            $('.btn-primary').show();
        }
    });

    $('#submit').click(function () {
        // si le champ est vide
        if ($('#lastname').val() == '') {
            $('#missLastname').show();
            $('#errorLastname').hide();
            $('#okLastname').hide();
            $('#missLastname').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // test de la validité du champs de saisie
        } else if (textValid.test($('#lastname').val()) == false) {
            $('#errorLastname').show();
            $('#missLastname').hide();
            $('#okLastname').hide();
            $('#errorLastname').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okLastname').show();
            $('#errorLastname').hide();
            $('#missLastname').hide();
            $('#okLastname').addClass('alert alert-success');
            $('.btn-primary').show();
        }


        // si le champ est vide
        if ($('#firstname').val() == '') {
            $('#missFirstname').show();
            $('#errorFirstname').hide();
            $('#okFirstname').hide();
            $('#missFirstname').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // test de la validité du champs de saisie
        } else if (textValid.test($('#firstname').val()) == false) {
            $('#errorFirstname').show();
            $('#missFirstname').hide();
            $('#okFirstname').hide();
            $('#errorFirstname').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okFirstname').show();
            $('#errorFirstname').hide();
            $('#missFirstname').hide();
            $('#okFirstname').addClass('alert alert-success');
            $('.btn-primary').show();
        }


        // si le champ est vide
        if ($('#birthdate').val() == '') {
            $('#missBirthdate').show();
            $('#errorBirthdate').hide();
            $('#okBirthdate').hide();
            $('#missBirthdate').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // test de la validité du champs de saisie
        } else if (textValid.test($('#birthdate').val()) == false) {
            $('#errorBirthdate').show();
            $('#missBirthdate').hide();
            $('#okBirthdate').hide();
            $('#errorBirthdate').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okBirthdate').show();
            $('#errorBirthdate').hide();
            $('#missBirthdate').hide();
            $('#okBirthdate').addClass('alert alert-success');
            $('.btn-primary').show();
        }
        // si le champ est vide
        if ($('#city').val() == '') {
            $('#missCity').show();
            $('#errorCity').hide();
            $('#okCity').hide();
            $('#missCity').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // test de la validité du champs de saisie
        } else if (textValid.test($('#city').val()) == false) {
            $('#errorCity').show();
            $('#missCity').hide();
            $('#okCity').hide();
            $('#errorCity').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okCity').show();
            $('#errorCity').hide();
            $('#missCity').hide();
            $('#okCity').addClass('alert alert-success');
            $('.btn-primary').show();
        }
        // si le champ est vide
        if ($('#address').val() == '') {
            $('#missAddress').show();
            $('#errorAddress').hide();
            $('#okAddress').hide();
            $('#missAddress').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // test de la validité du champs de saisie
        } else if (textValid.test($('#address').val()) == false) {
            $('#errorAddress').show();
            $('#misAddressy').hide();
            $('#okAddress').hide();
            $('#errorAddress').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okAddress').show();
            $('#errorAddress').hide();
            $('#missAddress').hide();
            $('#okAddress').addClass('alert alert-success');
            $('.btn-primary').show();
        }
        // si le champ est vide
        if ($('#postalCode').val() == '') {
            $('#missPostalCode').show();
            $('#errorPostalCode').hide();
            $('#okPostalCode').hide();
            $('#missPostalCode').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // test de la validité du champs de saisie
        } else if (postalCodeValid.test($('#postalCode').val()) == false) {
            $('#errorPostalCode').show();
            $('#missPostalCode').hide();
            $('#okPostalCode').hide();
            $('#errorPostalCode').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okPostalCode').show();
            $('#errorPostalCode').hide();
            $('#missPostalCode').hide();
            $('#okPostalCode').addClass('alert alert-success');
            $('.btn-primary').show();
        }
        // si le champ est vide
        if ($('#mail').val() == '') {
            $('#missMail').show();
            $('#errorMail').hide();
            $('#okMail').hide();
            $('#missMail').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // test de la validité du champs de saisie
        } else if (mailValid.test($('#mail').val()) == false) {
            $('#errorMail').show();
            $('#missMail').hide();
            $('#okMail').hide();
            $('#errorMail').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okMail').show();
            $('#errorMail').hide();
            $('#missMail').hide();
            $('#okMail').addClass('alert alert-success');
            $('.btn-primary').show();
        }
        if ($('#job').val() === '0') {
            $('#missJob').show();
            $('#okJob').hide();
            $('#missJob').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okJob').show();
            $('#missJob').hide();
            $('#okJob').addClass('alert alert-success');
            $('.btn-primary').show();
        }
        // si le champ est vide
        if ($('#money').val() === '0') {
            $('#missMoney').show();
            $('#okMoney').hide();
            $('#missMoney').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okMoney').show();
            $('#missMoney').hide();
            $('#okMoney').addClass('alert alert-success');
            $('.btn-primary').show();
        }
        // test de la validité du champs de saisie
        if (textValid.test($('#other').val()) == false) {
            $('#errorOther').show();
            $('#okOther').hide();
            $('#errorOther').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okOther').show();
            $('#errorOther').hide();
            $('#okOther').addClass('alert alert-success');
            $('.btn-primary').show();
        }
        // si le champ est vide
        if ($('#year').val() == '') {
            $('#missYear').show();
            $('#errorYear').hide();
            $('#okYear').hide();
            $('#missYear').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // test de la validité du champs de saisie
        } else if (textValid.test($('#year').val()) == false) {
            $('#errorYear').show();
            $('#missYear').hide();
            $('#okYear').hide();
            $('#errorYear').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okYear').show();
            $('#errorYear').hide();
            $('#missYear').hide();
            $('#okYear').addClass('alert alert-success');
            $('.btn-primary').show();
        }
        // test de la validité du champs de saisie
        if (textValid.test($('#comments').val()) == false) {
            $('#errorComment').show();
            $('#okComment').hide();
            $('#errorComment').addClass('alert alert-danger');
            $('.btn-primary').hide();
            // si la saisie est correct
        } else {
            $('#okComment').show();
            $('#errorComment').hide();
            $('#okComment').addClass('alert alert-success');
            $('.btn-primary').show();
        }

    });
});
                        </code>
                </pre>
                <a href="formulaire/jquery/index.html" title="lien vers demo formulaire" class="waves-effect waves-light btn" target="_blank"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>