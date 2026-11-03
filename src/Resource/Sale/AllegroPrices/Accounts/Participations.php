<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\AllegroPrices\Accounts;


use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

/**
 * Account participation in Allegro Ceny, per marketplace.
 *
 * Status: ALLOWED (offers may join) or DENIED (offers are excluded).
 *
 * @package Imper86\PhpAllegroApi\Resource\Sale\AllegroPrices\Accounts
 */
class Participations extends AbstractResource
{
    /**
     * GET /sale/allegro-prices/accounts/participations
     */
    public function get(): ResponseInterface
    {
        return $this->apiGet(
            '/sale/allegro-prices/accounts/participations',
            null,
            ContentType::VND_PUBLIC_V1
        );
    }

    /**
     * PATCH /sale/allegro-prices/accounts/participations
     *
     * Body: marketplaces[] with id (for example allegro-pl) and status (ALLOWED or DENIED).
     *
     * @param mixed[] $body
     */
    public function patch(array $body): ResponseInterface
    {
        return $this->apiPatch(
            '/sale/allegro-prices/accounts/participations',
            $body,
            ContentType::VND_PUBLIC_V1
        );
    }
}
