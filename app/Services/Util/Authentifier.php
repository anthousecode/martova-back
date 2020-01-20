<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 20.01.20
 * Time: 9:51
 */

namespace App\Services\Util;

use Socialite;
use App\User;

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
        $findUser = User::where('email', $user->email)->first();
        $newToken = $this->tokenizer->generateUUID();
        if ($findUser) {
            $findUser->api_token = $newToken;
            $findUser->save();
        } else {
            \App\User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => bcrypt($user->password),
                'api_token' => $newToken,
            ]);
        }
        return base64_encode($newToken);
    }
}