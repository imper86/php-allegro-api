<?php

namespace Imper86\PhpAllegroApi\Resource\ShipmentManagement;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;

class Shipment extends AbstractResource
{
    /**
     * Get shipment details
     * Use this resource to get parcel details.
     *
     * @param  string  $shipmentId  Unique identifier of the shipment
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function get(string $shipmentId): ResponseInterface
    {
        return $this->apiGet(sprintf('/shipment-management/shipments/%s', $shipmentId));
    }
}