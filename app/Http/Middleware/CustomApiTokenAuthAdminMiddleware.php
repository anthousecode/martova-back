<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use App\User;

class CustomApiTokenAuthAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $clientToken = Cookie::get('token');
        if ((!$clientToken) || (empty($clientToken))) {
            return response()->json(['message' => 'Access Denied'], 401);
        }

        $clientToken = base64_decode($clientToken);

        $user = User::where('api_token', $clientToken)->first();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        if (!$user->isAdmin) {
            return response()->json(['message' => 'Access Denied'], 401);
        }

        return $next($request);
    }
}
