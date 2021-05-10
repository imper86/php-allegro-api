<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\Loyalty;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class PromotionCampaigns extends AbstractResource
{
    /**
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/loyalty/promotion-campaigns', $body);
    }

    /**
     * @param string[]|null $query
     * @return ResponseInterface
     */
    public function get(?array $query = null): ResponseInterface
    {
        return $this->apiGet('/sale/loyalty/promotion-campaigns', $query);
    }

    /**
     * @param string[] $query
     * @return ResponseInterface
     */
    public function delete(array $query): ResponseInterface
    {
        return $this->apiDelete('/sale/loyalty/promotion-campaigns', $query);
    }
}
