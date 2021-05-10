<?php


namespace Imper86\PhpAllegroApi\Resource\Pricing;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class OfferQuotes extends AbstractResource
{
    /**
     * @param string[] $query
     * @return ResponseInterface
     */
    public function get(array $query): ResponseInterface
    {
        return $this->apiGet('/pricing/offer-quotes', $query);
    }
}
