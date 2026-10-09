<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;

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

        View::composer('layouts.app', function ($view) {
            $view->with('profile', Auth::user());
        });

        View::composer('*', function ($view) {
            if (Auth::check()) {
                $activities = Activity::query()
                    ->whereIn('description', [
                        'User logged in',
                        'User logged out',
                    ])
                    ->with('causer')
                    ->latest()
                    ->take(8)
                    ->get();

                $view->with('headerActivities', $activities);
            }
        });
    }
}
