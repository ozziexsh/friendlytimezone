<?php

namespace Nehero\FriendlyTimezone;

use Illuminate\Support\Collection;

class FriendlyTimezone
{
  public static $lookup = [
    'Pacific/Midway' => 'Midway Island, Samoa',
    'Pacific/Honolulu' => 'Hawaii',
    'America/Anchorage' => 'Alaska',
    'America/Tijuana' =>
      'Pacific Time (US and Canada); Tijuana, Baja California',
    'America/Edmonton' => 'Mountain Time (US and Canada)',
    'America/Chihuahua' => 'Chihuahua, La Paz, Mazatlan',
    'America/Phoenix' => 'Arizona',
    'America/Chicago' => 'Central Time (US and Canada)',
    'America/Regina' => 'Saskatchewan',
    'America/Mexico_City' => 'Guadalajara, Mexico City, Monterrey',
    'America/Managua' => 'Central America',
    'America/New_York' => 'Eastern Time (US and Canada)',
    'America/Indiana/Indianapolis' => 'Indiana (East)',
    'America/Bogota' => 'Bogota, Lima, Quito',
    'America/Caracas' => 'Caracas',
    'America/Halifax' => 'Atlantic Time (Canada)',
    'America/Argentina/San_Juan' => 'Georgetown, La Paz, San Juan',
    'America/Santiago' => 'Santiago',
    'America/Manaus' => 'Manaus',
    'America/Asuncion' => 'Asuncion',
    'America/St_Johns' => 'Newfoundland',
    'America/Sao_Paulo' => 'Brasilia',
    'America/Argentina/Buenos_Aires' => 'Buenos Aires, Georgetown',
    'America/Godthab' => 'Greenland',
    'America/Montevideo' => 'Montevideo',
    'Atlantic/South_Georgia' => 'Mid-Atlantic',
    'Atlantic/Azores' => 'Azores',
    'Atlantic/Cape_Verde' => 'Cape Verde Islands',
    'Europe/London' => 'Greenwich Mean Time: Dublin, Edinburgh, Lisbon, London',
    'Atlantic/Reykjavik' => 'Monrovia, Reykjavik',
    'Africa/Casablanca' => 'Casablanca',
    'UTC' => 'Coordinated Universal Time',
    'Europe/Belgrade' => 'Belgrade, Bratislava, Budapest, Ljubljana, Prague',
    'Europe/Sarajevo' => 'Sarajevo, Skopje, Warsaw, Zagreb',
    'Europe/Paris' => 'Brussels, Copenhagen, Madrid, Paris',
    'Europe/Berlin' => 'Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna',
    'Africa/Lagos' => 'West Central Africa',
    'Asia/Amman' => 'Amman',
    'Asia/Beirut' => 'Beirut',
    'Africa/Cairo' => 'Cairo',
    'Europe/Minsk' => 'Minsk',
    'Europe/Helsinki' => 'Helsinki, Kiev, Riga, Sofia, Tallinn, Vilnius',
    'Europe/Athens' => 'Athens, Bucharest, Istanbul',
    'Asia/Jerusalem' => 'Jerusalem',
    'Africa/Harare' => 'Harare, Pretoria',
    'Africa/Windhoek' => 'Windhoek',
    'Europe/Moscow' => 'Moscow, St. Petersburg, Volgograd',
    'Asia/Kuwait' => 'Kuwait, Riyadh',
    'Africa/Nairobi' => 'Nairobi',
    'Asia/Baghdad' => 'Baghdad',
    'Asia/Tbilisi' => 'Tbilisi',
    'Asia/Tehran' => 'Tehran',
    'Asia/Muscat' => 'Abu Dhabi, Muscat',
    'Asia/Baku' => 'Baku, Tbilisi, Yerevan',
    'Asia/Yerevan' => 'Yerevan',
    'Indian/Mauritius' => 'Port Louis',
    'Asia/Kabul' => 'Kabul',
    'Asia/Yekaterinburg' => 'Ekaterinburg',
    'Asia/Tashkent' => 'Tashkent',
    'Asia/Karachi' => 'Islamabad, Karachi',
    'Asia/Kolkata' => 'Chennai, Kolkata, Mumbai, New Delhi',
    'Asia/Kathmandu' => 'Kathmandu',
    'Asia/Dhaka' => 'Astana, Dhaka',
    'Asia/Colombo' => 'Sri Jayawardenepura',
    'Asia/Almaty' => 'Almaty, Novosibirsk',
    'Asia/Rangoon' => 'Yangon (Rangoon)',
    'Asia/Bangkok' => 'Bangkok, Hanoi, Jakarta',
    'Asia/Krasnoyarsk' => 'Krasnoyarsk',
    'Asia/Hong_Kong' => 'Beijing, Chongqing, Hong Kong, Urumqi',
    'Asia/Kuala_Lumpur' => 'Kuala Lumpur, Singapore',
    'Asia/Taipei' => 'Taipei',
    'Australia/Perth' => 'Perth',
    'Asia/Irkutsk' => 'Irkutsk, Ulaanbaatar',
    'Asia/Seoul' => 'Seoul',
    'Asia/Tokyo' => 'Osaka, Sapporo, Tokyo',
    'Asia/Yakutsk' => 'Yakutsk',
    'Australia/Darwin' => 'Darwin',
    'Australia/Adelaide' => 'Adelaide',
    'Australia/Sydney' => 'Canberra, Melbourne, Sydney',
    'Australia/Brisbane' => 'Brisbane',
    'Australia/Hobart' => 'Hobart',
    'Asia/Vladivostok' => 'Vladivostok',
    'Pacific/Guam' => 'Guam, Port Moresby',
    'Asia/Magadan' => 'Magadan, Solomon Islands, New Caledonia',
    'Pacific/Fiji' => 'Fiji, Kamchatka, Marshall Is.',
    'Pacific/Auckland' => 'Auckland, Wellington',
    'Asia/Kamchatka' => 'Petropavlovsk-Kamchatsky',
    'Pacific/Tongatapu' => "Nuku'alofa",
  ];

  public static function timezones(): Collection
  {
    return collect(self::$lookup)
      ->map(
        fn($label, $timezone) => new Timezone(
          timezone: $timezone,
          friendlyName: $label
        )
      )
      ->sortBy(fn(Timezone $tz) => $tz->offset);
  }
}
