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
        $query = $update->getCallbackQuery();

        if ($query->getId()) {
            Telegram::answerCallbackQuery([
                'text' => $query->getId(),
                'callback_query_id' => $query->getId(),
                'show_alert' => true
            ]);
        }
    }
}
