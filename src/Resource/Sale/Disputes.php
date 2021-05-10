<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Imper86\PhpAllegroApi\Resource\Sale\Disputes\Messages;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Disputes
 * @package Imper86\PhpAllegroApi\Resource\Sale
 *
 * @method Messages messages()
 */
class Disputes extends AbstractResource
{
    /**
     * @param string|null $disputeId
     * @param string[]|null $query
     * @return ResponseInterface
     */
    public function get(?string $disputeId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/sale/disputes%s', $disputeId ? "/{$disputeId}" : ''), $query);
    }
}
