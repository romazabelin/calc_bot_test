<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram;
use App\Services\CalculatorService;

class BotController extends Controller
{

    public function webhookHandler()
    {
        $calculatorService = new CalculatorService();
        $calculatorService->handleCalculatorAction();
    }
}
