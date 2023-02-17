<?php

declare(strict_types=1);

namespace App\Http\Middleware;

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
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    /*
    protected function admin($request) // my
    {
        $user = $this->auth->guard('user');
        if ($user && $user->isAdmin()) {
            return $next($request);
        }

        return abort(403, "Access denied for user ${$user->id} ${$user->name}"); //redirect('/');
    }
    */
}
