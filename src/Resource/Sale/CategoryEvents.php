<?php

namespace Imper86\PhpAllegroApi\Resource\Sale;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class CategoryEvents extends AbstractResource
{
    public function get(?array $query = null): ResponseInterface
    {
        return $this->apiGet('/sale/category-events', $query);
    }
}
