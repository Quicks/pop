<?php
  namespace Formats;
  require_once 'format.php';
  require_once './Parsers/json.php';
  require_once './Views/geojson.php';
  use \Parsers\Json as JsonParser;
  use \Views\GeoJson as GeoJsonView;

  class GeoJson extends Format
  {

      public function formatedData(){
          $parser = new JsonParser();
          $users = $parser->parse();
          return GeoJsonView::index($users);
      }
  }


?>
