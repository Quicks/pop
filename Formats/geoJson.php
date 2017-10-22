<?php
  namespace Formats;
  require_once 'format.php';
    require_once './Parsers/json.php';
    require_once './Views/json.php';
    use \Parsers\Json as JsonParser;
    use \Views\Json as JsonViews;

  class GeoJson extends Format
  {
    public function retrieveData(){

    }

    public function formatedData(){
        $parser = new JsonParser();
        $users = $parser->parse();

        $data = array_map(function ($user) {
            return $user->asGeoJson();
        }, $users);

        echo json_encode($data);
    }
  }


?>
