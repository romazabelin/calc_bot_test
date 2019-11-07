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

$updates = Telegram::getWebhookUpdates();

//Route::post(Telegram::getAccessToken(), function() {
//    $updates = Telegram::getWebhookUpdates();
//    Telegram::commandsHandler(true);
//});

// Example of POST Route:
Route::post('/' . Telegram::getAccessToken() . '/webhook', function () {
    Telegram::commandsHandler(true);
});