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
        $this->registerClientStore();
    }

    /**
     * Client Data Store Binding.
     */
    public function registerClientStore()
    {
        $this->app->bind('App\Repositories\Client\Contracts\Store', 'App\Repositories\Client\CsvStore');
    }
}
