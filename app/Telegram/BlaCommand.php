<?php

namespace App\Telegram;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram;

class BLaCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'bla';

    /**
     * @var array Command Aliases
     */
//    protected $aliases = ['testcommands'];

    /**
     * @var string Command Description
     */
    protected $description = 'Bla';

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {
        $update = $this->getUpdate();

        $keyboard = Keyboard::hide(['hide_keyboard' => true]);

        $this->replyWithMessage(['text' => $update->getChat()->getId(), 'reply_markup' => ['hide_keyboard'=> true]]);
    }
}
