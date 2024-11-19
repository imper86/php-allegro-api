<?php

namespace Imper86\PhpAllegroApi\Resource\ShipmentManagement;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;

class PickupProposals extends AbstractResource
{

    /**
     * Get shipments pickup proposals
     * Use this resource to get parcels pickup date proposals. Pickup takes place, when courier arrives to take parcels for shipment.
     *
     * @param  array  $body
     *
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/shipment-management/pickup-proposals', $body);
    }
}