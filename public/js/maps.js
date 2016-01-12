var markers = [];
var map;
function initMap() {

    var myLatlng = new google.maps.LatLng(4.716397271832087, -74.13149477499996);
    var mapOptions = {
        zoom: 4,
        center: myLatlng,
        scrollwheel: false,
    }
    map = new google.maps.Map(document.getElementById("map"), mapOptions);


    /*google.maps.event.addListener(map, 'dragend', function () {
     alert(map.getCenter());
     });*/

}
$('#addMaker').on('click', function () {
    markers.push(new google.maps.Marker({
        position: map.getCenter(),
        map: map,
        animation: google.maps.Animation.DROP,
        draggable: true
    }));
});

function setMapOnAll(map) {
    console.log(markers.length)
    for (var i = 0; i < markers.length; i++) {
        console.log('f');
        markers[i].setMap(map);
    }
}
$('#removeMaker').on('click', function () {
    setMapOnAll(null);
    markers = [];
});


$('#Provider-form').on('submit', function () {

    var pos = '';
    for (var i = 0; i < markers.length; i++) {
        pos += markers[i].getPosition().lat() + '&' + markers[i].getPosition().lng() + ';';

    }
    $('#Location').val(pos)

});