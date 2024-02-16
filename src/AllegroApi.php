<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 25.10.2019
 * Time: 16:42
 */

namespace Imper86\PhpAllegroApi;

use Http\Client\Common\Plugin;
use Imper86\HttpClientBuilder\Builder;
use Imper86\HttpClientBuilder\BuilderInterface;
use Imper86\PhpAllegroApi\Model\CredentialsInterface;
use Imper86\PhpAllegroApi\Oauth\OauthClient;
use Imper86\PhpAllegroApi\Oauth\OauthClientInterface;
use Imper86\PhpAllegroApi\Plugin\ContentTypePlugin;
use Imper86\PhpAllegroApi\Plugin\SandboxUriPlugin;
use Imper86\PhpAllegroApi\Plugin\UriPlugin;
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
use Imper86\PhpAllegroApi\Resource\ShipmentManagement;
use Imper86\PhpAllegroApi\Resource\ShipmentManagement\DeliveryServices;
use Imper86\PhpAllegroApi\Resource\Users;
use InvalidArgumentException;
use Psr\Cache\CacheItemPoolInterface;

/**
 * Class Asana
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
 * @method ShipmentManagement shipmentManagement()
 */
class AllegroApi implements AllegroApiInterface
{
    /**
     * @var BuilderInterface
     */
    private $builder;
    /**
     * @var CredentialsInterface
     */
    private $credentials;
    /**
     * @var OauthClientInterface|null
     */
    private $oauthClient;

    public function __construct(CredentialsInterface $credentials, ?BuilderInterface $builder = null)
    {
        $this->credentials = $credentials;
        $this->builder = $builder ?: new Builder();
        $this->builder->addPlugin(new UriPlugin($credentials, $this->builder->getUriFactory()));
        $this->builder->addPlugin(new ContentTypePlugin());

        if ($credentials->isSandbox()) {
            $this->builder->addPlugin(new SandboxUriPlugin());
        }
    }

    /**
     * @param string $name
     * @param mixed[] $arguments
     * @return ResourceInterface
     */
    public function __call(string $name, array $arguments): ResourceInterface
    {
        return $this->api($name);
    }

    public function api(string $resource): ResourceInterface
    {
        $className = 'Imper86\\PhpAllegroApi\\Resource\\' . ucfirst($resource);

        if (class_exists($className) && is_subclass_of($className, ResourceInterface::class)) {
            return new $className($this);
        }

        throw new InvalidArgumentException(sprintf('%s resource not found', $resource));
    }

    public function getBuilder(): BuilderInterface
    {
        return $this->builder;
    }

    public function oauth(): OauthClientInterface
    {
        if (null === $this->oauthClient) {
            $this->oauthClient = new OauthClient($this->credentials);
        }

        return $this->oauthClient;
    }

    public function addPlugin(Plugin $plugin): void
    {
        $this->builder->addPlugin($plugin);
    }

    public function removePlugin(string $fqcn): void
    {
        $this->builder->removePlugin($fqcn);
    }

    public function addCache(CacheItemPoolInterface $cacheItemPool, array $config = []): void
    {
        $this->builder->addCache($cacheItemPool, $config);
    }

    public function removeCache(): void
    {
        $this->builder->removeCache();
    }
}
