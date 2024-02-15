<?php

namespace Imper86\PhpAllegroApi\Resource\ShipmentManagement;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;


class DeliveryServices extends AbstractResource {
    public function get(): ResponseInterface
    {
        return $this->apiGet('/shipment-management/delivery-services');
    }
}