var $check = $('#checkAgent'),
    $roles = $('#roles');

$roles.on('change', function () {
    if ($(this).val() == 5) {
        var checkHtml = '<p>Asignar a:</p> <hr>';
        $.get('agentsGet', function (agents) {
            for (var k in agents) {

                checkHtml += '<label>' +
                    '<input type="radio" name="agent" value="' +
                    agents[k]['user_id'] +
                    '">' +
                    '<sub></sub>' +
                    agents[k]['name'] + ' asignado a: ' + agents[k]['user']['name'] +
                    '</label>';
            }
            console.log(agents);
            $check.append(checkHtml)
        });
    } else {
        $check.html('');
    }

});