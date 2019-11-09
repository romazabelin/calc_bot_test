<?php

namespace App\Telegram;

use Illuminate\Support\Facades\Session;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram;

class TestCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'test';

    /**
     * @var array Command Aliases
     */
//    protected $aliases = ['testcommands'];

    /**
     * @var string Command Description
     */
    protected $description = 'Press me!';

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {
        $update = $this->getUpdate();

        $keyboard = Keyboard::make()
            ->inline()
            ->row(
                Keyboard::inlineButton(['text' => '1', 'callback_data' => 'key_1']),
                Keyboard::inlineButton(['text' => '2', 'callback_data' => 'key_2']),
                Keyboard::inlineButton(['text' => '3', 'callback_data' => 'key_3']),
                Keyboard::inlineButton(['text' => '+', 'callback_data' => 'key_+']),
                Keyboard::inlineButton(['text' => '-', 'callback_data' => 'key_-'])
            )
            ->row(
                Keyboard::inlineButton(['text' => '4', 'callback_data' => 'key_4']),
                Keyboard::inlineButton(['text' => '5', 'callback_data' => 'key_5']),
                Keyboard::inlineButton(['text' => '6', 'callback_data' => 'key_6']),
                Keyboard::inlineButton(['text' => '*', 'callback_data' => 'key_*']),
                Keyboard::inlineButton(['text' => '/', 'callback_data' => 'key_/'])
            )
            ->row(
                Keyboard::inlineButton(['text' => '7', 'callback_data' => 'key_7']),
                Keyboard::inlineButton(['text' => '8', 'callback_data' => 'key_8']),
                Keyboard::inlineButton(['text' => '9', 'callback_data' => 'key_9']),
                Keyboard::inlineButton(['text' => 'C', 'callback_data' => 'key_clear']),
                Keyboard::inlineButton(['text' => '=', 'callback_data' => 'key_calc_result'])
            )
            ->row(
                Keyboard::inlineButton(['text' => 'Start typing', 'callback_data' => 'key_result'])
            );

        $message = $this->replyWithMessage([
            'text' => 'Ok. It is my first telegram bot',
            'reply_markup' => $keyboard
        ]);

        //$update->getMessage()->getChat()->getId()
        //        $this->replyWithMessage(['text' => 'Hi: ' . $update->getMessage()->getFrom()->getFirstName()]);
        //        $update = $this->getUpdate();
    }
}
