/**
 * Created by andrestntx on 3/22/16.
 */

var searchLocation = function() {

    var mapClass = '.map_canvas';
    var locationInitial = {
        lat: 4.5734296,
        lng: -74.150419,
        title: "Colombia",
        default: true
    };
    var map;
    var mapDiv;

    return {
        init: function() {
            /*
             *  init input text and Map canvas
             */
            initLocation();
            initInputSearch();
        },
        initShowLocation: function() {
            initLocation();
            showLocation();
        }
    };

    function createMap(newLat, newLng){
        map = new google.maps.Map(mapDiv, {
            center: {lat: newLat, lng: newLng},
            zoom: 8
        });

        return map;
    }

    function createPlace(newLat, newLng)
    {
        return new google.maps.LatLng(newLat, newLng);
    }

    function marketMap(place, title)
    {
        return new google.maps.Marker({
            position: place
            , title: title
            , map: map
            , });
    }

    function createAndMarketMap(newLat, newLng, title)
    {
        createMap(newLat, newLng);
        var market = marketMap(createPlace(newLat, newLng), title);

        var popup = new google.maps.InfoWindow({
            content: title});
        popup.open(map, market);
    }

    function getGeoCompleteLocation(){
        if(locationInitial.default) {
            return false;
        }

        return [locationInitial.lat, locationInitial.lng];
    }

    function initLocation()
    {
        if($('.location-init').length){
            locationInitial.lat = $('.location-init input#lat').data('init');
            locationInitial.lng = $('.location-init input#lng').data('init');
            locationInitial.title = $('.location-init input#title').data('init');
            locationInitial.default = false;

            return locationInitial;
        }

        return false;
    }

    function initInputSearch()
    {
        $("form #address").geocomplete({
            map: mapClass,
            types: ["geocode", "establishment"],
            country: "CO",
            details: ".location-details",
            detailsAttribute: "data-geo",
            location: getGeoCompleteLocation(),
            mapOptions: {
                zoom: 14
            }
        });

        if(locationInitial.default){
            var map = $("#address").geocomplete("map"),
                center = new google.maps.LatLng(4.5734296,-74.150419);

            map.setCenter(center);
            map.setZoom(7);
        }
    }

    function showLocation()
    {
        mapDiv = document.getElementById("map_canvas");
        createAndMarketMap(locationInitial.lat, locationInitial.lng, locationInitial.title);
    }

}();