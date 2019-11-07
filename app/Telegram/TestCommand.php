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
        $keyboard = Keyboard::make()
            ->inline()
            ->row(
                Keyboard::inlineButton(['text' => 'Test', 'callback_data' => 'data']),
                Keyboard::inlineButton(['text' => 'Btn 2', 'callback_data' => 'data_from_btn2'])
            );


//        Telegram::sendMessage(['text' => 'ssst command', 'reply_markup' => $keyboard, 'chat_id' => $update->getCallbackQuery()->getMessage()->getChat()]);
        $this->replyWithMessage(['text' => 'ssst command', 'reply_markup' => $keyboard]);

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
