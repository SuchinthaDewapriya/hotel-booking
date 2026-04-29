<?php

namespace App\Providers;

<<<<<<< HEAD
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;
=======
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
<<<<<<< HEAD
     */
    public function boot(): void
=======
     *
     * @return void
     */
    public function boot()
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
    {
        Broadcast::routes();

        require base_path('routes/channels.php');
    }
}
