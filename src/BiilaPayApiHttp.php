<?php

namespace BiilaPay\LaravelApiWrapper;

use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\PendingRequest;
use LogicException;

class BiilaPayApiHttp extends PendingRequest
{
    const DEFAULT_DOMAIN = 'https://api.pay.biila.io';

    /**
     * Undocumented function
     *
     * @param string|null $apiToken
     * @param string|null $domain [optional]
     * @param \Illuminate\Http\Client\Factory|null $factory
     */
    public function __construct(
        ?string $apiToken,
        string $domain = null,
        ?Factory $factory = null
    )
    {
        parent::__construct($factory);
        
        $domain = $domain ?: static::DEFAULT_DOMAIN;

        $this->baseUrl(rtrim($domain, '/') . '/v1')
            ->acceptJson()
            ->withApiToken($apiToken);
    }

    /**
     * Add api token to the request.
     *
     * @param string|null $apiToken
     * @return self
     */
    protected function withApiToken(?string $apiToken): self
    {
        if (!$apiToken) {
            throw new LogicException("Api token not set up in config for Biila Pay API.");
        }

        return $this->withToken($apiToken);
    }

    /**
     * Resolve and attach headers for the request.
     *
     * @return $this
     */
    protected function attachHeaders(): self
    {
        $headers = [
            'Accept' => 'application/json'
        ];

        return $this->withHeaders($headers);
    }
}