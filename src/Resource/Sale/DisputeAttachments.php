<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * @deprecated Allegro removed /sale/dispute-attachments on 2026-01-07. Use Issues\Attachments.
 */
class DisputeAttachments extends AbstractResource
{
    /**
     * @param mixed[] $body
     * @return ResponseInterface
     * @deprecated Allegro removed /sale/dispute-attachments on 2026-01-07. Use Issues\Attachments.
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/dispute-attachments', $body);
    }

    /**
     * @deprecated Allegro removed /sale/dispute-attachments on 2026-01-07. Use Issues\Attachments.
     */
    public function put(string $attachmentId, StreamInterface $stream, string $contentType): ResponseInterface
    {
        $uri = $this->uriFactory->createUri("/sale/dispute-attachments/{$attachmentId}");
        $request = $this->requestFactory->createRequest('PUT', $uri)
            ->withBody($stream)
            ->withHeader('Content-Type', $contentType);

        return $this->httpClient->sendRequest($request);
    }

    /**
     * @deprecated Allegro removed /sale/dispute-attachments on 2026-01-07. Use Issues\Attachments::get().
     */
    public function get(string $attachmentId): ResponseInterface
    {
        $uri = $this->uriFactory->createUri("/sale/dispute-attachments/{$attachmentId}");
        $request = $this->requestFactory->createRequest('GET', $uri)
            ->withHeader('Accept', '*/*');

        return $this->httpClient->sendRequest($request);
    }
}
