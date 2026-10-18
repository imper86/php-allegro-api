<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class PriceAutomationRules extends AbstractResource
{
    public function get(?string $ruleId = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/sale/price-automation/rules%s', $ruleId ? "/{$ruleId}" : ''));
    }

    /**
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/price-automation/rules', $body);
    }

    /**
     * @param string $ruleId
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function put(string $ruleId, array $body): ResponseInterface
    {
        return $this->apiPut("/sale/price-automation/rules/{$ruleId}", $body);
    }

    public function delete(string $ruleId): ResponseInterface
    {
        return $this->apiDelete("/sale/price-automation/rules/{$ruleId}");
    }
}
