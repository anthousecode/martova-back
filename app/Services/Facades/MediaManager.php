<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 13.03.20
 * Time: 15:10
 */

namespace App\Services\Facades;

use Illuminate/Support/Facades/Facade;

class MediaManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'media_manager';
    }
}