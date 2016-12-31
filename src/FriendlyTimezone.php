<?php

namespace Nehero;

use DateTime;
use DateTimeZone;

class FriendlyTimezone
{
    /**
     * @var string[]
     */
    private $lookup;

    /**
     * @var DateTime
     */
    private $utc;

    /**
     * FriendlyTimezone constructor
     */
    public function __construct()
    {
        $this->lookup = [
            "Pacific/Midway" => "Midway Island, Samoa",
            "Pacific/Honolulu" => "Hawaii",
            "America/Anchorage" => "Alaska",
            "America/Tijuana" => "Pacific Time (US and Canada); Tijuana, Baja California",
            "America/Edmonton" => "Mountain Time (US and Canada)",
            "America/Chihuahua" => "Chihuahua, La Paz, Mazatlan",
            "America/Phoenix" => "Arizona",
            "America/Chicago" => "Central Time (US and Canada)",
            "America/Regina" => "Saskatchewan",
            "America/Mexico_City" => "Guadalajara, Mexico City, Monterrey",
            "America/Managua" => "Central America",
            "America/New_York" => "Eastern Time (US and Canada)",
            "America/Indiana/Indianapolis" => "Indiana (East)",
            "America/Bogota" => "Bogota, Lima, Quito",
            "America/Caracas" => "Caracas",
            "America/Halifax" => "Atlantic Time (Canada)",
            "America/Argentina/San_Juan" => "Georgetown, La Paz, San Juan",
            "America/Santiago" => "Santiago",
            "America/Manaus" => "Manaus",
            "America/Asuncion" => "Asuncion",
            "America/St_Johns" => "Newfoundland",
            "America/Sao_Paulo" => "Brasilia",
            "America/Argentina/Buenos_Aires" => "Buenos Aires, Georgetown",
            "America/Godthab" => "Greenland",
            "America/Montevideo" => "Montevideo",
            "Atlantic/South_Georgia" => "Mid-Atlantic",
            "Atlantic/Azores" => "Azores",
            "Atlantic/Cape_Verde" => "Cape Verde Islands",
            "Europe/London" => "Greenwich Mean Time: Dublin, Edinburgh, Lisbon, London",
            "Atlantic/Reykjavik" => "Monrovia, Reykjavik",
            "Africa/Casablanca" => "Casablanca",
            "UTC" => "Coordinated Universal Time",
            "Europe/Belgrade" => "Belgrade, Bratislava, Budapest, Ljubljana, Prague",
            "Europe/Sarajevo" => "Sarajevo, Skopje, Warsaw, Zagreb",
            "Europe/Paris" => "Brussels, Copenhagen, Madrid, Paris",
            "Europe/Berlin" => "Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna",
            "Africa/Lagos" => "West Central Africa",
            "Asia/Amman" => "Amman",
            "Asia/Beirut" => "Beirut",
            "Africa/Cairo" => "Cairo",
            "Europe/Minsk" => "Minsk",
            "Europe/Helsinki" => "Helsinki, Kiev, Riga, Sofia, Tallinn, Vilnius",
            "Europe/Athens" => "Athens, Bucharest, Istanbul",
            "Asia/Jerusalem" => "Jerusalem",
            "Africa/Harare" => "Harare, Pretoria",
            "Africa/Windhoek" => "Windhoek",
            "Europe/Moscow" => "Moscow, St. Petersburg, Volgograd",
            "Asia/Kuwait" => "Kuwait, Riyadh",
            "Africa/Nairobi" => "Nairobi",
            "Asia/Baghdad" => "Baghdad",
            "Asia/Tbilisi" => "Tbilisi",
            "Asia/Tehran" => "Tehran",
            "Asia/Muscat" => "Abu Dhabi, Muscat",
            "Asia/Baku" => "Baku, Tbilisi, Yerevan",
            "Asia/Yerevan" => "Yerevan",
            "Indian/Mauritius" => "Port Louis",
            "Asia/Kabul" => "Kabul",
            "Asia/Yekaterinburg" => "Ekaterinburg",
            "Asia/Tashkent" => "Tashkent",
            "Asia/Karachi" => "Islamabad, Karachi",
            "Asia/Kolkata" => "Chennai, Kolkata, Mumbai, New Delhi",
            "Asia/Kathmandu" => "Kathmandu",
            "Asia/Dhaka" => "Astana, Dhaka",
            "Asia/Colombo" => "Sri Jayawardenepura",
            "Asia/Almaty" => "Almaty, Novosibirsk",
            "Asia/Rangoon" => "Yangon (Rangoon)",
            "Asia/Bangkok" => "Bangkok, Hanoi, Jakarta",
            "Asia/Krasnoyarsk" => "Krasnoyarsk",
            "Asia/Hong_Kong" => "Beijing, Chongqing, Hong Kong, Urumqi",
            "Asia/Kuala_Lumpur" => "Kuala Lumpur, Singapore",
            "Asia/Taipei" => "Taipei",
            "Australia/Perth" => "Perth",
            "Asia/Irkutsk" => "Irkutsk, Ulaanbaatar",
            "Asia/Seoul" => "Seoul",
            "Asia/Tokyo" => "Osaka, Sapporo, Tokyo",
            "Asia/Yakutsk" => "Yakutsk",
            "Australia/Darwin" => "Darwin",
            "Australia/Adelaide" => "Adelaide",
            "Australia/Sydney" => "Canberra, Melbourne, Sydney",
            "Australia/Brisbane" => "Brisbane",
            "Australia/Hobart" => "Hobart",
            "Asia/Vladivostok" => "Vladivostok",
            "Pacific/Guam" => "Guam, Port Moresby",
            "Asia/Magadan" => "Magadan, Solomon Islands, New Caledonia",
            "Pacific/Fiji" => "Fiji, Kamchatka, Marshall Is.",
            "Pacific/Auckland" => "Auckland, Wellington",
            "Asia/Kamchatka" => "Petropavlovsk-Kamchatsky",
            "Pacific/Tongatapu" => "Nuku'alofa",
        ];

        // Small optimization creating this once in the constructor
        // rather than for each TZ in offset()
        $this->utc = new DateTime('now', new DateTimeZone('UTC'));
    }

