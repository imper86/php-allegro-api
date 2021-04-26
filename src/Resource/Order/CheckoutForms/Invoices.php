<?php

namespace Imper86\PhpAllegroApi\Resource\Order\CheckoutForms;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Imper86\PhpAllegroApi\Resource\Order\CheckoutForms\Invoices\File;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Invoices
 * @package Imper86\PhpAllegroApi\Resource\Order\CheckoutForms
 *
 * @method File file()
 */
class Invoices extends AbstractResource
{
    public function get(string $checkoutFormId): ResponseInterface
    {
        return $this->apiGet(sprintf('/order/checkout-forms/%s/invoices', $checkoutFormId));
    }

    public function post(string $checkoutFormId, array $body): ResponseInterface
    {
        return $this->apiPost(sprintf('/order/checkout-forms/%s/invoices', $checkoutFormId), $body);
    }
}
