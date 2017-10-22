<?php
/**
 * Created by PhpStorm.
 * User: unadm
 * Date: 22.10.17
 * Time: 14:58
 */
namespace Views;
require_once 'view.php';

class GeoJson extends View
{
    public static function index($data){
        echo json_encode($data);
    }

}