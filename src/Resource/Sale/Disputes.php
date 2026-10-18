<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Imper86\PhpAllegroApi\Resource\Sale\Disputes\Messages;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Disputes
 * @package Imper86\PhpAllegroApi\Resource\Sale
 *
 * @deprecated Allegro removed /sale/disputes on 2026-01-07. Use Issues for complaints and existing discussions, and Messaging for new post-purchase issues.
 *
 * @method Messages messages() Deprecated. Allegro removed /sale/disputes/{disputeId}/messages on 2026-01-07.
 */
class Disputes extends AbstractResource
{
    /**
     * @param string|null $disputeId
     * @param string[]|null $query
     * @return ResponseInterface
     * @deprecated Allegro removed /sale/disputes on 2026-01-07. Use Issues::get().
     */
    public function get(?string $disputeId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/sale/disputes%s', $disputeId ? "/{$disputeId}" : ''), $query);
    }
}
