var $closeToMe =$('#CloseToMe');

$closeToMe.on('click',function(e){
    e.preventDefault();
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success,error);
    }
    return false;
});

function success(position) {
    var url = $closeToMe.data('url') + '?lng='+ position.coords.longitude +'&lat=' + position.coords.latitude;
    window.location.replace(url);
}
function error(msg) {
    console.log(msg);

}