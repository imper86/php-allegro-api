<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\AlleDiscount\Campaigns;


use Imper86\PhpAllegroApi\AllegroApiInterface;
use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

/**
 * GET /sale/alle-discount/{campaignId}/eligible-offers
 *
 * @package Imper86\PhpAllegroApi\Resource\Sale\AlleDiscount\Campaigns
 */
class EligibleOffers extends AbstractResource
{
    private string $campaignId;

    public function __construct(AllegroApiInterface $client, string $campaignId)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
    }

    /**
     * @param mixed[]|null $query limit (max 200), offset, offerId, meetsConditions ("true" returns only offers that meet campaign conditions)
     * @return ResponseInterface
     */
    public function get(?array $query = null): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/sale/alle-discount/%s/eligible-offers', rawurlencode($this->campaignId)),
            $query,
            ContentType::VND_PUBLIC_V1
        );
    }
}
