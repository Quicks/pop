<?php
/**
 * Created by PhpStorm.
 * User: unadm
 * Date: 22.10.17
 * Time: 16:03
 */

namespace Presenters;

class Person
{

    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function asGeoJson()
    {
        $coordinates = $this->model->coordinates();
        return [
            "type" => "Feature",
            "geometry" => [
                "type" => "Point",
                "coordinates" => [
                    (float)$coordinates['lng'],
                    (float)$coordinates['lat']

                ],
                "properties"=>[
                    "name"=>$this->model->fullname()
                ]
            ]
        ];
    }
}