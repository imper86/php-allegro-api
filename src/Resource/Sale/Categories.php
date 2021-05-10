<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Imper86\PhpAllegroApi\Resource\Sale\Categories\Parameters;
use Imper86\PhpAllegroApi\Resource\Sale\Categories\ProductParameters;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Categories
 * @package Imper86\PhpAllegroApi\Resource\Sale
 *
 * @method Parameters parameters()
 * @method ProductParameters productParameters()
 */
class Categories extends AbstractResource
{
    /**
     * @param string|null $categoryId
     * @param string[]|null $query
     * @return ResponseInterface
     */
    public function get(?string $categoryId = null, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/sale/categories%s', $categoryId ? "/{$categoryId}" : ''), $query);
    }
}
