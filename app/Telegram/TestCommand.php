<?php

namespace App\Telegram;

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
                Keyboard::inlineButton(['text' => 'Waiting...', 'callback_data' => 'key'])
            );

        $this->replyWithMessage(['text' => $update->getChat()->getId(), 'reply_markup' => $keyboard]);

        //$update->getMessage()->getChat()->getId()
        //        $this->replyWithMessage(['text' => 'Hi: ' . $update->getMessage()->getFrom()->getFirstName()]);
        //        $update = $this->getUpdate();
    }
}
