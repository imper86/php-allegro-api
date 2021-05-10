<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class ShippingRates extends AbstractResource
{
    /**
     * @param string|null $id
     * @param string[]|null $query
     * @return ResponseInterface
     */
    public function get(?string $id, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/sale/shipping-rates%s', $id ? "/{$id}" : ''), $query);
    }

    /**
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/shipping-rates', $body);
    }

    /**
     * @param string $id
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function put(string $id, array $body): ResponseInterface
    {
        return $this->apiPut("/sale/shipping-rates/{$id}", $body);
    }
}
