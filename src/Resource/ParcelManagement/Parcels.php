<?php


namespace Imper86\PhpAllegroApi\Resource\ParcelManagement;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Imper86\PhpAllegroApi\Resource\ParcelManagement\Parcels\Label;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Parcels
 * @package Imper86\PhpAllegroApi\Resource\ParcelManagement
 *
 * @method Label label()
 */
class Parcels extends AbstractResource
{
    public function get(string $parcelId): ResponseInterface
    {
        return $this->apiGet(sprintf('/parcel-management/parcels/%s', $parcelId));
    }
}
