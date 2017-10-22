
<?php
  ini_set( 'error_reporting', E_ALL );
  ini_set( 'display_errors', true );
  include("Handlers/request.php");
  use Handlers\Request as Request;
  $media = isset($_GET['media']) ? $_GET['media'] : 'html';
  $request = new Handlers\Request($media);
  $request->call();
?>
