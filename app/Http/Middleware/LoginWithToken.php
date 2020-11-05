<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginWithToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->input('token')){
            $user = User::where('auth_token', $request->input('token'))->first();
            if ($user){
                Auth::loginUsingId($user->id);
            }
        }
        return $next($request);
    }
}
