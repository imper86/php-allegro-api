<?php

namespace Imper86\PhpAllegroApi\Resource\Charity;

use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class FundraisingCampaigns extends AbstractResource
{
    /**
     * @param string|null $id
     * @param string[]|null $query
     * @return ResponseInterface
     */
    public function get(?string $id = null, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/charity/fundraising-campaigns%s', $id ? "/{$id}" : ''),
            $query,
            ContentType::VND_BETA_V1
        );
    }
}
