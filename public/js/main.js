$(document).ready(function () {
    var $arrowProfile = $('#Profile-arrow');
    var $HeaderBackProfile = $('.HeaderBack-profile');

    $arrowProfile.on('click',function(){
        $HeaderBackProfile.toggleClass('HeaderBack-profileOpen')
    });

    function VoteForm(form, button) {


        var id = button.data('id');
        var action = form.attr('action').replace(':id', id);
        var tr = button.parents('tr');

        this.submit = function (success) {
            $.post(action, form.serialize(), function (response) {
                console.log(response);
                success(response);
                tr.hide();
            }).fail(function () {
                button.removeClass('hidden');
                alert('Ocurrió un error :(');
            });
        };
    }

    $('.CategoryDelete').click(function (e) {
        e.preventDefault();

        var voteForm = new VoteForm($('#FormDeleteCategory'), $(this));

        voteForm.submit(function (response) {
            if (response.success) {
                alert('¡Gracias por tu voto!');
            }else {

            }

        });
    });

    //*********************** POPUP "Completar datos Proveedor" **************************//

    $('.MessagePlatform-close').on('click', function (){
        $('.MessagePlatform').hide();
    });

    $('#Notify img,#Notify span').on('click',function(){
        $('#NotifyList').toggleClass('open');
    });
    $('#NotifyList li a ').on('click',function(event){
        event.stopPropagation();
        console.log($('#NotifyList').data('route'))
        $target = $(this);
        console.log($target.attr('href'))
        $.post( $('#NotifyList').data('route'), { id: $(this).data('id'), _token: $('#tokenNotify').val() }, function(response){
            if(response.success){
                $(window).attr('location', $target.attr('href'));
            }
        });
        return false;
    });

    function thousand(n) {
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
});