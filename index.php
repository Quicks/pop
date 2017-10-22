
<?php
  ini_set( 'error_reporting', E_ALL );
  ini_set( 'display_errors', true );
  include("Handlers/request.php");
  use Handlers\Request as Request;
  $media = isset($_GET['media']) ? $_GET['media'] : 'html';
  $request = new Handlers\Request($media);
  $request->call();


  if($media == 'map'){

	  $usersAsString = file_get_contents("./Data/users.json");
	  $usersJson = json_decode($usersAsString, true);
  	  
  	  $geoJsonFeatures = [];
  	  
  	  $geoJsonFeatures = array_map(function($item) {  	  
  	  	$coordinates = [floatval($item['longtitude']), floatval($item['latitude']) ];
  	  	$answer = [	"type" => "Feature",
            		"geometry" => ["type" => "Point", "coordinates" => $coordinates,],
            		"properties" => ["name" => $item['name']]
            		];
              
        return $answer;
      }, $usersJson);

	$geoJson = json_encode(['type' => 'FeatureCollection', 'features' => $geoJsonFeatures]);


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
?>
