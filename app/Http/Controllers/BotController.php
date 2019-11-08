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
            $callbackData = $query->getData();
//            Telegram::answerCallbackQuery([
//                'text' => $query->getData() . ' ' . $query->getFrom()->getId() . ' ' . $query->getId(),
//                'callback_query_id' => $query->getId(),
//                'show_alert' => true
//            ]);

            if(strpos($callbackData, 'calc_result') === false && strpos($callbackData, 'key_result') === false) {
                $newParamString = '';
                $pos =  strpos($callbackData, '?params');

                if ($pos !== false) {
                    $newKey = str_replace('key_', '', substr($callbackData, 0, $pos));
                    $paramsString =  substr($callbackData, $pos, strlen($callbackData)-1);
                    $newParamString .= $paramsString . $newKey . ';';

                } else {
                    $newKey = str_replace('key_', '', $callbackData);
                    $newParamString .= '?params=' . $newKey . ';';
                }

                $keyboard = Keyboard::make()
                    ->inline()
                    ->row(
                        Keyboard::inlineButton(['text' => '1', 'callback_data' => 'key_1' . $newParamString]),
                        Keyboard::inlineButton(['text' => '2', 'callback_data' => 'key_2' . $newParamString ]),
                        Keyboard::inlineButton(['text' => '3', 'callback_data' => 'key_3' . $newParamString]),
                        Keyboard::inlineButton(['text' => '+', 'callback_data' => 'key_+' . $newParamString]),
                        Keyboard::inlineButton(['text' => '-', 'callback_data' => 'key_-' . $newParamString])
                    )
                    ->row(
                        Keyboard::inlineButton(['text' => '4', 'callback_data' => 'key_4' . $newParamString]),
                        Keyboard::inlineButton(['text' => '5', 'callback_data' => 'key_5' . $newParamString]),
                        Keyboard::inlineButton(['text' => '6', 'callback_data' => 'key_6' . $newParamString]),
                        Keyboard::inlineButton(['text' => '*', 'callback_data' => 'key_*' . $newParamString]),
                        Keyboard::inlineButton(['text' => '/', 'callback_data' => 'key_/' . $newParamString])
                    )
                    ->row(
                        Keyboard::inlineButton(['text' => '7', 'callback_data' => 'key_7' . $newParamString]),
                        Keyboard::inlineButton(['text' => '8', 'callback_data' => 'key_8' . $newParamString]),
                        Keyboard::inlineButton(['text' => '9', 'callback_data' => 'key_9' . $newParamString]),
                        Keyboard::inlineButton(['text' => '=', 'callback_data' => 'key_calc_result'])
                    )
                    ->row(
                        Keyboard::inlineButton(['text' => 'Waiting...', 'callback_data' => 'key_result'])
                    );

                Telegram::editMessageText([
                    'message_id' => $query->getMessage()->getMessageId(),
                    'text' => 'Update me',
                    'chat_id' => $query->getFrom()->getId(),
                    'reply_markup' => $keyboard
                ]);
                Telegram::sendMessage([
                    'text' => $newParamString,
                    'chat_id' => $query->getFrom()->getId()
                ]);
            } else {
                Telegram::sendMessage([
                    'chat_id' => $query->getFrom()->getId(),
                    'text' => $callbackData . ' ' . $query->getMessage()->getMessageId()
                ]);
            }
        } else {
            Telegram::commandsHandler(true);
        }
    }
}
