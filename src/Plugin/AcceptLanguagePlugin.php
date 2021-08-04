<?php

namespace Imper86\PhpAllegroApi\Plugin;

use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;

class AcceptLanguagePlugin implements Plugin
{
    private string $locale;

    public function __construct(string $locale)
    {
        $this->locale = $locale;
    }

    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        if (!$request->hasHeader('Accept-Language')) {
            $request = $request->withHeader('Accept-Langueage', $this->locale);
        }

        return $next($request);
    }
}
