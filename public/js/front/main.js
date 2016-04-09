$(document).ready(function () {
    $('#Menu').on('click', function(){
        $('#MenuContainer').addClass('Show');
        $('body').scrollTop( 0 );
        $('body').css('overflow', 'hidden')
    });

    $('#CartButton').on('click', function(){
        $('#CartContainer').addClass('Show');
        $('body').scrollTop( 0 );
        $('body').css('overflow-y', 'hidden')
    });


    $('.LightBoxContent-close').on('click', function(){
        $('.LightBoxContent').removeClass('Show');
        $('body').css('overflow-y', 'scroll')
    });

    var $name = $('.Checkout-form input, .Form-Control input, .Form-Control textarea');

    $name.focus(function() {
        $(this).parent('label').addClass('open');
    }).blur(function() {
        if( $.trim($(this).val()) == ""){
            $(this).parent('label').removeClass('open');
        }
    });

    var $message = $("[class*='-message']");
    $message.on('click', function(){
        $(this).addClass('hidden').slideUp(600);
    });

    var $question = $('.container_questions_item .question span');
    $question.on('click', function(){
        $(this).siblings().slideToggle();
    });

});
