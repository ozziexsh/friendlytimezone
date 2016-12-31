# User-friendly timezones for PHP

List extracted from [Microsoft Time Zone Index Values](https://support.microsoft.com/en-ca/kb/973627).

Some regions influenced by [this Stack Overflow answer](http://stackoverflow.com/a/12473225).

## Contributing

If you have a better suggestion for some of the mapped regions, please submit a pull request with the changes and accurate sources for the changes.

## Usage:

`composer install nehero/friendlytimezone`

```php

// autoload / require_once the file here
require_once __DIR__ . '/vendor/autoload.php';

// If you want for dependency injection / OO
// use Nehero\FriendlyTimezone;

// But it's easiest to use statically
use Nehero\FriendlyTimezone\Facade as FriendlyTimezone;

// If no options are passed to get(), values are sorted by `asc` GMT offset value
$timezones = FriendlyTimezone::get();

// You can also optionally pass an array of options
// ex.
$timezones = FriendlyTimezone::get([ 'order' => 'desc' ]);
$timezones = FriendlyTimezone::get([ 'order' => 'asc' ]);

/**
 * $timezones is an associative array in the format
 * Friendly Label => Php Timezone String
 *
 * ex.
 * [
 *   '(GMT-6:00) Saskatchewan' => 'America/Regina'
 * ]
 */

```

Example HTML usage
```html
<select name="timezones">
	<?php foreach($timezones as $label => $value): ?>
		<option value="<?php echo $value; ?>"><?php echo $label; ?></option>
	<?php endforeach; ?>
</select>
```