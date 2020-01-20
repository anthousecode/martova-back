<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Services\Util\Authentifier;

class YoutubeController extends Controller
{
    protected $authentifier;

    protected $driver;

    public function __construct(Authentifier $authentifier)
    {
        $this->driver = 'youtube';
        $this->authentifier = $authentifier;
    }

    public function authenticate()
    {
        return $this->authentifier->socialiteRedirect($this->driver);
    }

    public function callback()
    {
        return response()->json([
            'key' => $this->authentifier->authenticatedCallbackHandler($this->driver),
        ], 200);
    }
}
