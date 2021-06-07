<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;

class AllegroPricesOfferConsents extends AbstractResource
{
    public function get(string $offerId): ResponseInterface
    {
        return $this->apiGet(sprintf('/sale/allegro-prices-offer-consents/%s', $offerId));
    }

    /**
     * @param mixed[] $body
     * @throws ClientExceptionInterface
     */
    public function put(string $offerId, array $body): ResponseInterface
    {
        return $this->apiPut(sprintf('/sale/allegro-prices-offer-consents/%s', $offerId), $body);
    }
}
