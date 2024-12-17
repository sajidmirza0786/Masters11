<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Facades\{
    DefaultFc,
    Support
};

class FacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind('Support', Support::class);
        $this->app->bind('DefaultFc', DefaultFc::class);
    }
}
