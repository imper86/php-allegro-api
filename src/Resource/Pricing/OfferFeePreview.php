<?php


namespace Imper86\PhpAllegroApi\Resource\Pricing;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class OfferFeePreview extends AbstractResource
{
    /**
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/pricing/offer-fee-preview', $body);
    }
}
