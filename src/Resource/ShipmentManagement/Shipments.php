<?php

namespace Imper86\PhpAllegroApi\Resource\ShipmentManagement;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;


class Shipments extends AbstractResource {
    public function get(string $commandId): ResponseInterface
    {
        return $this->apiGet(sprintf('/shipment-management/shipments/%s', $commandId));
    }
}