<?php
  namespace Formats;
  require_once 'format.php';

  class Map extends Format
  {
    public function retrieveData(){

    }

    public function formatedData(){
      echo '<div id=\'map\' style=\'height: 500px\'>';
       echo '</div>';
    }
  }


?>