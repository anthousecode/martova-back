<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 05.02.20
 * Time: 23:50
 */

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Services\Util\Authentifier;

class SocialiteController extends Controller
{
    protected $authentifier;

    public function __construct(Authentifier $authentifier)
    {
        $this->authentifier = $authentifier;
    }

    public function authenticate(string $driver)
    {
        return $this->authentifier->socialiteRedirect($driver);
    }

    public function callback(string $driver)
    {
        $resp = [
            'key' => $this->authentifier->authenticatedCallbackHandler($driver),
        ];
        return response()->json($resp, 200);
    }
}