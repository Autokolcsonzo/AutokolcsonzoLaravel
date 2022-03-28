<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
      //  dd(Auth::check());
        if (Auth::felhasznalo()->jogkor == 2) {
            if (! $request->expectsJson()) {
                return route('adminAutok');
            }
        } else {
            if (! $request->expectsJson()) {
                return route('login');
            }
        }
    }
}