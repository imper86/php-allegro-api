<?php

namespace Imper86\PhpAllegroApi\Resource\Order\Carriers;

use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;

class Tracking extends AbstractResource
{
    /**
     * @param string $carrierId
     * @param string[] $waybills
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function get(string $carrierId, array $waybills): ResponseInterface
    {
        return $this->apiGet(
            "/order/carriers/{$carrierId}/tracking",
            ['waybill' => $waybills],
            ContentType::VND_PUBLIC_V1
        );
    }
}
