<?php

namespace Imper86\PhpAllegroApi\Resource\ShipmentManagement;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class CancelCommands extends AbstractResource
{
    /**
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost(
            '/shipment-management/shipments/cancel-commands',
            $body
        );
    }

    public function get(string $commandId): ResponseInterface
    {
        return $this->apiGet(sprintf('/shipment-management/shipments/cancel-commands/%s', $commandId));
    }
}