addComment = function(comment, product_id, user_id, url, index){

    var token = $('#token').val();

    var param = {
        'comment'       :   comment,
        'product_id'    :   product_id,
        'user_id'       :   user_id,
        'index'         :   index,
        '_token'         :   token
    };

    $('#commentBox').val('');
    var globalData;

    $.ajax({
        url     :   url,
        type    :  'POST',
        dataType:  'json',
        data    :   param,
        success :   function (datos) {

            var html = "";
            var texts = datos.texts;
            var users = datos.users;
            var dates = datos.dates;
            console.log(dates[0]);

            for(var i = 0; i < texts.length; i++){

                var photo = index + "/images/" + users[i].photo;
                if(users[i].photo == ""){
                    photo = index + "/images/user.png";
                }

                html += "<li class='row'>" +
                            "<figure>" +
                                "<img src='" + photo + "'>" +
                            "</figure>" +
                            "<div class='Comments-user'>" +
                                "<h5>" +
                                    users[i].name + " " + users[i].second_name + " " + users[i].last_name + " " + users[i].second_last_name +
                                    "<time> • " +  dates[i] + "</time>" +
                                "</h5>" +
                                "<p>" + texts[i].description + "</p>" +
                            "</div>" +
                        "</li>";
            }

            $('#reload').html(html);

        },
        error   :   function(e) {
            alert("Error en el servidor, por favor, intentalo de nuevo mas tarde: " + e);
        }
    });
};






       /*     for(var i = 0; i < data.length; i++){
                var obj = data[i];
                for(var key in obj){
                    var attrName = key;
                    var attrValue = obj[key];
                }
            }*/

            /*
             texts = "";
             users = "";

            for(var i = 0; i < data.texts.length; i++){
                texts += data.texts[i]['description'];
                if(data.users[i]['photo'] == ""){
                    photos += index + "/images/user.png";
                }
                else{
                    photos += index + data.users[i]['photo'];
                }

                alert(data.users[i]['photo']);
            }*/

            //$("#reload").html("Textos: " + texts + "</br> Usuarios: " + users);

