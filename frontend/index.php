<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'smtechsoftltd@gmail.com';
    $mail->Password   = 'xryonwczrkgvrfad';
    $mail->Port       = 587;
    $mail->addAddress('shazibahmed101@gmail.com', 'Shazib Ahmed');
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->addReplyTo('shazibahmed360@gmail.com', 'Information');
    $mail->addAttachment('/uploads/img/blogs/images.png');
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
