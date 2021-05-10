<?php


namespace Imper86\PhpAllegroApi\Resource\Bidding\Offers;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Bid extends AbstractResource
{
    /**
     * @param string $offerId
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function put(string $offerId, array $body): ResponseInterface
    {
        return $this->apiPut("/bidding/offers/{$offerId}/bid", $body);
    }

    public function get(string $offerId): ResponseInterface
    {
        return $this->apiGet("/bidding/offers/{$offerId}/bid");
    }
}
