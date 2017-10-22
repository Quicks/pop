<?php
  namespace Formats;
  require_once 'format.php';
  require_once './Parsers/geojson.php';
  use \Parsers\geoJson as geoJsonParser;
  require_once './Views/map.php';
  use \Views\map as mapViews;

  class Map extends Format
  {
    public function retrieveData(){

    }

    public function formatedData(){
      $parser = new geoJsonParser();
      $geoJson = $parser->parse();                
    return mapViews::index($geoJson);
  }
}


?>
