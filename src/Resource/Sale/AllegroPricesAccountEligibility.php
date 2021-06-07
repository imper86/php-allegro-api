<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class AllegroPricesAccountEligibility extends AbstractResource
{
    public function get(): ResponseInterface
    {
        return $this->apiGet('/sale/allegro-prices-account-eligibility');
    }
}
