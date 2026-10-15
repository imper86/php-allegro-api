<?php

namespace Imper86\PhpAllegroApi\Resource\Sale\Issues;

use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Message extends AbstractResource {
    /**
     * @param string $issueId
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(string $issueId, array $body): ResponseInterface {
        return $this->apiPost("/sale/issues/{$issueId}/message", $body, ContentType::VND_BETA_V1);
    }
}
