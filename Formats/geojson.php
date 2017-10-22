<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 22.10.2017
 * Time: 14:58
 */

namespace Formats;

require_once 'format.php';

require_once './Parsers/geojson.php';
require_once './Views/geojson.php';

use \Parsers\GeoJson as GeoJsonParser;
use \Views\GeoJson as GeoJsonViews;
class GeoJson extends Format
{
    public function formatedData(){
        $parser = new GeoJsonParser();
        $users = $parser->parse();
        return GeoJsonViews::index($users);
    }
}