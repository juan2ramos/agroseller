$('#roles').on('change',function(){
    if($(this).val() == 5)
    $.get('agentsGet',function(data){
        console.log(data)
    });
});