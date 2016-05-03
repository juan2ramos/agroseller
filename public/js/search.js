var search = $('#input-search');
var result;
var marginSearch;
var query = [];
searchInit();

search.on('keyup', function(){
    if(search.val()){
        $(this).siblings().slideDown(200);
        searchQuery();
    }
    else{
        $(this).siblings().slideUp(200);
    }
});

search.focus(function(){
    $('.autocomplete-result').children().remove();
    $(this).siblings().slideDown(200);
    searchQuery();
});

search.focusout(function(){
  $(this).siblings().slideUp(200);
  $('.autocomplete-result').children().remove();
});

function searchInit(){
    search.wrap('<div class="autocomplete"></div>');
    $('<ul class="autocomplete-result"></ul>').appendTo('.autocomplete');
    result = $('.autocomplete-result');
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
            console.log(json.products);
            var productsJson = json.products;

            $('.autocomplete-result').children().remove();

            for (var i = 0; i < productsJson.length; i++) {
                result.append('<li class="thisSearch"></li>');
                    $('.thisSearch')
                        .append('<div class="autocomplete-result-image"><img src="' + productsJson[i].icon + '"></div>')
                        .append('<span class="autocomplete-result-text">' + productsJson[i].name + '</span>')
                        .removeClass('thisSearch');
            }
        }
    });
}