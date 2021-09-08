<?php

namespace Imper86\PhpAllegroApi\Resource\Messaging\Threads;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Messages extends AbstractResource
{
    public function get(string $threadId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/messaging/threads/%s/messages', $threadId), $query);
    }

    public function post(string $threadId, array $body): ResponseInterface
    {
        return $this->apiPost(sprintf('/messaging/threads/%s/messages', $threadId), $body);
    }
}
