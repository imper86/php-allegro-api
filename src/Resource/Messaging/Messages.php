<?php

namespace Imper86\PhpAllegroApi\Resource\Messaging;

use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Messages extends AbstractResource
{
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/messaging/messages', $body, ContentType::VND_BETA_V1);
    }

    public function get(string $messageId): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/messaging/messages/%s', $messageId),
            null,
            ContentType::VND_BETA_V1
        );
    }

    /**
     * @deprecated Allegro will remove DELETE /messaging/messages/{messageId}.
     */
    public function delete(string $messageId): ResponseInterface
    {
        return $this->apiDelete(
            sprintf('/messaging/messages/%s', $messageId),
            null,
            ContentType::VND_BETA_V1
        );
    }
}
