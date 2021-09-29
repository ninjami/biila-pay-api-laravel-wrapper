<?php

namespace BiilaPay\LaravelApiWrapper;

use Illuminate\Support\Traits\ForwardsCalls;

/**
 * @method $this withBody($content, $contentType)
 * @method $this asJson()
 * @method $this asForm()
 * @method $this attach($name, $contents = '', $filename = null, array $headers = [])
 * @method $this asMultipart()
 * @method $this bodyFormat(string $format)
 * @method $this contentType(string $contentType)
 * @method $this acceptJson()
 * @method $this accept($contentType)
 * @method $this withHeaders(array $headers)
 * @method $this withBasicAuth(string $username, string $password)
 * @method $this withDigestAuth($username, $password)
 * @method $this withToken($token, $type = 'Bearer')
 * @method $this withUserAgent($userAgent)
 * @method $this withCookies(array $cookies, string $domain)
 * @method $this withoutRedirecting()
 * @method $this withoutVerifying()
 * @method $this sink($to)
 * @method $this timeout(int $seconds)
 * @method $this retry(int $times, int $sleep = 0)
 * @method $this withOptions(array $options)
 * @method $this withMiddleware(callable $middleware)
 * @method $this beforeSending($callback)
 * @method $this dump()
 * @method $this dd()
 * @method \Illuminate\Http\Client\Response get(string $url, $query = null)
 * @method \Illuminate\Http\Client\Response head(string $url, $query = null)
 * @method \Illuminate\Http\Client\Response post(string $url, array $data = [])
 * @method \Illuminate\Http\Client\Response patch($url, $data = [])
 * @method \Illuminate\Http\Client\Response put($url, $data = [])
 * @method \Illuminate\Http\Client\Response delete($url, $data = [])
 * @method array pool(callable $callback)
 * @method \Illuminate\Http\Client\Response send(string $method, string $url, array $options = [])
 * @method \GuzzleHttp\Client buildClient()
 * @method \GuzzleHttp\HandlerStack buildHandlerStack()
 * @method \Closure buildBeforeSendingHandler()
 * @method \Closure buildRecorderHandler()
 * @method \Closure buildStubHandler()
 * @method \Closure runBeforeSendingCallbacks($request, array $options)
 * @method array mergeOptions(...$options)
 * @method $this stub($callback)
 * @method $this async(bool $async = true)
 * @method \GuzzleHttp\Promise\PromiseInterface|null getPromise()
 * @method $this setClient(\GuzzleHttp\Client $client)
 */
class BiilaPayApi
{
    use ForwardsCalls,
        Traits\PaymentEndpoints;

    protected BiilaPayApiHttp $http;

    /**
     * The BiilaPayApi constructor.
     *
     * @param BiilaPayApiHttp $http
     */
    public function __construct(BiilaPayApiHttp $http)
    {
        $this->http = $http;
    }

    /**
     * Get the pending request instance.
     *
     * @return BiilaPayApiHttp
     */
    public function getHttp(): BiilaPayApiHttp
    {
        return $this->http;
    }

    /**
     * Forward calls to the biila-pay-api-http instance.
     *
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->forwardCallTo($this->getHttp(), $method, $parameters);
    }
}