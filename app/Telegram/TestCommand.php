<?php

namespace App\Telegram;

use Illuminate\Support\Facades\Session;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram;
use App\Services\CalculatorService;

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
        //$update->getMessage()->getChat()->getId()
        $update = $this->getUpdate();
        $keyboard = CalculatorService::drawCalculator('Start typing', '');

        $message = $this->replyWithMessage([
            'text' => trans('calculator.main_text'),
            'reply_markup' => $keyboard
        ]);
    }
}
