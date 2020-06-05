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
use App\Services\Factories\OAuthFactory;

class SocialiteController extends Controller
{
    protected $authentifier;

    public function __construct(Authentifier $authentifier)
    {
        $this->authentifier = $authentifier;
    }

    public function authenticate(string $driver)
    {
        if (in_array($driver, config('auth.socialited_providers'))) {
            return $this->authentifier->socialiteRedirect($driver);
        }
        return OAuthFactory::create($driver)->redirect();
    }

    public function callback(string $driver)
    {
        dd(12);
        $key = $this->authentifier->authenticatedCallbackHandler($driver);

        return redirect()->away('http://martovariverside.com/News/?key=' . $key);
    }
}
