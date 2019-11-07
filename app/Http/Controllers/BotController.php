<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;

class BotController extends Controller
{
    public function webhookHandler()
    {
        $updates = Telegram::getWebhookUpdates();

        $query = $updates->getCallbackQuery();
        $this->callback_id = $query->getId();

        Telegram::answerCallbackQuery([
            'callback_query_id' => $this->callback_id
        ]);

        Telegram::commandsHandler(true);
    }
}
