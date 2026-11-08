<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\AlleDiscount;


use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Imper86\PhpAllegroApi\Resource\Sale\AlleDiscount\Campaigns\EligibleOffers;
use Imper86\PhpAllegroApi\Resource\Sale\AlleDiscount\Campaigns\SubmittedOffers;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Campaigns
 * @package Imper86\PhpAllegroApi\Resource\Sale\AlleDiscount
 */
class Campaigns extends AbstractResource
{
    /**
     * GET /sale/alle-discount/campaigns
     *
     * @return ResponseInterface
     */
    public function get(): ResponseInterface
    {
        return $this->apiGet('/sale/alle-discount/campaigns', null, ContentType::VND_PUBLIC_V1);
    }

    /**
     * Offers that qualify for the given AlleDiscount campaign.
     */
    public function eligibleOffers(string $campaignId): EligibleOffers
    {
        return new EligibleOffers($this->client, $campaignId);
    }

    /**
     * Offers already submitted to the given AlleDiscount campaign.
     */
    public function submittedOffers(string $campaignId): SubmittedOffers
    {
        return new SubmittedOffers($this->client, $campaignId);
    }
}
