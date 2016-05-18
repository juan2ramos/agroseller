var $name = $('.Forms input , .Forms textarea');

$name.on('focus', function() {
    $(this).parent('label').addClass('open');
}).blur(function() {
    if( $.trim($(this).val()) == ""){
        $(this).parent('label').removeClass('open');
    }
});
