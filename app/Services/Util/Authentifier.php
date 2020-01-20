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

class Authentifier
{
    protected $tokenizer;

    public function __construct(Tokenizer $tokenizer)
    {
        $this->tokenizer = $tokenizer;
    }

    public function socialiteRedirect(string $driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function authenticatedCallbackHandler(string $driver): string
    {
        $user = Socialite::driver($driver)->stateless()->user();
        $findUser = \App\User::where('email', $user->email)->first();
        $newToken = $this->tokenizer->generateUUID();
        if ($findUser) {
            $findUser->api_token = $newToken;
            $findUser->save();
        } else {
            $newUser = new \App\User;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->password = Hash::make(Str::random(8) . $user->email);
            $newUser->api_token = $newToken;
            $newUser->save();
        }
        return base64_encode($newToken);
    }
}