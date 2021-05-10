<?php

namespace Imper86\PhpAllegroApi\Resource\Sale;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class CompatibilityListSuggestions extends AbstractResource
{
    /**
     * @param string[]|null $query
     * @return ResponseInterface
     */
    public function get(?array $query): ResponseInterface
    {
        return $this->apiGet(
            '/sale/compatibility-list-suggestions',
            $query
        );
    }
}
