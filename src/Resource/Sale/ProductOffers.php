<?php

namespace Imper86\PhpAllegroApi\Resource\Sale;

use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Imper86\PhpAllegroApi\Resource\Sale\ProductOffers\Operations;
use Psr\Http\Message\ResponseInterface;

/**
 * @method Operations operations()
 */
class ProductOffers extends AbstractResource
{
    public function post(
        array $body,
        string $contentType = ContentType::VND_PUBLIC_V1
    ): ResponseInterface {
        return $this->apiPost('/sale/product-offers', $body, $contentType);
    }

    public function patch(
        string $offerId,
        array $body,
        string $contentType = ContentType::VND_PUBLIC_V1
    ): ResponseInterface {
        return $this->apiPatch(sprintf('/sale/product-offers/%s', $offerId), $body, $contentType);
    }

    public function get(string $offerId): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/sale/product-offers/%s', $offerId),
            null,
            ContentType::VND_PUBLIC_V2
        );
    }
}
