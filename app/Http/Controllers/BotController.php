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
            if(strpos($query->getData(), 'key_result') === false) {
                $newParamString = '';
                $pos =  strpos($query->getData(), '?params');

                if (strpos($query->getData(), 'key_calc_result') !== false) {
                    if ($pos !== false) {
                        $paramsString = substr($query->getData(), $pos, strlen($query->getData()) - 1);
                        $queryParams = str_replace('?params=', '', $paramsString);
                        $elements = array_filter(explode(';', $queryParams));

                        if (count($elements) == 3) {
                            $resOperation = eval("return(" . implode('', $elements) . ");");
                            $newParamString .= '?params=' . $resOperation . ';';
                        } else {
                            $newParamString = $paramsString;
                        }
                    }
                } else if (strpos($query->getData(), 'key_clear') !== false) {
                    $newParamString = '';
                } else {
                    if ($pos !== false) {
                        $paramsString = substr($query->getData(), $pos, strlen($query->getData()) - 1);
                        $queryParams = str_replace('?params=', '', $paramsString);
                        $elements = array_filter(explode(';', $queryParams));
                        $newKey = str_replace('key_', '', substr($query->getData(), 0, $pos));

                        if ($newKey == '+' || $newKey == '-' || $newKey == '*' || $newKey == '/') {
                            if (count($elements) == 3) {
                                $resOperation = eval("return(" . implode('', $elements) . ");");
                                $elements = [];
                                $elements[] = $resOperation;
                                $elements[] = $newKey;
                            } else {
                                if (end($elements) != '+' && end($elements) != '-' && end($elements) != '*' && end($elements) != '/') {
                                    $elements[] = $newKey;
                                }
                            }
                        } else {
                            if (end($elements) != '+' && end($elements) != '-' && end($elements) != '*' && end($elements) != '/') {
                                $elements[count($elements) - 1] = $elements[count($elements) - 1] . $newKey;
                            } else {
                                $elements[] = $newKey;
                            }
                        }

                        $newParamString = (count($elements) == 1) ? $elements[count($elements) - 1] . ';' : implode(";", $elements);
                        $newParamString = '?params=' . $newParamString;
                    } else {
                        $newKey = str_replace('key_', '', $query->getData());
                        if ($newKey != '+' && $newKey != '-' && $newKey != '*' && $newKey != '/') {
                            $newParamString .= '?params=' . $newKey . ';';
                        }
                    }
                }

                $posNewParams = strpos($newParamString, '?params');
                if ($posNewParams !== false) {
                    $queryParams = str_replace('?params=', '', $newParamString);
                    $waitingText = str_replace(';', '', $queryParams);
                } else {
                    $waitingText = 'Start typing';
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
                        Keyboard::inlineButton(['text' => 'C', 'callback_data' => 'key_clear']),
                        Keyboard::inlineButton(['text' => '=', 'callback_data' => 'key_calc_result' . $newParamString])
                    )
                    ->row(
                        Keyboard::inlineButton(['text' => $waitingText, 'callback_data' => 'key_result'])
                    );

                Telegram::editMessageText([
                    'message_id' => $query->getMessage()->getMessageId(),
                    'text' => 'Ok. It is my first telegram bot. Try free for 30 days:)',
                    'chat_id' => $query->getFrom()->getId(),
                    'reply_markup' => $keyboard
                ]);
            } else {
            }
        } else {
            Telegram::commandsHandler(true);
        }
    }
}
