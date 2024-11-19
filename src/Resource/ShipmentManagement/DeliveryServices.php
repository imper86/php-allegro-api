<?php

namespace Imper86\PhpAllegroApi\Resource\ShipmentManagement;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;

class DeliveryServices extends AbstractResource
{
    /**
     * Get available delivery services
     * Use this resource to get delivery services available for user. It returns services provided by Allegro and contracts with carriers owned by user and configured by GUI.
     *
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function get(): ResponseInterface
    {
        return $this->apiGet('/shipment-management/delivery-services');
    }
}