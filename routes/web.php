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

//$updates = Telegram::getWebhookUpdates();
//Route::post('/975643316:AAF2bLrUzkNaUstjZZhcSzR5JzqFH8IpKas/webhook', function () {
//    Telegram::commandsHandler(true);
//});

Route::post(Telegram::getAccessToken, function () {
    Telegram::commandsHandler(true);
});

//$response = Telegram::getMe();
//echo $botId = $response->getId();
//$firstName = $response->getFirstName();
//$username = $response->getUsername();