Wrapper for BinList.net
=========================

[![Latest Stable Version](https://poser.pugx.org/devinpearson/binlist/v/stable)](https://packagist.org/packages/devinpearson/binlist)
[![Latest Unstable Version](https://poser.pugx.org/devinpearson/binlist/v/unstable)](https://packagist.org/packages/devinpearson/binlist)
[![License](https://poser.pugx.org/devinpearson/binlist/license)](https://packagist.org/packages/devinpearson/binlist)
[![composer.lock](https://poser.pugx.org/devinpearson/binlist/composerlock)](https://packagist.org/packages/devinpearson/binlist)
[![Build Status](https://travis-ci.org/devinpearson/binlist.svg?branch=master)](https://travis-ci.org/devinpearson/binlist)
[![StyleCI](https://github.styleci.io/repos/162976694/shield?branch=master)](https://github.styleci.io/repos/162976694)
[![Code Coverage](https://scrutinizer-ci.com/g/devinpearson/binlist/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/devinpearson/binlist/?branch=master)

A simple wrapper for checking binlist codes via binlist.net and formats the results in to type hinted objects so it makes it easier to work and reference the results.

Installing
==========

Add the dependency to your project:

```bash
composer require devinpearson/binlist
```
### Laravel 5.5+:

If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```php
DevinPearson\BinList\BinListServiceProvider::class,
```

If you want to use the facade to log messages, add this to your facades in app.php:

```php
'BinList' => DevinPearson\BinList\Facades\BinList::class,
```

## Usage

```php
try {
    BinList::check($binNumber);
} catch (\DevinPearson\BinList\BinListException $exception) {
    // do something with exception
}
```
Features
--------

* creates an easy to use facade for binlist.net

Requirements
============

- PHP 7.1+
- PHPUnit is required to run the unit tests
- Composer is required to run the unit tests
