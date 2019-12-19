<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 19.12.19
 * Time: 11:04
 */

namespace App\Services;


class UtilService
{
    public function __construct()
    {
        dump(1);
    }

    public function foo()
    {
        return __CLASS__ . ' . ' . __METHOD__;
    }
}