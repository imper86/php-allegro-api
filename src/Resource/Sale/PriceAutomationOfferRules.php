<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class PriceAutomationOfferRules extends AbstractResource
{
    public function get(string $offerId): ResponseInterface
    {
        return $this->apiGet("/sale/price-automation/offers/{$offerId}/rules");
    }
}
