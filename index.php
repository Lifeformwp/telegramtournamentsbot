<?php

require_once __DIR__.'/vendor/autoload.php';

$foo = new APIAnswer\AnswerController();
$bot = new \TelegramBot\Api\Client('351928596:AAHYPKuvDnAsSY3hE4EPloVo6wyKbgnlV3g');
$bot->run();
$bot->command('go', function ($message) use ($bot) {
    $bot->sendMessage($message->getChat()->getId(), 'Stopwatch started. Go!');
});
$bot->command('stop', function ($message) use ($bot) {
    $bot->sendMessage($message->getChat()->getId(), 'Stopwatch stopped. Enjoy your time!');
});

$keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup([['/go', '/status']], null, true);

$bot->sendMessage($message->getChat()->getId(), $answer, false, null, null, $keyboards);
