<?php
  namespace Views;
  require_once 'view.php';
  class Json extends View
  {
    public static function index($users){
      $persons = array_map(function($user){
        return $user->asJson();
      }, $users);
      echo json_encode($persons);

      // return View::render('persons/json/index', array('users' => $users));
    }
  }
