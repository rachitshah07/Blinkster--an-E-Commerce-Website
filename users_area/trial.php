<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
// $mail = new PHPMailer(true);
// require_once("smtp/class.phpmailer.php");
// $mail = new PHPMailer();
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'TLS';
$mail->Host = "smtp.sendgrid.net";
$mail->Port = 587;
$mail->IsHTML(true);
$mail->CharSet = 'UTF-8';
$mail->Username = "rachitshah0709@gmail.com";
$mail->Password = "Rachit@12345678910";
$mail->SetFrom("rachitshah0709@gmail.com");
// $mail->addAttachment("dummy.pdf");
$mail->Subject = "RACHIT SHAH";
$mail->Body = "ABC";
$mail->AddAddress("rachitshah1525@gmail.com");

if (!$mail->send()) echo "SENT";
else echo "NOT SENT";
