<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\AllegroPrices\Offers;


use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

/**
 * Async submit of offers to Allegro Ceny. Several offers may be sent in one command.
 *
 * POST body:
 * - commandId (optional UUID; Allegro generates one when omitted)
 * - offers[].id
 * - offers[].marketplace.id
 * - offers[].sellerDiscountDeclaration.maxContributionPercentage (optional seller-funded discount percentage)
 *
 * The command response includes status (for example IN_PROGRESS).
 * Each offer in the command status is SUCCESS, or FAILED with errors.
 *
 * @package Imper86\PhpAllegroApi\Resource\Sale\AllegroPrices\Offers
 */
class SubmitOfferCommands extends AbstractResource
{
    /**
     * POST /sale/allegro-prices/offers/submit-offer-commands
     *
     * @param mixed[] $body
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost(
            '/sale/allegro-prices/offers/submit-offer-commands',
            $body,
            ContentType::VND_PUBLIC_V1
        );
    }

    /**
     * GET /sale/allegro-prices/offers/submit-offer-commands/{commandId}
     */
    public function get(string $commandId): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/sale/allegro-prices/offers/submit-offer-commands/%s', rawurlencode($commandId)),
            null,
            ContentType::VND_PUBLIC_V1
        );
    }
}
