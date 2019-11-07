<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;

class BotController extends Controller
{
    public function webhookHandler()
    {
        Telegram::commandsHandler(true);

        $update = Telegram::getWebhookUpdates();
//        $telegramUser = $update['message'];
//        $query = $update->getCallbackQuery();

//        if ($query->getId()) {
//            Telegram::sendMessage([
//                'text' => 'dsdsds'
//            ]);
//            Telegram::answerCallbackQuery([
//                'text' => $query->getId(),
//                'callback_query_id' => $query->getId(),
//                'show_alert' => true
//            ]);
//        }
    }
}
