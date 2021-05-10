<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\OfferAdditionalServices;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Groups extends AbstractResource
{
    /**
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/offer-additional-services/groups', $body);
    }

    /**
     * @param string|null $groupId
     * @param string[]|null $query
     * @return ResponseInterface
     */
    public function get(?string $groupId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/sale/offer-additional-services/groups%s', $groupId ? "/{$groupId}" : ''),
            $query
        );
    }

    /**
     * @param string $groupId
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function put(string $groupId, array $body): ResponseInterface
    {
        return $this->apiPut("/sale/offer-additional-services/groups/{$groupId}", $body);
    }
}
