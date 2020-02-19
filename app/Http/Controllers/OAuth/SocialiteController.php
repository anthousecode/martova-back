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
use Illuminate\Support\Facades\Redirect;

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
        $key = $this->authentifier->authenticatedCallbackHandler($driver);

        return Redirect::to('martovariverside.com/News/?key=' . $key);
    }
}