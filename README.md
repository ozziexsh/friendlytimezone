# User-friendly timezones for PHP 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nehero/friendlytimezone.svg?style=flat-square)](https://packagist.org/packages/nehero/friendlytimezone)
[![Tests](https://github.com/nehero/friendlytimezone/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/ozziexsh/friendlytimezone/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/nehero/friendlytimezone.svg?style=flat-square)](https://packagist.org/packages/nehero/friendlytimezone)

List extracted from [Microsoft Time Zone Index Values](https://support.microsoft.com/en-ca/kb/973627).

Some regions influenced by [this Stack Overflow answer](http://stackoverflow.com/a/12473225).

> ⚠️ This package has been rewritten in version 3 to support more flexibility of working with the timezones as well as incorporating modern php features 
>
>[If you are looking for the now deprecated version 2 documentation, click here](https://github.com/ozziexsh/friendlytimezone/tree/2.0.1)

## Installation

As of v3.0 this package requires PHP 8.0+

You can install the package via composer:

```bash
composer require nehero/friendlytimezone
```

## Usage

```php
// Illuminate\Support\Collection of Nehero\Timezone
$timezones = Nehero\FriendlyTimezone::timezones();

// properties available to you
foreach ($timezones as $timezone) {
    echo $timezone->friendlyName; // Saskatchewan
    echo $timezone->timezone; // America/Regina
    echo $timezone->offset; // -6 (int|float)
    echo $timezone->getFormattedOffset(); // -6:00 (string)
}

// common formatting for dropdowns
$timezones->map(fn ($tz) => [
    'label' => "(UTC{$tz->getFormattedOffset()}) {$tz->friendlyName}"), // (UTC+6:00) Saskatchewan
    'value' => $tz->timezone, // America/Regina
]);

// need it in descending order?
// can manipulate it however you want with
// common collection or native array/iterable functions
$timezones->sortByDesc(fn ($tz) => $tz->offset)->map(...);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

If you have a better suggestion for any of the mapped regions, please submit a pull request and include accurate sources for the changes.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
