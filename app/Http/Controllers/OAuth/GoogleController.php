<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use Socialite;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Services\Util\Tokenizer;

class GoogleController extends Controller
{
    protected $tokenizer;

    public function __construct(Tokenizer $tokenizer)
    {
        $this->tokenizer = $tokenizer;
    }

    public function authenticate()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $findUser = User::where('email', $user->email)->first();
        $newToken = $this->tokenizer->generateUUID();
        if ($findUser) {
            $findUser->api_token = $newToken;
            $findUser->save();
        } else {
            $newUser = new User;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->password = bcrypt($user->password);
            $newUser->api_token = $newToken;
            $newUser->save();
        }
        return response()->json(['key' => base64_encode($newToken)], 200);
    }
}
