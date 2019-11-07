<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;

class BotController extends Controller
{
    public function webhookHandler()
    {
        $updates = Telegram::getWebhookUpdates();
        $isCallback = $updates->detectType() === 'callback_query';

        if ($isCallback) {
            Telegram::answerCallbackQuery([
                'text' => 'dsds',
                'callback_query_id' => $updates->getId()
            ]);
        }

        Telegram::commandsHandler(true);
    }
}
