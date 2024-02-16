<?php

namespace Imper86\PhpAllegroApi\Resource\ShipmentManagement;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class CreateCommands extends AbstractResource
{
    /**
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost(
            '/shipment-management/shipments/create-commands',
            $body
        );
    }

    public function get(string $commandId): ResponseInterface
    {
        dump(sprintf('/shipment-management/shipments/create-commands/%s', $commandId));
        return $this->apiGet(sprintf('/shipment-management/shipments/create-commands/%s', $commandId));
    }
}