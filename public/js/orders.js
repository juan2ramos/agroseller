var $stateOrder = $('.stateOrder');


$stateOrder.on('click', function () {
    var ids = [];
    $tr = $(this).parents('.SubTable2').find(' tbody tr');
    state = $(this).siblings('.stateOrderSelect').val();
    $tr.each(function () {
        ids.push($(this).data('products'));
    });

    var order = $(this).parents('.SubTable2').data('order');
    var $parent = $(this).parent();
    console.log(order)
    $.post($('#updateStateOrder').val(), {
        order: order,
        ids: ids,
        state: state,
        _token: $('#token').val()
    }, function (data) {
        var msj = "Error al actualizar.";
        if(data.success)
            msj = '¡ Se ha actualizado correctamente ! '
        $parent.hide('slow');
        $parent.siblings('.successStateOrder').html(msj)
        console.log(data);
    });

});
$('.formUpdateOrder').on('click', function () {
    var $thisbutton = $(this);
    var url= $('#urlUpdate').data('url'),
        arrayId = [] ;

    if (window.confirm("¡Esta seguro de actualizar los datos!")) {

        $thisbutton.parents('.SubTable2').find('.productProviders').each(function (e) {
            arrayId.push($(this).data('products'))

        });
        $thisbutton.siblings('.formUpdateOrderLoad').show()

        var data = {
            '_token': $('#token').val(),
            'stateOrderSelect' : $(this).siblings('.stateOrderSelect').val(),
            'order_id' : $(this).parents('.SubTable2').data('order'),
            'productProvider' : arrayId
        };
        $thisbutton.hide();
        $.post(url, data, function (data) {
            $thisbutton.siblings('span').show()
        }).done(function () {

        }).fail(function () {
            alert("error");
            $thisbutton.show();
        }).always(function () {

            $thisbutton.siblings('.formUpdateOrderLoad').hide()
        });

    }

});
