<?php


namespace Imper86\PhpAllegroApi\Resource\Order\Carriers\Allegro;


use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Points extends AbstractResource
{
    public function get(?\DateTimeInterface $ifModifiedSince): ResponseInterface
    {
        $uri = $this->uriFactory->createUri('/order/carriers/ALLEGRO/points');
        $request = $this->requestFactory->createRequest('GET', $uri)
            ->withHeader('Content-Type', ContentType::VND_PUBLIC_V1);

        if ($ifModifiedSince) {
            $request = $request->withHeader('If-Modified-Since', $ifModifiedSince->format('r'));
        }

        return $this->httpClient->sendRequest($request);
    }
}
