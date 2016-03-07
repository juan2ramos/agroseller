$('#password').keyup(function(e) {
    var strongRegex = /^.*(?=.{10,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%·?¿()&*]).*$/;
    var mediumRegex = /^.*(?=.{6,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%·?¿()&*]).*$/;
    var enoughRegex = new RegExp("(?=.{6,}).*", "g");

    if (false == enoughRegex.test($(this).val())) {
        $('#passstrength').html('Minímo 6 Caracteres');
    } else if (strongRegex.test($(this).val())) {
        $('#passstrength').html('Fuerte!');
    } else if (mediumRegex.test($(this).val())) {
        $('#passstrength').html('Mediana!');
    } else {
        $('#passstrength').html('Débil!');
    }
    return true;

});