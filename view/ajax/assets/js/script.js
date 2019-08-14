$(document).ready(function () {
    /**
     * Atelier 1
     */
    $('#btn1').click(function () {
        $('#div1').load('fichier.html');
    });
    $('#btn2').click(function () {
        $('#div1').load('../php/allProductAjax.php');
    });
    /**
     * Atelier 2
     */
    $('#btn3').click(function () {
        $('#select1').load('option1.php');
    });
    $('#select1').change(function () {
        $.post('controller/option2controller.php', {
            reg_id: $(this).val()
        }, function (data) {
            if (data) {
                $('#select2').html(data);
            } else {
                alert('Erreur');
            }

        },
                'HTML');
    });

    /**
     * Api
     */
    $('#submit').click(function () {
        $.getJSON('http://api.themoviedb.org/3/search/movie?api_key=f33cd318f5135dba306176c13104506a&query=' + $('#search').val(), function (data) {
            var items = [];
            $.each(data.results, function(key, val) {
                items.push(key + ' : ' + val.title + '<br />');
            });
            $('#result').html(items.join());
        });

//        console.log($('#search').val());
//        $.post('../controller/apiController.php',
//                {query: $('#search').val()},
//                function (data) {
//                    if (data) {
//
//                    }
//                });
    });

});



