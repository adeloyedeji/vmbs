<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            'App\Repositories\Interfaces\CompanyInterface', 
            'App\Repositories\CompanyRepo'
        );
         $this->app->bind(
            'App\Repositories\Interfaces\UtilityInterface', 
            'App\Repositories\UtilityRepo'
        );
    }
}
