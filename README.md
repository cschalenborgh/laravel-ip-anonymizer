# IP Anonymizer for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/cschalenborgh/laravel-ip-anonymizer.svg?style=flat-square)](https://packagist.org/packages/cschalenborgh/laravel-ip-anonymizer)
[![Build Status](https://travis-ci.org/cschalenborgh/php-zalando.svg?branch=master)](https://travis-ci.org/cschalenborgh/php-zalando)
[![StyleCI](https://styleci.io/repos/184339937/shield)](https://styleci.io/repos/184339937)
[![Total Downloads](https://img.shields.io/packagist/dt/cschalenborgh/laravel-ip-anonymizer.svg?style=flat-square)](https://packagist.org/packages/cschalenborgh/laravel-ip-anonymizer)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

## Install

```angular2html
composer require cschalenborgh/laravel-ip-anonymizer
```

## Examples

```php
IpAnonymizer::anonymizeIp('133.242.241.12'); 
// returns 133.242.241.0
```


```php
IpAnonymizer::anonymizeIp('133.242.241.12', '255.255.0.0'); 
// returns 133.242.0.0
```


```php
IpAnonymizer::anonymizeIp('2001:db8:85a3::1319:8a2e:370:7344', 'ipv6'); 
// returns 2001:db8:85a3::
```


```php
IpAnonymizer::anonymizeIp('2001:db8:85a3::1319:8a2e:370:7344', 'ipv6', 'ffff:ffff:0000:0000:0000:0000:0000:0000'); 
// returns 2001:db8::
```


```php
echo (new IpAnonymizer())->anonymizeIPv4('133.242.241.12', '255.0.0.0');
// returns 133.0.0.0

echo (new IpAnonymizer())->anonymizeIPv6('2001:db8:85a3::1319:8a2e:370:7344', 'ffff:ffff:0000:0000:0000:0000:0000:0000');
// returns 2001:db8::
```
