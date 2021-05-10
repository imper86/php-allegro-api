<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class OfferClassifiedsPackages extends AbstractResource
{
    public function get(string $offerId): ResponseInterface
    {
        return $this->apiGet("/sale/offer-classifieds-packages/{$offerId}");
    }

    /**
     * @param string $offerId
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function put(string $offerId, array $body): ResponseInterface
    {
        return $this->apiPost("/sale/offer-classifieds-packages/{$offerId}", $body);
    }
}
