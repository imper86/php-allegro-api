<?php

namespace Imper86\PhpAllegroApi\Resource\Sale\Offers;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class PromoOptions extends AbstractResource
{
    public function get(string $offerId): ResponseInterface
    {
        return $this->apiGet(sprintf('/sale/offers/%s/promo-options', $offerId));
    }
}
