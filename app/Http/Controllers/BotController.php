<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BotController extends Controller
{
    public function webhookHandler()
    {
        Telegram::commandsHandler(true);
    }
}
