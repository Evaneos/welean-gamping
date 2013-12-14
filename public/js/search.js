// Screen sizing
function screenResize() {
    jQuery('#map, .semi.right').height(jQuery(window).height() - jQuery('#header').height());
}
jQuery(window).resize(function() {
    screenResize();
});

jQuery(document).ready(function() {
    screenResize();
})


// Async google map load
function loadScript() {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initializeMap';
    document.body.appendChild(script);
}

window.onload = loadScript;


// Map settings
var googleMap;
var infowindow;
function initializeMap() {
    var myLatlng = new google.maps.LatLng(45.758796,4.834607);

    // Carte centrée sur le cinéma, zoom 16
    var myMapOptions = {
        zoom: 16,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    // Création de la carte
    googleMap = new google.maps.Map(
        document.getElementById('map'),
        myMapOptions
    );
    infowindow = new google.maps.InfoWindow({maxWidth: 210});
    loadData();
}


// Marker management
var markerList = [];
var idCounter = 0;
var markerPremier = [];
var data;

function makeMarker(data) {
    idCounter++;
    var t = idCounter;

    // Create the marker
    var myMarker = new google.maps.Marker({
        position: data.position,
        map: googleMap,
        title: data.title
    });

    // Create the sidebar item with information
    var imgStr = '<img src="' + data.image + '" class="bg" />';
    var imgAuthorStr = '<img src="' + data.host_picture + '" class="author" />';
    var row = document.createElement('div');
    row.className = "host_place";
    row.id = 'host_marker_'+idCounter;
    row.innerHTML = imgStr + imgAuthorStr + '<div class="in"><h3>' + data.host_name + '</h3><a href=""><i class="icon-zoom-in"></i> Plus de détails</div>';;
    row.className = "host_place";

    // Bind sidebar item to marker in gmap
    row.onclick = function(){
        var latLng = myMarker.getPosition();
        googleMap.setCenter(latLng);
        showMarkerInfo(t);
        highlightVisibleMarkers();
    }

    // Bind gmap marker to sidebar item
    var popupWidth = 210;
    var imgStr = '<img src="' + data.image + '" class="bg" width= "'+ popupWidth+'" />';
    var popupString = imgStr + data.host_name;

    google.maps.event.addListener(googleMap, 'zoom_changed', function() {
        highlightVisibleMarkers();
    });
    google.maps.event.addListener(googleMap, 'dragend', function() {
        highlightVisibleMarkers();
    });

    // Put the arker on the map
    jQuery('#host-list').append(row).toggle().slideDown();

    // Store the data in the global array to get them later
    var markerData = {
        id: idCounter,
        marker: myMarker,
        popup:popupString
    }
    markerList[idCounter]=markerData;

    google.maps.event.addListener(myMarker, 'click', function() {
        showMarkerInfo(t);
        hightlightSizebox(t);
        highlightVisibleMarkers();
    });
}

function showMarkerInfo(i) {
    var marker = markerList[i].marker;
    var id = markerList[i].id;
    var popup = markerList[i].popup;

    infowindow.close();
    infowindow.setContent(popup);
    infowindow.open(googleMap, marker);

    hightlightSizebox(i);
}

// function displaying data from ajax results
function loadData() {

    // Clear the current data if any
    for (var i in markerList) {
        jQuery('#host_marker_' + markerList[i].id).hide(0, function() {
            markerList[i].marker.setMap(null);
        });
    }
    markerList = [];

    // Query from ajax here
    // @TODO

    // Add the marker (here as sample until load is done w/ ajax)
    for(k=0; k<30; k++) {
        var myLatlng = new google.maps.LatLng(45.758796 + Math.random(),4.834607 - Math.random());
        var markerData = {
            position : myLatlng,
            title : 'rr',
            sidebarItem: "Nouille Orc",
            image: 'http://www.gamping.com/wp-content/uploads/2013/11/P10109951-716x287.jpg',
            content: "Grand espace vert naturel",
            host_name : 'Patricia T.',
            host_picture:'http://www.gamping.com/wp-content/authors/patou0526@yahoo.fr-1161-1384610599.jpg'
        }
        makeMarker(markerData);
    }
    highlightVisibleMarkers();
}

function hightlightSizebox(i) {
    var marker = markerList[i].marker;
    var id = markerList[i].id;
    var domId = '#host_marker_' + markerList[i].id;

    jQuery('#host-list .host_place').removeClass('highlighted');
    jQuery(domId).addClass('highlighted');

    // $('#host-list').animate({
    //     scrollTop: $(domId).offset().top
    // }, 2000);
}

function highlightVisibleMarkers() {
    for (var i in markerList){
        var marker = markerList[i].marker;
        var place = jQuery('#host_marker_' + markerList[i].id);
        if( googleMap.getBounds() && googleMap.getBounds().contains(marker.getPosition()) ){
            // place.removeClass('not-visible');
            // jQuery('#host-list').prepend(place);
            place.removeClass('not-visible');
        }
        else {
            place.addClass('not-visible');
        }
    }
}

// For testing only
jQuery('#refresh').click(function(e){
    loadData();
});
