<?php

namespace Imper86\PhpAllegroApi\Plugin;

use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;

class UserAgentPlugin implements Plugin
{
    private string $userAgent;

    public function __construct(string $userAgent)
    {
        $this->userAgent = $userAgent;
    }

    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        if (!$request->hasHeader('User-Agent')) {
            $request = $request->withHeader('User-Agent', $this->userAgent);
        }
        return $next($request);
    }
}
