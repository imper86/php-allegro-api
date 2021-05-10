<?php


namespace Imper86\PhpAllegroApi\Resource;


use Psr\Http\Message\ResponseInterface;

class PointsOfService extends AbstractResource
{
    /**
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/points-of-service', $body);
    }

    /**
     * @param string|null $id
     * @param string[]|null $query
     * @return ResponseInterface
     */
    public function get(?string $id, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/points-of-service%s', $id ? "/{$id}" : ''), $query);
    }

    /**
     * @param string $id
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function put(string $id, array $body): ResponseInterface
    {
        return $this->apiPut("/points-of-service/{$id}", $body);
    }

    public function delete(string $id): ResponseInterface
    {
        return $this->apiDelete("/points-of-service/{$id}");
    }
}
