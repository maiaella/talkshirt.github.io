<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once "PHPMailer.php";
require_once "SMTP.php";
require_once"Exception.php";

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "godegkola@gmail.com";
$mail->Password = 'yyocuyrxaqqjjpsf';
$mail->Port = 587;
$mail->SMTPSecure = "tls";

$mail->isHTML(true);
$mail->setFrom("sorar384@gmail.com");
$mail->addAddress("sorar384@gmail.com");
$mail->Subject = "adasdasdas";
$mail->Body = "asdasdasd";



if ($mail->send()) {
	echo "success";
}else{
	echo "erro";
}
?>