<?php

namespace Imper86\PhpAllegroApi\Resource\ShipmentManagement;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;

class Label extends AbstractResource
{
    /**
     * Get shipments labels
     * Use this resource to get label for created shipment.
     * Returned content type depends on created shipment.
     *
     * @param  array  $body
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/shipment-management/label', $body);
    }
}