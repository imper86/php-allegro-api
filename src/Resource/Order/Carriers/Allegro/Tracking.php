<?php

namespace Imper86\PhpAllegroApi\Resource\Order\Carriers\Allegro;

use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;

class Tracking extends AbstractResource
{
    /**
     * @param string[] $waybills
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function get(array $waybills): ResponseInterface
    {
        return $this->apiGet(
            '/order/carriers/ALLEGRO/tracking',
            ['waybill' => $waybills],
            ContentType::VND_PUBLIC_V1
        );
    }
}
