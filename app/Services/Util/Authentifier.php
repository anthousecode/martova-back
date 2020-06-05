<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 20.01.20
 * Time: 9:51
 */

namespace App\Services\Util;

use Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Services\Util\Socializer;
use App\User;

class Authentifier
{
    protected $tokenizer;

    protected $socializer;

    public function __construct(Tokenizer $tokenizer, Socializer $socializer)
    {
        $this->tokenizer = $tokenizer;
        $this->socializer = $socializer;
    }

    public function socialiteRedirect(string $driver)
    {
        $method = $this->socializer->resolveMethodByDriver($driver);

        return Socialite::$method($driver)->redirect();
    }

    public function authenticatedCallbackHandler(string $driver): string
    {
        $method = $this->socializer->resolveMethodByDriver($driver);

        $user = Socialite::$method($driver)->stateless()->user();
        $findUser = User::where('email', $user->email)->first();
        $newToken = $this->tokenizer->generateUUID();
        if ($findUser) {
            $findUser->api_token = $newToken;
            $findUser->save();
        } else {
            $newUser = new User;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->password = Hash::make(Str::random(8) . $user->email);
            $newUser->api_token = $newToken;
            $newUser->save();
        }
        return $newToken;
    }
}
