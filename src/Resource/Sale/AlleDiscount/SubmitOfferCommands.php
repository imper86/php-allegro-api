<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\AlleDiscount;


use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

/**
 * Async submit of one offer to an AlleDiscount campaign.
 *
 * POST body:
 * - commandId (optional UUID; Allegro generates one when omitted)
 * - input.offer.id
 * - input.campaign.id
 * - input.proposedPrice.amount
 * - input.proposedPrice.currency (proposedPrice must be <= requiredMerchantPrice from eligible offers)
 *
 * Command status: NEW, IN_PROGRESS, FAILED, SUCCESSFUL.
 * A successful command returns output.newOfferParticipation.participationId.
 *
 * @package Imper86\PhpAllegroApi\Resource\Sale\AlleDiscount
 */
class SubmitOfferCommands extends AbstractResource
{
    /**
     * POST /sale/alle-discount/submit-offer-commands
     *
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost(
            '/sale/alle-discount/submit-offer-commands',
            $body,
            ContentType::VND_PUBLIC_V1
        );
    }

    /**
     * GET /sale/alle-discount/submit-offer-commands/{commandId}
     */
    public function get(string $commandId): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/sale/alle-discount/submit-offer-commands/%s', rawurlencode($commandId)),
            null,
            ContentType::VND_PUBLIC_V1
        );
    }
}
