<?php
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
use phpmailer\phpmailer\PHPMailer; 
$mail = new PHPMailer(true);
$mail->SMTPDebug = 2;                                       
$mail->isSMTP();                                            
$mail->Host       = 'smtp-relay.sendinblue.com';                    
$mail->SMTPAuth   = true;                             
$mail->Username   = 'antoniollealdeluibpiloton@gmail.com';                 
$mail->Password   = 'QBNtUhMGD60PcSXC';                        
$mail->SMTPSecure = 'tls';                              
$mail->Port       = 587;
?>