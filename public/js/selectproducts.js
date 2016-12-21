var subcategories = $('#subcategoriesList'),
    productTable = $('#productTable'),
    products,
    $searchProduct = $('#searchProduct'),
    $return = [],
    html = "";
;

/*
 subcategories.on('click', 'li', function () {
 var params = {
 subcategory_id: $(this).data('id'),
 _token: $('#token').val()
 };

 $.post($('#callProducts').val(), params, function (data) {

 var products = data.products,
 html = "";

 $.each(products, function (i, product) {
 html += "<tr>" +
 "<td>" + product.name + "</td>" +
 "<td><input style='opacity:1' value='" + product.id + "' name='product_id' type='radio' class='productSelected'></td>" +
 "</tr>";
 });

 productTable.html(html);
 $('.productSelected').eq(0).attr('checked', 'checked');

 }, 'json');
 });
 */
subcategories.on('click', 'li', function () {
    var params = {
        subcategory_id: $(this).data('id'),
        _token: $('#token').val()
    };

    $.post($('#callProducts').val(), params, function (data) {

        products = data.products,

            $('.productSelected').eq(0).attr('checked', 'checked');

    }, 'json');
});
$searchProduct.on('keydown', function (e) {

    setTimeout(function () {
        var search = $searchProduct.val();
        $return = [];
        strInArray(search, products);
        if (search == '' || !$('input').val) {
            productTable.html('').slideUp();
        } else {
            productTable.html($return).slideDown();
        }
        $('.productSelected').eq(0).attr('checked', 'checked');
    });
});

function strInArray(str, products) {

    for (var j = 0; j < products.length; j++) {
        if (products[j].name.toLowerCase().match(str)) {
            console.log(products[j].name)
            $return.push("<tr>" +
                "<td>" + products[j].name + "</td>" +
                "<td>" + '<a target="_blank" href="'+ $('#productsProviderUrl').data('urlproduct') + '/ver-producto/' + products[j].id +'">Ver' + "</a></td>" +
                "<td><input style='opacity:1' value='" + products[j].id + "' name='product_id' type='radio' class='productSelected'></td>" +
                "</tr>"
            );
        }
    }

}

