<?php
function smtp_mailer($to, $subject, $msg, $username)
{
    require_once 'config.php';
    require 'vendor/autoload.php';
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("your_registered_sendgrid_mail@gmail.com", "Blinkster Admin");
    $email->setSubject($subject);
    $email->addTo($to, $username);
    $email->addContent($msg);
}
