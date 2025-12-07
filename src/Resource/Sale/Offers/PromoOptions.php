<?php

namespace Imper86\PhpAllegroApi\Resource\Sale\Offers;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class PromoOptions extends AbstractResource
{
    public function get(?string $offerId = null, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/sale/offers/%s', $offerId ? "{$offerId}/" : '') . 'promo-options', $query);
    }
}
