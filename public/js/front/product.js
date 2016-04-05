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

/************************ CONTADOR **************************/

var $date;
function getTime() {
    now = new Date();
    promo = new Date($date["year"],$date["month"],$date["day"],$date["hour"], $date["minute"], 59);
    substraction = promo - now;

    if(substraction > 0) {
        days = Math.floor(substraction / 1000 / 60 / 60 / 24);
        hours = Math.floor(substraction / 1000 / 60 / 60 - (24 * days));
        minutes = Math.floor(substraction / 1000 /60 - (24 * 60 * days) - (60 * hours));
        seconds = Math.floor(substraction / 1000 - (24 * 60 * 60 * days) - (60 * 60 * hours) - (60 *  minutes));

        $('#dayNumber').html((zero(days))+'<span> Dias </span>');
        $('#hourNumber').html(zero(hours)+'<span>:</span>');
        $('#minNumber').html(zero(minutes)+'<span>:</span>');
        $('#secNumber').html(zero(seconds));

        newtime = window.setTimeout("getTime();", 1000);
    }

    else {
        $('.timer').css('display', 'none');
    }
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

function countDown(date){
    date['month'] -= 1;

    if(date['hour'] == undefined){
        date['hour'] = 23;
    }
    if(!date['minute'] == undefined){
        date['minute'] = 59;
    }

    $date = date;
}

window.setTimeout("getTime();", 1000);