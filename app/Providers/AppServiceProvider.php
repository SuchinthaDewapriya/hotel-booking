<?php

namespace App\Providers;

<<<<<<< HEAD
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;
=======
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
<<<<<<< HEAD
     */
    public function register(): void
    {
        //
=======
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
    }

    /**
     * Bootstrap any application services.
<<<<<<< HEAD
     */
public function boot()
    {
        if (app()->environment('local')) {
            $transport = app('mailer')->getSymfonyTransport();
            if ($transport instanceof EsmtpTransport) {
                $transport->getStream()->setStreamOptions([
                    'ssl' => [
                        'allow_self_signed' => true,
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                    ],
                ]);
            }
        }
=======
     *
     * @return void
     */
    public function boot()
    {
        //
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
    }
}
