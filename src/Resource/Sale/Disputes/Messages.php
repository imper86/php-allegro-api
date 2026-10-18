<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\Disputes;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

/**
 * @deprecated Allegro removed /sale/disputes/{disputeId}/messages on 2026-01-07. Use Issues\Chat and Issues\Message for complaints, and Messaging\Threads\Messages for new post-purchase issues.
 */
class Messages extends AbstractResource
{
    /**
     * @param string $disputeId
     * @param string[]|null $query
     * @return ResponseInterface
     * @deprecated Allegro removed /sale/disputes/{disputeId}/messages on 2026-01-07. Use Issues\Chat::get().
     */
    public function get(string $disputeId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet("/sale/disputes/{$disputeId}/messages", $query);
    }

    /**
     * @param string $disputeId
     * @param mixed[] $body
     * @return ResponseInterface
     * @deprecated Allegro removed /sale/disputes/{disputeId}/messages on 2026-01-07. Use Issues\Message::post() for complaints, and Messaging\Threads\Messages::post() for new post-purchase issues.
     */
    public function post(string $disputeId, array $body): ResponseInterface
    {
        return $this->apiPost("/sale/disputes/{$disputeId}/messages", $body);
    }
}
