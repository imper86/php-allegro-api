<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\Offers;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Tags extends AbstractResource
{
    /**
     * @param string $offerId
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(string $offerId, array $body): ResponseInterface
    {
        return $this->apiPost("/sale/offers/{$offerId}/tags", $body);
    }

    public function get(string $offerId): ResponseInterface
    {
        return $this->apiGet("/sale/offers/{$offerId}/tags");
    }
}
