<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class OfferAttachments extends AbstractResource
{
    /**
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/offer-attachments', $body);
    }

    public function put(string $attachmentId, StreamInterface $stream): ResponseInterface
    {
        $uri = $this->uriFactory->createUri("/sale/offer-attachments/{$attachmentId}");
        $request = $this->requestFactory->createRequest('PUT', $uri)
            ->withBody($stream)
            ->withHeader('Content-Type', 'application/pdf');

        return $this->httpClient->sendRequest($request);
    }
}