    /**
     * Returns the list of timezones
     *
     * @param array $opts
     * @return string[]
     */
    public function get(array $opts = [])
    {
        if (empty($opts['order']) || !in_array($opts['order'], ['asc', 'desc'])) {
            $opts['order'] = 'asc';
        } else {
            $opts['order'] = strtolower($opts['order']);
        }

        $offsets = [];

        // Store the offsets with their tz as
        // America/Regina => -6
        foreach ($this->lookup as $tz => $label) {
            $offsets[$tz] = self::offset($tz);
        }


        // Sort by offset value
        uasort($offsets, function($a, $b) use ($opts) {
            $a = (float) $a;
            $b = (float) $b;

            if ($a == $b) {
                return 0;
            }

            if ($opts['order'] == 'asc') {
                return $a > $b ? 1 : -1;
            } else if ($opts['order'] == 'desc') {
                return $a > $b ? -1 : 1;
            }

            return 0;
        });

        // Place labels
        $timezones = [];
        foreach ($offsets as $tz => $offset) {
            $timezones["(GMT" . $this->formatNumberToTime($offset) . ") " . $this->lookup[$tz]] = $tz;
        }

        return $timezones;
    }

    /**
     * Takes a number, returns the string time (or the input back if not a number)
     * Includes +/- symbols
     *
     * @param $number
     * @return string
     * @return mixed if input is not a number
     */
    private function formatNumberToTime($number)
    {
        if (is_int($number)) {
            $number .= ':00';
        } else if (is_float($number)) {

            $n = $number; // eg 1.25
            $whole = floor($n);      // 1
            $fraction = $n - $whole; // .25

            $number = $whole;

            $number .= ':' . (60 / (1 / $fraction));
        }

        if ($number >= 0) {
            $number = '+' . $number;
        }

        return $number;
    }

    /**
     * Prints a string showing current time zone offset to UTC, considering daylight savings time.
     * https://gist.github.com/glueckpress/ec01c763e2e7e5349300
     *
     * @link http://php.net/manual/en/timezones.php
     * @param  string $time_zone Time zone name
     * @return float|int Offset in hours
     */
    private function offset($time_zone)
    {
        $current = new DateTimeZone($time_zone);
        $offset_s = $current->getOffset($this->utc); // seconds
        $offset_h = $offset_s / ( 60 * 60 ); // hours

        return $offset_h;
    }
}