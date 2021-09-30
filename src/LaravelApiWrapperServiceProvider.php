<?php

namespace BiilaPay\LaravelApiWrapper;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Client\Factory;
use Illuminate\Support\ServiceProvider;

class LaravelApiWrapperServiceProvider extends ServiceProvider
{
    /**
     * {@inheritDoc}
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/biila_pay_api.php', 'biila_pay_api');

        $this->publishes([
            __DIR__ . '/../config/biila_pay_api.php' => $this->app->configPath('biila_pay_api.php'),
        ]);

        $this->app->bind(BiilaPayApiHttp::class, function () {
            $config = $this->app['config']['biila_pay_api'];

            return new BiilaPayApiHttp(
                $config['api_token'], 
                $config['domain'], 
                new Factory
            );
        });

        $this->app->bind(
            BiilaPayApi::class, 
            fn (Application $app) => new BiilaPayApi($app->make(BiilaPayApiHttp::class))
        );
    }
}