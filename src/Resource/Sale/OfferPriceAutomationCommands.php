<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Imper86\PhpAllegroApi\Resource\Sale\OfferPriceAutomationCommands\Tasks;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OfferPriceAutomationCommands
 * @package Imper86\PhpAllegroApi\Resource\Sale
 *
 * @method Tasks tasks()
 */
class OfferPriceAutomationCommands extends AbstractResource
{
    /**
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/offer-price-automation-commands', $body);
    }

    public function get(string $commandId): ResponseInterface
    {
        return $this->apiGet("/sale/offer-price-automation-commands/{$commandId}");
    }
}
