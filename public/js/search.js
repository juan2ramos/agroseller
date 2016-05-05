var search = $('#input-search');
var result;
var marginSearch;
searchInit();

$('html').click(function(){
    search.siblings().removeClass('open');
});

search.on('keyup', function(){

    if(search.val().length > 2){
        $(this).siblings().addClass('open');
        searchQuery();
    }
    else $(this).siblings().removeClass('open');

}).focus(function(){
    if(search.val().length > 2){
        $(this).siblings().addClass('open');
        searchQuery();
    }

}).parent().click(function(e){
    e.stopPropagation();
});

function searchInit(){
    search.wrap('<div class="autocomplete"></div>');
    $('<ul class="result"></ul>').appendTo('.autocomplete');
    result = $('.result');
    marginSearch = -(result.width()/2);
    result.css('margin-left', marginSearch + 'px');
}

function searchQuery(){
    var value   =   search.val();
    var token   =   $('#principalToken').val();
    var route   =   $('#searchRoute').val();

    var input = {
        'value'  : value,
        '_token' : token
    };

    $.ajax({
        url      :  route,
        type     :  'POST',
        dataType :  'json',
        data     :  input,
        success  :  function(json) {
            result.empty();
            if(json.products.length > 0){
                for(var i = 0; i < json.products.length; i++) {
                    var nameItem = String(json.products[i].name.toLowerCase()).replace(value, '<b>' + value + '</b>');
                    var slugItem = '/producto/' + json.products[i].slug;
                    var imageItem = '/uploads/products/' + json.products[i].product_files[0].name;
                    result.append('<li><a class="thisSearch" href="' + slugItem + '"></a></li>');
                    $('.thisSearch')
                        .append('<div class="autocomplete-result-image"><img src="'+ imageItem +'"></div>')
                        .append('<span class="autocomplete-result-text">' + nameItem + '</span>')
                        .removeClass('thisSearch');
                }
            }
            else{
                result.append('<li><span class="no-data">No hay resultados</span></li>');
            }
        }
    });
}