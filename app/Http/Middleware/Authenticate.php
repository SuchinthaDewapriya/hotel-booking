<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
<<<<<<< HEAD
use Illuminate\Http\Request;
=======
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
<<<<<<< HEAD
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
=======
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
    }
}
