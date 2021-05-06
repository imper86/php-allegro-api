<?php

namespace Imper86\PhpAllegroApi\Resource\Sale\ProductOffers;

use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Operations extends AbstractResource
{
    public function get(string $offerId, string $operationId): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/sale/product-offers/%s/operations/%s', $offerId, $operationId),
            null,
            ContentType::VND_BETA_V2
        );
    }
}
