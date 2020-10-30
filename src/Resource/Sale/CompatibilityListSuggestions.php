<?php

namespace Imper86\PhpAllegroApi\Resource\Sale;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class CompatibilityListSuggestions extends AbstractResource
{
    public function get(?array $query): ResponseInterface
    {
        return $this->apiGet(
            '/sale/compatibility-list-suggestions',
            $query
        );
    }
}
