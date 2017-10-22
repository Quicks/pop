<?php
namespace Formats;
require_once 'format.php';
require_once './Parsers/json.php';
require_once './Views/json.php';
require_once './Views/geo_json.php';
require_once './Presenters/User.php';
use \Parsers\Json as JsonParser;
use \Views\GeoJson as GeoJsonViews;
use \Presenters\User as Presenter;

class GeoJson extends Format
{

    public function formatedData(){
        $parser = new JsonParser();
        $users = $parser->parse();

        $geo_users = array_map(function($user){
            return [
                "type" => "Feature",
                "geometry" => [
                    "type" => "Point",
                    "coordinates" => [  $user->getLatitude(), (float) $user->getLongtitude() ]
                ],
                "properties" => [
                    "name"=> $user->fullName()
                ]
            ];
        }, $users);

        return GeoJsonViews::index($geo_users);
    }
}

?>
