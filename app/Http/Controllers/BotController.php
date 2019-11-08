<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;

class BotController extends Controller
{

    public function webhookHandler()
    {
        $update = Telegram::getWebhookUpdates();
        $query = $update->getCallbackQuery();

        if ($update->isType('callback_query') && $query->getId()) {
//            Telegram::answerCallbackQuery([
//                'text' => $query->getData() . ' ' . $query->getFrom()->getId() . ' ' . $query->getId(),
//                'callback_query_id' => $query->getId(),
//                'show_alert' => true
//            ]);
            Telegram::sendMessage([
                'chat_id' => $query->getFrom()->getId(),
                'text' => $query->getData()
            ]);
        } else {
            Telegram::commandsHandler(true);
        }
    }
}
