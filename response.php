<?php
  require_once './Interfaces/iRender.php';
  use \Interfaces\iRender as iRender;
  class Response
  {
    public static function printRes(iRender $model){
      // echo $model->formatedData();
    }
  }


?>
