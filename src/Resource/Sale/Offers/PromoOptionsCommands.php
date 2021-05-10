<?php

namespace Imper86\PhpAllegroApi\Resource\Sale\Offers;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Imper86\PhpAllegroApi\Resource\Sale\Offers\PromoOptionsCommands\Tasks;
use Psr\Http\Message\ResponseInterface;

/**
 * Class PromoOptionsCommands
 * @package Imper86\PhpAllegroApi\Resource\Sale\Offers
 *
 * @method Tasks tasks()
 */
class PromoOptionsCommands extends AbstractResource
{
    /**
     * @param string $commandId
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function put(string $commandId, array $body): ResponseInterface
    {
        return $this->apiPut(sprintf('/sale/offers/promo-options-commands/%s', $commandId), $body);
    }

    public function get(string $commandId): ResponseInterface
    {
        return $this->apiGet(sprintf('/sale/offers/promo-options-commands/%s', $commandId));
    }
}
