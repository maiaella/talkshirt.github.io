<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once "sendphpmailer/PHPMailer.php";
require_once "sendphpmailer/SMTP.php";
require_once"sendphpmailer/Exception.php";

 include 'conn.php'; ?>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$scode=$_POST['result2'];
$captcha1=$_POST['captcha1'];
$captcha=$_POST['captcha'];
$mname=$_POST['mname'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$gender=$_POST['gender'];
$user=$_POST['user'];
$pass=$_POST['pass'];
$pass1=$_POST['pass1'];
$day=$_POST['day'];
$month=$_POST['month'];
$year=$_POST['year'];
$add1=$_POST['add1'];
$bday = $month." ".$day." " . $year;
$CODE = rand(00000,99999);

$sql = "SELECT * FROM talkshirt_users WHERE UNAME='$user'";
$result = mysqli_query($con,$sql);
$sql2 = "SELECT * FROM talkshirt_users WHERE MIDDLE_NAME='$mname'";
$result2 = mysqli_query($con,$sql2);
?>

	<!--Eto yung sa Logo-->
	<div class='wholeContent'>
		<?php
		if(mysqli_num_rows($result) > 0) {
		?>
		<h2>Failed!</h2>
		
		<div class='content'>
		<h3>Username already exist. <a href='register.php'>Click here to return</a></h3>
		</div>
		
		<?php
		}else if(mysqli_num_rows($result2) > 0) {
		?>
		<h2>Failed!</h2>
		
		<div class='content'>
		<h3>Seems you already have your account. <a href='login.php'>Click here to Sign In</a></h3>
		</div>
		
		<?php
		}else if($captcha!=$captcha1) {
		?>
		<h2>Failed!</h2>
		
		<div class='content'>
		<h3>The unique captcha code didnt match. Please try again. <a href='javascript:history.back()'>Click here to return</a></h3>
		</div>
		<br>
		<br>
		<?php
		}else if($pass!=$pass1){
		echo "<script type='text/javascript'>alert('The password didnt match. Please try again.');</script>";
		header("Refresh: 0; URL='register.php");
		echo"<div class='register'><center><br><br><br>REDIRECTING<br><br><br><Br><br><br></div>";
		}
		else{
						
			$query="INSERT INTO talkshirt_users (`ID`, `LAST_NAME`,`FIRST_NAME`, `MIDDLE_NAME`, `EMAIL`, `TELNUM`, `UNAME`, `PWORD`, `GENDER`, `BDAY`, `ADDRESS`,`JOB_ID`,`USER_TYPE`,`BLOCK`,`URLPIC`,`CODE`) 
			VALUES (null,'$lname','$fname','$mname','$email','$contact','$user','$pass','$gender','$bday','$add1',NULL,'CUSTOMER',2,'person.png','$CODE')";
			$result=mysqli_query($con,$query)or die ("Unable to Perform Query !".mysql_error()); 

			while ($row = $result2->fetch_assoc()) {
				echo $row['classtype']."<br>";
			}
			#$msg="Welcome to Talkshirt! $fname $lname. Your security code is $result2";
				
				//sms start
				// function gw_send_sms($user,$pass,$sms_from,$sms_to,$sms_msg)  
				// {           
                //         $query_string = "api.aspx?apiusername=".$user."&apipassword=".$pass;
                //         $query_string .= "&senderid=".rawurlencode($sms_from)."&mobileno=".rawurlencode($sms_to);
                //         $query_string .= "&message=".rawurlencode(stripslashes($sms_msg)) . "&languagetype=1";        
                //         $url = "http://gateway.onewaysms.com.au:10001/".$query_string;
				// 	$fd = @implode ('', file ($url));      
                      							
                // }  
				// gw_send_sms("API1LRJKW5YWD", "API1LRJKW5YWDD0YYS", "talkshirt-QC", $contact , $msg);
	 
	//sms end
		?>
		<center>
		<h2>Successful! Please check your email for verification</h2>
		
		<div class='content'>
		<h3><a href='login.php'>Log in</a> to Inquire. </h3><br>
		<label>Please wait for 3 seconds</label>
		If you did not redirected . Click <a href='login.php'>here.</a>
		</div>

		<?php


		$mail = new PHPMailer();

		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->Username = "godegkola@gmail.com";
		$mail->Password = 'yyocuyrxaqqjjpsf';
		$mail->Port = 587;
		$mail->SMTPSecure = "tls";

		$mail->isHTML(true);
		$mail->setFrom("sorar384@gmail.com", 'TALKSHIRT ACCOUNT VERIFICATION');
		$mail->addAddress($email);
		$mail->Subject = "Talkshirt";
		$mail->Body = 'Click <a href="localhost/talkshirt/code.php?code='.$CODE.'">Here</a> to Verify your Account<br>CODE: '.$CODE.'<br> Thanks.';
		$mail->send();


	



?>
		<?php header("Refresh: 3; URL='login.php"); 
		
} ?>

	</div>

	<div class="container4">
		<!--Dont Delete-->
		</div>
		<!-- Footer -->
		

