<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::post(Telegram::getAccessToken(), function() {
//    Telegram::commandsHandler(true);
//});

$updates = Telegram::getWebhookUpdates();

// Example of POST Route:
Route::post('/' . Telegram::getAccessToken() . '/webhook', function () {
    $updates = Telegram::getWebhookUpdates();

    return 'ok';
});