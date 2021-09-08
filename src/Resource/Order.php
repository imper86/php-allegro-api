<?php


namespace Imper86\PhpAllegroApi\Resource;


use Imper86\PhpAllegroApi\Resource\Order\Carriers;
use Imper86\PhpAllegroApi\Resource\Order\CheckoutForms;
use Imper86\PhpAllegroApi\Resource\Order\CustomerReturns;
use Imper86\PhpAllegroApi\Resource\Order\Events;
use Imper86\PhpAllegroApi\Resource\Order\EventStats;
use Imper86\PhpAllegroApi\Resource\Order\LineItemIdMappings;
use Imper86\PhpAllegroApi\Resource\Order\RefundClaims;

/**
 * Class Order
 * @package Imper86\PhpAllegroApi\Resource
 *
 * @method Events events()
 * @method EventStats eventStats()
 * @method CheckoutForms checkoutForms()
 * @method CustomerReturns customerReturns()
 * @method LineItemIdMappings lineItemIdMappings()
 * @method Carriers carriers()
 * @method RefundClaims refundClaims()
 */
class Order extends AbstractResource
{
}
