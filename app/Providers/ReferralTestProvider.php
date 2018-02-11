<?php

namespace App\Providers;

use App\Services\ReferralService;
use Illuminate\Support\ServiceProvider;

class ReferralTestProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ReferralService', ReferralService::class);
    }
}
