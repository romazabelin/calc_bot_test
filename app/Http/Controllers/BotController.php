<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;

class BotController extends Controller
{
    public function webhookHandler()
    {
        Telegram::commandsHandler(true);
//        $update = $this->getWebhookUpdates();
//        $callback_query = $update->getCallbackQuery()->getData();
//
//        if ($update->getCallbackQuery()->getId()) {
//            Telegram::answerCallbackQuery([
//                'text' => $callback_query,
//                'callback_query_id' => $update->getId(),
//                'show_alert' => true
//            ]);
//        }

        $update = Telegram::getWebhookUpdates();
        $query = $update->getCallbackQuery();

        if ($query->getId()) {
            Telegram::sendMessage([
                'text' => 'dsdsds'
            ]);
            Telegram::answerCallbackQuery([
                'text' => $query->getData(),
                'callback_query_id' => $query->getId(),
                'show_alert' => true
            ]);
        }
    }
}
