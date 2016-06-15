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
