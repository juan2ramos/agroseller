$(document).ready(function () {
    jQuery.datetimepicker.setLocale('es');
    $('.datetimepicker_mask').datetimepicker({
        i18n:{
            es:{
                months:[
                    'Enero','Febrero','Marzo','Abril',
                    'Mayo','Junio','Julio','Agosto',
                    'Septiembre','Octubre','Noviembre','Diciembre',
                ],
                dayOfWeek:[
                    "Do", "Lu", "Ma", "Mi",
                    "Ju", "Vi", "Sa",
                ]
            }
        },
    });

    $('.datetimepicker_mask').datetimepicker({ defaultDate: new Date() });

    $('.datetimepicker_mask').click(function(){
        $(this).datetimepicker('show');
    });
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
            $('.dataForm').hide("slow");
            $.post($(this).data('route'), { id: $(this).val(),_token:  $('#categories').data('token') }, function (response) {
                $.each(response.features, function(arrayID,group) {
                    $('.' + group.name ).show("slow");
                });
                $('.Product-formButton' ).show("slow");
                $('.offer' ).show("slow");
            }).fail(function () {
                button.removeClass('hidden');
                alert('Ocurrió un error :(');
            });
        }

    });

});
