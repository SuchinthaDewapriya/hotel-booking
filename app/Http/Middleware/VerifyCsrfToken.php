<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
<<<<<<< HEAD
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
=======
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
     */
    protected $except = [
        //
    ];
}
