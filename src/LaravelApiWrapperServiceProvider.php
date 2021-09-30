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
        $this->app->bind(BiilaPayApiHttp::class, function () {
            $config = $this->app['config']->get('services.biila_pay_api');

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