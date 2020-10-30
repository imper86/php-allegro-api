<?php

namespace Imper86\PhpAllegroApi\Resource\Sale;

use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class ProductOffers extends AbstractResource
{
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/product-offers', $body, ContentType::VND_BETA_V1);
    }

    public function patch(string $offerId, array $body): ResponseInterface
    {
        return $this->apiPatch(
            sprintf('/sale/product-offers/%s', $offerId),
            $body,
            ContentType::VND_BETA_V1
        );
    }
}
