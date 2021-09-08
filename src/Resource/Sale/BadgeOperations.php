<?php

namespace Imper86\PhpAllegroApi\Resource\Sale;

use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class BadgeOperations extends AbstractResource
{
    public function get(string $operationId): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/sale/badge-operations/%s', $operationId),
            null,
            ContentType::VND_BETA_V1
        );
    }
}
