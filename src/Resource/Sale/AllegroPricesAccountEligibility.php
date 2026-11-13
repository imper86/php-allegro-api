<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

/**
 * @deprecated Allegro removed GET /sale/allegro-prices-account-eligibility on 2026-05-25. Use AllegroPrices::accounts()->participations()->get().
 */
class AllegroPricesAccountEligibility extends AbstractResource
{
    /**
     * @deprecated Allegro removed GET /sale/allegro-prices-account-eligibility on 2026-05-25. Use AllegroPrices::accounts()->participations()->get().
     */
    public function get(): ResponseInterface
    {
        return $this->apiGet('/sale/allegro-prices-account-eligibility');
    }
}
