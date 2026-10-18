<?php

namespace Imper86\PhpAllegroApi\Resource\Sale;

use Imper86\PhpAllegroApi\Resource\Sale\Issues\Attachments;
use Imper86\PhpAllegroApi\Resource\Sale\Issues\Chat;
use Imper86\PhpAllegroApi\Resource\Sale\Issues\Message;
use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

/**
 * @method Attachments attachments()
 * @method Chat chat()
 * @method Message message()
 */
class Issues extends AbstractResource {
    public function get(?string $issueId = null, ?array $query = null): ResponseInterface {
        return $this->apiGet(sprintf('/sale/issues%s', $issueId ? "/$issueId" : ''), $query, ContentType::VND_BETA_V1);
    }
}
