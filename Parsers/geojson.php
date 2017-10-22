<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 22.10.2017
 * Time: 14:59
 */

namespace Parsers;

require_once 'parser.php';

use \Models\Person as Person;
class GeoJson extends Parser
{
    public function parse(){
        $usersAsString = file_get_contents("./Data/users.json");
        $usersJson = json_decode($usersAsString, true);

        return array_map(function($userJson) {
            return new Person($userJson);
        }, $usersJson);

    }
}