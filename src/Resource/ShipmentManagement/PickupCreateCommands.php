<?php

namespace Imper86\PhpAllegroApi\Resource\ShipmentManagement;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;

class PickupCreateCommands extends AbstractResource
{
    /**
     * Request shipments pickup
     * Use this resource to request a pickup of shipments.
     *
     * @param  array  $body
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/shipment-management/pickups/create-commands', $body);
    }

    /**
     * Create pickup command status
     * Use this resource to get pickup request status.
     *
     * @param  string  $commandId  Unique identifier of shipment pickup request command
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function get(string $commandId): ResponseInterface
    {
        return $this->apiGet(sprintf('/shipment-management/pickups/create-commands/%s', $commandId));
    }
}