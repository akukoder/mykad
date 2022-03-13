<?php

namespace AkuKoder\MyKad;

use Illuminate\Support\ServiceProvider;

class MyKadServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/state-codes.php', 'mykad-config');

        $this->publishes([
            __DIR__ . '/../config/state-codes.php' => config_path('state-codes.php')
        ], 'mykad-config');
    }
}