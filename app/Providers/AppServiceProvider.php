<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Blade::directive('row', function () {
            return "<div class='row row-form row-cols-1 row-cols-md-2 row-cols-lg-3  row-cols-xl-4 row-cols-xxl-5 gx-3 gy-2'>";
        });

        Blade::directive('srow', function () {
            return "<div class='row row-form row-cols-1 row-cols-md-2 row-cols-lg-3 gx-2 gy-1 row-cols-xl-4 row-cols-xxl-5'>";
        });

        Blade::directive('endrow', function () {
            return '</div>';
        });

        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });
    }
}
