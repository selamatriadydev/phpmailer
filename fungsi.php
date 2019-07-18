<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);

require 'phpmailer/PHPMailerAutoload.php';
 $mail = new PHPMailer(true);   
 $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'amperadev@gmail.com';                 // SMTP username
    $mail->Password = 'amperadev';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('amperaclien@gmail.com', 'amperadev');

     $mail->addReplyTo('amperaclien@gmail.com', 'Information');
?>
