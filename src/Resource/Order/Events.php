<?php


namespace Imper86\PhpAllegroApi\Resource\Order;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Events extends AbstractResource
{
    /**
     * @param string[]|null $query
     * @return ResponseInterface
     */
    public function get(?array $query = null): ResponseInterface
    {
        return $this->apiGet('/order/events', $query);
    }
}
