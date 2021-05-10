<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class DeliverySettings extends AbstractResource
{
    public function get(): ResponseInterface
    {
        return $this->apiGet('/sale/delivery-settings');
    }

    /**
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function put(array $body): ResponseInterface
    {
        return $this->apiPut('/sale/delivery-settings', $body);
    }
}
