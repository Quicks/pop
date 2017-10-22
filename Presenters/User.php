<?php

namespace Presenters;

include_once 'Interfaces/iJsonPresentable.php';
include_once 'Interfaces/IGeoJson.php';

use \Interfaces\iJsonPresentable as iJsonPresentable;
use \Interfaces\iGeoJson as IGeoJson;

class User implements iJsonPresentable, IGeoJson
{
    public $user;
    
    function __constructor($param) {
        $this->user = $param;
    }
    
    
    public function asJson(){
        return [
            'id' => $this->user->id,
            'fullname' => $this->user->fullName(),
            'coordinates' => $this->user->coordinates()
        ];
    }

    public function asGeoJson()
    {
        return [
            "type" => "Feature",
            "geometry" => [
                "type" => "Point",
                "coordinates" => [ (float) $this->user->getLatitude(), (float) $this->user->getLongtitude()]
            ],
            "properties" => [
                "name"=> $this->user->fullName()
            ]
        ];
    }
}
