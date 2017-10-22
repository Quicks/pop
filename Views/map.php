<?php
  namespace Views;

  class map 
  {
    public static function index($geoJson){
     ?>
      <div id='map' style='height: 500px'></div>

      <script>
      function initMap(){
        var centerOfUkraine = {lat: 49.214015, lng: 31.277871};
         var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
          center: centerOfUkraine
        });
         <?php echo "var geoJSOBJ = ".$geoJson.";" ?>
        
        map.data.addGeoJson(geoJSOBJ);
      }


      </script>
      <script async defer
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgQ9WJWcl4Pi3mYKGWcjvAK2xElJJ6dV4&callback=initMap">
      </script>
    <?php
  }
}