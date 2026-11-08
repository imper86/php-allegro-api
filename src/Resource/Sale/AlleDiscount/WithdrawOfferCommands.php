<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\AlleDiscount;


use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

/**
 * Async withdrawal of an offer from an AlleDiscount campaign.
 *
 * POST body:
 * - commandId (optional UUID; Allegro generates one when omitted)
 * - input.participationId (from a successful submit command or submitted offers)
 *
 * Command status: NEW, IN_PROGRESS, FAILED, SUCCESSFUL.
 *
 * @package Imper86\PhpAllegroApi\Resource\Sale\AlleDiscount
 */
class WithdrawOfferCommands extends AbstractResource
{
    /**
     * POST /sale/alle-discount/withdraw-offer-commands
     *
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost(
            '/sale/alle-discount/withdraw-offer-commands',
            $body,
            ContentType::VND_PUBLIC_V1
        );
    }

    /**
     * GET /sale/alle-discount/withdraw-offer-commands/{commandId}
     */
    public function get(string $commandId): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/sale/alle-discount/withdraw-offer-commands/%s', rawurlencode($commandId)),
            null,
            ContentType::VND_PUBLIC_V1
        );
    }
}
