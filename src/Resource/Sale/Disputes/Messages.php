<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\Disputes;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Messages extends AbstractResource
{
    /**
     * @param string $disputeId
     * @param string[]|null $query
     * @return ResponseInterface
     */
    public function get(string $disputeId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet("/sale/disputes/{$disputeId}/messages", $query);
    }

    /**
     * @param string $disputeId
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(string $disputeId, array $body): ResponseInterface
    {
        return $this->apiPost("/sale/disputes/{$disputeId}/messages", $body);
    }
}
