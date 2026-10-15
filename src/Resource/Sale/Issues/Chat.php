<?php

namespace Imper86\PhpAllegroApi\Resource\Sale\Issues;

use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Chat extends AbstractResource {
    /**
     * @param string $issueId
     * @param string[]|null $query
     * @return ResponseInterface
     */
    public function get(string $issueId, ?array $query = null): ResponseInterface {
        return $this->apiGet("/sale/issues/{$issueId}/chat", $query, ContentType::VND_BETA_V1);
    }
}
