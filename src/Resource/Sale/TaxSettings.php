<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class TaxSettings extends AbstractResource
{
    public function get(string $categoryId): ResponseInterface
    {
        return $this->apiGet('/sale/tax-settings', ['category.id' => $categoryId]);
    }
}
