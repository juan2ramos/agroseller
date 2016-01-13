$(document).ready(function () {

    var  $sub = $('#subcategories');

    $('#categories').on('change', function () {
        if ($(this).val() != '') {
            $.post($(this).data('route'), { id: $(this).val(),_token: $(this).data('token') }, function (response) {

                var subcategories = response.subcategories;
                $sub.html('');
                $sub.append($("<option value=''>Selecciona una subcategoria</option>"));
                for(var i in subcategories)
                {
                    $sub.append($("<option></option>").attr("value",subcategories[i].id).text(subcategories[i].name));
                }

            }).fail(function () {
                button.removeClass('hidden');
                alert('Ocurrió un error :(');
            });
        }else{
            $sub.html('');
            $sub.append($("<option value=''>Selecciona una subcategoria</option>"));
        }

    });

    $('#subcategories').on('change', function () {
        if ($(this).val() != '') {
            $.post($(this).data('route'), { id: $(this).val(),_token:  $('#categories').data('token') }, function (response) {

               console.log(response);

            }).fail(function () {
                button.removeClass('hidden');
                alert('Ocurrió un error :(');
            });
        }

    });

});
