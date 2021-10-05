<?php

namespace BiilaPay\LaravelApiWrapper\Traits;

use Illuminate\Http\Client\Response;
use RuntimeException;

trait PaymentEndpoints
{
    /**
     * GET request for payment viewing.
     *
     * @param array $query
     * @return \Illuminate\Http\Client\Response
     */
    public function getPayment(string $paymentUuid): Response
    {
        return $this->get("payments/{$paymentUuid}");
    }

    /**
     * POST request for creating a payment of given type.
     *
     * @param string $type
     * @param array $data
     * @return \Illuminate\Http\Client\Response
     */
    public function createPayment($type, array $data): Response
    {
        $types = ['hold', 'fulfill', 'charge'];
        throw_if(
            !in_array($type = strtolower($type), $types),
            new RuntimeException(sprintf("Unsupported payment type '%s' given.", $type))
        );

        return $this->post("payments/{$type}", $data);
    }

    /**
     * POST request for storing a hold payment
     *
     * @param array $data
     * @return \Illuminate\Http\Client\Response
     */
    public function createHoldPayment(array $data): Response
    {
        return $this->createPayment('HOLD', $data);
    }

    /**
     * POST request for storing a fulfill payment
     *
     * @param array $data
     * @return \Illuminate\Http\Client\Response
     */
    public function createFulfillPayment(array $data): Response
    {
        return $this->createPayment('FULFILL', $data);
    }

    /**
     * POST request for storing a charge payment
     *
     * @param array $data
     * @return \Illuminate\Http\Client\Response
     */
    public function createChargePayment(array $data): Response
    {
        return $this->createPayment('CHARGE', $data);
    }

    /**
     * GET request for getting the perform url for a payment.
     *
     * @param string $paymentUuid
     * @return \Illuminate\Http\Client\Response
     */
    public function getPerformUrl(string $paymentUuid): Response
    {
        return $this->get("payments/{$paymentUuid}/perform");
    }
}