$(document).ready(function () {


    $('.activeProvider').on('change', function () {


        var check = this.checked,
            c = confirm('esta seguro de cambiar el estado actual de proveedor ?');
        if (c) {

            var voteForm = new VoteForm($('#FormUpdateProvider'), $(this));
            voteForm.submit();


        } else {
            if (check) {

                $('this').prop('checked', false);
                return;
            }

            $(this).prop('checked', true);
        }


    });

});

function VoteForm(form, button) {


    var id = button.data('id');
    var action = form.attr('action').replace(':id', id);

    this.submit = function () {
        console.log(id);
        $.post(action, form.serialize(), function (response) {
            console.log(response);

        }).fail(function () {
            button.removeClass('hidden');
            alert('Ocurrió un error :(');
        });
    };
}
