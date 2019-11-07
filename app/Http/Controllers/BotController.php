<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;

class BotController extends Controller
{
    public function webhookHandler()
    {
        $updates = Telegram::getWebhookUpdates();



        Telegram::commandsHandler(true);

        $query = $updates->getCallbackQuery();
        $this->callback_id = $query->getId();

        Telegram::answerCallbackQuery([
            'callback_query_id' => $this->callback_id
        ]);
    }
}
