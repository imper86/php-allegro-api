<?php


namespace Imper86\PhpAllegroApi\Resource\ParcelManagement;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class DeliveryServices extends AbstractResource
{
    public function get(): ResponseInterface
    {
        return $this->apiGet('/parcel-management/delivery-services');
    }
}
