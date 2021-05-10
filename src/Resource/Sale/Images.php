<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Enum\EndpointHost;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class Images extends AbstractResource
{
    /**
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function postWithUrl(array $body): ResponseInterface
    {
        $encodedBody = json_encode($body);

        if (!$encodedBody) {
            throw new \RuntimeException(json_last_error_msg(), json_last_error());
        }

        return $this->postWithStream(
            $this->streamFactory->createStream($encodedBody),
            ContentType::VND_PUBLIC_V1
        );
    }

    public function postWithStream(StreamInterface $stream, string $contentType): ResponseInterface
    {
        $uri = $this->uriFactory->createUri('/sale/images')
            ->withHost(EndpointHost::UPLOAD);
        $request = $this->requestFactory->createRequest('POST', $uri)
            ->withBody($stream)
            ->withHeader('Content-Type', $contentType);

        return $this->httpClient->sendRequest($request);
    }
}
