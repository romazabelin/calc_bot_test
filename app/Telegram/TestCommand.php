<?php

namespace App\Telegram;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;

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
    protected $description = 'Test command, Get a list of commands';

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {
        $keyboard = [
            ['7', '8', '9'],
            ['4', '5', '6'],
            ['1', '2', '3'],
            ['0']
        ];

        $keyboard = Keyboard::make()
            ->inline()
            ->row(
                Keyboard::inlineButton(['text' => 'Test', 'callback_data' => 'data']),
                Keyboard::inlineButton(['text' => 'Btn 2', 'callback_data' => 'data_from_btn2'])
            );

        $this->replyWithMessage(['text' => 'Start command', 'reply_markup' => $keyboard]);

//        $replyMarkup = Key::replyKeyboardMarkup([
//            'keyboard' => $keyboard,
//            'resize_keyboard' => true,
//            'one_time_keyboard' => false
//        ]);

//        $replyMarkup = Keyboard::inlineButton([
//            'text' => 'ssss'
//        ]);
//
//        $this->replyWithMessage([
//            'text' => 'Hello World',
//            'reply_markup' => $replyMarkup
//        ]);

        //        $update = $this->getUpdate();
//        $commands = $this->telegram->getCommands();
//
//        $text = '';
//        foreach ($commands as $name => $handler) {
//            $text .= sprintf('/%s - %s'.PHP_EOL, $name, $handler->getDescription());
//        }
//
//        $this->replyWithMessage(compact('text'));
    }
}
