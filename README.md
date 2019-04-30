# IP Anonymizer for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/cschalenborgh/laravel-ip-anonymizer.svg?style=flat-square)](https://packagist.org/packages/cschalenborgh/laravel-ip-anonymizer)
[![Build Status](https://img.shields.io/travis/cschalenborgh/laravel-ip-anonymizer/master.svg?style=flat-square)](https://travis-ci.org/spatie/laravel-permission)
[![Total Downloads](https://img.shields.io/packagist/dt/cschalenborgh/laravel-ip-anonymizer.svg?style=flat-square)](https://packagist.org/packages/cschalenborgh/laravel-ip-anonymizer)

## Examples

### Using the static method

```php
IpAnonymizer::anonymizeIp('133.242.241.12');
```
returns "133.242.241"

```php
IpAnonymizer::anonymizeIp('2001:db8:85a3::1319:8a2e:370:7344', 'ipv6');
```
returns "2001:db8:85a3::"

```php
IpAnonymizer::anonymizeIp('2001:db8:85a3::1319:8a2e:370:7344', 'ipv6', 'ffff:ffff:0000:0000:0000:0000:0000:0000');
```
returns "2001:db8::"

### More options

```php
$ia = new IpAnonymizer();
echo $ia->anonymizeIPv4('133.242.241.12', '255.0.0.0');
echo $ia->anonymizeIPv6('2001:db8:85a3::1319:8a2e:370:7344', 'ffff:ffff:0000:0000:0000:0000:0000:0000');
```
