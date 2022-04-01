<?php

use Nehero\FriendlyTimezone\Timezone;

$negativeTimezone = new Timezone(
  timezone: 'America/Regina',
  friendlyName: 'Saskatchewan'
);
$positiveTimezone = new Timezone(
  timezone: 'Australia/Brisbane',
  friendlyName: 'Brisbane'
);
$halfTimezone = new Timezone(
  timezone: 'Australia/Darwin',
  friendlyName: 'Darwin'
);
$utc = new Timezone(
  timezone: 'UTC',
  friendlyName: 'Coordinated Universal Time'
);

test('it calculates the offset when initialized', function () use (
  $negativeTimezone
) {
  // America/Regina is always -6
  expect($negativeTimezone)->offset->toBe(-6);
});

test('it formats a positive whole offset', function () use ($positiveTimezone) {
  expect($positiveTimezone->getFormattedOffset())->toEqual('+10:00');
});

test('it formats a negative whole offset', function () use ($negativeTimezone) {
  expect($negativeTimezone->getFormattedOffset())->toEqual('-6:00');
});

test('it formats a fractional offset', function () use ($halfTimezone) {
  expect($halfTimezone->getFormattedOffset())->toEqual('+9:30');
});
