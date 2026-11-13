<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @deprecated Allegro removed PUT /sale/allegro-prices-account-consent on 2026-05-25. Use AllegroPrices::accounts()->participations()->patch().
 */
class AllegroPricesAccountConsent extends AbstractResource
{
    /**
     * @param mixed[] $body
     * @throws ClientExceptionInterface
     * @deprecated Allegro removed PUT /sale/allegro-prices-account-consent on 2026-05-25. Use AllegroPrices::accounts()->participations()->patch().
     */
    public function put(array $body): ResponseInterface
    {
        return $this->apiPut('/sale/allegro-prices-account-consent', $body);
    }
}
