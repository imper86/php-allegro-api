<?php

namespace Imper86\PhpAllegroApi\Resource\ShipmentManagement;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;

class ShipmentCancelCommands extends AbstractResource
{

    /**
     * Cancel shipment
     * Use this resource to cancel parcel.
     *
     * @param  array  $body  Request body
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/shipment-management/shipments/cancel-commands/', $body);
    }


    /**
     * Get shipment cancellation status
     * Use this resource to get parcel cancellation status.
     *
     * @param  string  $commandId  Unique identifier of shipment cancel command
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function get(string $commandId): ResponseInterface
    {
        return $this->apiGet(sprintf('/shipment-management/shipments/cancel-commands/%s', $commandId));
    }
}