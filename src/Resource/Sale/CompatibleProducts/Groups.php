<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\CompatibleProducts;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Groups extends AbstractResource
{
    /**
     * @param string[] $query
     * @param string[]|null $headers
     * @return ResponseInterface
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function get(array $query, ?array $headers = null): ResponseInterface
    {
        $uri = $this->uriFactory->createUri('/sale/compatible-products/groups')
            ->withQuery(http_build_query($query));
        $request = $this->requestFactory->createRequest('GET', $uri);

        if ($headers) {
            foreach ($headers as $headerName => $headerValue) {
                $request = $request->withHeader($headerName, $headerValue);
            }
        }

        return $this->httpClient->sendRequest($request);
    }
}
