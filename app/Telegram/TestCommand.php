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
    protected $description = 'Press me!';

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {
        $update = Telegram::getWebhookUpdates();

//        $this->replyWithMessage(['text' => 'Hi: ' . $update->getMessage()->getFrom()->getFirstName()]);

        $keyboard = Keyboard::make()
            ->inline()
            ->row(
                Keyboard::inlineButton(['text' => '1', 'callback_data' => 'data']),
                Keyboard::inlineButton(['text' => '2', 'callback_data' => 'data']),
                Keyboard::inlineButton(['text' => '3', 'callback_data' => 'data']),
                Keyboard::inlineButton(['text' => '4', 'callback_data' => 'data']),
                PHP_EOL,
                Keyboard::inlineButton(['text' => '5', 'callback_data' => 'data']),
                Keyboard::inlineButton(['text' => '6', 'callback_data' => 'data']),
                Keyboard::inlineButton(['text' => '7', 'callback_data' => 'data']),
                Keyboard::inlineButton(['text' => '8', 'callback_data' => 'data']),
                Keyboard::inlineButton(['text' => '9', 'callback_data' => 'data'])
            );


//        Telegram::sendMessage(['text' => 'ssst command', 'reply_markup' => $keyboard, 'chat_id' => $update->getCallbackQuery()->getMessage()->getChat()]);
        $this->replyWithMessage(['text' => $update->getMessage()->getChat()->getId(), 'reply_markup' => $keyboard]);


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
