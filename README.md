# Rate limiter package for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/cschalenborgh/laravel-ip-anonymizer.svg?style=flat-square)](https://packagist.org/packages/cschalenborgh/laravel-ip-anonymizer)
[![Build Status](https://travis-ci.org/cschalenborgh/laravel-ip-anonymizer.svg?branch=master)](https://travis-ci.org/cschalenborgh/laravel-ip-anonymizer)
[![StyleCI](https://styleci.io/repos/184339937/shield)](https://styleci.io/repos/184339937)
[![Total Downloads](https://img.shields.io/packagist/dt/cschalenborgh/laravel-ip-anonymizer.svg?style=flat-square)](https://packagist.org/packages/cschalenborgh/laravel-ip-anonymizer)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

# Description

You can use this package to rate limiter specific logic of your application. This could be anything, from Guzzle calls, to more specific logic.
Requires PHP 7.1 or higher.

## Installation

You can install the package via composer:

``` bash
composer require cschalenborgh/laravel-rate-limiter
```

The service provider will automatically get registered. Or you may manually add the service provider in your config/app.php file:

```php
'providers' => [
    // ...
    Cschalenborgh\RateLimiter\RateLimiterServiceProvider::class,
];
```

## Usage

TODO