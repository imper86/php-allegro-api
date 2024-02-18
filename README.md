# Allegro.pl REST API PHP SDK

## Installation

Just use composer:
```sh
composer require imper86/php-allegro-api
```

### HTTPlug note
This lib uses [HTTPlug](https://github.com/php-http/httplug)
so it doesn't depend on any http client. In order to use this
lib you must have some [PSR-18 http client](https://www.php-fig.org/psr/psr-18)
and [PSR-17 http factories](https://www.php-fig.org/psr/psr-17).
If you don't know which one you shoud install you can require
these:

```sh
composer require php-http/guzzle6-adapter http-interop/http-factory-guzzle
```

## Authentication & usage
Library has a bunch of mechanisms that allows you to forget about
tokens, expirations etc. But in order to start using it you must
authorize user using Oauth flow.

```php
use Imper86\PhpAllegroApi\AllegroApi;
use Imper86\PhpAllegroApi\Model\Credentials;
use Imper86\PhpAllegroApi\Oauth\FileTokenRepository;
use Imper86\PhpAllegroApi\Plugin\AuthenticationPlugin;

// first, create Credentials object
$credentials = new Credentials(
    'your-client-id',
    'your-client-secret',
    'your-redirect-uri',
    true //is sandbox
);

// create api client
$api = new AllegroApi($credentials);

// get the authorization URL, and redirect your user:
$state = 'your-random-secret-state';
header(sprintf('Location: %s', $api->oauth()->getAuthorizationUri(true, $state)));

/*
 * after successfull authorization, user will be refirected to your
 * redirect_uri with state and code as query parameters
 */

// verify the state and fetch token
if ($state !== $_GET['state'] ?? null) {
    throw new Exception('CSRF?!');
}

$token = $api->oauth()->fetchTokenWithCode($_GET['code']);

// create TokenRepository object
$tokenRepository = new FileTokenRepository(
    $token->getUserId(), 
    __DIR__ . '/tokens'
);
$tokenRepository->save($token);

/*
 * You can invent your own TokenRepository, just implement
 * Imper86\PhpAllegroApi\Oauth\TokenRepositoryInterface
 * You can use your DB, Redis, or anything you want.
 */

// now you can add AuthenticationPlugin, which will take care
// of maintaining your tokens

$api->addPlugin(new AuthenticationPlugin($tokenRepository, $api->oauth()));

// * note: of course you can use your own plugin, or AuthenticationPlugin from HTTPlug library

// from now you can use these methods on AllegroApi object:
$api->account()->(...);
$api->afterSalesServiceConditions()->(...);
$api->bidding()->(...);
$api->billing()->(...);
$api->me()->(...);
$api->offers()->(...);
$api->order()->(...);
$api->payments()->(...);
$api->pointsOfService()->(...);
$api->pricing()->(...);
$api->sale()->(...);
$api->users()->(...);

// fast example:
var_dump($api->sale()->offers()->tags()->get('123456'));
```

If you use IDE with typehinting such as PHPStorm, you'll easily 
figure it out. If not, please 
[take a look in Resource directory](src/Resource)

## Device Flow

```php
use Imper86\PhpAllegroApi\AllegroApi;
use Imper86\PhpAllegroApi\Model\Credentials;
use Imper86\PhpAllegroApi\Oauth\FileTokenRepository;
use Imper86\PhpAllegroApi\Plugin\AuthenticationPlugin;

// first, create Credentials object
$credentials = new Credentials(
    'your-client-id',
    'your-client-secret',
    'your-redirect-uri',
    true //is sandbox
);

// create api client
$api = new AllegroApi($credentials);

// Create authorization session
$session = $api->oauth()->getDeviceCode();

// Provide device code and/or url to user
echo 'Please visit: ' . $session->getVerificationUriComplete();

// Poll for authorization result
$interval = $session->getInterval();
$token = false;
do {
    sleep($interval);
    $device_code = $session->getDeviceCode();
    try{
        $token = $api->oauth()->fetchTokenWithDeviceCode($device_code);
    } catch (AuthorizationPendingException) {
        continue;
    } catch (SlowDownException) {
        $interval++;
        continue;
    }
} while ($token == false);

// create TokenRepository object
$tokenRepository = new FileTokenRepository(
    $token->getUserId(), 
    __DIR__ . '/tokens'
);
$tokenRepository->save($token);
```

## Contributing
Any help will be very appreciated :)
