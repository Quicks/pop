<?php

  namespace Models;

  include_once 'Interfaces/iJsonPresentable.php';
  include_once 'Interfaces/IGeoJson.php';

  use \Interfaces\iJsonPresentable as iJsonPresentable;
  use \Interfaces\iGeoJson as IGeoJson;

  class Person implements iJsonPresentable, IGeoJson
  {
    private $id;
    private $name;
    private $surname;
    private $latitude;
    private $longtitude;
    private $shirt;
    private $is_paid;
    private $movie;

    function __construct($args)
    {
      $this->id = $args['id'];
      $this->name = $args['name'];
      $this->surname = $args['surname'];
      $this->latitude = $args['latitude'];
      $this->longtitude = $args['longtitude'];
      $this->shirt = $args['shirt'];
      $this->is_paid = $args['is_paid'];
      $this->movie = $args['movie'];
    }

    public function fullName(){
      return $this->name.' '.$this->surname;
    }

    public function coordinates(){
      return ['lat' => $this->latitude, 'lng' => $this->longtitude];
    }

    public function getLatitude() 
    {
      return (float) $this->latitude;  
    }
    public function getLongtitude()
    {
      return (float) $this->longtitude;
    }
    
    public function asJson(){
      return [
        'id' => $this->id,
        'fullname' => $this->fullName(),
        'coordinates' => $this->coordinates()
      ];
    }

    public function asGeoJson()
    {
      return [
          "type" => "Feature",
          "geometry" => [
              "type" => "Point",
              "coordinates" => [ "lat" => $this->latitude , "lng" => $this->longtitude]
          ],
          "properties" => [
              "name"=> $this->name
          ]
      ];
    }
  }
