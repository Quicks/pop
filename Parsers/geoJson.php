<?php
  namespace Parsers;
  require_once 'parser.php';
  require_once './Models/person.php';

  use \Models\Person as Person;

  class geoJson extends Parser
  {
    public function parse(){
      $usersAsString = file_get_contents("./Data/users.json");
      $usersJson = json_decode($usersAsString, true);

      $geoJsonFeatures = array_map(function($item) {      
          return [ 
            "type" => "Feature",
            "geometry" => 
              [ "type" => "Point", 
                "coordinates" => [floatval($item['longtitude']), floatval($item['latitude']) ],
              ],
            "properties" => ["name" => $item['name']]
          ];
        }, $usersJson);

    return json_encode(['type' => 'FeatureCollection', 'features' => $geoJsonFeatures]);
    }
  }

?>
