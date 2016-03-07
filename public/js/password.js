var $pass = $('#passStrength');
$('#password').keyup(function(e) {
    var strongRegex = /^.*(?=.{10,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%·?¿()&*]).*$/;
    var mediumRegex = /^.*(?=.{6,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%·?¿()&*]).*$/;
    var enoughRegex = new RegExp("(?=.{6,}).*", "g");

    if (false == enoughRegex.test($(this).val())) {
        $pass.css('background-color','#e08585');
        $pass.css('width','20%');
    } else if (strongRegex.test($(this).val())) {
        $pass.css('background-color','#75f09e');
        $pass.css('width','90%');
    } else if (mediumRegex.test($(this).val())) {
        $pass.css('background-color','#f0a875');
        $pass.css('width','60%');
    } else {
        $pass.css('background-color','#e08585');
        $pass.css('width','20%');
    }
    return true;

});