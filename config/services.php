<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => 'https://api.mailgun.net/v3/sandbox8da219186f664f479f958d2ac1746725.mailgun.org',
		'***REMOVED***' => '***REMOVED***',
	],

	'mandrill' => [
		'***REMOVED***' => '',
	],

	'ses' => [
		'key' => '',
		'***REMOVED***' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\User',
		'key' => '',
		'***REMOVED***' => '',
	],

];
