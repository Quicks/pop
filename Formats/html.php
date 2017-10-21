<?php
  namespace Formats;
  require_once 'format.php';

  require_once './Parsers/json.php';
  require_once './Views/html.php';

  use \Parsers\Json as JsonParser;
  use \Views\Html as HtmlViews;

  class Html extends Format
  {

    public function formatedData(){
      $parser = new JsonParser();
      $users = $parser->parse();
      return HtmlViews::index($users);
    }
  }


?>
