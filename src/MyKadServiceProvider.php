<?php

namespace AkuKoder\MyKad;

use AkuKoder\MyKad\Faker\MyKadProvider;
use Faker\Factory;
use Faker\Generator;
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
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create();
            $faker->addProvider(new MyKadProvider);

            return $faker;
        });
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