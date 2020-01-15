<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 15.01.20
 * Time: 9:03
 */

namespace App\Services\Util;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class Tokenizer
{
    public function generateUUID()
    {
        return Uuid::uuid4()->toString();
    }
}