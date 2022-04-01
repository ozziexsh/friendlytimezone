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
$timezones = Nehero\FriendlyTimezone\FriendlyTimezone::timezones();

// properties available to you
foreach ($timezones as $timezone) {
    echo $timezone->friendlyName; // Saskatchewan (string)
    echo $timezone->timezone; // America/Regina (string)
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

## Supported Timezones

See any missing? Pull requests and issues are welcome!

<details>
  <summary>Click to view a table of all currently supported timezones</summary>

| IANA Name | Friendly Name                                          |
|-----------|--------------------------------------------------------|
| Pacific/Midway | Midway Island, Samoa                                   |
| Pacific/Honolulu | Hawaii                                                 |
| America/Anchorage | Alaska                                                 |
| America/Tijuana | Pacific Time (US and Canada); Tijuana, Baja California |
| America/Edmonton | Mountain Time (US and Canada)                          |
| America/Chihuahua | Chihuahua, La Paz, Mazatlan                            |
| America/Phoenix | Arizona                                                |
| America/Chicago | Central Time (US and Canada)                           |
| America/Regina | Saskatchewan                                           |
| America/Mexico_City | Guadalajara, Mexico City, Monterrey                    |
| America/Managua | Central America                                        |
| America/New_York | Eastern Time (US and Canada)                           |
| America/Indiana/Indianapolis | Indiana (East)                                         |
| America/Bogota | Bogota, Lima, Quito                                    |
| America/Caracas | Caracas                                                |
| America/Halifax | Atlantic Time (Canada)                                 |
| America/Argentina/San_Juan | Georgetown, La Paz, San Juan                           |
| America/Santiago | Santiago                                               |
| America/Manaus | Manaus                                                 |
| America/Asuncion | Asuncion                                               |
| America/St_Johns | Newfoundland                                           |
| America/Sao_Paulo | Brasilia                                               |
| America/Argentina/Buenos_Aires | Buenos Aires, Georgetown                               |
| America/Godthab | Greenland                                              |
| America/Montevideo | Montevideo                                             |
| Atlantic/South_Georgia | Mid-Atlantic                                           |
| Atlantic/Azores | Azores                                                 |
| Atlantic/Cape_Verde | Cape Verde Islands                                     |
| Europe/London | Greenwich Mean Time: Dublin, Edinburgh, Lisbon, London |
| Atlantic/Reykjavik | Monrovia, Reykjavik                                    |
| Africa/Casablanca | Casablanca                                             |
| UTC | Coordinated Universal Time                             |
| Europe/Belgrade | Belgrade, Bratislava, Budapest, Ljubljana, Prague      |
| Europe/Sarajevo | Sarajevo, Skopje, Warsaw, Zagreb                       |
| Europe/Paris | Brussels, Copenhagen, Madrid, Paris                    |
| Europe/Berlin | Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna       |
| Africa/Lagos | West Central Africa                                    |
| Asia/Amman | Amman                                                  |
| Asia/Beirut | Beirut                                                 |
| Africa/Cairo | Cairo                                                  |
| Europe/Minsk | Minsk                                                  |
| Europe/Helsinki | Helsinki, Kiev, Riga, Sofia, Tallinn, Vilnius          |
| Europe/Athens | Athens, Bucharest, Istanbul                            |
| Asia/Jerusalem | Jerusalem                                              |
| Africa/Harare | Harare, Pretoria                                       |
| Africa/Windhoek | Windhoek                                               |
| Europe/Moscow | Moscow, St. Petersburg, Volgograd                      |
| Asia/Kuwait | Kuwait, Riyadh                                         |
| Africa/Nairobi | Nairobi                                                |
| Asia/Baghdad | Baghdad                                                |
| Asia/Tbilisi | Tbilisi                                                |
| Asia/Tehran | Tehran                                                 |
| Asia/Muscat | Abu Dhabi, Muscat                                      |
| Asia/Baku | Baku, Tbilisi, Yerevan                                 |
| Asia/Yerevan | Yerevan                                                |
| Indian/Mauritius | Port Louis                                             |
| Asia/Kabul | Kabul                                                  |
| Asia/Yekaterinburg | Ekaterinburg                                           |
| Asia/Tashkent | Tashkent                                               |
| Asia/Karachi | Islamabad, Karachi                                     |
| Asia/Kolkata | Chennai, Kolkata, Mumbai, New Delhi                    |
| Asia/Kathmandu | Kathmandu                                              |
| Asia/Dhaka | Astana, Dhaka                                          |
| Asia/Colombo | Sri Jayawardenepura                                    |
| Asia/Almaty | Almaty, Novosibirsk                                    |
| Asia/Rangoon | Yangon (Rangoon)                                       |
| Asia/Bangkok | Bangkok, Hanoi, Jakarta                                |
| Asia/Krasnoyarsk | Krasnoyarsk                                            |
| Asia/Hong_Kong | Beijing, Chongqing, Hong Kong, Urumqi                  |
| Asia/Kuala_Lumpur | Kuala Lumpur, Singapore                                |
| Asia/Taipei | Taipei                                                 |
| Australia/Perth | Perth                                                  |
| Asia/Irkutsk | Irkutsk, Ulaanbaatar                                   |
| Asia/Seoul | Seoul                                                  |
| Asia/Tokyo | Osaka, Sapporo, Tokyo                                  |
| Asia/Yakutsk | Yakutsk                                                |
| Australia/Darwin | Darwin                                                 |
| Australia/Adelaide | Adelaide                                               |
| Australia/Sydney | Canberra, Melbourne, Sydney                            |
| Australia/Brisbane | Brisbane                                               |
| Australia/Hobart | Hobart                                                 |
| Asia/Vladivostok | Vladivostok                                            |
| Pacific/Guam | Guam, Port Moresby                                     |
| Asia/Magadan | Magadan, Solomon Islands, New Caledonia                |
| Pacific/Fiji | Fiji, Kamchatka, Marshall Is.                          |
| Pacific/Auckland | Auckland, Wellington                                   |
| Asia/Kamchatka | Petropavlovsk-Kamchatsky                               |
| Pacific/Tongatapu | Nuku'alofa                                             |
</details>

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
