<?php

namespace Imper86\PhpAllegroApi\Resource\Sale;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class OfferPromotionPackages extends AbstractResource
{
    public function get(): ResponseInterface
    {
        return $this->apiGet('/sale/offer-promotion-packages');
    }
}
