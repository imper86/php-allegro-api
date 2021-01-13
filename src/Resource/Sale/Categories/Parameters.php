<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\Categories;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Imper86\PhpAllegroApi\Resource\Sale\Categories\Parameters\RequiredChanges;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Parameters
 * @package Imper86\PhpAllegroApi\Resource\Sale\Categories
 *
 * @method RequiredChanges requiredChanges()
 */
class Parameters extends AbstractResource
{
    public function get(string $categoryId): ResponseInterface
    {
        return $this->apiGet("/sale/categories/{$categoryId}/parameters");
    }
}
