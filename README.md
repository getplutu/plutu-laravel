<p align="center">
  <a href="https://plutu.ly" target="_blank">
    <img src="https://plutu.ly/wp-content/uploads/2022/03/plutu-logo.svg" alt="Plutu" width="140" height="84">
  </a>
</p>

# Official Plutu SDK for Laravel

[![Latest Stable Version](https://poser.pugx.org/plutu/plutu-laravel/v/stable.svg)](https://packagist.org/packages/plutu/plutu-laravel)
[![Version](http://poser.pugx.org/plutu/plutu-laravel/version)](https://packagist.org/packages/plutu/plutu-laravel)
[![PHP Version Require](http://poser.pugx.org/plutu/plutu-laravel/require/php)](https://packagist.org/packages/plutu/plutu-laravel)
[![Total Downloads](https://poser.pugx.org/plutu/plutu-laravel/downloads.svg)](https://packagist.org/packages/plutu/plutu-laravel)
[![Monthly Downloads](https://poser.pugx.org/plutu/plutu-laravel/d/monthly)](https://packagist.org/packages/plutu/plutu-laravel)
[![License](https://poser.pugx.org/plutu/plutu-laravel/license)](https://packagist.org/packages/plutu/plutu-laravel)

Plutu Laravel is the official package that builds upon the [Plutu PHP](https://github.com/getplutu/plutu-php) package to simplify the integration of Plutu services into Laravel applications. This package provides developers with a straightforward and consistent interface to access Plutu's API and services, enabling them to seamlessly incorporate Plutu's capabilities into their Laravel projects.

## Getting started


### Installation

You can install the Plutu Laravel package via Composer by running the following command:

```
composer require plutu/plutu-laravel
```

### Publish Configuration

To publish the configuration file of Plutu Laravel package, run the following command:

```
php artisan vendor:publish --provider="PlutuLaravel\Providers\PlutuServiceProvider"
```

This command will publish the ```plutu.php``` configuration file to the config directory of your application.

You can then configure the package by setting the following environment variables in your ```.env``` file:

```
PLUTU_API_KEY=your_api_key
PLUTU_ACCESS_TOKEN=your_access_token
PLUTU_SECRET_KEY=your_secret_key
```

Make sure to replace your_api_key, your_access_token, and your_secret_key with your own API credentials provided by [Plutu](https://plutu.ly) in your merchant account.

Alternatively, you can directly edit the config/plutu.php configuration file that was published to your application.

### Usage

To use the Plutu PHP package, you can access the available facades for Plutu Laravel by importing them:

```php
use PlutuAdfali;
use PlutuSadad;
use PlutuLocalBankCards;
use PlutuTlync;
```

Here's a snippet of how to use it:

```php
$mobileNumber = '090000000'; // Mobile number should start with 09
$amount = 5.0; // amount in float format

try {

    $apiResponse = PlutuAdfali::verify($mobileNumber, $amount);

    if ($apiResponse->getOriginalResponse()->isSuccessful()) {
        // Process ID should be sent in the confirmation step
        $processId = $apiResponse->getProcessId();
    } elseif ($apiResponse->getOriginalResponse()->hasError()) {
        $errorCode = $apiResponse->getOriginalResponse()->getErrorCode();
        $errorMessage = $apiResponse->getOriginalResponse()->getErrorMessage();
    }

// Handle exceptions that may be thrown during the execution of the code
} catch (\Exception $e) {
    $exception = $e->getMessage();
}
```

This code demonstrates how to use the Plutu PHP package to interact with the Plutu API by verifying a mobile number and an amount with the Adfali Payment Service. You can use similar methods to interact with other Plutu services by importing the relevant facades.

You can find examples in the package's main documentation here: [Plutu PHP](https://github.com/getplutu/plutu-php/blob/main/examples.md)

## Resources

- [Plutu PHP](https://github.com/getplutu/plutu-php)
- [Plutu Docs](https://docs.plutu.ly)

## License

The Plutu Laravel package is open-source software licensed under the [MIT](https://opensource.org/licenses/MIT) License.
