var $name = $('.Forms input , .Forms textarea');

$name.focus(function() {
    $(this).parent('label').addClass('open');
}).blur(function() {
    if( $.trim($(this).val()) == ""){
        $(this).parent('label').removeClass('open');
    }
});
