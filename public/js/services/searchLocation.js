/**
 * Created by andrestntx on 3/22/16.
 */

var searchLocation = function() {

    return {
        init: function() {
            /*
             *  init input text and Map canvas
             */
            initInputSearch();
        }
    };

    function getInitLocation()
    {
        if($('.location-init').length){
            var lat = $('.location-init input#lat').data('init');
            var lng = $('.location-init input#lng').data('init');

            return [lat, lng];
        }

        return false;
    }

    function initInputSearch()
    {
        $("form #address").geocomplete({
            map: ".map_canvas",
            types: ["geocode", "establishment"],
            country: "CO",
            details: ".location-details",
            detailsAttribute: "data-geo",
            location: getInitLocation(),
            mapOptions: {
                zoom: 14
            }
        });

        if(! getInitLocation()){
            var map = $("#address").geocomplete("map"),
                center = new google.maps.LatLng(4.5734296,-74.150419);

            map.setCenter(center);
            map.setZoom(7);
        }

    }

}();