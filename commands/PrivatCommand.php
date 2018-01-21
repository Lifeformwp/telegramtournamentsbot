<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use API\PrivatExchange;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;

class PrivatCommand extends UserCommand
{
    protected $name = 'privat';                      // Your command's name
    protected $description = 'A command for exchange of privatbank'; // Your command description
    protected $usage = '/privat';                    // Usage of your command
    protected $version = '1.0.0';                  // Version of your command

    public function execute()
    {
        $privatAPI = new PrivatExchange();

        $message = $this->getMessage();            // Get Message object

        $chat_id = $message->getChat()->getId();   // Get the current Chat ID

        $data = [                                  // Set up the new message data
            'chat_id' => $chat_id,                 // Set Chat ID to send the message to
            'text'    => $privatAPI->getExchange(), // Set message to send
        ];

        return Request::sendMessage($data);        // Send message!
    }
}