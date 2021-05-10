<?php

namespace Imper86\PhpAllegroApi\Resource\Sale\Offers;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class UnfilledParameters extends AbstractResource
{
    /**
     * @param string[]|null $query
     * @return ResponseInterface
     */
    public function get(?array $query = null): ResponseInterface
    {
        return $this->apiGet('/sale/offers/unfilled-parameters', $query);
    }
}
