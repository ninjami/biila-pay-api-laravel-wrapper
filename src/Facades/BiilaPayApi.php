<?php

namespace BiilaPay\LaravelApiWrapper\Facades;

use BiilaPay\LaravelApiWrapper\BiilaPayApi as BaseBiilaPayApi;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Http\Client\Response getPayment(string $uuid)
 * @method static \Illuminate\Http\Client\Response createHoldPayment(array $data)
 * @method static \Illuminate\Http\Client\Response createFulfillPayment(array $data)
 * @method static \Illuminate\Http\Client\Response createChargePayment(array $data)
 * @method static \Illuminate\Http\Client\Response getPerformUrl(string $uuid)
 */
class BiilaPayApi extends Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return BaseBiilaPayApi::class;
    }
}