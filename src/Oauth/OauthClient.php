<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 25.10.2019
 * Time: 16:44
 */

namespace Imper86\PhpAllegroApi\Oauth;

use Http\Client\Common\Exception\ClientErrorException;
use Http\Client\Common\Plugin;
use Http\Client\Common\Plugin\ErrorPlugin;
use Imper86\HttpClientBuilder\Builder;
use Imper86\HttpClientBuilder\BuilderInterface;
use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Enum\EndpointHost;
use Imper86\PhpAllegroApi\Enum\GrantType;
use Imper86\PhpAllegroApi\Exceptions\AccessDeniedException;
use Imper86\PhpAllegroApi\Exceptions\AuthorizationPendingException;
use Imper86\PhpAllegroApi\Exceptions\SlowDownException;
use Imper86\PhpAllegroApi\Model\CredentialsInterface;
use Imper86\PhpAllegroApi\Model\DeviceFlowAuthSession;
use Imper86\PhpAllegroApi\Model\TokenInterface;
use Imper86\PhpAllegroApi\Plugin\OauthUriPlugin;
use Imper86\PhpAllegroApi\Plugin\SandboxUriPlugin;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function http_build_query;

class OauthClient implements OauthClientInterface
{
    private CredentialsInterface $credentials;
    private BuilderInterface $builder;
    private TokenFactoryInterface $tokenFactory;

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

    /**
     * @param bool $prompt
     * @param string|null $state
     * @param string[]|null $scope
     * @return UriInterface
     */
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
            $uri = $uri->withHost($uri->getHost() . EndpointHost::SANDBOX_SUFFIX);
        }

        return $uri;
    }

    public function getDeviceCode(
        ?array $scope = null
    ): DeviceFlowAuthSession {
        $query = [
            'client_id' => $this->credentials->getClientId(),
        ];

        if ($scope) {
            $query['scope'] = implode(' ', $scope);
        }

        $response = $this->builder->getHttpClient()->sendRequest($this->generateRequest($query, '/auth/oauth/device'));
        $body = json_decode($response->getBody()->__toString(), true);

        return new DeviceFlowAuthSession($body['device_code'], $body['expires_in'], $body['user_code'], $body['interval'], $body['verification_uri'], $body['verification_uri_complete']);
    }

    public function fetchTokenWithDeviceCode(string $code): TokenInterface
    {
        $body = [
            'grant_type' => GrantType::DEVICE_CODE,
            'device_code' => $code,
        ];

        try {
            $response = $this->builder->getHttpClient()->sendRequest($this->generateRequestWithBody($body, '/auth/oauth/token'));
        } catch (ClientErrorException $clientErrorException) {
            $response = $clientErrorException->getResponse();
            $body = json_decode($response->getBody()->__toString(), true);

            if ($body['error'] == 'slow_down') {
                throw new SlowDownException($body['error_description'], 0, $clientErrorException);
            } elseif ($body['error'] == 'authorization_pending') {
                throw new AuthorizationPendingException($body['error_description'], 0, $clientErrorException);
            } elseif ($body['error'] == 'access_denied') {
                throw new AccessDeniedException($body['error_description'], 0, $clientErrorException);
            } else {
                throw $clientErrorException;
            }
        }

        return $this->tokenFactory->createFromResponse($response, GrantType::DEVICE_CODE);
    }

    public function fetchTokenWithCode(string $code): TokenInterface
    {
        $body = [
            'grant_type' => GrantType::AUTHORIZATION_CODE,
            'code' => $code,
            'redirect_uri' => $this->credentials->getRedirectUri(),
        ];

        $response = $this->builder->getHttpClient()->sendRequest($this->generateRequestWithBody($body, '/auth/oauth/token'));

        return $this->tokenFactory->createFromResponse($response, GrantType::AUTHORIZATION_CODE);
    }

    public function fetchTokenWithRefreshToken(string $refreshToken): TokenInterface
    {
        $body = [
            'grant_type' => GrantType::REFRESH_TOKEN,
            'refresh_token' => $refreshToken,
            'redirect_uri' => $this->credentials->getRedirectUri(),
        ];

        $response = $this->builder->getHttpClient()->sendRequest($this->generateRequestWithBody($body, '/auth/oauth/token'));

        return $this->tokenFactory->createFromResponse($response, GrantType::REFRESH_TOKEN);
    }

    public function fetchTokenWithClientCredentials(): TokenInterface
    {
        $body = ['grant_type' => GrantType::CLIENT_CREDENTIALS];
        $response = $this->builder->getHttpClient()->sendRequest($this->generateRequestWithBody($body, '/auth/oauth/token'));

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

    /**
     * @param string[] $query
     * @param string $path
     * @return RequestInterface
     */
    private function generateRequest(array $query, string $path): RequestInterface
    {
        $uri = $this->builder
            ->getUriFactory()
            ->createUri($path)
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

    /**
     * @param string[] $body
     * @param string $path
     * @return RequestInterface
     */
    private function generateRequestWithBody(array $body, string $path): RequestInterface
    {
        $uri = $this->builder
            ->getUriFactory()
            ->createUri($path);
        $auth = base64_encode(
            sprintf(
                '%s:%s',
                $this->credentials->getClientId(),
                $this->credentials->getClientSecret()
            )
        );
        $stream = $this->builder
            ->getStreamFactory()
            ->createStream(http_build_query($body));

        return $this->builder
            ->getRequestFactory()
            ->createRequest('POST', $uri)
            ->withBody($stream)
            ->withHeader('Content-Type', ContentType::X_WWW_FORM_URLENCODED)
            ->withHeader('Accept', ContentType::JSON)
            ->withHeader('Authorization', sprintf('Basic %s', $auth));
    }
}
