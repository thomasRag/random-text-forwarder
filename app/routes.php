<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::match(array('GET', 'POST'), '/textReceive', function()
{
    $xml = '<Response><Say>Hello - your app just answered the phone. Neat, eh?</Say></Response>';
    $response = Response::make($xml, 200);
    $response->header('Content-Type', 'text/xml');
    return $response;
});

/*

/receive (text message received from someone)
----> Send text message to a random phone number 

Available doc : https://www.twilio.com/blog/2014/09/getting-started-with-twilio-and-the-laravel-framework-for-php.html
*
