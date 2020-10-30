<?php

namespace Imper86\PhpAllegroApi\Resource\ParcelManagement;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class ParcelCancelCommands extends AbstractResource
{
    public function put(string $commandId, array $body): ResponseInterface
    {
        return $this->apiPut(
            sprintf('/parcel-management/parcel-cancel-commands/%s', $commandId),
            $body
        );
    }

    public function get(string $commandId): ResponseInterface
    {
        return $this->apiGet(sprintf('/parcel-management/parcel-cancel-commands/%s', $commandId));
    }
}
