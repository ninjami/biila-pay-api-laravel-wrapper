<?php

namespace BiilaPay\LaravelApiWrapper\Traits;

use Illuminate\Http\Client\Response;

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
     * POST request for storing a hold payment
     *
     * @param array $data
     * @return \Illuminate\Http\Client\Response
     */
    public function createHoldPayment(array $data): Response
    {
        return $this->post("payments/hold", $data);
    }

    /**
     * POST request for storing a fulfill payment
     *
     * @param array $data
     * @return \Illuminate\Http\Client\Response
     */
    public function createFulfillPayment(array $data): Response
    {
        return $this->post("payments/fulfill", $data);
    }

    /**
     * POST request for storing a charge payment
     *
     * @param array $data
     * @return \Illuminate\Http\Client\Response
     */
    public function createChargePayment(array $data): Response
    {
        return $this->post("payments/charge", $data);
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