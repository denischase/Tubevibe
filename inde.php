<?php 
include "header.php";

//Include required phpmailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//creat an instance of phpmailer
$mail = new PHPMailer();
//set mailer to use smtp
$mail->isSMTP();
//define smtp host
$mail->Host = "smtp.gmail.com";
//enable smtp authentication
$mail->SMTPAuth = "true";
//set type of encryption (ssl/tls)
$mail->SMTPSecure="tls";
//set port to connect smtp
$mail->Port = "587";
//set gmail username
$mail->Username = "yvibe7605@gmail.com";
//set gmail password
$mail->Password = "fgxqcksookxjdyry";
//set email subject
$mail->Subject = "Test Email Using PHPMailer";
//set sender email
$mail->setFrom("yvibe7605@gmail.com");
//Enable Html
$mail->isHTML(true);
//Email body
$mail->Body = "<h1>Hi ".$name.", This is Your verification Link Please Click Here to verify for Youtubevibe</h1></br><p>This is html paragraph..</p>";
//add recipient
$mail->addAddress("yvibe7605@gmail.com");
//finally send email
if ($mail->send()){
    ?>
    <div class="alert alert-success" role="alert">
    <?php  echo "Email successfully sent to ".$to_email."..."; ?>
      </div>
    <?php
}else{
    echo "Email not sent...!";
}
//closing smtp connection
$mail->smtpClose();


include "ft.php"
?>