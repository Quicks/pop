
<?php
  ini_set( 'error_reporting', E_ALL );
  ini_set( 'display_errors', true );
  include("Handlers/request.php");
  use Handlers\Request as Request;
  $media = isset($_GET['media']) ? $_GET['media'] : 'html';
  $request = new Handlers\Request($media);
  $request->call();


  if($media == 'map'){
    ?>
    <script
      src="https://code.jquery.com/jquery-3.2.1.min.js"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"></script>

    <script>

    function GeoJsonFactory(){
      var geoScelleton = makeGeoSceleton();
      this.make = function(users){
        geoScelleton.features = users.map(function(item){
          return {
            "type": "Feature",
            "geometry": {
              "type": "Point",
              "coordinates": [parseFloat(item.coordinates.lng), parseFloat(item.coordinates.lat) ]
            },
            "properties": {
              "name": item.fullname
            }
          }
        })
        return geoScelleton;
      }

      function makeGeoSceleton(){
        return {
          type: 'FeatureCollection',
          features: []
        }
      }
    }

    function initMap(){
      var centerOfUkraine = {lat: 49.214015, lng: 31.277871};
       var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 6,
        center: centerOfUkraine
      });

      $.ajax({
        url: '/dev/pop/?media=geoJson',
        success: function(response){
          var users = JSON.parse(response);

          map.data.addGeoJson(users);
        }
      })
    }


    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgQ9WJWcl4Pi3mYKGWcjvAK2xElJJ6dV4&callback=initMap">
    </script>
    <?php
  }
?>
