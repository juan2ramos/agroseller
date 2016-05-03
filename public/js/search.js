var search = $('#input-search');
var result;
var marginSearch;
searchInit();


search.on('keyup', function(){

    if(search.val()){
        $(this).siblings().addClass('open');
        searchQuery();
    }
    else $(this).siblings().removeClass('open');

}).focus(function(){
    $(this).siblings().addClass('open');
    searchQuery();

}).focusout(function(){
    $(this).siblings().removeClass('open');
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
            result.children().remove();

            if(json.products.length > 0){
                for (var i = 0; i < json.products.length; i++) {
                    result.append('<li class="thisSearch"></li>');
                        $('.thisSearch')
                            .append('<div class="autocomplete-result-image"><img src="' + json.products[i].icon + '"></div>')
                            .append('<span class="autocomplete-result-text">' + json.products[i].name + '</span>')
                            .removeClass('thisSearch');
                }
            }
            else{
                result.append('<li><span class="no-data">No hay resultados</span></li>');
            }
        }
    });
}