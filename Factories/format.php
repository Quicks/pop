<?php
  namespace Factories;

  include './Formats/html.php';
  include './Formats/json.php';
  include './Formats/xml.php';
  include './Formats/map.php';

  use \Formats\Html as Html;
  use \Formats\Json as Json;
  use \Formats\Xml as Xml;
  use \Formats\Map as Map;

  class Format
  {
    private $type;
    function __construct($type)
    {
      $this->type = $type;
    }

    public function make(){
      switch ($this->type) {
        case 'html':
          return new Html();
          break;
        case 'json':
          return new Json();
          break;
        case 'xml':
          return new Xml();
          break;
        case 'map':
          return new Map();
          break;
        default:
          return new Html();
      }
    }
  }
  // Есть у нас список людей вот такого формата
  // create table MOCK_DATA ( id INT, name VARCHAR(50), surname
  // VARCHAR(50), latitude VARCHAR(50), longtitude VARCHAR(50), shirt
  // VARCHAR(50), is_paid VARCHAR(50), movie VARCHAR(50)
  // );
  //
  // хотим показывать его в таких вариантах
  // - просто таблица host/?media=html
  // - json host/?media=json
  // - xml (host/?media=xml)
  // - html с картой (host/ либо host/?media=map)
  //
  // Filters
  // - movie
