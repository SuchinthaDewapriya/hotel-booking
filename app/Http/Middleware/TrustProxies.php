<?php

namespace App\Http\Middleware;

<<<<<<< HEAD
use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;
=======
use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
<<<<<<< HEAD
     * @var array<int, string>|string|null
=======
     * @var array|string
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
     */
    protected $proxies;

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
<<<<<<< HEAD
    protected $headers =
        Request::HEADER_X_FORWARDED_FOR |
        Request::HEADER_X_FORWARDED_HOST |
        Request::HEADER_X_FORWARDED_PORT |
        Request::HEADER_X_FORWARDED_PROTO |
        Request::HEADER_X_FORWARDED_AWS_ELB;
=======
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
}
