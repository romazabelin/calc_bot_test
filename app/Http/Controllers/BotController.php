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
        Telegram::commandsHandler(true);

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
