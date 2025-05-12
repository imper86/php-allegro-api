<?php

namespace Imper86\PhpAllegroApi\Resource\Order\CheckoutForms\Invoices;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class File extends AbstractResource
{
    /**
     * @param string $checkoutFormId
     * @param string $invoiceId
     * @param StreamInterface|resource|string $body
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function put(string $checkoutFormId, string $invoiceId, $body): ResponseInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'PUT',
                sprintf('/order/checkout-forms/%s/invoices/%s/file', $checkoutFormId, $invoiceId)
            )
            ->withHeader('Content-Type', 'application/pdf');

        if ($body instanceof StreamInterface) {
            $request = $request->withBody($body);
        } elseif (is_resource($body)) {
            $request = $request->withBody($this->streamFactory->createStreamFromResource($body));
        } elseif (is_string($body)) {
            $request = $request->withBody($this->streamFactory->createStream($body));
        } else {
            throw new \InvalidArgumentException(
                sprintf('Body must be instance of %s or resource or string', StreamInterface::class)
            );
        }

        return $this->httpClient->sendRequest($request);
    }

}
