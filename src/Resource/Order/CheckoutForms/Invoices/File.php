<?php

namespace Imper86\PhpAllegroApi\Resource\Order\CheckoutForms\Invoices;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class File extends AbstractResource
{
    public function put(string $checkoutFormId, string $invoiceId, $body): ResponseInterface
    {
        $request = $this->requestFactory->createRequest(
            'PUT',
            sprintf('/order/checkout-forms/%s/invoices/%s', $checkoutFormId, $invoiceId)
        );

        if ($body instanceof StreamInterface) {
            $request->withBody($body);
        } elseif (is_resource($body)) {
            $request->withBody($this->streamFactory->createStreamFromResource($body));
        } elseif (is_string($body)) {
            $request->withBody($this->streamFactory->createStream($body));
        }

        return $this->httpClient->sendRequest($request);
    }
}
