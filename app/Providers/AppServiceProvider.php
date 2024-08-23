<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // GATE : user non kasubag : permission : 
        Gate::define('permission', function (User $user) {
            return $user->permission == '1';
        });

        Gate::define('kasubag', function (User $user) {
            return $user->permission == '0';
        });
    }
}
