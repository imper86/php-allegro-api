<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class BadgeApplications extends AbstractResource
{
    /**
     * @param string|null $applicationId
     * @param string[]|null $query
     * @return ResponseInterface
     */
    public function get(?string $applicationId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/sale/badge-applications%s', $applicationId ? "/{$applicationId}" : ''),
            $query,
            ContentType::VND_BETA_V1
        );
    }
}
