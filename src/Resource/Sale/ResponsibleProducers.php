<?php

declare(strict_types=1);

namespace Imper86\PhpAllegroApi\Resource\Sale;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class ResponsibleProducers extends AbstractResource
{
    /**
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/responsible-producers', $body);
    }

    /**
     * @param string[] $query
     * @return ResponseInterface
     */
    public function get(array $query = []): ResponseInterface
    {
        return $this->apiGet('/sale/responsible-producers', $query);
    }

    /**
     * @param string $responsibleProducerId
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function put(string $responsibleProducerId, array $body): ResponseInterface
    {
        return $this->apiPut("/sale/responsible-producers/{$responsibleProducerId}", $body);
    }
}
