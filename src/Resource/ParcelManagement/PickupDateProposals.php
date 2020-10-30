<?php

namespace Imper86\PhpAllegroApi\Resource\ParcelManagement;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class PickupDateProposals extends AbstractResource
{
    public function get(array $query): ResponseInterface
    {
        return $this->apiGet('/parcel-management/pickup-date-proposals', $query);
    }
}
