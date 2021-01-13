<?php


namespace Imper86\PhpAllegroApi\Oauth;


use Imper86\PhpAllegroApi\Model\Token;
use Imper86\PhpAllegroApi\Model\TokenInterface;
use Lcobucci\JWT\Parser;
use Psr\Http\Message\ResponseInterface;

class TokenFactory implements TokenFactoryInterface
{
    public function createFromResponse(ResponseInterface $response, string $grantType): TokenInterface
    {
        $body = json_decode($response->getBody()->__toString(), true);
        $parsed = (new Parser())->parse($body['access_token']);

        return new Token([
            'access_token' => $body['access_token'],
            'refresh_token' => $body['refresh_token'] ?? null,
            'grant_type' => $grantType,
            'expiry' => $parsed->getClaim('exp'),
            'user_id' => $parsed->hasClaim('user_name') ? $parsed->getClaim('user_name') : null,
            'scope' => $body['scope'] ?? null,
        ]);
    }
}
