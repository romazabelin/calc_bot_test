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

// Example of POST Route:
//Route::post('/703953909:AAGNrH2u0s2W-90di4gvwqDh-ATP7YR-mEc/webhook', function () {
//    $updates = Telegram::getWebhookUpdates();
//
//    return 'ok';
//});

// Example of POST Route:
Route::post(Telegram::getAccessToken(), function () {
    Telegram::commandsHandler(true);
});

//$response = Telegram::getMe();
//
//echo $botId = $response->getId();
//$firstName = $response->getFirstName();
//$username = $response->getUsername();