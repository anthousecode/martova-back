<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 05.02.20
 * Time: 23:46
 */

namespace App\Services\Util;


class Socializer
{
     public function resolveMethodByDriver(string $driver): string
     {
        $method = 'driver';
        switch ($driver) {
             case 'instagram':
                 $method = 'with';
             break;
         }

         return $method;
     }
}
