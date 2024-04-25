<?php

// Подключение библиотеки
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Получение данных
$json = file_get_contents('php://input'); // Получение json строки
$data = json_decode($json, true); // Преобразование json

// Данные
$name = $data['name'];
$email = $data['email'];

echo $name;
echo "<br>";
echo $email;


// Контент письма
$title = 'Заявка с сайта'; // Название письма
$body = '<p>Имя: <strong>'.$name.'</strong></p>'.
        '<p>Е-mail: <strong>'.$email.'</strong></p>';

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();

try {
  $mail->isSMTP();
  $mail->CharSet = 'UTF-8';
  $mail->SMTPAuth   = true;

  // Настройки почты отправителя
  $mail->Host       = 'smtp.yandex.com'; 
  $mail->Username   = 'petrashalla@yandex.com'; 
  $mail->Password   = 'lcuiwchiuktgqkxp'; 
  $mail->SMTPSecure = 'ssl';  // tls
  $mail->Port       = 465;    // 587

  // Адрес самой почты и имя отправителя
  $mail->setFrom('petrashalla@yandex.com', 'Заявка с сайта'); 

  // Получатель письма
  $mail->addAddress('petrashalla@yandex.com');

  // Отправка сообщения
  $mail->isHTML(true);
  $mail->Subject = $title;
  $mail->Body = $body;

  $mail->send('d');
 

} catch (Exception $e) {
  header('HTTP/1.1 400 Bad Request');
  echo('Сообщение не было отправлено! Причина ошибки: {$mail->ErrorInfo}');
}

