<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;

class CheckVerifyEmail
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
        if (!User::where('email', $request->email)->first()->email_verified_at) {
            return redirect()->route('login')->withSuccess('Подтвердите почту, для авторизации');
        }

        return $next($request);
    }
}
