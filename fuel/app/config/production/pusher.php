<?php

return array(
	'host'     => 'http://api.pusherapp.com',
	'port'     => 80,
	'timeout'  => 30,
	'auth_key' => getenv('PUSHER_KEY'),
	'secret'   => getenv('PUSHER_SECRET'),
	'app_id'   => getenv('PUSHER_APP_ID'),
);