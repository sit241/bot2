<?php
//"https://api.telegram.org/bot5974205574:AAGObwmuI1cS0RLadnYysRsOi1sGxz9pbuQ/setWebhook?url=https://4c48-85-174-200-22.ngrok-free.app/bot.php "


// require 'vendor\autoload.php';
require 'vendor/autoload.php';

use TelegramBot\Api\Client;
use TelegramBot\Api\Types\Update;

$botToken = "5974205574:AAGObwmuI1cS0RLadnYysRsOi1sGxz9pbuQ";

try {
   $bot = new Client($botToken);

   $bot->on(function ($update) use ($bot) {
      $message = $update->getMessage();
      $chatId = $message->getChat()->getId();
      $text = $message->getText();

      $characterCount = mb_strlen($text);  // Получаем количество символов в сообщении

      $user = $message->getFrom();
      $userId = $user->getId();
      $firstName = $user->getFirstName();
      $lastName = $user->getLastName();
      $username = $user->getUsername();

      // Читаем идентификаторы чата из файла
      $chats = file_exists('chats.txt') ? explode("\n", file_get_contents('chats.txt')) : [];

      if (!in_array($chatId, $chats)) {
         // Добавляем идентификатор чата в файл, если его там еще нет
         file_put_contents('chats.txt', $chatId . "\n", FILE_APPEND);
      }

      if (!in_array($chatId, $chats)) {
         $response = 'Привет, ' . $firstName . ' ' . $lastName . ' (' . $username . ')!' .
            ' Твое сообщение содержит ' . $characterCount . ' символов.' .
            ' Теперь вы можете общаться с ботом.';
      } else {
         $response = 'Привет, ' . $firstName . ' ' . $lastName . ' (' . $username . ')!' .
            ' Твое сообщение содержит ' . $characterCount . ' символов.' .
            ' Продолжайте общаться с ботом.' . $chatId;
      }

      $bot->sendMessage($chatId, $response);

      // Отправляем ответное сообщение другому пользователю
      foreach ($chats as $userChatId) {
         if ($userChatId !== $chatId && trim($userChatId) != '' && $userChatId != $userId) {
            $bot->sendMessage($userChatId, $firstName . ' ' . $lastName . ' написал(а): ' . $chatId . ' ' . $text);


            $bot->sendMessage($userChatId, $userChatId + $chatId);
         }
      }
   }, function () {
      return true;
   });

   $bot->run();
} catch (Exception $e) {
   file_put_contents('error_log.txt', $e->getMessage());  // Записываем любые исключения в файл журнала ошибок
}





// $bot = new \TelegramBot\Api\BotApi('5974205574:AAGObwmuI1cS0RLadnYysRsOi1sGxz9pbuQ');

// $bot->sendMessage($chatId, $messageText);
