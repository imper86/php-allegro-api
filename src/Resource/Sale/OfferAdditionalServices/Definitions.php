<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\OfferAdditionalServices;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Definitions extends AbstractResource
{
    /**
     * @param string[] $query
     * @return ResponseInterface
     */
    public function get(array $query): ResponseInterface
    {
        return $this->apiGet('/sale/offer-additional-services/definitions', $query);
    }
}
