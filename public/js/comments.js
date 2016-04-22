addComment = function(comment, product_id, user_id, url, index){
    var param = {
        'comment'       :   comment,
        'product_id'    :   product_id,
        'user_id'       :   user_id,
        'index'         :   index
    };

    $("#commentBox").val('');

    $.ajax({
        data:  param,
        url:   url,
        type:  'post',
        success:  function (data) {
            $("#reload").html(data);
        }
    });
};
