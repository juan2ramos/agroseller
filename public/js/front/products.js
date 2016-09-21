$(function () {


    if (navigator.geolocation)
        navigator.geolocation.getCurrentPosition(mostrarLocalizacion);


});
function mostrarLocalizacion(position) {
    var products = $('#productsRecommended').data('routegetproducts');
    console.log(products)

    $.ajax({
        url: products,
        data: {position: position},
        type: 'GET',
        //dataType: 'json',
        success: function (e) {
            console.log(e);
        }
    });


    /*  $.getJSON('productos-recomendados', {position: 100})
     .fail(function (data) {
     console.log(data);
     })
     */


}