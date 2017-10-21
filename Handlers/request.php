<?php
  namespace Handlers;
  include './Factories/format.php';
  use \Factories\Format as Format;
  class Request
  {
    private $media;

    function __construct($media)
    {
      $this->media = $media;
    }

    public function call(){
      $factory = new Format($this->media);
      $model = $factory->make();
      $model->render();
    }
  }
  // people.php
  // <?php
  // namespace People;
  //
  // class People {}
  //
  //
  // // managers.php
  // <?php
  // namespace Managers;
  //
  // require_once __DIR__.'/people.php';
  //
  // class People extends \People\People {}
