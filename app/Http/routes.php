<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
	$data = App\Comment::find(1);
    return $data->blog;
});

$app->get('/key', function() {
    return str_random(32);
});

// api and webservice.
header('Access-Control-Allow-Origin', '*');
header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');


