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

    $popup =$('#popup-provider');
    $message = $('#popup-provider').children();

    $message.children('.button').on('click',function(){
        $popup.addClass('close-popup');
    });
});
