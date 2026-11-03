<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\AllegroPrices;


use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

/**
 * POST /sale/allegro-prices/offers-queries
 *
 * Returns offers in publication status ACTIVATING, ACTIVE, or ENDED.
 *
 * Body:
 * - marketplace.id (required)
 * - offer.scope (optional): WITH_DECLARATION, DISCOUNTED, EXCLUDED
 * - offer.ids (optional list of offer ids)
 * - offer.substatus (optional): DISCOUNT_OPPORTUNITY, DISCOUNT_RECOMMENDATION
 * - limit (optional, 1-1000, default 20)
 * - offset (optional)
 *
 * @package Imper86\PhpAllegroApi\Resource\Sale\AllegroPrices
 */
class OffersQueries extends AbstractResource
{
    /**
     * @param mixed[] $body
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost(
            '/sale/allegro-prices/offers-queries',
            $body,
            ContentType::VND_PUBLIC_V1
        );
    }
}
