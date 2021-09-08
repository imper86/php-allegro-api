<?php

namespace Imper86\PhpAllegroApi\Resource\Messaging\Threads;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Read extends AbstractResource
{
    public function put(string $threadId, array $body): ResponseInterface
    {
        return $this->apiPut(sprintf('/messaging/threads/%s/read', $threadId), $body);
    }
}
