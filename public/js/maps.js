var arrayMarkers = new Array;
var map;
styleMap = [{
    "featureType": "landscape",
    "elementType": "labels",
    "stylers": [{"visibility": "off"}]
}, {"featureType": "transit", "elementType": "labels", "stylers": [{"visibility": "off"}]}, {
    "featureType": "poi",
    "elementType": "labels",
    "stylers": [{"visibility": "off"}]
}, {"featureType": "water", "elementType": "labels", "stylers": [{"visibility": "off"}]}, {
    "featureType": "road",
    "elementType": "labels.icon",
    "stylers": [{"visibility": "off"}]
}, {"stylers": [{"hue": "#00aaff"}, {"saturation": -100}, {"gamma": 2.15}, {"lightness": 12}]}, {
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [{"visibility": "on"}, {"lightness": 24}]
}, {"featureType": "road", "elementType": "geometry", "stylers": [{"lightness": 57}]}]

function initMap() {
    var myLatlng = new google.maps.LatLng(4.716397271832087, -74.13149477499996);

    var mapOptions = {
        zoom: 4,
        center: myLatlng,

        scrollwheel: false,
        styles: styleMap
    };

    map = new google.maps.Map(document.getElementById("Map"), mapOptions);
}

function addMarker(n) {
    var marker = new google.maps.Marker({
        position: map.getCenter(),
        map: map,
        animation: google.maps.Animation.DROP,
        draggable: true,
        identificador: n
    });

    arrayMarkers.push(marker);

    google.maps.event.addListener(marker, 'dblclick', function () {
        for (var a = 0; a < arrayMarkers.length; a++) {
            if (arrayMarkers[a]['identificador'] == this.identificador) {
                arrayMarkers[a].setMap(null);
                arrayMarkers.splice(a, 1)
            }
        }
    });
}


$('#addMaker').on('click', function () {
    addMarker(arrayMarkers.length);
});


function setMapOnAll(map) {

    for (var i = 0; i < arrayMarkers.length; i++) {
        arrayMarkers[i].setMap(map);
    }
}

$('#removeMaker').on('click', function () {
    setMapOnAll(null);
    arrayMarkers = [];;
});


$('#Provider-form,#Product-form, #Client-form').on('submit', function () {

    var pos = '';
    for (var i = 0; i < arrayMarkers.length; i++) {
        pos += arrayMarkers[i].getPosition().lat() + '&' + arrayMarkers[i].getPosition().lng() + ';';
    }
    $('#Location').val(pos)
});
