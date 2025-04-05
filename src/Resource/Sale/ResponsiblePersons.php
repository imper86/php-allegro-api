<?php

declare(strict_types=1);

namespace Imper86\PhpAllegroApi\Resource\Sale;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class ResponsiblePersons extends AbstractResource
{
    /**
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/responsible-persons', $body);
    }

    /**
     * @param string[] $query
     * @return ResponseInterface
     */
    public function get(array $query = []): ResponseInterface
    {
        return $this->apiGet('/sale/responsible-persons', $query);
    }

    /**
     * @param string $responsiblePersonId
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function put(string $responsiblePersonId, array $body): ResponseInterface
    {
        return $this->apiPut("/sale/responsible-persons/{$responsiblePersonId}", $body);
    }
}
