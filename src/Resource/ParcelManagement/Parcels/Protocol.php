<?php

namespace Imper86\PhpAllegroApi\Resource\ParcelManagement\Parcels;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Protocol extends AbstractResource
{
    /**
     * @param string[] $query
     * @return ResponseInterface
     */
    public function get(array $query): ResponseInterface
    {
        return $this->apiGet('/parcel-management/parcels/protocol', $query);
    }
}
