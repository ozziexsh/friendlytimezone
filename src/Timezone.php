<?php

namespace Nehero\FriendlyTimezone;

use DateTime;
use DateTimeZone;

class Timezone
{
    public string $timezone;
    public string $friendlyName;
    public int|float $offset;

    public function __construct($timezone, $friendlyName) {
        $this->timezone = $timezone;
        $this->friendlyName = $friendlyName;
        $this->offset = $this->calculateOffset();
    }

    /**
     * Takes a number, returns the string time (or the input back if not a number)
     * Includes +/- symbols
     * e.g +3:00
     */
    public function getFormattedOffset(): string
    {
        $formattedOffset = "{$this->offset}";

        if (is_int($this->offset)) {
            $formattedOffset .= ':00';
        }

        if (is_float($this->offset)) {
            // offset is something like 1.25
            $whole = floor($this->offset); // 1
            $fraction = $this->offset - $whole; // .25
            $fractionToTime = (60 / (1 / $fraction)); // .25 -> 15';
            $formattedOffset = "{$whole}:{$fractionToTime}";
        }

        if ($formattedOffset >= 0) {
            $formattedOffset = '+' . $formattedOffset;
        }

        return $formattedOffset;
    }

    /**
     * Prints a string showing current time zone offset to UTC, considering daylight savings time.
     * https://gist.github.com/glueckpress/ec01c763e2e7e5349300
     */
    private function calculateOffset(): int|float
    {
        $utc =  new DateTime('now', new DateTimeZone('UTC'));
        $current = new DateTimeZone($this->timezone);
        $offset_s = $current->getOffset($utc);
        $offset_h = $offset_s / ( 60 * 60 );

        return $offset_h;
    }
}
