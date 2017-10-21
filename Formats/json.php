<?php
  namespace Formats;
  require_once 'format.php';
  require_once './Parsers/json.php';
  require_once './Views/json.php';
  use \Parsers\Json as JsonParser;
  use \Views\Json as JsonViews;

  class Json extends Format
  {
    
    public function formatedData(){
      $parser = new JsonParser();
      $users = $parser->parse();
      return JsonViews::index($users);
    }
  }


?>
