<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 25.10.2019
 * Time: 16:37
 */

namespace Imper86\PhpAllegroApi;

use Http\Client\Common\Plugin;
use Imper86\HttpClientBuilder\BuilderInterface;
use Imper86\PhpAllegroApi\Oauth\OauthClientInterface;
use Imper86\PhpAllegroApi\Resource\Account;
use Imper86\PhpAllegroApi\Resource\AfterSalesServiceConditions;
use Imper86\PhpAllegroApi\Resource\Bidding;
use Imper86\PhpAllegroApi\Resource\Billing;
use Imper86\PhpAllegroApi\Resource\Charity;
use Imper86\PhpAllegroApi\Resource\Me;
use Imper86\PhpAllegroApi\Resource\Messaging;
use Imper86\PhpAllegroApi\Resource\Offers;
use Imper86\PhpAllegroApi\Resource\Order;
use Imper86\PhpAllegroApi\Resource\ParcelManagement;
use Imper86\PhpAllegroApi\Resource\Payments;
use Imper86\PhpAllegroApi\Resource\PointsOfService;
use Imper86\PhpAllegroApi\Resource\Pricing;
use Imper86\PhpAllegroApi\Resource\ResourceInterface;
use Imper86\PhpAllegroApi\Resource\Sale;
use Imper86\PhpAllegroApi\Resource\Users;
use Psr\Cache\CacheItemPoolInterface;

/**
 * Interface AsanaInterface
 * @package Imper86\AllegroApi
 *
 * @method Account account()
 * @method AfterSalesServiceConditions afterSalesServiceConditions()
 * @method Bidding bidding()
 * @method Billing billing()
 * @method Charity charity()
 * @method Me me()
 * @method Messaging messaging()
 * @method Offers offers()
 * @method Order order()
 * @method ParcelManagement parcelManagement()
 * @method Payments payments()
 * @method PointsOfService pointsOfService()
 * @method Pricing pricing()
 * @method Sale sale()
 * @method Users users()
 */
interface AllegroApiInterface
{
    /**
     * @param string $resource
     * @return ResourceInterface
     */
    public function api(string $resource): ResourceInterface;

    /**
     * @return OauthClientInterface
     */
    public function oauth(): OauthClientInterface;

    /**
     * @return BuilderInterface
     */
    public function getBuilder(): BuilderInterface;

    /**
     * @param Plugin $plugin
     */
    public function addPlugin(Plugin $plugin): void;

    /**
     * Fully qualified class name of plugin
     *
     * @param string $fqcn
     */
    public function removePlugin(string $fqcn): void;

    /**
     * @param CacheItemPoolInterface $cacheItemPool
     * @param mixed[] $config
     */
    public function addCache(CacheItemPoolInterface $cacheItemPool, array $config = []): void;

    /**
     * Removes cache plugin from http client
     */
    public function removeCache(): void;
}
