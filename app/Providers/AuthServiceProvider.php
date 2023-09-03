<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('Administrateur', function (User $user) {
            return $user->hasRole('Admin');
        });
        Gate::define('Livreur', function (User $user) {
            return $user->hasRole('Livreur');
        });
        Gate::define('Ventileur', function (User $user) {
            return $user->hasRole('Ventileur');
        });

        // Feature
        Gate::define('Manager', function ($user) {
            return $user->hasAnyRole('Ventileur', 'Admin', 'Livreur');
        });
        Gate::define('Admin', function ($user) {
            return $user->isAdmin();
        });
        Gate::define('Suppression', function ($user) {
            return $user->isAdmin();
        });
    }
}
