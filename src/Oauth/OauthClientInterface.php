<?php

namespace Imper86\PhpAllegroApi\Oauth;

use Http\Client\Common\Plugin;
use Imper86\PhpAllegroApi\Exceptions\AuthorizationPendingException;
use Imper86\PhpAllegroApi\Exceptions\AccessDeniedException;
use Imper86\PhpAllegroApi\Exceptions\SlowDownException;
use Imper86\PhpAllegroApi\Model\DeviceFlowAuthSession;
use Imper86\PhpAllegroApi\Model\TokenInterface;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\UriInterface;

interface OauthClientInterface
{
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
    ): UriInterface;

    public function fetchTokenWithCode(string $code): TokenInterface;

    public function fetchTokenWithRefreshToken(string $refreshToken): TokenInterface;

    public function fetchTokenWithClientCredentials(): TokenInterface;

    /**
     * @param string[]|null $scope
     * @return DeviceFlowAuthSession
     */
    public function getDeviceCode(
        ?array $scope = null
    ): DeviceFlowAuthSession;

    /**
     * @throws SlowDownException
     * @throws ClientExceptionInterface
     * @throws AuthorizationPendingException
     * @throws AccessDeniedException
     */
    public function fetchTokenWithDeviceCode(string $code): TokenInterface;

    public function addPlugin(Plugin $plugin): void;

    public function removePlugin(string $fqcn): void;
}
