$(document).ready(function () {
    $('#Menu').on('click', function(){
        $('#MenuContainer').addClass('Show');
        $('body').scrollTop( 0 );
        $('body').css('overflow', 'hidden')
    });

    $('#CartButton').on('click', function(){
        $('#CartContainer').addClass('Show');
        $('body').scrollTop( 0 );
        $('body').css('overflow', 'hidden')
    });


    $('.LightBoxContent-close').on('click', function(){
        $('.LightBoxContent').removeClass('Show');
        $('body').css('overflow', 'scroll')
    });
});
