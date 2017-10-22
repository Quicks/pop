<?php
/**
 * Created by PhpStorm.
 * User: unadm
 * Date: 22.10.17
 * Time: 14:50
 */

namespace Formats;
require_once 'format.php';
require_once './Parsers/json.php';
require_once './Views/geoJson.php';
require_once './Presenters/Person.php';

use \Parsers\Json as JsonParser;
use \Views\GeoJson as GeoJsonView;
use \Presenters\Person as PersonPresenter;

class GeoJson extends Format
{

    public function formatedData()
    {
        $parser = new JsonParser();
        $users = $parser->parse();
        $geoJson = array_map(function ($item){
            $person = new PersonPresenter($item);
            return $person->asGeoJson();

        },$users);
        return GeoJsonView::index($geoJson);
    }
}