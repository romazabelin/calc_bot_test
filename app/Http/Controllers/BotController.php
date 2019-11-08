<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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

            if(strpos($query->getData(), 'calc_result') === false) {
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
                        Keyboard::inlineButton(['text' => '4', 'callback_data' => '4']),
                        Keyboard::inlineButton(['text' => '5', 'callback_data' => '5']),
                        Keyboard::inlineButton(['text' => '6', 'callback_data' => '6']),
                        Keyboard::inlineButton(['text' => '*', 'callback_data' => '*']),
                        Keyboard::inlineButton(['text' => '/', 'callback_data' => '/'])
                    )
                    ->row(
                        Keyboard::inlineButton(['text' => '7', 'callback_data' => '7']),
                        Keyboard::inlineButton(['text' => '8', 'callback_data' => '8']),
                        Keyboard::inlineButton(['text' => '9', 'callback_data' => '9']),
                        Keyboard::inlineButton(['text' => '=', 'callback_data' => 'calc_result?params=' . $query->getData() . ';'])
                    )
                    ->row(
                        Keyboard::inlineButton(['text' => 'Waiting...', 'callback_data' => 'result'])
                    );

                Telegram::editMessageText([
                    'message_id' => $query->getMessage()->getMessageId(),
                    'text' => 'Update me',
                    'chat_id' => $query->getFrom()->getId(),
                    'reply_markup' => $keyboard
                ]);
            } else {
                Telegram::sendMessage([
                    'chat_id' => $query->getFrom()->getId(),
                    'text' => $query->getData() . ' ' . $query->getMessage()->getMessageId()
                ]);
            }
        } else {
            Telegram::commandsHandler(true);
        }
    }
}
