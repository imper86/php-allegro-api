<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 20.10.2019
 * Time: 14:40
 */

namespace Imper86\PhpAllegroApi\Resource;

use Imper86\PhpAllegroApi\AllegroApiInterface;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface as HttpClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;

abstract class AbstractResource implements ResourceInterface
{
    protected AllegroApiInterface $client;
    protected RequestFactoryInterface $requestFactory;
    protected UriFactoryInterface $uriFactory;
    protected HttpClientInterface $httpClient;
    protected StreamFactoryInterface $streamFactory;
    /**
     * @var \ReflectionClass<static>
     */
    protected \ReflectionClass $reflection;

    public function __construct(AllegroApiInterface $client)
    {
        $this->client = $client;
        $this->requestFactory = $client->getBuilder()->getRequestFactory();
        $this->uriFactory = $client->getBuilder()->getUriFactory();
        $this->streamFactory = $client->getBuilder()->getStreamFactory();
        $this->httpClient = $client->getBuilder()->getHttpClient();
        $this->reflection = new \ReflectionClass($this);
    }

    /**
     * @param string $name
     * @param mixed[] $arguments
     * @return ResourceInterface
     * @throws \InvalidArgumentException
     */
    public function __call(string $name, array $arguments): ResourceInterface
    {
        $className = $this->reflection->getName() . '\\' . ucfirst($name);

        if (class_exists($className) && is_a($className, ResourceInterface::class, true)) {
            return new $className($this->client);
        }

        throw new \InvalidArgumentException(sprintf('%s resource not found', $name));
    }

    /**
     * @param string $uri
     * @param mixed[]|null $query
     * @param string|null $contentType
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    protected function apiGet(
        string $uri,
        ?array $query = null,
        ?string $contentType = null
    ): ResponseInterface {
        $uri = $this->uriFactory->createUri($uri);

        if ($query) {
            $uri = $uri->withQuery(
                preg_replace('/%5B(?:[0-9]|[1-9][0-9]+)%5D=/', '=', http_build_query($query))
            );
        }

        $request = $this->requestFactory->createRequest('GET', $uri);

        if ($contentType) {
            $request = $this->addContentHeaders($request, $contentType);
        }

        return $this->httpClient->sendRequest($request);
    }

    /**
     * @param string $uri
     * @param mixed[]|null $body
     * @param string|null $contentType
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    protected function apiPost(
        string $uri,
        ?array $body = null,
        ?string $contentType = null
    ): ResponseInterface {
        $request = $this->requestFactory->createRequest('POST', $uri);
        $encodedBody = json_encode($body);

        if (!$encodedBody) {
            throw new \RuntimeException(json_last_error_msg(), json_last_error());
        }

        if ($body) {
            $stream = $this->streamFactory->createStream($encodedBody);
            $request = $request->withBody($stream);
        }

        if ($contentType) {
            $request = $this->addContentHeaders($request, $contentType);
        }

        return $this->httpClient->sendRequest($request);
    }

    /**
     * @param string $uri
     * @param mixed[]|null $body
     * @param string|null $contentType
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    protected function apiPut(
        string $uri,
        ?array $body = null,
        ?string $contentType = null
    ): ResponseInterface {
        $request = $this->requestFactory->createRequest('PUT', $uri);
        $encodedBody = json_encode($body);

        if (!$encodedBody) {
            throw new \RuntimeException(json_last_error_msg(), json_last_error());
        }

        if ($body) {
            $stream = $this->streamFactory->createStream($encodedBody);
            $request = $request->withBody($stream);
        }

        if ($contentType) {
            $request = $this->addContentHeaders($request, $contentType);
        }

        return $this->httpClient->sendRequest($request);
    }

    /**
     * @param string $uri
     * @param mixed[]|null $body
     * @param string|null $contentType
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    protected function apiPatch(
        string $uri,
        ?array $body = null,
        ?string $contentType = null
    ): ResponseInterface {
        $request = $this->requestFactory->createRequest('PATCH', $uri);
        $encodedBody = json_encode($body);

        if (!$encodedBody) {
            throw new \RuntimeException(json_last_error_msg(), json_last_error());
        }

        if ($body) {
            $stream = $this->streamFactory->createStream($encodedBody);
            $request = $request->withBody($stream);
        }

        if ($contentType) {
            $request = $this->addContentHeaders($request, $contentType);
        }

        return $this->httpClient->sendRequest($request);
    }

    /**
     * @param string $uri
     * @param string[]|null $query
     * @param string|null $contentType
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    protected function apiDelete(
        string $uri,
        ?array $query = null,
        ?string $contentType = null
    ): ResponseInterface {
        $uri = $this->uriFactory->createUri($uri);

        if ($query) {
            $uri = $uri->withQuery(http_build_query($query));
        }

        $request = $this->requestFactory->createRequest('DELETE', $uri);

        if ($contentType) {
            $request = $this->addContentHeaders($request, $contentType);
        }

        return $this->httpClient->sendRequest($request);
    }

    private function addContentHeaders(
        RequestInterface $request,
        string $contentType
    ): RequestInterface {
        return $request
            ->withHeader('Content-Type', $contentType)
            ->withHeader('Accept', $contentType);
    }
}
