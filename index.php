<?php

<<<<<<< HEAD
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
=======
/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
<<<<<<< HEAD
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists($maintenance = __DIR__.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
=======
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
<<<<<<< HEAD
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
=======
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
|
*/

require __DIR__.'/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
<<<<<<< HEAD
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
=======
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
|
*/

$app = require_once __DIR__.'/bootstrap/app.php';

<<<<<<< HEAD
$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();
=======
/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422

$kernel->terminate($request, $response);
