<?php
require_once __DIR__ . "/vendor/autoload.php";
// Получите токен у бота @BotFather
$API_KEY = '351928596:AAHYPKuvDnAsSY3hE4EPloVo6wyKbgnlV3g';
// Получите свой User ID у бота @MyTelegramID_bot
$USER_ID = '186180776';
// Придумайте своему боту имя
$BOT_NAME = 'TestnautsBot';
// Данные базы данных
$mysql_credentials = [
    'host'     => 'localhost',
    'user'     => 'db_user',
    'password' => 'db_pass',
    'database' => 'db',
];
use Longman\TelegramBot\Telegram;
use Longman\TelegramBot\TelegramLog;
try {
    // Инициализация бота
    $telegram = new Telegram($API_KEY, $BOT_NAME);
    // Подключение базы данных
    //$telegram->enableMySQL($mysql_credentials);
    // Добавление папки commands,
    // в которой будут лежать ваши личные комманды
    $telegram->addCommandsPath(__DIR__ . "/commands");
    // Добавление администратора бота
    $telegram->enableAdmin((int)$USER_ID);
    // Включение логов
    TelegramLog::initUpdateLog($BOT_NAME . '_update.log');
    // Опционально. Здесь вы можете указать кастомный объект update,
    // чтобы поймать ошибки через var_dump.
    //$telegram->setCustomInput("");
    // Основной обработчик событий
    $telegram->handle();
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // В случае неудачи будет выведена ошибка
    var_dump($e);
}