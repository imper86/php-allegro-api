<?php


namespace Imper86\PhpAllegroApi\Enum;


final class GrantType
{
    public const AUTHORIZATION_CODE = 'authorization_code';
    public const REFRESH_TOKEN = 'refresh_token';
    public const CLIENT_CREDENTIALS = 'client_credentials';
    public const DEVICE_CODE = 'urn:ietf:params:oauth:grant-type:device_code';
}
