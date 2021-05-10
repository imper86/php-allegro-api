<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Imper86\PhpAllegroApi\Resource\Sale\UserRatings\Answer;
use Imper86\PhpAllegroApi\Resource\Sale\UserRatings\Removal;
use Psr\Http\Message\ResponseInterface;

/**
 * Class UserRatings
 * @package Imper86\PhpAllegroApi\Resource\Sale
 *
 * @method Answer answer()
 * @method Removal removal()
 */
class UserRatings extends AbstractResource
{
    /**
     * @param string[] $query
     * @return ResponseInterface
     */
    public function get(array $query): ResponseInterface
    {
        return $this->apiGet('/sale/user-ratings', $query);
    }
}
