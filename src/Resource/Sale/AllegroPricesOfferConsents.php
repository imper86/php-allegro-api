<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @deprecated Allegro removed /sale/allegro-prices-offer-consents on 2026-05-25. Use AllegroPrices::offers()->submitOfferCommands(), exclusionCommands(), and offersQueries().
 */
class AllegroPricesOfferConsents extends AbstractResource
{
    /**
     * @deprecated Allegro removed GET /sale/allegro-prices-offer-consents/{offerId} on 2026-05-25. Use AllegroPrices::offersQueries()->post().
     */
    public function get(string $offerId): ResponseInterface
    {
        return $this->apiGet(sprintf('/sale/allegro-prices-offer-consents/%s', $offerId));
    }

    /**
     * @param mixed[] $body
     * @throws ClientExceptionInterface
     * @deprecated Allegro removed PUT /sale/allegro-prices-offer-consents/{offerId} on 2026-05-25. Use AllegroPrices::offers()->submitOfferCommands() or exclusionCommands().
     */
    public function put(string $offerId, array $body): ResponseInterface
    {
        return $this->apiPut(sprintf('/sale/allegro-prices-offer-consents/%s', $offerId), $body);
    }
}
