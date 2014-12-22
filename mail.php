<?php
require_once 'swift/lib/swift_required.php';

$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
  ->setUsername('dilipk3@gmail.com')
  ->setPassword('sdsdss!');

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance('Test Subject')
  ->setFrom(array('dilipk3@gmail.com' => 'Dilip'))
  ->setTo(array('kdilip3@yahoo.com'))
  ->setBody('This is a test mail.');

$result = $mailer->send($message);
?>