<?php
  namespace Views;
  require_once 'view.php';

  class Html extends View
  {
    public static function index($users){
      foreach ($users as $key => $value) {
        echo '<div class="json">';
        echo 'Name: '.$value->fullName();
        echo '<br>';
        echo 'Coordinates: '.json_encode($value->coordinates());
        echo '</div>';
      }
    }
  }
