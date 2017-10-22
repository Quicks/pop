function initMap(){
    var centerOfUkraine = {lat: 49.214015, lng: 31.277871};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 6,
        center: centerOfUkraine
    });

    $.ajax({
        url: '/pop/?media=geoJson',
        success: function(response){
            var jsonData = JSON.parse(response);
            map.data.addGeoJson({type: 'FeatureCollection',features:jsonData});

        }
    })
}