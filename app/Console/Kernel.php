<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
<<<<<<< HEAD
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
=======
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
    }

    /**
     * Register the commands for the application.
<<<<<<< HEAD
     */
    protected function commands(): void
=======
     *
     * @return void
     */
    protected function commands()
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
