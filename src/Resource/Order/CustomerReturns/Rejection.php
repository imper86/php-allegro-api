<?php

namespace Imper86\PhpAllegroApi\Resource\Order\CustomerReturns;

use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Rejection extends AbstractResource
{
    public function post(string $returnId, array $body): ResponseInterface
    {
        return $this->apiPost(
            sprintf('/order/customer-returns/%s/rejection', $returnId),
            $body,
            ContentType::VND_BETA_V1
        );
    }
}
