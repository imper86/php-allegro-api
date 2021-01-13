<?php

namespace Imper86\PhpAllegroApi\Resource\Sale\Offers;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class PromoOptionsModification extends AbstractResource
{
    public function post(string $offerId, array $body): ResponseInterface
    {
        return $this->apiPost(
            sprintf('/sale/offers/%s/promo-options-modification', $offerId),
            $body
        );
    }
}
