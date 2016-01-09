var markers = [];
var map;
function initMap() {

    var myLatlng = new google.maps.LatLng(4.716397271832087, -74.13149477499996);
    var mapOptions = {
        zoom: 4,
        center: myLatlng
    }
    map = new google.maps.Map(document.getElementById("map"), mapOptions);


    google.maps.event.addListener(map, 'dragend', function () {
        alert(map.getPosition());
    });

}
$('#addMaker').on('click',function(){
    markers.push(new google.maps.Marker({
        position: map.getCenter(),
        map: map,
        animation: google.maps.Animation.DROP,
        draggable: true,
    }));
});