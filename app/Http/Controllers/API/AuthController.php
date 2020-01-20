<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Services\Util\Tokenizer;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    protected $tokenizer;

    public function __construct(Tokenizer $tokenizer)
    {
        $this->tokenizer = $tokenizer;
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
        ];

        if ((Validator::make($request->all(), $rules))->fails()) {
            return response()->json(['message' => 'Invalid input'], 401);
        }

        $user = User::where('email', $request->email)
            ->first();

        if (!$user) {
            return response()->json(['message' => 'User with such credentials not found'], 404);
        }

        $newToken = $this->tokenizer->generateUUID();

        $user->api_token = $newToken;
        $user->save();

        return response()->json(['key' => base64_encode($newToken)], 200);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => json_encode($validator->errors()->toArray())], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        User::create($input);
        return response()->json(['message' => 'success'], 200);
    }

    public function logout(Request $request)
    {
        $token = base64_decode(Cookie::get('token'));

        User::where('api_token', $token)->update([
            'api_token' => null,
        ]);

        return response()->json([
            'message' => 'Successfully logged out',
        ], 200);
    }

}
