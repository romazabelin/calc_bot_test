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
    }
}
