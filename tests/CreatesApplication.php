<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
<<<<<<< HEAD
use Illuminate\Foundation\Application;
=======
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422

trait CreatesApplication
{
    /**
     * Creates the application.
<<<<<<< HEAD
     */
    public function createApplication(): Application
=======
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
