<?php


namespace Imper86\PhpAllegroApi\Resource\Order;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Imper86\PhpAllegroApi\Resource\Order\Carriers\Allegro;
use Psr\Http\Message\ResponseInterface;

/**
 * @method Allegro allegro()
 */
class Carriers extends AbstractResource
{
    public function get(): ResponseInterface
    {
        return $this->apiGet('/order/carriers');
    }
}
