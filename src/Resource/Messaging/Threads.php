<?php

namespace Imper86\PhpAllegroApi\Resource\Messaging;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Imper86\PhpAllegroApi\Resource\Messaging\Threads\Messages as ThreadsMessages;
use Imper86\PhpAllegroApi\Resource\Messaging\Threads\Read;
use Psr\Http\Message\ResponseInterface;

/**
 * @method ThreadsMessages messages()
 * @method Read read()
 */
class Threads extends AbstractResource
{
    public function get(?string $threadId = null, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/messaging/threads%s', $threadId ? '/' . $threadId : ''),
            $query
        );
    }
}
