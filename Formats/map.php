<?php
  namespace Formats;
  require_once 'format.php';
  require_once './Views/map.php';
  use \Views\map as mapViews;

  class Map extends Format
  {
    public function retrieveData(){

    }

    public function formatedData(){
      $usersAsString = file_get_contents("./Data/users.json");
      $usersJson = json_decode($usersAsString, true);
        
        $geoJsonFeatures = [];
        
        $geoJsonFeatures = array_map(function($item) {      
          $coordinates = [floatval($item['longtitude']), floatval($item['latitude']) ];
          $answer = [ "type" => "Feature",
                  "geometry" => ["type" => "Point", "coordinates" => $coordinates,],
                  "properties" => ["name" => $item['name']]
                  ];
                
          return $answer;
        }, $usersJson);

    $geoJson = json_encode(['type' => 'FeatureCollection', 'features' => $geoJsonFeatures]);


   return mapViews::index($geoJson);
  }
}


?>
