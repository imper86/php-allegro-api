<?php

namespace Imper86\PhpAllegroApi\Resource\Order;

use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Imper86\PhpAllegroApi\Resource\Order\CustomerReturns\Rejection;
use Psr\Http\Message\ResponseInterface;

/**
 * @method Rejection rejection()
 */
class CustomerReturns extends AbstractResource
{
    public function get(?string $returnId = null, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/order/customer-returns%s', $returnId ? "/$returnId" : ''),
            $query,
            ContentType::VND_BETA_V1
        );
    }
}
