<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class OfferTags extends AbstractResource
{
    /**
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/offer-tags', $body);
    }

    /**
     * @param string[] $query
     * @return ResponseInterface
     */
    public function get(array $query): ResponseInterface
    {
        return $this->apiGet('/sale/offer-tags', $query);
    }

    public function delete(string $tagId): ResponseInterface
    {
        return $this->apiDelete("/sale/offer-tags/{$tagId}");
    }

    /**
     * @param string $tagId
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function put(string $tagId, array $body): ResponseInterface
    {
        return $this->apiPut("/sale/offer-tags/{$tagId}", $body);
    }
}
