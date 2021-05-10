<?php


namespace Imper86\PhpAllegroApi\Resource\Order;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

/**
 * Class LineItemIdMappings
 * @package Imper86\PhpAllegroApi\Resource\Order
 * @deprecated
 */
class LineItemIdMappings extends AbstractResource
{
    /**
     * @param string[] $query
     * @return ResponseInterface
     * @deprecated
     */
    public function get(array $query): ResponseInterface
    {
        return $this->apiGet('/order/line-item-id-mappings', $query);
    }
}
