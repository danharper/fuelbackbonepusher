FuelPHP Pusher Package
======================

This is based on the [https://github.com/squeeks/Pusher-PHP](Pusher PHP generic library).

How To Use It
-------------

1) Place the directory inside fuel/packages

2) Load the package by adding it to the 'Always Load Packages' in your `app/config/config.php`
	
```php
<?php
'always_load'  => array(

	...

	'packages'  => array(
		//'orm'
		'pusherapp',
	),

	...
), ?>
```

3) You can now load up an instance of Pusher with:
	
```php
<?php
\Pusherapp::forge()->trigger('channel_name', 'event_name', 'data');
```

4) Enable debugging mode by passing `true` to `forge()`:

```php
<?php
\Pusherapp::forge(true)->trigger('channel_name', 'event_name', 'data');
```