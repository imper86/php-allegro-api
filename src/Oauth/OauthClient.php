<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 25.10.2019
 * Time: 16:44
 */

namespace Imper86\PhpAllegroApi\Oauth;

use Http\Client\Common\Plugin;
use Http\Client\Common\Plugin\ErrorPlugin;
use Imper86\HttpClientBuilder\Builder;
use Imper86\HttpClientBuilder\BuilderInterface;
use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Enum\EndpointHost;
use Imper86\PhpAllegroApi\Enum\GrantType;
use Imper86\PhpAllegroApi\Model\CredentialsInterface;
use Imper86\PhpAllegroApi\Model\TokenInterface;
use Imper86\PhpAllegroApi\Plugin\OauthUriPlugin;
use Imper86\PhpAllegroApi\Plugin\SandboxUriPlugin;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

class OauthClient implements OauthClientInterface
{
    /**
     * @var CredentialsInterface
     */
    private $credentials;
    /**
     * @var BuilderInterface
     */
    private $builder;
    /**
     * @var TokenFactoryInterface
     */
    private $tokenFactory;

    public function __construct(CredentialsInterface $credentials)
    {
        $this->credentials = $credentials;
        $this->tokenFactory = new TokenFactory();
        $this->builder = new Builder();
        $this->builder->addPlugin(new ErrorPlugin());
        $this->builder->addPlugin(new OauthUriPlugin());

        if ($credentials->isSandbox()) {
            $this->builder->addPlugin(new SandboxUriPlugin());
        }
    }

    public function getAuthorizationUri(
        bool $prompt = true,
        ?string $state = null,
        ?array $scope = null
    ): UriInterface {
        $query = [
            'client_id' => $this->credentials->getClientId(),
            'redirect_uri' => $this->credentials->getRedirectUri(),
            'response_type' => 'code',
        ];

        if ($state) {
            $query['state'] = $state;
        }

        if ($prompt) {
            $query['prompt'] = 'confirm';
        }

        if ($scope) {
            $query['scope'] = implode(' ', $scope);
        }

        $uri = $this->builder
            ->getUriFactory()
            ->createUri('/auth/oauth/authorize')
            ->withScheme('https')
            ->withHost(EndpointHost::OAUTH)
            ->withQuery(http_build_query($query));

        if ($this->credentials->isSandbox()) {
            $uri->withHost($uri->getHost() . EndpointHost::SANDBOX_SUFFIX);
        }

        return $uri;
    }

    public function fetchTokenWithCode(string $code): TokenInterface
    {
        $query = [
            'grant_type' => GrantType::AUTHORIZATION_CODE,
            'code' => $code,
            'redirect_uri' => $this->credentials->getRedirectUri(),
        ];

        $response = $this->builder->getHttpClient()->sendRequest($this->generateRequest($query));

        return $this->tokenFactory->createFromResponse($response, GrantType::AUTHORIZATION_CODE);
    }

    public function fetchTokenWithRefreshToken(string $refreshToken): TokenInterface
    {
        $query = [
            'grant_type' => GrantType::REFRESH_TOKEN,
            'refresh_token' => $refreshToken,
            'redirect_uri' => $this->credentials->getRedirectUri(),
        ];

        $response = $this->builder->getHttpClient()->sendRequest($this->generateRequest($query));

        return $this->tokenFactory->createFromResponse($response, GrantType::REFRESH_TOKEN);
    }

    public function fetchTokenWithClientCredentials(): TokenInterface
    {
        $query = ['grant_type' => GrantType::CLIENT_CREDENTIALS];
        $response = $this->builder->getHttpClient()->sendRequest($this->generateRequest($query));

        return $this->tokenFactory->createFromResponse($response, GrantType::CLIENT_CREDENTIALS);
    }

    public function addPlugin(Plugin $plugin): void
    {
        $this->builder->addPlugin($plugin);
    }

    public function removePlugin(string $fqcn): void
    {
        $this->builder->removePlugin($fqcn);
    }

    private function generateRequest(array $query): RequestInterface
    {
        $uri = $this->builder
            ->getUriFactory()
            ->createUri('/auth/oauth/token')
            ->withQuery(http_build_query($query));
        $auth = base64_encode(
            sprintf(
                '%s:%s',
                $this->credentials->getClientId(),
                $this->credentials->getClientSecret()
            )
        );

        return $this->builder
            ->getRequestFactory()
            ->createRequest('POST', $uri)
            ->withHeader('Content-Type', ContentType::X_WWW_FORM_URLENCODED)
            ->withHeader('Accept', ContentType::JSON)
            ->withHeader('Authorization', sprintf('Basic %s', $auth));
    }
}
