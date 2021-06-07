<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;

class AllegroPricesAccountConsent extends AbstractResource
{
    /**
     * @param mixed[] $body
     * @throws ClientExceptionInterface
     */
    public function put(array $body): ResponseInterface
    {
        return $this->apiPut('/sale/allegro-prices-account-consent', $body);
    }
}
