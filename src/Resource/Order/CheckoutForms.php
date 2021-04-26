<?php


namespace Imper86\PhpAllegroApi\Resource\Order;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Imper86\PhpAllegroApi\Resource\Order\CheckoutForms\Fulfillment;
use Imper86\PhpAllegroApi\Resource\Order\CheckoutForms\Invoices;
use Imper86\PhpAllegroApi\Resource\Order\CheckoutForms\Shipments;
use Psr\Http\Message\ResponseInterface;

/**
 * Class CheckoutForms
 * @package Imper86\PhpAllegroApi\Resource\Order
 *
 * @method Shipments shipments()
 * @method Invoices invoices()
 * @method Fulfillment fulfillment()
 */
class CheckoutForms extends AbstractResource
{
    public function get(?string $id, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/order/checkout-forms%s', $id ? "/{$id}" : ''), $query);
    }
}
