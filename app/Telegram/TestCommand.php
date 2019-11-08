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
                Keyboard::inlineButton(['text' => '1', 'callback_data' => 'data']),
                Keyboard::inlineButton(['text' => '2', 'callback_data' => 'data']),
                Keyboard::inlineButton(['text' => '3', 'callback_data' => 'data']),
                Keyboard::inlineButton(['text' => '+', 'callback_data' => 'dsd']),
                Keyboard::inlineButton(['text' => '-', 'callback_data' => 'vfdc'])
            )
            ->row(
                Keyboard::inlineButton(['text' => '4', 'callback_data' => 'sds']),
                Keyboard::inlineButton(['text' => '5', 'callback_data' => 'sdsd']),
                Keyboard::inlineButton(['text' => '6', 'callback_data' => 'sdds']),
                Keyboard::inlineButton(['text' => '*', 'callback_data' => 'sdsds']),
                Keyboard::inlineButton(['text' => '/', 'callback_data' => 'sdsdsds'])
            );

        $this->replyWithMessage(['text' => $update->getChat()->getId(), 'reply_markup' => $keyboard]);

        //$update->getMessage()->getChat()->getId()
        //        $this->replyWithMessage(['text' => 'Hi: ' . $update->getMessage()->getFrom()->getFirstName()]);
        //        $update = $this->getUpdate();
    }
}
