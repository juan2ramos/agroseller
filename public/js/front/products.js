$(function () {


    if (navigator.geolocation)
        navigator.geolocation.getCurrentPosition(mostrarLocalizacion);



});
function mostrarLocalizacion(position) {
    var products = $('#productsRecommended').data('routegetproducts');
    console.log(products)
    $.getJSON(products, {position: 100})
        .done(function (data) {
            console.log("ff" +  data);
        });


}