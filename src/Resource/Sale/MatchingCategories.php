<?php

namespace Imper86\PhpAllegroApi\Resource\Sale;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class MatchingCategories extends AbstractResource
{
    public function get(array $query): ResponseInterface
    {
        return $this->apiGet('/sale/matching-categories', $query);
    }
}
