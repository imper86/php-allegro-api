<?php

namespace Imper86\PhpAllegroApi\Resource\Sale\Badges\Offers;

use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Campaigns extends AbstractResource
{
    public function patch(string $offerId, string $campaignId, array $body): ResponseInterface
    {
        return $this->apiPatch(
            sprintf('/sale/badges/offers/%s/campaigns/%s', $offerId, $campaignId),
            $body,
            ContentType::VND_BETA_V1
        );
    }
}
