<?php

namespace Imper86\PhpAllegroApi\Resource\ShipmentManagement;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;

class ShipmentCreateCommands extends AbstractResource
{

    /**
     * Create new shipment
     * Use this resource to create shipment for delivery.
     *
     * @param  array  $body  Request body
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/shipment-management/shipments/create-commands', $body);
    }


    /**
     * Get shipment creation command status
     * Use this resource to get shipment creation status.
     *
     * @param  string  $commandId  Unique identifier of shipment create command
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function get(string $commandId): ResponseInterface
    {
        return $this->apiGet(sprintf('/shipment-management/shipments/create-commands/%s', $commandId));
    }
}