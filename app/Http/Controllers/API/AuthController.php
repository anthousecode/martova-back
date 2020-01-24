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

    /**
     * OA\Post(
     *     path="/login",
     *     operationId="signinForUser",
     *     summary="Basic sign in operation for user",
     *     tags={"All"},
     *     OA\MediaType(
     *         mediaType="application/json",
     *         OA\Parameter(
     *             name="email",
     *             in="query",
     *             description="User email for verification"
     *         )
     *     ),
     *     OA\Response(
     *      OA\MediaType(
     *          mediaType="application/json",
     *           OA\Property(
     *               property="key",
     *               type="string",
     *               description="Access key for performing secured operations and identify its owner",
     *               OA\Items(
     *                   type="string"
     *               )
     *           )
     *      )
     *     )
     * )
     */
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

    /**
     * OA\Post(
     *     path="/register",
     *     operationId="RegisterUserAction",
     *     summary="Default registration for user",
     *     tags={"All"},
     *     OA\MediaType(
     *         mediaType="application/json",
     *         OA\Parameter(
     *             required=true,
     *             name="name",
     *             in="query",
     *             description="Username as a string"
     *         ),
     *         OA\Parameter(
     *             required="true",
     *             name="email",
     *             in="query",
     *             description="User email"
     *         ),
     *         OA\Parameter(
     *             required="true",
     *             name="password",
     *             in="query",
     *             description="User password"
     *         ),
     *         OA\Parameter(
     *             required="true",
     *             name="c_password",
     *             in="query",
     *             description="Repeat user password"
     *         )
     *     ),
     *     OA\Response(
     *         OA\MediaType(
     *             mediaType="application/json",
     *             OA\Property(
     *                 property="message",
     *                 type="string",
     *                 description="Success message",
     *                 OA\Items(
     *                   type="string"
     *                 )
     *             )
     *         )
     *     )
     * )
     */
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
        return response()->json(['message' => 'OK'], 200);
    }


    public function logout(Request $request)
    {
        $token = base64_decode(Cookie::get('token'));

        User::where('api_token', $token)->update([
            'api_token' => null,
        ]);

        return response()->json([
            'message' => 'OK',
        ], 200);
    }

}
