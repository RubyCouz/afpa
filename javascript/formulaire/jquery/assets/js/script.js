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