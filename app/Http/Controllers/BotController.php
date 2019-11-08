<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;

class BotController extends Controller
{

    public function updatedActivity()
    {
        $activity = Telegram::getWebhookUpdates();
        echo '<pre>';print_r($activity);
    }

    public function webhookHandler()
    {
        $update = Telegram::getWebhookUpdates();
        $query = $update->getCallbackQuery();

        if ($update->isType('callback_query') && $query->getId()) {
            Telegram::sendMesage([
                'chat_id' => '459339359',
                'text' => 'sdsdsds'
            ]);
//            Telegram::answerCallbackQuery([
//                'text' => $query->getData() . ' ' . $query->getFrom()->getId() . ' ' . $query->getId(),
//                'callback_query_id' => $query->getId(),
//                'show_alert' => true
//            ]);
        } else {
            Telegram::commandsHandler(true);
        }




//        $update = Telegram::getWebhookUpdates();
//        $query = $update->getCallbackQuery();
//
//        if ($query->getId()) {
//            Telegram::answerCallbackQuery([
//                'text' => $query->getData(),
//                'callback_query_id' => $query->getId(),
//                'show_alert' => true
//            ]);
//        }

    }
}
