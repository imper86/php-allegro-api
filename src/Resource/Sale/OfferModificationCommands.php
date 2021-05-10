<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Imper86\PhpAllegroApi\Resource\Sale\OfferModificationCommands\Tasks;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OfferModificationCommands
 * @package Imper86\PhpAllegroApi\Resource\Sale
 *
 * @method Tasks tasks()
 */
class OfferModificationCommands extends AbstractResource
{
    /**
     * @param string $commandId
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function put(string $commandId, array $body): ResponseInterface
    {
        return $this->apiPut("/sale/offer-modification-commands/{$commandId}", $body);
    }

    public function get(string $commandId): ResponseInterface
    {
        return $this->apiGet("/sale/offer-modification-commands/{$commandId}");
    }
}
