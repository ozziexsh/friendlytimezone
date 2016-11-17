# User-friendly timezones for PHP

List extracted from [Microsoft Time Zone Index Values](https://support.microsoft.com/en-ca/kb/973627).

Some regions influenced by [this Stack Overflow answer](http://stackoverflow.com/a/12473225).

## Contributing

If you have a better suggestion for some of the mapped regions, please submit a pull request with the changes and accurate sources for the changes.

## Usage:

`composer install nehero/friendlytimezone`

```php
use nehero/FriendlyTimezone;

// Returns a key => value list of the timezones
// Key is the label
// Value is the PHP mapped timezone value
$timezones = FriendlyTimezone::list();
```

Example HTML usage
```html
<select name="timezones">
	<?php foreach($timezones as $label => $value): ?>
		<option value="<?php echo $value; ?>"><?php echo $label; ?>
	<?php endforeach; ?>
</select>
```