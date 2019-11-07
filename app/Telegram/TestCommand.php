<?php

namespace App\Telegram;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

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
        $this->replyWithMessage('sssss');
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
