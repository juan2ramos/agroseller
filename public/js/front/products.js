var assets = $('.Product-content').data('urlpath'),
    subcategory = $('.Product-content').data('subcategory');
$(function () {


    if (navigator.geolocation)
        navigator.geolocation.getCurrentPosition(mostrarLocalizacion);


});
function mostrarLocalizacion(position) {
    var products = $('#productsRecommended').data('routegetproducts');
    console.log(products)

    $.ajax({
        url: products,
        data: {position: position, subcategory: subcategory},
        type: 'GET',
        //dataType: 'json',
        success: function (e) {

            var html = "";
            $.each(e, function (i, val) {

                html += '<article class="smaller-12 small-6 medium-4 col-3"> ' +
                    '<figure class="Product-Image">' +
                    '<a href="'+ assets + '/producto/'+ val.slug + '/'+ val.id +'">';
                var files =  val.product_files;
                for (var prop in  files) {
                    if (files[prop].extension != 'pdf') {
                        html += '<img src="'+ assets + '/uploads/products/' + files[prop].name +'" alt="">';
                        break;
                    }
                }
                html += "</a></figure>";
                html += '<div class="Product-info">';
                html += '<a href="'+ assets + '/producto/'+ val.slug + '/'+ val.id +'">' +
                    '<h4>'+val.name+'</h4>' +
                    '</a>' +
                    ' <h5>' + val.subcategory.name + '</h5>' +
                    '<a href="'+ assets + '/producto/'+ val.slug + '/'+ val.id +'" class="Button">COMPRAR</a>' +
                    '</div>' +
                    '</article>';

            });
            $('.Product-content').append(html);

        }
    });
}