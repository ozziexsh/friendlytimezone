<?php

use Nehero\FriendlyTimezone\FriendlyTimezone;

it('returns a collection of timezones', function () {
  expect(FriendlyTimezone::timezones())
    ->toBeInstanceOf(\Illuminate\Support\Collection::class)
    ->each->toBeInstanceOf(\Nehero\FriendlyTimezone\Timezone::class);
});
