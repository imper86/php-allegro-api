<?php

namespace Imper86\PhpAllegroApi\Resource\Order\BillingDocuments;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class Files extends AbstractResource
{
    /**
     * Upload an invoice file for an order in a single request.
     *
     * POST /order/{orderId}/billing-documents/files
     *
     * @param string $orderId
     * @param StreamInterface|resource|string $file Invoice file contents. A string is the raw file, not a path.
     * @param string $invoiceNumber
     * @param string $fileName
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function post(
        string $orderId,
        $file,
        string $invoiceNumber,
        string $fileName = 'invoice.pdf'
    ): ResponseInterface {
        if (strpbrk($invoiceNumber, "\r\n") !== false || strpbrk($fileName, "\r\n\"") !== false) {
            throw new \InvalidArgumentException('Invoice number and file name must not contain line breaks or quotes');
        }

        $boundary = 'AllegroBoundary' . bin2hex(random_bytes(16));
        $body = $this->multipartBody($boundary, $this->readFile($file), $fileName, $invoiceNumber);

        $request = $this->requestFactory
            ->createRequest('POST', sprintf('/order/%s/billing-documents/files', rawurlencode($orderId)))
            ->withHeader('Content-Type', 'multipart/form-data; boundary=' . $boundary)
            ->withBody($this->streamFactory->createStream($body));

        return $this->httpClient->sendRequest($request);
    }

    /**
     * @param StreamInterface|resource|string $file
     */
    private function readFile($file): string
    {
        if ($file instanceof StreamInterface) {
            return $file->getContents();
        }

        if (is_resource($file)) {
            $contents = stream_get_contents($file);

            if ($contents === false) {
                throw new \RuntimeException('Unable to read invoice file');
            }

            return $contents;
        }

        if (is_string($file)) {
            return $file;
        }

        throw new \InvalidArgumentException(
            sprintf('File must be an instance of %s, a resource, or a string', StreamInterface::class)
        );
    }

    private function multipartBody(
        string $boundary,
        string $fileContents,
        string $fileName,
        string $invoiceNumber
    ): string {
        $eol = "\r\n";

        return '--' . $boundary . $eol
            . 'Content-Disposition: form-data; name="file"; filename="' . $fileName . '"' . $eol
            . 'Content-Type: application/pdf' . $eol
            . $eol
            . $fileContents . $eol
            . '--' . $boundary . $eol
            . 'Content-Disposition: form-data; name="invoiceNumber"' . $eol
            . $eol
            . $invoiceNumber . $eol
            . '--' . $boundary . '--' . $eol;
    }
}
