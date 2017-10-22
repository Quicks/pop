<?php
namespace Views;
require_once 'view.php';
class GeoJson extends View
{
    public static function index($users){
        $persons = array_map(function($user){
            return $user->asGeoJson();
        }, $users);

        $res = [
            'type' => 'FeatureCollection',
            'features' => $persons
        ];
        echo json_encode($res);
    }


}
