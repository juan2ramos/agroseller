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

    var $name = $('.Checkout-form input');

    $name.focus(function() {
        $(this).parent('label').addClass('open');
    }).blur(function() {
        if( $.trim($(this).val()) == ""){
            $(this).parent('label').removeClass('open');
        }
    });
});
