<?php
namespace App\Services;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram;

class CalculatorService
{
    public static function drawCalculator(string $resultText, string $paramString)
    {
        return Keyboard::make()
            ->inline()
            ->row(
                Keyboard::inlineButton(['text' => '1', 'callback_data' => 'key_1' . $paramString]),
                Keyboard::inlineButton(['text' => '2', 'callback_data' => 'key_2' . $paramString ]),
                Keyboard::inlineButton(['text' => '3', 'callback_data' => 'key_3' . $paramString]),
                Keyboard::inlineButton(['text' => '+', 'callback_data' => 'key_+' . $paramString]),
                Keyboard::inlineButton(['text' => '-', 'callback_data' => 'key_-' . $paramString])
            )
            ->row(
                Keyboard::inlineButton(['text' => '4', 'callback_data' => 'key_4' . $paramString]),
                Keyboard::inlineButton(['text' => '5', 'callback_data' => 'key_5' . $paramString]),
                Keyboard::inlineButton(['text' => '6', 'callback_data' => 'key_6' . $paramString]),
                Keyboard::inlineButton(['text' => '*', 'callback_data' => 'key_*' . $paramString]),
                Keyboard::inlineButton(['text' => '/', 'callback_data' => 'key_/' . $paramString])
            )
            ->row(
                Keyboard::inlineButton(['text' => '7', 'callback_data' => 'key_7' . $paramString]),
                Keyboard::inlineButton(['text' => '8', 'callback_data' => 'key_8' . $paramString]),
                Keyboard::inlineButton(['text' => '9', 'callback_data' => 'key_9' . $paramString]),
                Keyboard::inlineButton(['text' => 'C', 'callback_data' => 'key_clear']),
                Keyboard::inlineButton(['text' => '=', 'callback_data' => 'key_calc_result' . $paramString])
            )
            ->row(
                Keyboard::inlineButton(['text' => $resultText, 'callback_data' => 'key_result'])
            );
    }

    public function ddd()
    {
    }
}