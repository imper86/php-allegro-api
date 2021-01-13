<?php

namespace Imper86\PhpAllegroApi\Resource\Sale\Categories\Parameters;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class RequiredChanges extends AbstractResource
{
    public function get(?array $query = null): ResponseInterface
    {
        return $this->apiGet('/sale/categories/parameters/required-changes', $query);
    }
}
