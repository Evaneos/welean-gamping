function screenResize() {
    jQuery('#map, .semi.right').height(jQuery(window).height() - jQuery('#header').height());
}
jQuery(window).resize(function() {
    screenResize();
});

jQuery(document).ready(function() {
    screenResize();
    var justForIE = document.namespaces;

    var mapOpts = {
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      scaleControl: true,
      scrollwheel: true
    }
    var map = new google.maps.Map(document.getElementById("map"), mapOpts);

    var infoWindow = new google.maps.InfoWindow();
    var markerBounds = new google.maps.LatLngBounds();
    var markerArray = [];
    var pointsArray = [];

    function makeMarker(options){
        var iconBase = '/images/ico_marker.png';
        var myMarkerImage = new google.maps.MarkerImage(iconBase);
        options.center = options.center || options.position;
        if (options.radius) {
            var pushPin = new google.maps.Circle({map:map, icon:myMarkerImage});
        }
        else {
            var pushPin = new google.maps.Marker({map:map, icon:myMarkerImage});
        }

        pushPin.setOptions(options);

        google.maps.event.addListener(pushPin, "click", function(){
            infoWindow.setOptions(options);
            infoWindow.open(map, pushPin);
            if(this.sidebarButton) {
                this.sidebarButton.button.focus();
                jQuery('#host-list').find('.host_place').removeClass('focus');;
                jQuery(this.sidebarButton.button).addClass('focus');
            }
        });

        if (options.sidebarItem){
            pushPin.sidebarButton = new SidebarItem(pushPin, options);
            pushPin.sidebarButton.addIn("host-list");
        }

        markerBounds.extend(options.position);
        markerArray.push(pushPin);
        pointsArray.push(options.center);
        return pushPin;
    }

    google.maps.event.addListener(map, "click", function(){
        infoWindow.close();
    });

    function SidebarItem(marker, opts){
        var tag = opts.sidebarItemType || "div";
        var image = opts.image || "";
        var author_image = opts.author_image || "";

        var row = document.createElement(tag);
        row.className = "host_place";


        var imgStr = image=='' ? '' : '<img src="' + image + '" class="bg" />';
        var imgAuthorStr = author_image=='' ? '' : '<img src="' + author_image + '" class="author" />';

        var html = imgStr + imgAuthorStr + '<div class="in"><h3>' + opts.sidebarItem + '</h3><a href=""><i class="icon-zoom-in"></i> Plus de détails</div>';

        row.innerHTML = html;
        row.className = opts.sidebarItemClassName || "host_place";

        row.onclick = function(){
            google.maps.event.trigger(marker, 'click');
        }
        row.onmouseover = function(){
            google.maps.event.trigger(marker, 'mouseover');
        }
        row.onmouseout = function(){
            google.maps.event.trigger(marker, 'mouseout');
        }
        this.button = row;
    }

    SidebarItem.prototype.addIn = function(block){
        if (block && block.nodeType == 1) {
            this.div = block;
        }
        else {
            this.div = document.getElementById(block);
        }

        // this.div.appendChild(this.button);
        var b = jQuery(this.button).appendTo(this.div);
           b.css('opacity', 0).css('marginTop', '50px')
            .delay(500)
            .animate({opacity:1, marginTop:'10px'}, 400);
    }
    SidebarItem.prototype.remove = function(){
        if(!this.div) {
            return false;
        }

        this.div.removeChild(this.button);
        return true;
    }

    // Juste get info from server and push the w/ the makeMarker method
    makeMarker({
        position: new google.maps.LatLng(43.139904,5.847656),
        title: "Ollioules",
        sidebarItem: "Ollioule aka JulieCity",
        image: 'http://www.gamping.com/wp-content/uploads/2013/11/P10109951-716x287.jpg',
        content: "La ville de l'olive",
        host : 'Patricia T.',
        author_image:'http://www.gamping.com/wp-content/authors/patou0526@yahoo.fr-1161-1384610599.jpg'
    });
    makeMarker({
        position: new google.maps.LatLng(48.857261,2.335968),
        title: "Paname",
        sidebarItem: "Paris ville lumière",
        image: 'http://www.gamping.com/wp-content/uploads/2013/11/P10109951-716x287.jpg',
        content: "Un petit coin de paradis pour les amoureux du camping",
        host : 'Patricia T.',
        author_image:'http://www.gamping.com/wp-content/authors/patou0526@yahoo.fr-1161-1384610599.jpg'
    });
    makeMarker({
        position: new google.maps.LatLng(40.712655,-74.003906),
        title: "Nouyôrk",
        sidebarItem: "Nouille Orc",
        image: 'http://www.gamping.com/wp-content/uploads/2013/11/P10109951-716x287.jpg',
        content: "Grand espace vert naturel",
        host : 'Patricia T.',
        author_image:'http://www.gamping.com/wp-content/authors/patou0526@yahoo.fr-1161-1384610599.jpg'
    });

    map.fitBounds(markerBounds);
    // var poly = new google.maps.Polyline({path:pointsArray, map:map});
})
