<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once "../sendphpmailer/PHPMailer.php";
require_once "../sendphpmailer/SMTP.php";
require_once"../sendphpmailer/Exception.php";
include '../conn.php';
			$submit = $_POST['submit'];
			$cname = $_POST['cname'];
			$matid = $_POST['matid'];
			$stocks = $_POST['stocks'];
			$tid = $_POST['transid'];
			$ship = $_POST['ship'];
			if($submit == 'Delivered'){
				$query="UPDATE talkshirt_orders SET
				STATUS='Delivered'
				WHERE TRANSID='$tid'";
				
				$result=mysqli_query($con,$query) or die(mysql_error());
				echo"<Center>Status Updated</center>";
				
				$query3="SELECT * FROM talkshirt_users INNER JOIN talkshirt_orders ON talkshirt_users.ID=talkshirt_orders.users_id WHERE talkshirt_orders.TRANSID='$tid'";
				$result3=mysqli_query($con,$query3) or die(mysql_error());
				$row3=mysqli_fetch_object($result3);
				//$tel=$row3->TELNUM;
				$email=$row3->EMAIL;
		

				$mail = new PHPMailer();

					$mail->isSMTP();
					$mail->Host = "smtp.gmail.com";
					$mail->SMTPAuth = true;
					$mail->Username = "godegkola@gmail.com";
					$mail->Password = 'yyocuyrxaqqjjpsf';
					$mail->Port = 587;
					$mail->SMTPSecure = "tls";

					$mail->isHTML(true);
					$mail->setFrom("sorar384@gmail.com", 'TALKSHIRT DELIVERY/PICK UP');
					$mail->addAddress($email);
					$mail->Subject = "talkshirt";
					$mail->Body = "Hello $cname,<br><br>Thanks for your order!<br><br>Your TALKSHIRT product <b>Transaction ID: $tid</b> is out for delivery or ready to pick up.<br>Thanks again for choosing Talkshirts Tshirt Printing Services! <br><br><br> Powered by TALKSHIRT
				<p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px;'>
				<a href='talkshirt.epizy.com' class='clink'><img src='https://www.filepicker.io/api/file/E5GMIrfSFCR4Y7iM9Wrw/convert?w=150&amp;h=55&amp;fit=clip' alt='Talkshirt T-shirt Printing' border='0' id='sig-logo'></a></p>
				<p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px; color: rgb(153, 153, 153);'>
				<span id='name-input' style='font-weight: bold;' class='txt'>Maia Monticalvo</span>
				<span id='title-sep'>/</span> 
				<span id='title-input' style='color: #999;' class='txt'>Web Developer</span><br>
				<span id='email-sep' class='txt'>/</span>  <a id='email-input' class='link email' href='mailto:maiamonticalvo@gmail.com' style='color: #DDA200'>maiamonticalvo@gmail.com</a></p>
				<p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px;'>
				<span id='company-input' style='font-weight: bold; color: #999;' class='txt'>Talkshirt T-shirt Printing</span>
				<span id='office-sep' style='color: #999;' class='txt'>Office: </span> <span id='office-input' style='color: #999;' class='txt'>0917-5188384</span> 
				<span id='fax-sep' style='color: #999;' class='txt'>/ Fax: </span> <span id='fax-input' style='color: #999;' class='txt'>781-3980</span>
				<span id='address-sep'><br></span> <span id='address-input' style='color: #999;' class='txt'>Antipolo City</span><br>
				<a id='website-input' class='link' href='talkshirt.epizy.com' style='color: #DDA200'>talkshirt.epizy.com</a>
				</p>
				<p style='font-size: 12px; line-height: 14px; font-family: Helvetica, Arial, sans-serif;'>        </p>
				<p id='disclaimer-input' style='font-family: Helvetica, Arial, sans-serif; color: rgb(153, 153, 153); font-size: 11px; line-height: 14px;' class='txt'>This e-mail message may contain confidential or legally privileged information and is intended only for the use of the intended recipient(s). Any unauthorized disclosure, dissemination, distribution, copying or the taking of any action in reliance on the information herein is prohibited. E-mails are not secure and cannot be guaranteed to be error free as they can be intercepted, amended, or contain viruses.  Anyone who communicates with us by e-mail is deemed to have accepted these risks. Company Name is not responsible for errors or omissions in this message and denies any responsibility for any damage arising from the use of e-mail.  Any opinion and other statement contained in this message and any attachment are solely those of the author and do not necessarily represent those of the company.</p>
					";
					

	
 

				if(!$mail->send()) {
				   echo 'Message could not be sent.';
				   echo 'Mailer Error: ' . $mail->ErrorInfo;
				   header("Refresh: 1; URL='transaction.php'");
				   exit;
				}

				echo 'Message has been sent';
				
				
				 
				   echo "<script>window.location.href='transaction.php';</script>";
				}
			
			else if($submit == 'Received'){
				$query="UPDATE talkshirt_orders SET
				STATUS='Received'
				WHERE TRANSID='$tid'";
				
				$result=mysqli_query($con,$query) or die(mysqli_error());
				echo"<Center>Status Updated</center>";
				
				$query3="SELECT * FROM talkshirt_users INNER JOIN talkshirt_orders ON talkshirt_users.ID=talkshirt_orders.users_id WHERE talkshirt_orders.TRANSID='$tid'";
				$result3=mysqli_query($con,$query3) or die(mysqli_error());
				$row3=mysqli_fetch_object($result3);
				//$tel=$row3->TELNUM;
				$email=$row3->EMAIL;





				$mail = new PHPMailer();

					$mail->isSMTP();
					$mail->Host = "smtp.gmail.com";
					$mail->SMTPAuth = true;
					$mail->Username = "godegkola@gmail.com";
					$mail->Password = 'yyocuyrxaqqjjpsf';
					$mail->Port = 587;
					$mail->SMTPSecure = "tls";

					$mail->isHTML(true);
					$mail->setFrom("sorar384@gmail.com", 'TALKSHIRT ORDER CONFIRMATION');
					$mail->addAddress($email);
					$mail->Subject = "talkshirt ";
					$mail->Body = "Hello $cname,<br><br>We're happy to let you know that we've received your order.<br><b>Transaction ID: $tid</b><br>Thanks again for choosing talkshirt! <br><br><br> Powered by talkshirt
				<p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px;'>
				<a href='talkshirt.epizy.com' class='clink'><img src='' alt='talkshirt' border='0' id='sig-logo'></a></p>
				<p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px; color: rgb(153, 153, 153);'>
				<span id='name-input' style='font-weight: bold;' class='txt'>Maia Monticalvo</span>
				<span id='title-sep'>/</span> 
				<span id='title-input' style='color: #999;' class='txt'>Web Developer</span><br>
				<span id='email-sep' class='txt'>/</span>  <a id='email-input' class='link email' href='mailto:maiamonticalvo@gmail.com' style='color: #DDA200'>maiamonticalvo@gmail.com</a></p>
				<p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px;'>
				<span id='company-input' style='font-weight: bold; color: #999;' class='txt'>talkshirt</span>
				<span id='office-sep' style='color: #999;' class='txt'>Office: </span> <span id='office-input' style='color: #999;' class='txt'>0917-5188384</span> 
				<span id='fax-sep' style='color: #999;' class='txt'>/ Fax: </span> <span id='fax-input' style='color: #999;' class='txt'>781-3980</span>
				<span id='address-sep'><br></span> <span id='address-input' style='color: #999;' class='txt'>210 Tandang Sora Avenue, 
				Tandang Sora. Quezon City 1116</span><br>
				<a id='website-input' class='link' href='talkshirt.epizy.com' style='color: #DDA200'>talkshirt.epizy.com</a>
				</p>
				<p style='font-size: 12px; line-height: 14px; font-family: Helvetica, Arial, sans-serif;'>        </p>
				<p id='disclaimer-input' style='font-family: Helvetica, Arial, sans-serif; color: rgb(153, 153, 153); font-size: 11px; line-height: 14px;' class='txt'>This e-mail message may contain confidential or legally privileged information and is intended only for the use of the intended recipient(s). Any unauthorized disclosure, dissemination, distribution, copying or the taking of any action in reliance on the information herein is prohibited. E-mails are not secure and cannot be guaranteed to be error free as they can be intercepted, amended, or contain viruses.  Anyone who communicates with us by e-mail is deemed to have accepted these risks. Company Name is not responsible for errors or omissions in this message and denies any responsibility for any damage arising from the use of e-mail.  Any opinion and other statement contained in this message and any attachment are solely those of the author and do not necessarily represent those of the company.</p>
					";
					
		







				if(!$mail->send()) {
				   echo 'Message could not be sent.';
				   echo 'Mailer Error: ' . $mail->ErrorInfo;
				   header("Refresh: 1; URL='transaction.php'");
				   exit;
				}

				echo 'Message has been sent';
				
				echo "<script>window.location.href='transaction.php';</script>";
				}
						
			else if($submit == 'Cancel'){
				$query="UPDATE talkshirt_orders SET
				STATUS='Cancelled'
				WHERE TRANSID='$tid'";
				
				 $result=mysqli_query($con,$query) or die(mysql_error());
				 echo "<script type='text/javascript'>alert('Order Cancelled');</script>";
				 echo "<script>window.location.href='transaction.php';</script>";
					
				 $query3="SELECT * FROM talkshirt_users INNER JOIN talkshirt_orders ON talkshirt_users.ID=talkshirt_orders.users_id WHERE talkshirt_orders.TRANSID='$tid'";
				 $result3=mysqli_query($con,$query3) or die(mysqli_error());
				 $row3=mysqli_fetch_object($result3);
				 //$tel=$row3->TELNUM;
				 $email=$row3->EMAIL;
 
 
 
 
 
				 $mail = new PHPMailer();
 
					 $mail->isSMTP();
					 $mail->Host = "smtp.gmail.com";
					 $mail->SMTPAuth = true;
					 $mail->Username = "godegkola@gmail.com";
					 $mail->Password = 'yyocuyrxaqqjjpsf';
					 $mail->Port = 587;
					 $mail->SMTPSecure = "tls";
 
					 $mail->isHTML(true);
					 $mail->setFrom("sorar384@gmail.com", 'TALKSHIRT CANCELLED ORDER');
					 $mail->addAddress($email);
					 $mail->Subject = "talkshirt ";
					 $mail->Body = "Hello $cname,<br><br>We regret to inform you that your order with<b>Transaction ID: $tid</b> has been cancelled. Sorry for the inconvenience. <br><br><br> Powered by talkshirt
				 <p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px;'>
				 <a href='talkshirt.epizy.com' class='clink'><img src='' alt='talkshirt' border='0' id='sig-logo'></a></p>
				 <p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px; color: rgb(153, 153, 153);'>
				 <span id='name-input' style='font-weight: bold;' class='txt'>Maia Monticalvo</span>
				 <span id='title-sep'>/</span> 
				 <span id='title-input' style='color: #999;' class='txt'>Web Developer</span><br>
				 <span id='email-sep' class='txt'>/</span>  <a id='email-input' class='link email' href='mailto:maiamonticalvo@gmail.com' style='color: #DDA200'>maiamonticalvo@gmail.com</a></p>
				 <p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px;'>
				 <span id='company-input' style='font-weight: bold; color: #999;' class='txt'>talkshirt</span>
				 <span id='office-sep' style='color: #999;' class='txt'>Office: </span> <span id='office-input' style='color: #999;' class='txt'>0917-5188384</span> 
				 <span id='fax-sep' style='color: #999;' class='txt'>/ Fax: </span> <span id='fax-input' style='color: #999;' class='txt'>781-3980</span>
				 <span id='address-sep'><br></span> <span id='address-input' style='color: #999;' class='txt'>210 Tandang Sora Avenue, 
				 Tandang Sora. Quezon City 1116</span><br>
				 <a id='website-input' class='link' href='talkshirt.epizy.com' style='color: #DDA200'>talkshirt.epizy.com</a>
				 </p>
				 <p style='font-size: 12px; line-height: 14px; font-family: Helvetica, Arial, sans-serif;'>        </p>
				 <p id='disclaimer-input' style='font-family: Helvetica, Arial, sans-serif; color: rgb(153, 153, 153); font-size: 11px; line-height: 14px;' class='txt'>This e-mail message may contain confidential or legally privileged information and is intended only for the use of the intended recipient(s). Any unauthorized disclosure, dissemination, distribution, copying or the taking of any action in reliance on the information herein is prohibited. E-mails are not secure and cannot be guaranteed to be error free as they can be intercepted, amended, or contain viruses.  Anyone who communicates with us by e-mail is deemed to have accepted these risks. Company Name is not responsible for errors or omissions in this message and denies any responsibility for any damage arising from the use of e-mail.  Any opinion and other statement contained in this message and any attachment are solely those of the author and do not necessarily represent those of the company.</p>
					 ";
					 
		 
 
 
 
 
 
 
 
				 if(!$mail->send()) {
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
					header("Refresh: 1; URL='transaction.php'");
					exit;
				 }
 
				 echo 'Message has been sent';
				 
				 echo "<script>window.location.href='transaction.php';</script>";
				 }

				
				echo"<Center>Status Updated</center>";
				header("Refresh: 1; URL='transaction.php'");
				
?>