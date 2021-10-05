<?php

namespace BiilaPay\LaravelApiWrapper;

use BiilaPay\LaravelApiWrapper\Exceptions\InvalidClientCredentialsException;
use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\PendingRequest;

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
        ?string $clientId,
        ?string $clientToken,
        string $domain = null,
        ?Factory $factory = null
    )
    {
        parent::__construct($factory);
        
        $domain = $domain ?: static::DEFAULT_DOMAIN;

        $this->baseUrl(rtrim($domain, '/') . '/v1')
            ->acceptJson()
            ->withApiToken($clientId, $clientToken);
    }

    /**
     * Add api token to the request.
     *
     * @param string|null $clientId
     * @param string|null $clientToken
     * @return self
     */
    protected function withApiToken(?string $clientId, ?string $clientToken): self
    {
        if (!$clientId) {
            throw InvalidClientCredentialsException::idMissing();
        }

        if (!$clientToken) {
            throw InvalidClientCredentialsException::tokenMissing();
        }
        
        $apiToken = "$clientId|$clientToken";

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