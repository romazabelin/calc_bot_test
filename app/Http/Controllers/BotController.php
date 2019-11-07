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

        if ($query->getId()) {
            Telegram::answerCallbackQuery([
                'text' => $query->getId(),
                'callback_query_id' => $query->getId()
            ]);
        }

        Telegram::commandsHandler(true);
    }
}
