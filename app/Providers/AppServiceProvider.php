<?php

namespace App\Providers;

use App\Services\StoreMessageService;
use App\Services\UserBrowserInfoService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserBrowserInfoService::class, function() {
            return new UserBrowserInfoService();
        });
        $this->app->bind(StoreMessageService::class, function() {
            return new StoreMessageService();
    });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
