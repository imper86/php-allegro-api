<?php


namespace Imper86\PhpAllegroApi\Oauth;


use Imper86\PhpAllegroApi\Model\Token;
use Imper86\PhpAllegroApi\Model\TokenInterface;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Token\Plain;
use Psr\Http\Message\ResponseInterface;

class TokenFactory implements TokenFactoryInterface
{
    public function createFromResponse(ResponseInterface $response, string $grantType): TokenInterface
    {
        $body = json_decode($response->getBody()->__toString(), true);
        $jwtConfig = Configuration::forUnsecuredSigner();

        $parsed = $jwtConfig->parser()->parse($body['access_token']);

        if (!$parsed instanceof Plain) {
            throw new \RuntimeException('Could not parse token');
        }

        $expiry = $parsed->claims()->get('exp');

        if ($expiry instanceof \DateTimeInterface) {
            $expiry = $expiry->getTimestamp();
        }

        return new Token(
            [
                'access_token' => $body['access_token'],
                'refresh_token' => $body['refresh_token'] ?? null,
                'grant_type' => $grantType,
                'expiry' => $expiry,
                'user_id' => $parsed->claims()->has('user_name') ? $parsed->claims()->get('user_name') : null,
                'scope' => $parsed->claims()->has('scope') ? $parsed->claims()->get('scope') : ($body['scope'] ?? null),
            ]
        );
    }
}
