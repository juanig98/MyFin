<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function (User $user) {
            return ($user->role()->level_access == 10 && $user->role()->id == 1) ? true : false;
        });
        Gate::define('authorized', function (User $user) {
            return ($user->role()->level_access > 6) ? true : false;
        });
        Gate::define('dev', function (User $user) {
            return ($user->role()->id == 2) ? true : false;
        });
    }
}
