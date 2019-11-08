<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram;

class BotController extends Controller
{

    public function webhookHandler()
    {
        $update = Telegram::getWebhookUpdates();
        $query = $update->getCallbackQuery();

        if ($update->isType('callback_query') && $query->getId()) {
//            Telegram::answerCallbackQuery([
//                'text' => $query->getData() . ' ' . $query->getFrom()->getId() . ' ' . $query->getId(),
//                'callback_query_id' => $query->getId(),
//                'show_alert' => true
//            ]);
            $keyboard = Keyboard::make()
                ->inline()
                ->row(
                    Keyboard::inlineButton(['text' => '1', 'callback_data' => '1']),
                    Keyboard::inlineButton(['text' => '2', 'callback_data' => '2']),
                    Keyboard::inlineButton(['text' => '3', 'callback_data' => '3']),
                    Keyboard::inlineButton(['text' => '+', 'callback_data' => '+']),
                    Keyboard::inlineButton(['text' => '-', 'callback_data' => '-'])
                )
                ->row(
                    Keyboard::inlineButton(['text' => '4', 'callback_data' => '6']),
                    Keyboard::inlineButton(['text' => '5', 'callback_data' => '7']),
                    Keyboard::inlineButton(['text' => '6', 'callback_data' => '8']),
                    Keyboard::inlineButton(['text' => '*', 'callback_data' => '*']),
                    Keyboard::inlineButton(['text' => '/', 'callback_data' => '/'])
                )
                ->row(
                    Keyboard::inlineButton(['text' => $query->getData()])
                );

            Telegram::sendMessage([
                'chat_id' => $query->getFrom()->getId(),
                'text' => $query->getData(),
                'reply_markup' => $keyboard
            ]);
        } else {
            Telegram::commandsHandler(true);
        }
    }
}
