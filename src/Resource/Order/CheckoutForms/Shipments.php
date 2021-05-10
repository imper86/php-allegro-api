<?php


namespace Imper86\PhpAllegroApi\Resource\Order\CheckoutForms;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Shipments extends AbstractResource
{
    public function get(string $checkoutFormId): ResponseInterface
    {
        return $this->apiGet("/order/checkout-forms/{$checkoutFormId}/shipments");
    }

    /**
     * @param string $checkoutFormId
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(string $checkoutFormId, array $body): ResponseInterface
    {
        return $this->apiPost("/order/checkout-forms/{$checkoutFormId}/shipments", $body);
    }
}
