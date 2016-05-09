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
        success :   function (data) {

            var html = "";
            var questions = data.questions;

            var setPhoto = function(photo){
                var image = index + "/images/" + photo;
                if(photo == ''){
                    image = index + "/images/user.png";
                }
                return image;
            };

            for(var i = 0; i < questions.length; i++){
                var texts = questions[i].texts;
                var photo = setPhoto(texts[0].user.photo);
                html += "<li class='row'>" +
                            "<figure>" +
                                "<img src='" + photo + "'>" +
                            "</figure>" +
                            "<div class='Comments-user'>" +
                                "<h5>" +
                                    texts[0].user.name + " " + texts[0].user.second_name + " " + texts[0].user.last_name + " " + texts[0].user.second_last_name +
                                    "<time> • " +  texts[0].date + "</time>" +
                                "</h5>" +
                                "<p>" + texts[0].description + "</p>" +
                            "</div>";
                        for(var j = 1; j < texts.length; j++){
                            photo = setPhoto(texts[j].user.photo);

                            html += "<ul class='col-12' style='padding-left:3.8rem; margin-bottom: 5px'>" +
                                        "<li class='row' style='margin-bottom: 0'>" +
                                            "<figure>" +
                                                "<img src='" + photo + "'>" +
                                            "</figure>" +
                                            "<div class='Comments-user'>" +
                                                "<h5>" +
                                                    texts[j].user.name + " " + texts[j].user.second_name + " " + texts[j].user.last_name + " " + texts[j].user.second_last_name +
                                                    "<time> • " +  texts[j].date + "</time>" +
                                                "</h5>" +
                                                "<p>" + texts[j].description + "</p>" +
                                            "</div>" +
                                        "</li>" +
                                    "</ul>";
                        }
                html +=
                        "</li>";
            }

            $('#reload').html(html);

        },
        error   :   function() {
            alert("Error");
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

