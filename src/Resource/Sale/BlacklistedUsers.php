<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class BlacklistedUsers extends AbstractResource
{
    /**
     * @param string[]|null $query
     * @return ResponseInterface
     */
    public function get(?array $query = null): ResponseInterface
    {
        return $this->apiGet('/sale/blacklisted-users', $query);
    }

    /**
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/blacklisted-users', $body);
    }

    public function delete(string $excludedUserId): ResponseInterface
    {
        return $this->apiDelete("/sale/blacklisted-users/{$excludedUserId}");
    }
}
