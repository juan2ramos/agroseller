var markers = [];
var map;
function initMap() {

    var myLatlng = new google.maps.LatLng(4.716397271832087, -74.13149477499996);
    var mapOptions = {
        zoom: 4,
        center: myLatlng,
        scrollwheel: false,
    }
    var idMap = document.getElementById("map");
    map = new google.maps.Map(idMap, mapOptions);

    var locations =$('#map').data('location').split(";");
    var length = locations.length - 1;
    for(var i = 0; i < length; i++){
        var location = locations[i].split('&');

        var myLatLng = {lat: Number(location[0]), lng: Number(location[1])};
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });

    }


    /*google.maps.event.addListener(map, 'dragend', function () {
     alert(map.getCenter());
     });*/

}

$('.Shopping').on('click',function(){
    $('.YouCart').addClass('show');
    $('.YouCart-content').addClass('show');
});
$('.YouCart-closed  ').on('click',function(){
    $('.YouCart').removeClass('show');
    $('.YouCart-content').removeClass('show');
});
function getTime() {
    now = new Date();
    alert(now);
    date = $('#date').data('time').split(" ");
    date = date[0].split("-");
    daysF = date[2].split(" ");
    now = new Date();
    y2k = new Date(parseInt(date[0]),parseInt(date[1])-1,parseInt(daysF[0]),23,59,59);
    days = (y2k - now) / 1000 / 60 / 60 / 24;

    daysRound = Math.floor(days);
    hours = (y2k - now) / 1000 / 60 / 60 - (24 * daysRound);
    hoursRound = Math.floor(hours);
    minutes = (y2k - now) / 1000 /60 - (24 * 60 * daysRound) - (60 * hoursRound);
    minutesRound = Math.floor(minutes);
    seconds = (y2k - now) / 1000 - (24 * 60 * 60 * daysRound) - (60 * 60 * hoursRound) - (60 * minutesRound);
    secondsRound = Math.round(seconds);

    $('#dayNumber').html((zero(daysRound))+'<span> Dias</span>');
    $('#hourNumber').html(zero(hoursRound)+'<span>:</span>');
    $('#minNumber').html(zero(minutesRound)+'<span>:</span>');
    $('#secNumber').html(zero(secondsRound));

    newtime = window.setTimeout("getTime();", 1000);
}
function zero(data){
    if (data < 10)
        return '0'+data;
    return data;
}
function parse(str) {
    if(!/^(\d){8}$/.test(str)) return "invalid date";
    var y = str.substr(0,4),
        m = str.substr(4,2),
        d = str.substr(6,2);
    return new Date(y,m,d);
}
window.setTimeout("getTime();", 1000);