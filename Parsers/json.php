<?php
  namespace Parsers;
  require_once 'parser.php';
  require_once './Models/person.php';

  use \Models\Person as Person;

  class Json extends Parser
  {
    public function parse(){
      $usersAsString = file_get_contents("./Data/users.json");
      $usersJson = json_decode($usersAsString, true);

      return array_map(function($userJson) {
        return new Person($userJson);
      }, $usersJson);

    }
  }

?>
