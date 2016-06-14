var $name = $('.Forms input , .Forms textarea');

for(var i = 0; i < $name.length; i++){
    if($name.eq(i).val())
        $name.eq(i).parent('label').addClass('open');
}

$name.on('focus', function() {
    $(this).parent('label').addClass('open');
    $(this).siblings('.password-validator').show();
}).blur(function() {
    if( $.trim($(this).val()) == "")
        $(this).parent('label').removeClass('open');
    $(this).siblings('.password-validator').hide();
}).on('change', function(){
    $(this).parent('label').addClass('open');
});

var $password = $('.Forms .password input');
$password.keyup(function(e){
    var value = $(this).val(),
        numbers = new RegExp('[0-9]'),
        lower = new RegExp('[a-z]'),
        upper = new RegExp('[A-Z]'),
        chars = new RegExp('[-*?!@#$/(){}=.,;:]'),
        size = value.length >= 6,
        list = $('.password .rules-list li'),
        changeState = function(bool, pos){
            var element = list.eq(pos);
            if(bool) element.children().removeClass('visible').siblings('.icon_valid').addClass('visible');
            else element.children().removeClass('visible').siblings('.icon_invalid').addClass('visible');
        };

    changeState(size, 0);
    changeState(upper.test(value), 1);
    changeState(lower.test(value), 2);
    changeState(numbers.test(value), 3);
    changeState(chars.test(value), 4);
});