<?php
  namespace Formats;
  require_once 'format.php';

  class Map extends Format
  {
    public function retrieveData(){

    }

    public function formatedData(){
      echo '<script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
          <div id="map" style="height: 500px">

          </div>
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
                type: "FeatureCollection",
                features: []
              }
            }
          }

          function initMap(){
            var centerOfUkraine = {lat: 49.214015, lng: 31.277871};
             var map = new google.maps.Map(document.getElementById("map"), {
              zoom: 6,
              center: centerOfUkraine
            });

            $.ajax({
              url: "/pop/?media=json",
              success: function(response){
                var users = JSON.parse(response);
                var geoFactory = new GeoJsonFactory();
                var usersAsGeoJson = geoFactory.make(users);
                map.data.addGeoJson(usersAsGeoJson);
              }
            })
          }


          </script>
          <script async defer
              src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgQ9WJWcl4Pi3mYKGWcjvAK2xElJJ6dV4&callback=initMap">
          </script>';
    }
  }
?>
