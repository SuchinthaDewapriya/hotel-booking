<?php

namespace App\Providers;

<<<<<<< HEAD
// use Illuminate\Support\Facades\Gate;
=======
use Illuminate\Support\Facades\Gate;
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
<<<<<<< HEAD
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
=======
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
    ];

    /**
     * Register any authentication / authorization services.
<<<<<<< HEAD
     */
    public function boot(): void
    {
=======
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
        //
    }
}
