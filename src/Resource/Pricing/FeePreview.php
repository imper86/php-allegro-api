<?php


namespace Imper86\PhpAllegroApi\Resource\Pricing;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

/**
 * @deprecated
 */
class FeePreview extends AbstractResource
{
    /**
     * @param mixed[] $body
     * @return ResponseInterface
     * @deprecated
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/pricing/fee-preview', $body);
    }
}
