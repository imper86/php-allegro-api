<?php

namespace Imper86\PhpAllegroApi\Resource\Messaging;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class MessageAttachments extends AbstractResource
{
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/messaging/message-attachments', $body);
    }

    public function put(string $attachmentId, string $contentType, StreamInterface $body): ResponseInterface
    {
        $uri = $this->uriFactory->createUri(sprintf('/messaging/message-attachments/%s', $attachmentId));
        $request = $this->requestFactory->createRequest('PUT', $uri)
            ->withHeader('Content-Type', $contentType)
            ->withBody($body);

        return $this->httpClient->sendRequest($request);
    }

    public function get(string $attachmentId): ResponseInterface
    {
        $uri = $this->uriFactory->createUri(sprintf('/messaging/message-attachments/%s', $attachmentId));
        $request = $this->requestFactory->createRequest('GET', $uri)
            ->withHeader('Accept', '*/*');

        return $this->httpClient->sendRequest($request);
    }
}
