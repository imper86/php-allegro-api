<?php

namespace Imper86\PhpAllegroApi\Resource\ShipmentManagement;

use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Label extends AbstractResource {
    /**
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(array $body): ResponseInterface {
        return $this->apiPost(
            '/shipment-management/label',
            $body,
            ContentType::VND_PUBLIC_V1,
            ContentType::OCET_STREAM
        );
    }
}