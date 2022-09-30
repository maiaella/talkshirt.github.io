<?php

require '/phpmailer/class.phpmailer.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.yahoo.com';  // Specify main and backup server
$mail->Port = 465;
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'excellenthomedecor@yahoo.com';                            // SMTP username
$mail->Password = 'Mesaadmin00';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'scbcfuritures@gmail.com';
$mail->FromName = 'SCBC';
$mail->addAddress('excellenthomedecor@yahoo.com');               // Name is optional

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo 'Message has been sent';
?>