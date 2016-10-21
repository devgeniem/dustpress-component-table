document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByClassName('dustpress-component-gmaps');

    for ( var i = 0; i < elements.length; i++ ) {    
        var counter = elements[i].getAttribute('data-counter');

        map = new google.maps.Map(elements[i], {
            center: {lat: parseFloat( window['dustpress_components_google_maps_' + counter].map.lat ), lng: parseFloat( window['dustpress_components_google_maps_' + counter].map.lng ) },
            zoom: parseInt( window['dustpress_components_google_maps_' + counter].zoom ),
        });

        var marker = new google.maps.Marker( {
            position: {lat: parseFloat( window['dustpress_components_google_maps_' + counter].map.lat ), lng: parseFloat( window['dustpress_components_google_maps_' + counter].map.lng ) },
            title: "Location",
            visible: true
        } );
        marker.setMap(map);
    }
});