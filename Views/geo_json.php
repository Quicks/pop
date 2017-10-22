<?php
namespace Views;
require_once 'view.php';
class GeoJson extends View
{
    public static function index($users){
        $geoJson = [
            'type' => 'FeatureCollection',
            'features' => $users
        ];
        echo json_encode($geoJson);

        // return View::render('persons/json/index', array('users' => $users));
    }
}
