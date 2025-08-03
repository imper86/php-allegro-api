<?php

namespace Imper86\PhpAllegroApi\Resource\Order\Carriers\Allegro;

use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;

use function sprintf;

class Tracking extends AbstractResource
{
    /**
     * @throws ClientExceptionInterface
     */
    public function get(array $waybills, string $carrier = 'ALLEGRO'): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/order/carriers/%s/tracking', $carrier),
            ['waybill' => $waybills],
            ContentType::VND_PUBLIC_V1
        );
    }
}
