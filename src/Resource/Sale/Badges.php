<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Imper86\PhpAllegroApi\Resource\Sale\Badges\Offers as BadgesOffers;
use Psr\Http\Message\ResponseInterface;

/**
 * @method BadgesOffers offers()
 */
class Badges extends AbstractResource
{
    /**
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/badges', $body, ContentType::VND_BETA_V1);
    }

    /**
     * @param string[]|null $query
     * @return ResponseInterface
     */
    public function get(?array $query = null): ResponseInterface
    {
        return $this->apiGet('/sale/badges', $query, ContentType::VND_BETA_V1);
    }
}
