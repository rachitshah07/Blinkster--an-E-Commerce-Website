<?php
function smtp_mailer($to, $subject, $msg, $username)
{
    require_once 'config.php';
    require 'vendor/autoload.php';
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("rachitshah0709@gmail.com", "Blinkster Admin");
    $email->setSubject($subject);
    $email->addTo($to, $username);
    $email->addContent($msg);
}
